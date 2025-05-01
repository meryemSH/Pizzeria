<?php

namespace App\Services;

use App\Models\User;
use App\Mail\NewOrder;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use App\Enums\orderStutsEnums;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

//use Spatie\SlackAlerts\Facades\SlackAlert;

class PlaceOrder
{

    public static function store(array $data, $shipping_address)
    {
        $user = Auth::user();

        // Création de la commande
        $order = \App\Models\Order::create([
            'amount' => \Cart::getTotal(),
            'status' => orderStutsEnums::pending,
            'notes' => '',
            'shipping_address' => $shipping_address, // Utilisez le paramètre passé
            'payment_method_id' => 'COD',
            'user_id' => $user->id,
        ]);


        foreach (\Cart::getContent()->sort() as $item) {
            OrderItem::create([
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'unit_price_amount' => $item['unit_price_amount'],
                'order_id' => $order->id,
                'workshop_id' => $item['workshop_id'],
            ]);
        }

        //    SlackAlert::message("Nouvelle Commande N°: {$order->number}, du client:  {$user->full_name}, produits: {$order->items->implode('name', ', ')}!");

        //    Mail::to(env("MAIL_CONTACT_ADDRESS") ?? 'contact@chertichaussures.com')->send(new NewOrder($order));

        return true;
    }
}
