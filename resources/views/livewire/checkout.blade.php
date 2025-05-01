<div @class([
    'w-full flex flex-col md:grid gap-10 lg:gap-20',
    'grid-cols-1' => \Cart::getContent()->count(),
])>
    <!-- Panel -->
    @if (!\Cart::getContent()->count())
        <div class="rounded-md overflow-hidden flex flex-col items-center pb-3 space-y-4">
            <img src="/assets/images/empty.png" alt="cart empty image" class="w-1/2">
            <div class="text-black text-base font-semibold leading-relaxed">
                {{ __('Votre panier est vide! Ajoutez quelques articles!') }}</div>
            <a href="/" class="btn btn-sm bg-primary-500 text-black font-semibold flex gap-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
                {{ __('Allez aux produits!') }}
            </a>
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="lg:w-1/2 divide-y p-0 rounded-lg lg:rounded-[20px] bg-cover mx-auto">
                @foreach (\Cart::getContent() as $item)
                    <div
                        class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm disabled:text-gray-500">
                        <div class="w-full flex">
                            <div class="flex-[1_1_0] space-y-2 md:space-y-4 lg:space-y-6">
                                <div class="flex flex-col lg:flex-row items-center gap-2 lg:gap-6 mb-2.5">
                                    <h2 class="text-black text-xs md:text-base lg:text-xl font-black leading-relaxed">
                                        {{ $item->name }}</h2>
                                    <img src="{{ $item->associatedModel->getFirstMediaUrl('images') }}" alt="plume Icon"
                                        class="lg:w-1/2 h-1/2">
                                </div>
                                <div class="flex flex-col lg:flex-row gap-6 items-center">
                                    <span
                                        class="text-primary text-[10px] md:text-xs lg:text-sm font-black leading-[18px]">{{ $item->price }}
                                        MAD</span>
                                    <span
                                        class="flex gap-2 items-center bg-primary text-primary-400 font-semibold px-1 rounded-lg">
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

                <div
                    class="px-4 py-4 flex flex-col gap-2 text-black text-[9px] md:text-xs lg:text-sm font-medium tracking-wide">
                    <div class="w-full flex justify-between">
                        <span>Total:</span> {{ \Cart::getTotal() }} MAD
                    </div>
                </div>
            </div>

            <div class="lg:w-1/2 p-4 md:p-8 flex flex-col items-center bg-cover rounded-3xl">
                @auth
                    <form action="{{ route('payment.charge') }}" method="post" class="w-full grid md:grid-cols-2 gap-6">
                        @csrf
                        <div class="w-full flex flex-col gap-2 col-span-full gap-y-6">
                            <label for="address"
                                class="text-black text-sm md:text-lg font-normal">Vous pouvez saisir votre adresse de livraison :</label>
                            <x-form.input name="shipping_address" value="{{ old('address') }}" :placeholder="__('Adresse')" class="border-purple"
                                required />
                        </div>

                        <div class="flex flex-col items-center justify-center col-span-full">
                            <button type="submit"
                                class="btn btn-sm bg-purple hover:bg-primary text-white text-xs md:text-sm lg:text-base font-semibold px-7 md:px-14 py-3.5 rounded-md">
                                {{ __('Pay') }}
                            </button>
                        </div>

                    </form>
                @else
                    <div x-data="{ selectedOption: 'signIn' }">
                        <div class="flex justify-center max-w-xs mx-auto text-3xl font-bold gap-7 h-20 ">
                            <p @click="selectedOption = 'signIn'"
                                :class="{ 'text-primary': selectedOption === 'signIn', 'text-[#181818a7]': selectedOption !== 'signIn' }"
                                class="text-[#181818a7] cursor-pointer z-50">Sign In</p>
                            <span class="text-black">|</span>
                            <p @click="selectedOption = 'signUp'"
                                :class="{ 'text-primary': selectedOption === 'signUp', 'text-[#181818a7]': selectedOption !== 'signUp' }"
                                class="text-[#181818a7] cursor-pointer z-50">Sign Up</p>
                        </div>

                        <div class="mt-5 max-w-xl mx-auto text-xl text-black text-center">
                            <template x-if="selectedOption === 'signIn'">
                            <livewire:login-client-checkout/>
                            </template>
                            <template x-if="selectedOption === 'signUp'">
                                <livewire:client-register/>

                            </template>

                        </div>

                    </div>

                @endauth


            </div>
        </div>

    @endif
</div>
