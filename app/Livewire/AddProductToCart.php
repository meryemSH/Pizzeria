<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Workshop;

class AddProductToCart extends Component
{
    public Workshop $product;

    public $quantity = 1;

    public $class = '';

    public function mount(string $slug, string $class = '')
    {
        $this->product = Workshop::where('slug', $slug)->first();
        $this->class = $class;
    }

    public function add()
    {
        \Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'price' => $this->product->price,
            'quantity' => $this->quantity,
            'associatedModel' => $this->product
        ]);

        $this->dispatch('refresh-cart');
        $this->dispatch('product-added-' . $this->product->id);
    }

    public function render()
    {
        return view('livewire.add-product-to-cart');
    }
}
