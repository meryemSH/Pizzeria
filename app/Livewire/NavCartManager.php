<?php

namespace App\Livewire;

use App\Http\Livewire\CartManager;
use App\Livewire\CartManager as LivewireCartManager;

class NavCartManager extends LivewireCartManager
{
    protected $listeners = ['refresh-cart' => '$refresh'];

    public function clearCart()
    {
        \Cart::clear();

        $this->dispatch('refresh-cart');
    }

    public function render()
    {
        return view('livewire.nav-cart-manager');
    }
}
