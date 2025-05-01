@extends('layouts.welcome')

@section('content')
    <div class="relative bg-no-repeat main lg:pb-40 pb-20">
        <img src="/assets/images/Wri9a.png" class=" absolute top-1/4 right-0 z-40" alt="">
        <img src="/assets/images/tamato.png" class=" absolute top-1/2 mt-8 w-56 -left-14 z-40" alt="">
        <!-- <img src="/assets/images/topLeft.svg" class=" absolute top-0 right-0" alt=""> -->
        <x-navbar />
        <div class="relative px-6">
            <div class="relative rounded-3xl h-screen w-full bg-no-repeat bg-cover"
                style="background-image: url('assets/images/imageorder.avif');  width: 100%; background-position: right; ">

                <div class="absolute top-1/2 w-full space-y-6">

                    <h1
                        class=" text-3xl lg:text-6xl text-red-600 font-bold flex flex-col justify-center items-center top-1/2">
                        Open For Dinner And
                    </h1>
                    <h1 class=" text-3xl lg:text-6xl text-red-600 font-bold flex flex-col justify-center items-center">
                        Open Late Until 2AM Daily
                    </h1>

                </div>

            </div>
        </div>

        <section class="about">
            <div class="relative lg:p-6 py-16 lg:py-20 text-center z-50">

                <h1 class=" text-black font-bold text-4xl lg:text-7xl">Order </h1>
                <h1 class=" text-black font-bold text-5xl lg:text-8xl">Online</h1>

                <p class="mt-5 max-w-4xl mx-auto text-base font-medium text-black text-center px-4 lg:px-0">
                    You can order online! Browse our menu items and choose what you’d like to order from us.
                </p>
                <div class="relative flex text-center justify-end items-end">
                <form method="GET" action="{{ route('workshop-enligne') }}" class="mb-8">
                    <div class="flex items-center space-x-4">
                        <select 
                            name="category_id" 
                            id="category_id" 
                            onchange="this.form.submit()"
                            class="border rounded-md px-4 py-2" 
                        >
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option 
                                    value="{{ $category->id }}"
                                    {{ request('category_id') == $category->id ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-between my-16 max-w-7xl mx-auto">
                    @foreach ($workshopEnLignes as $EnLigne)
                        <div class="lg:w-1/3 px-4">
                            <div
                                class="lg:w-96 border border-gray-400 border-spacing-1 rounded-2xl p-4 transform transition-transform mb-6 ">
                                @if($EnLigne->image)
                                <img src="{{ asset('storage/' . $EnLigne->image) }}"
                                     alt="{{ $EnLigne->name }}"
                                     class="w-full h-72 lg:h-80 object-cover rounded-full scale-75 hover:scale-100">
                            @else
                                <div class="bg-gray-200 w-full flex items-center justify-center">
                                    <span class="text-gray-500">No image available</span>
                                </div>
                            @endif
                            

                            {{-- {{ dd($EnLigne->getMedia('image')->first()->getUrl()) }} --}}

                                <p class="flex justify-end font-bold text-3xl text-black line-through">
                                    @if ($EnLigne->old_price != null)
                                  <span class="text-gray-500 font-medium text-xl">{{ $EnLigne->old_price }}$</span>  
                                  @endif
                                </p>
                                <div class="space-y-5">

                                    <div class="flex justify-between">
                                        <p class="font-bold text-black text-3xl hover:text-red-700 text-start w-44"><a
                                                href="{{ route('workshop-detail-enligne', $EnLigne->slug) }}">{{ $EnLigne->name }}</a>
                                        </p>
                                        <p class="font-bold text-red-700 text-3xl">{{ $EnLigne->price }}$</p>
                                    </div>

                                    <div class="flex justify-between mt-1">
                                        <p class="font-bold text-black text-sm">{{ $EnLigne->ingredient }}</p>
                                    </div>
                                </div>
                                <div class="mt-20">
                                    <livewire:add-product-to-cart :slug="$EnLigne->slug" class="bg-gray-client" />
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </div>

    <div class="relative">
        <img src="/assets/images/onion.png" class="absolute" alt="">

        <div class="mt-16">
            <x-footer />
        </div>

    </div>
@endsection