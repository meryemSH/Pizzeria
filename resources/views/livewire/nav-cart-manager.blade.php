<div class="flex justify-center z-[999]">
    <div x-data="cart_dropdown" @refresh-cart.window="open = true" x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
        class="relative font-semibold hover:text-primary-200 hover:underline px-4">
        <!-- Button -->
        <template x-if="screen.width > 640">
            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                type="button" class="relative flex items-center">
                    <svg @class(["w-12 text-black", "text-white" => request()->routeIs('about', 'workshop-enligne', 'workshop-detail-enligne')]) xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                     <span class="absolute top-0 right-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/4 translate-x-1/4 text-white bg-primary">
                     {{ \Cart::getTotalQuantity() }}
                     </span>
            </button>
        </template>

        <template x-if="screen.width <= 640">

            <li class="z-10 flex flex-col lg:flex-row items-center lg:items-start">
                <a href="{{route('checkout')}}"
                    class="flex py-2 text-lg font-semibold text-gray lg:text-gray-bg hover:text-primary lg:inline-flex">
                    {{ __("Panier") }}
                </a>
            </li>
        </template>

        <!-- Panel -->
        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')" style="display: none;"
            class="absolute -right-14 md:right-0 mt-4 w-96 divide-y rounded-md bg-white shadow-md text-black">

            @if (!\Cart::getContent()->count())
                <div class="rounded-md overflow-hidden flex flex-col items-center pb-3">
                    <img src="/assets/images/empty.png" alt="cart empty image" class="w-10/12">

                    <div class="font-semibold leading-relaxed">
                        Your cart is empty! Add some items!
                    </div>
                </div>
            @else
                <div class="flex justify-end border-b px-4 text-red-500">
                    <div class="flex gap-1 items-center">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        <button wire:click="clearCart">Empty the cart</button>
                    </div>
                </div>
                @foreach (\Cart::getContent() as $item)
                <div
                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm disabled:text-gray-500">
                    <div class="w-full flex">
                        <div class="flex-[1_1_0]">
                            <div class="flex flex-row items-center gap-2 lg:gap-4 mb-2.5">
                                @if ($item->associatedModel && $item->associatedModel->image)
                                    <img src="{{ asset('storage/' . $item->associatedModel->image) }}"
                                         alt="Image produit"
                                         class="w-11 md:w-14 lg:w-20 h-full aspect-video object-cover rounded">
                                @else
                                    <div class="w-11 md:w-14 lg:w-20 h-full aspect-video bg-gray-200 flex items-center justify-center rounded">
                                        <span class="text-gray-500 text-xs text-center">No image</span>
                                    </div>
                                @endif
            
                                    <div class="flex flex-col">
                                        <h2 class="text-primary-500 text-xl font-semibold leading-relaxed">
                                            {{ $item->name }}</h2>
                                        <span class="flex gap-2">
                                            <span class="text-purple text-sm font-black leading-[18px]">
                                                {{ $item->price }} MAD
                                            </span>
                                            <span class="flex gap-2 items-center bg-primary text-white font-semibold px-1 rounded-lg">
                                                <button wire:click="addProductToCart({{ $item->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                         stroke-width="2" stroke="currentColor" fill="none"
                                                         stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M12 5l0 14"></path>
                                                        <path d="M5 12l14 0"></path>
                                                    </svg>
                                                </button>
                                                <span>x {{ $item->quantity }}</span>
                                                <button wire:click="minusProductFromCart({{ $item->id }})">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                                         stroke-width="2" stroke="currentColor" fill="none"
                                                         stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M5 12l14 0"></path>
                                                    </svg>
                                                </button>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center cursor-pointer" wire:click="removeItem({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="bg-primary"></path>
                                    <path d="M10 10l4 4m0 -4l-4 4"></path>
                                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="px-4 py-4 flex flex-col gap-2 text-sm font-medium tracking-wide">

                    <div class="w-full flex justify-between">
                        <span>Total:</span>
                        <span>{{ \Cart::getTotal() }} USD</span>
                    </div>
                    <div class="w-full mt-2">
                        <a href="{{route('checkout')}}" class="w-full btn btn-sm bg-primary text-white text-semibold h-10 flex justify-center items-center rounded">Checkout</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('cart_dropdown', () => ({
                open: false,
                toggle() {
                    if (this.open) {
                        return this.close()
                    }

                    this.$refs.button.focus()

                    this.open = true
                },
                close(focusAfter) {
                    if (!this.open) return

                    this.open = false

                    focusAfter && focusAfter.focus()
                }
            }))
        })
    </script>
</div>
