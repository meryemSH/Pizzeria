<?php

namespace App\Livewire;

use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Enums\orderStutsEnums;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Checkout extends CartManager
{
    use LivewireAlert;
    use Actions;

    public $shipping_address= '';


    protected function rules(): array
    {
        return [
            'shipping_address' => 'required|max:150', // Add this line
        ];
    }

    public function checkout()
    {
        if (!\Cart::getContent()->count()) {
            $this->dialog()->error(
                $title = 'Panier vide',
                $description = 'Votre panier est vide. Ajoutez des produits avant de procéder au paiement.'
            );
            return;
        }

        $this->validate();

        // Ajoutez ici la logique pour gérer le paiement si nécessaire
        // Par exemple, en utilisant Omnipay pour traiter le paiement

        $this->placeOrder(
            $this->shipping_address,
        );

        $this->reset();
        \Cart::clear();
        $this->dispatch('refresh-cart');

        $this->dialog()->success(
            $title = 'Commande envoyée!',
            $description = 'Votre commande a été enregistrée avec succès!'
        );

        $this->alert('success', 'Votre demande a été envoyée avec succès', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'showConfirmButton' => false,
            'onConfirmed' => '',
        ]);

        return redirect()->route('payment.charge');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}
