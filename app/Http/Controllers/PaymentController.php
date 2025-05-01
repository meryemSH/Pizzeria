<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\OrderItem;
use App\Livewire\Checkout;
use Illuminate\Http\Request;
use App\Enums\orderStutsEnums;
use App\Enums\WorshopsTypeEnums;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(config('shopper.payments.paypal.client_id'));
        $this->gateway->setSecret(config('shopper.payments.paypal.client_secret'));
        $this->gateway->setCurrency(config('shopper.payments.paypal.currency'));
        $this->gateway->setTestMode(config('shopper.payments.paypal.test_mode')); //set it to 'false' when go live
    }


    public function charge(Request $request)
    {
        $data = $request->validate([
            'shipping_address' => 'required|max:150',
        ]);

        session()->put('purchase_user_data', $data['shipping_address']);

        try {
            $response = $this->gateway->purchase(array(
                'amount' => number_format(\Cart::getTotal() / config('shopper.payments.paypal.currency_conversion_rate', '1.0'), 2),
                'currency' => config('shopper.payments.paypal.currency'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error'),
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function success(Request $request)
    {
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id'             => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $order = $this->placeOrder(session()->pull('purchase_user_data'), null);

                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $payment = new Payment();
                $payment->transaction_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['email'];
                $payment->order_id = $order->id;
                $payment->user_id = $order->user_id;
                $payment->payment_method = 'paypal';
                $payment->payment_date = now();
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = config('shopper.payments.paypal.currency');
                $payment->status = $arr_body['state'];
                $payment->save();

                \Cart::clear();

                return redirect()->route('checkout')
                    ->with('payment-success', __("Payment is successful!"));
            } else {
                return $response->getMessage();
            }
        } else {
            return 'Transaction is declined';
        }
    }

    /**
     * Error Handling.
     */
    public function error()
    {
        return 'User cancelled the payment.';
    }

    private function placeOrder(string $shipping_address = null)
    {
        $user = \Auth::user();

        // Obtenez le type d'atelier à partir de l'énumération
        $workshopType = WorshopsTypeEnums::online; // Par exemple

        // Déterminez le statut de la commande en fonction du type d'atelier
        if ($workshopType === WorshopsTypeEnums::online) {
            $orderStatus = orderStutsEnums::accepted;
        } else {
            $orderStatus = orderStutsEnums::pending;
        }

        // Création de la commande
        $order = \App\Models\Order::create([
            'amount' => \Cart::getTotal(),
            'status' => $orderStatus,
            'notes' => '',
            'shipping_address' => $shipping_address,
            'payment_method_id' => 1,
            'user_id' => $user->id,
        ]);


        foreach (\Cart::getContent()->sort() as $item) {
            OrderItem::create([
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'unit_price_amount' => $item['price'],
                'order_id' => $order->id,
                'workshop_id' => $item['associatedModel']->id,
            ]);
        }

        //    SlackAlert::message("Nouvelle Commande N°: {$order->number}, du client:  {$user->full_name}, produits: {$order->items->implode('name', ', ')}!");

        //    Mail::to(env("MAIL_CONTACT_ADDRESS") ?? 'contact@chertichaussures.com')->send(new NewOrder($order));

        return $order;
    }

    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
