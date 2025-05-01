@extends('layouts.welcome')

@section('content')
    <div class="relative bg-no-repeat bg-gray-bg lg:pb-40 pb-20">
        <img src="/assets/images/right25.svg" class=" absolute top-1/4 right-0" alt="">
        <img src="/assets/images/left50.svg" class=" absolute top-1/3 mt-8" alt="">
        <img src="/assets/images/topLeft.svg" class=" absolute top-0 right-0" alt="">


        <div class="p-3 lg:p-6 relative">
            <div class="relative bg-purple-About rounded-xl bg-no-repeat bg-cover"
                style="background-image: url('assets/images/apropsImage1.png');  width: 100%; background-position: right; ">
                <x-about-navbar />
                <div class="my-10 pb-32">

                    <h1 class=" text-5xl lg:text-8xl text-white font-bold flex flex-col justify-center items-center">
                        Nos ateliers
                    </h1>
                    <h1 class=" text-6xl lg:text-9xl text-white font-bold flex flex-col justify-center items-center">
                        présentiel
                    </h1>

                </div>

                <div class="absolute -bottom-1 left-0 w-full flex justify-center">
                    <img src="/assets/images/aproposDesign.svg" class="w-full" alt="">
                </div>
            </div>
        </div>


        <div class="relative lg:p-6 py-16 lg:py-20 text-center">
            <h1 class=" text-purple-dark font-bold text-4xl lg:text-7xl">Découvrir</h1>
            <h1 class=" text-primary font-bold text-5xl lg:text-8xl">Nos ateliers</h1>

            <p class="mt-5 max-w-4xl mx-auto text-base font-medium text-black text-center px-4 lg:px-0">
                Voyagez dans le monde des ateliers Mobdie : des opportunités d'apprentissage qui stimulent la créativité de
                vos enfants. Nos horaires flexibles et nos groupes à taille humaine sont conçus pour favoriser une
                concentration optimale et un apprentissage enrichissant
            </p>


            <div class="grid grid-cols-1 lg:grid-cols-3 justify-between my-16">
                @foreach ($workshopOffline as $Offline)
                    <div class="lg:w-1/3 px-4">
                        <div
                            class="lg:w-96 px-4 bg-[#ffffff7a] bg-opacity-48 border border-white shadow-md rounded-lg p-4 transform transition-transform scale-100 mb-6">
                            <img src="{{ $Offline->getFirstMediaUrl('images') }}" alt=""
                                class="w-full h-48 rounded-md">

                            <p class="flex justify-end font-bold text-2xl text-black line-through">
                                {{ $Offline->old_price }}</p>
                            <div class="flex justify-between">
                                <p class="font-bold text-black text-3xl">{{ $Offline->name }}</p>
                                <p class="font-bold text-purple text-3xl">{{ $Offline->price }}</p>

                            </div>
                            <p class="flex justify-end font-bold text-base text-black"> MAD / {{ $Offline->duree }}</p>

                            <div class="flex justify-between mt-9">
                                <p class="font-bold text-black opacity-50 text-2xl">Age</p>
                                <p class="font-bold text-black opacity-50 text-2xl">Effectif</p>
                            </div>

                            <div class="flex justify-between mt-1">
                                <p class="font-bold text-black text-2xl">{{ $Offline->age }}</p>
                                <p class="font-bold text-black text-2xl">{{ $Offline->effectif }} enfants</p>
                            </div>
                            <div class="flex justify-between my-6 gap-8">

                                <a class="w-full h-14 shadow-lg rounded-md bg-purple hover:bg-primary flex items-center justify-center text-lg text-white border-2 border-white font-bold"
                                    href="{{ route('workshop-detail-offline', $Offline->slug) }}">
                                    voir plus
                                </a>

                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </div>

    <div class="relative bg-primary">
        <img src="/assets/images/footer.svg" class=" absolute" alt="">
        <div class="absolutew-full flex justify-center">
            <img src="/assets/images/aproposDesign2.svg" class="w-full" alt="">
        </div>

        <div class="mt-12">
            <x-footer />
        </div>

    </div>
@endsection
