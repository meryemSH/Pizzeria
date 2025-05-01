<?php
namespace App\Services;

use Square\SquareClient;
use Square\Models\Money;
use Square\Models\CreatePaymentRequest;
use Square\Exceptions\ApiException;
use Square\Environment;
use Illuminate\Support\Facades\Log;

class SquareService
{
    protected $client;

    public function __construct()
    {
        // Vérification du token d'accès Square
        $accessToken = env('SQUARE_ACCESS_TOKEN');
        $environment = env('SQUARE_ENVIRONMENT') === 'production' ? Environment::PRODUCTION : Environment::SANDBOX;

        if (!$accessToken) {
            Log::error('Square Access Token manquant.');
            throw new \Exception('Le token Square est introuvable.');
        }

        // Initialisation du client Square
        $this->client = new SquareClient([
            'access_token' => $accessToken,
            'environment'  => $environment,
        ]);
    }

    public function createPayment($nonce, $amount, $idempotencyKey)
    {
        // Préparation de l'objet Money pour l'API Square
        $money = new Money();
        $money->setAmount((int) $amount); // Montant en centimes
        $money->setCurrency('USD');

        $paymentRequest = new CreatePaymentRequest($nonce, $idempotencyKey, $money);
        $paymentRequest->setLocationId(env('SQUARE_LOCATION_ID'));

        try {
            // Envoi de la requête à Square
            $response = $this->client->getPaymentsApi()->createPayment($paymentRequest);
            
            if ($response->isSuccess()) {
                return $response->getResult(); // Si succès
            } else {
                Log::error('Erreur Square: ', $response->getErrors()); // En cas d'erreur
                return ['error' => $response->getErrors()];
            }
        } catch (ApiException $e) {
            // Gestion des erreurs d'API
            Log::error('Erreur API Square: ' . $e->getMessage());
            return ['error' => $e->getMessage()];
        }
    }
}
