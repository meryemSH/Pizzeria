@extends('layouts.welcome')

@section('content')
    <div class="relative bg-no-repeat bg-cover bg-primary">

        <div class="max-w-7xl mx-auto p-3 lg:p-6">
            <div class="relative bg-gray-bg rounded-xl bg-no-repeat bg-cover"
                style="background-image: url('assets/images/apropsImage1.png');  width: 100%; background-position: right;">

                <x-navbar/>
                <div class="my-10">
                    <h1
                    class="text-5xl lg:text-8xl text-purple-dark font-bold flex flex-col justify-center items-center z-40">
                    FAQ
                </h1>
                <p
                    class="max-w-4xl mx-auto flex flex-col justify-center items-center text-center text-purple-dark font-medium text-lg mt-9 pb-20 px-4 lg:px-0 z-40">
                    Explorez notre section Foire Aux Questions (FAQ) pour obtenir des réponses rapides et
                    détaillées sur tout ce que vous souhaitez savoir sur Mobdie
                </p>
                </div>

                <div class="absolute -bottom-1 left-0 w-full flex justify-center">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto p-3 lg:p-6 relative">
            <div class="flex lg:space-x-4">

                <div class="w-full my-1 grid grid-cols-1 lg:grid-cols-2 items-start gap-10">
                    @foreach($faqs as $faq)
                        <x-faq-item :$faq />
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-28">
            <x-footer />
        </div>

    </div>
@endsection
