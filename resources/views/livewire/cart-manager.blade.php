<div class="flex justify-center z-50">
    <div x-data="cart_dropdown" @refresh-cart.window="open = true" x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
        class="relative font-semibold hover:text-primary-200 hover:underline px-4 py-2">
        <!-- Button -->
        <template x-if="screen.width > 640">
            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                type="button" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    enable-background="new 0 0 40 40" id="Слой_1" version="1.1" viewBox="0 0 40 40"
                    xml:space="preserve">
                    <g>
                        <path
                            d="M38.9,11.9c-0.8-0.9-1.9-1.5-3.1-1.5H20.4c-0.5,0-1,0.4-1,1c0,0.6,0.5,1,1,1h15.4c0.6,0,1.2,0.3,1.6,0.7
                            c0.4,0.5,0.6,1.1,0.4,1.7l-0.9,5h-11c-0.5,0-1,0.4-1,1s0.5,1,1,1h10.7l-0.9,4.8c-0.1,0.7-0.8,1.2-1.5,1.2H15
                            c-0.7,0-1.3-0.5-1.5-1.2L9.6,4.9c-0.1-0.5-0.5-0.8-1-0.8H0.9c-0.5,0-1,0.4-1,1s0.5,1,1,1h6.9l3.8,21c0.2,1.4,1.2,2.4,2.5,2.8
                            c-0.5,0.7-0.9,1.6-0.9,2.6c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5c0-0.9-0.3-1.8-0.8-2.5h6.1c-0.5,0.7-0.8,1.6-0.8,2.5
                             c0,2.5,2,4.5,4.5,4.5c2.5,0,4.5-2,4.5-4.5c0-1-0.3-1.9-0.8-2.6c1.3-0.3,2.4-1.4,2.7-2.8l2.2-11.8C40,14.1,39.7,12.9,38.9,11.9z
                             M20.2,32.4c0,1.4-1.1,2.5-2.5,2.5s-2.5-1.1-2.5-2.5c0-1.4,1.1-2.5,2.5-2.5S20.2,31,20.2,32.4z M31.3,34.9c-1.4,0-2.5-1.1-2.5-2.5
                             c0-1.4,1.1-2.5,2.5-2.5c1.4,0,2.5,1.1,2.5,2.5C33.8,33.8,32.7,34.9,31.3,34.9z" />
                    </g>
                </svg>

{{--                <span class="absolute top-0 right-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/4 translate-x-1/4 text-white bg-primary-500">--}}
{{--                    {{ \Cart::getTotalQuantity() }}--}}
{{--                </span>--}}
            </button>
        </template>

        <!-- Panel -->
        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')" style="display: none;"
            class="absolute -right-14 md:right-0 mt-4 w-96 divide-y rounded-md bg-white shadow-md text-gray-900">
            @if (!\Cart::getContent()->count())
                <div class="rounded-md overflow-hidden flex flex-col items-center pb-3">
                    <img src="/assets/images/cart/cart-empty.png" alt="cart empty image">
                    <div class="font-semibold leading-relaxed">Votre panier est vide! Ajoutez quelques articles!</div>
                </div>
            @else
                @foreach (\Cart::getContent()->sort() as $item)
                    <div
                        class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm disabled:text-gray-500">
                        <div class="w-full flex">
                            <div class="flex-[1_1_0]">
                                <div class="flex flex-row items-center gap-2 lg:gap-4 mb-2.5">
                                    <h2 class="text-primary-500 text-xl font-black leading-relaxed">{{ $item->name }}
                                    </h2>
                                    <img src="/assets/images/home/plume2.png" alt="plume Icon"
                                        class="w-11 md:w-14 lg:w-20 h-3 md:h-4 lg:h-5">
                                </div>
                                <div class="flex gap-4 items-center">
                                    <span
                                        class="flex gap-2 items-center bg-primary-500 text-white font-semibold px-1 rounded-lg">
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
                                </div>
                            </div>
                            <div class="flex items-center cursor-pointer" wire:click="removeItem({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-orange-200" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="bg-orange-200"></path>
                                    <path d="M10 10l4 4m0 -4l-4 4"></path>
                                    <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="px-4 py-4 flex flex-col gap-2 text-sm font-medium tracking-wide">
                    <div class="w-full flex justify-between">
                        <span>SubTotal:</span>
                    </div>
                    <div class="w-full flex justify-between">
                        <span>Total:</span>
                    </div>
                    <div class="w-full mt-2">
                        <a href="/" class="w-full btn btn-sm bg-primary-500 text-white text-semibold">Checkout</a>
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
