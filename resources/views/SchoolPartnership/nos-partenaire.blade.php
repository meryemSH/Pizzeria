@extends('layouts.welcome')

@section('content')
    <div class="relative bg-no-repeat bg-gray-bg lg:pb-40 pb-20">
        <img src="/assets/images/imageblogpurple1.svg" class="absolute w-1/4 left-0 mt-6" alt="">
        <img src="/assets/images/imageblogpurple2.svg" class="absolute right-0 mt-6" alt="">
        <img src="/assets/images/imageblogOrange1.svg" class="absolute left-0 top-1/2 w-1/3" alt="">
        <x-navbar />

        <div class="relative lg:p-6 py-14 lg:py-16 text-center max-w-7xl mx-auto space-y-24">
            <div class="flex justify-center ">
                <p class=" text-4xl lg:text-7xl text-center lg:text-start font-bold text-purple-dark hover:text-primary">Nos
                    &#xa0;</p>
                <p class=" text-4xl lg:text-7xl text-center lg:text-start font-bold text-primary">
                    Partenaires
                </p>
            </div>

                @foreach ($partenaires as $partenaire)
                    <x-nos-partenaire-page :partenaire="$partenaire" @class(["lg:flex-row-reverse" => $loop->iteration % 2 === 0]) />
                @endforeach

            <div class="my-16 px-4">
                <p class="font-medium text-black text-xl text-justify">
                    Les activités extrascolaires sont essentielles pour aider les enfants à se développer
                    intellectuellement, socialement et physiquement. De nombreux établissements recherchent des partenariats
                    de qualité pour enrichir leur programme éducatif,et c'est là que Mobdie intervient.obdie renforce son
                    impact éducatif en établiy
                    Avec fierté, Mobdie renforce son impact éducatif en établissant des partenariats avec des centres et des
                    écoles privées. Nous offrons des cours de robotique de qualité, une activité captivante et innovante,
                    directement sur leurs sites à Fès. Notre équipe qualifiée, notre matériel de pointe, et notre programme
                    exclusif sont mis à la disposition des élèves pour enrichir leur expérience parascolaire,plaçant ainsi
                    la robotique au cœur de leur apprentissage.
                </p>
            </div>

            <div class="relative bg-no-repeat bg-cover w-full bg-purple-dark rounded-xl max-w-4xl mx-auto mt-72  space-y-24">
                <div
                    class="absolute flex items-center justify-center w-3/5 lg:w-1/2 lg:h-24 h-16 text-white font-bold text-lg lg:text-4xl -top-[5%] lg:-top-[15%] left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-transparent-orange via-primary to-transparent-orange rounded-lg shadow-lg backdrop-blur border-opacity-100">
                    Devenir partenaire
                </div>
                <img src="/assets/images/triangle.svg" alt="" class="absolute -left-10 w-32 mt-8 z-0">
                <img src="/assets/images/Asset 14.svg" alt=""
                    class="absolute -right-0 -top-[5%] lg:-right-[8%] w-1/3 lg:w-44 mt-8 z-0 ">

                @livewire('PartnerForm')
                <img src="/assets/images/Asset 16.svg" alt=""
                    class="absolute -bottom-[5%] lg:-bottom-[17%] w-1/4 lg:w-44 lg:left-1/4 z-0 ">
            </div>

        </div>

    </div>

    <div class="relative bg-primary">
        <img src="/assets/images/footer.svg" class="absolute" alt="">
        <div class="absolutew-full flex justify-center">
            <img src="/assets/images/aproposDesign2.svg" class="w-full" alt="">
        </div>

        <div class="mt-12">
            <x-footer />
        </div>

    </div>
@endsection
