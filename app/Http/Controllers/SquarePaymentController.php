<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SquareService;
use Illuminate\Support\Str;

class SquarePaymentController extends Controller
{
  
    

        public function pay(Request $request, SquareService $square)
        {
            $nonce = $request->input('nonce');
            $amount = $request->input('amount'); // ex: 10.00
            $idempotencyKey = Str::uuid();
    
            // Convertir en centimes
            $amountInCents = intval($amount * 100);
    
            $result = $square->createPayment($nonce, $amountInCents, $idempotencyKey);
    
            if (isset($result['error'])) {
                return response()->json(['error' => $result['error']], 400);
            }
    
            return response()->json(['success' => true, 'data' => $result]);
        }
    
        public function charge(Request $request, SquareService $square)
        {
            $request->validate([
                'nonce' => 'required|string',
                'shipping_address' => 'required|string',
            ]);
    
            $idempotencyKey = Str::uuid();
            $amount = \Cart::getTotal();
    
            // Convertir en centimes
            $amountInCents = intval($amount * 100);
    
            $result = $square->createPayment($request->nonce, $amountInCents, $idempotencyKey);
    
            if (isset($result['error'])) {
                return response()->json(['success' => false, 'error' => $result['error']], 400);
            }
    
            // Vider le panier
            \Cart::clear();
    
            return response()->json([
                'success' => true,
                'message' => 'Paiement effectué avec succès !',
                'data' => $result,
            ]);
        }
    
    

}
