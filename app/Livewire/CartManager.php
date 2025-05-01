<?php

namespace App\Livewire;

use Livewire\Component;

class CartManager extends Component
{
    protected $listeners = ['refresh-cart' => '$refresh'];

    public function removeItem($itemId)
    {
        \Cart::remove($itemId);

          $this->dispatch('refresh-cart');
    }

    public function addProductToCart($itemId)
    {
        // check if the user is authorized to add this product
        \Cart::update($itemId, [
            'quantity' => 1,
        ]);

          $this->dispatch('refresh-cart');
    }

    public function minusProductFromCart($itemId)
    {
        // check if the user is authorized to add this product
        if (\Cart::has($itemId) && \Cart::get($itemId)->quantity == 1) {
            return $this->removeItem($itemId);
        }

        \Cart::update($itemId, [
            'quantity' => -1,
        ]);

        $this->dispatch('refresh-cart');
    }

    public function render()
    {
        return view('livewire.cart-manager');
    }
}
