<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Enums\orderStutsEnums;

class CheckoutController extends Controller
{
    // Affichage de la page de checkout
    public function showCheckoutPage()
    {
        return view('checkout.checkout');
    }

    // Traitement du paiement
    public function charge(Request $request)
    {
        // Récupération du nonce (token de paiement)
        $nonce = $request->input('nonce');
        $shippingAddress = $request->input('shipping_address');

        if (!$nonce) {
            return response()->json(['success' => false, 'error' => 'Token de paiement manquant'], 400);
        }

        // Conversion du total du panier en centimes
        $totalAmount = intval(Cart::getTotal() * 100); // Convertir en centimes
        Log::info("Montant du panier avant conversion : " . Cart::getTotal() . " USD"); // Log pour vérifier

        if ($totalAmount <= 0) {
            return response()->json(['success' => false, 'error' => 'Montant invalide'], 400);
        }

        // Création de la clé d'idempotence pour garantir l'unicité du paiement
        $idempotencyKey = Str::uuid();
        Log::info("✅ Paiement en cours: montant $totalAmount USD, idempotencyKey $idempotencyKey");

        try {
            // Envoi de la requête de paiement à Square via l'API
            $response = Http::withToken(env('SQUARE_ACCESS_TOKEN'))->post('https://connect.squareup.com/v2/payments', [
                'idempotency_key' => $idempotencyKey,
                'amount_money' => [
                    'amount' => $totalAmount,  // Montant en centimes
                    'currency' => 'USD',
                ],
                'source_id' => $nonce,  // Token de la carte
            ]);

            // Vérification de la réussite de la demande
            if (!$response->successful()) {
                Log::error("❌ Erreur paiement Square: " . json_encode($response->json()));
                return response()->json([
                    'success' => false,
                    'error' => $response->json()['errors'][0]['detail'] ?? 'Erreur inconnue'
                ], 400);
            }

            // Traitement de la réponse et enregistrement dans la base de données
            $paymentData = $response->json();

            // Enregistrement de la commande
            DB::beginTransaction();

            $order = Order::create([
                'amount' => $totalAmount / 100, // Conversion en dollars
                'status' => orderStutsEnums::Paye,
                'notes' => null,
                'shipping_address' => $shippingAddress,
                'user_id' => auth()->id() ?? null,
            ]);

            // Enregistrement des articles de la commande
            foreach (Cart::getContent() as $item) {
                if (!$item->associatedModel) {
                    Log::error("❌ Erreur: L'article '{$item->name}' n'a pas d'ID de modèle associé.");
                    return response()->json(['success' => false, 'error' => "L'article '{$item->name}' est invalide."], 400);
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'unit_price_amount' => intval($item->price * 100), // En centimes
                    'workshop_id' => $item->associatedModel->id,
                ]);
            }

            // Enregistrement du paiement
            Payment::create([
                'order_id' => $order->id,
                'transaction_id' => $paymentData['payment']['id'],
                'amount' => $totalAmount / 100,
                'currency' => 'USD',
                'status' => 'completed',
                'user_id' => auth()->id() ?? null,
            ]);

            // Validation de la transaction
            DB::commit();
            Cart::clear();

            return response()->json(['success' => true]);

        } catch (\Illuminate\Http\Client\RequestException $e) {
            DB::rollBack();
            Log::error('❌ Erreur HTTP Square: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Erreur de communication avec Square'], 500);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('❌ Erreur serveur: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => 'Erreur serveur'], 500);
        }
    }
}
