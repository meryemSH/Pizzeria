@extends('layouts.welcome')

@section('content')
    <div class="relative bg-no-repeat bg-gray-bg">
        <img src="/assets/images/topLeft.svg" class=" absolute top-0 right-0 max-w-7xl mx-auto" alt="">
        <img src="/assets/images/left50.svg" class=" absolute -left-0  max-w-7xl mx-auto" alt="">
        <img src="/assets/images/right25.svg" class=" absolute right-0 top-1/2 max-w-7xl mx-auto" alt="">

        <div class="p-3 lg:p-6 relative">
            <div class="relative bg-purple-About opacity-80 rounded-xl bg-no-repeat bg-cover max-w-7xl mx-auto">
                <x-about-navbar />

            </div>
        </div>

        <div class="max-w-7xl mx-auto">
            <!-- This is an example component -->
            <div class="px-4 lg:px-10 py-8 gap-y-10">

                <div class="flex lg:flex-row flex-col space-x-4">

                    <div class="relative lg:w-1/2 w-full flex justify-between space-y-16 lg:space-y-0">
                        <div class="flex flex-col min-w-full" x-data="slider">
                            <div
                                class="bg-white bg-opacity-50  h-92 w-11/12 backdrop-blur-8 rounded-lg shadow-lg p-4 lg:p-6">
                                <div class="rounded-lg">
                                    <img x-ref="image_preview" src="{{ $workshopOffline->getFirstMediaUrl('images') }}"
                                        class="h-72 w-full object-cover max-w-full rounded-xl">
                                </div>
                            </div>

                            <div class="flex mt-5 gap-x-5 w-11/12">

                                @foreach ($workshopOffline->getMedia('images') as $image)
                                    <div class="w-1/3">
                                        <div
                                            class="bg-white bg-opacity-50 w-full h-24 backdrop-blur-8 p-2 lg:p-4 rounded-lg shadow-lg">
                                            <div class="rounded-lg">
                                                <img :class="{ 'border-purple': activeImage === $el }"
                                                    @click="switchImage($el)" src="{{ $image->getUrl() }}"
                                                    class="h-16 w-full rounded">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>

                    <div class="lg:w-1/2 flex flex-col justify-end lg:text-start mt-5 lg:mt-0">
                        <p class="text-4xl md:text-6xl font-bold text-primary">{{ $workshopOffline->name }}</p>
                        <p class="lg:w-5/6  my-2 text-2xl font-medium text-justify">
                            {{ $workshopOffline->description }}
                        </p>

                        <div class="flex w-2/3 mt-1 z-0">
                            <div class="w-1/2 flex flex-col space-y-2">
                                <p class="font-bold text-gray-product opacity-50 text-2xl">Age</p>
                                <p class="font-bold text-black text-2xl">{{ $workshopOffline->age }}</p>
                                <p class="font-bold text-gray-product opacity-50 text-2xl">Effectif</p>
                                <p class="font-bold text-black text-2xl">{{ $workshopOffline->effectif }} enfants</p>

                                <p class="font-bold text-gray-product opacity-50 text-2xl">Horaire</p>
                                <p class="font-bold text-black text-2xl">{{ $workshopOffline->timetables }}</p>

                            </div>

                            <div class="w-1/2 flex flex-col space-y-4">
                                <p class="font-bold text-purple-dark text-6xl lg:text-8xl">{{ $workshopOffline->price }}</p>
                                <p class=" font-bold text-black text-2xl lg:text-2xl ms-3">MAD/{{ $workshopOffline->duree }}
                                </p>
                                <p class="font-bold text-gray-product opacity-50 text-2xl">Professeur</p>
                                <p class="font-bold text-black text-2xl">{{ $workshopOffline->teacher }}</p>
                            </div>
                        </div>

                        <div class="flex my-3 gap-8">

                            <div class="w-full lg:w-3/4 flex flex-col lg:flex-row my-6 lg:gap-8 z-0">

                                <a class="w-full h-14 shadow-lg rounded-md bg-purple-dark hover:bg-primary flex items-center justify-center text-lg text-white border-2 border-white font-bold mt-4 lg:mt-0"
                                    href="#">
                                    contacter nous
                                </a>

                            </div>

                        </div>
                    </div>

                </div>

                <div class="flex flex-col lg:flex-row justify-between my-16 gap-4">
                    @foreach ($workshopOfflines as $Offline)
                        <div class="lg:w-1/3">
                            <div
                                class="lg:w-96 px-4 bg-[#ffffff7a] bg-opacity-48 border border-white shadow-md rounded-lg p-4 transform transition-transform scale-100 mb-6">
                                <img src="{{ $Offline->getFirstMediaUrl('images') }}" alt="" class="w-full h-48 rounded-md">

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


    </div>

    <div class="relative bg-primary">
        <img src="/assets/images/footer.svg" class=" absolute max-w-7xl mx-auto" alt="">
        <div class="absolutew-full flex justify-center">
            <img src="/assets/images/aproposDesign2.svg" class="w-full" alt="">
        </div>
        <div class="max-w-7xl px-4 lg:px-16 mx-auto space-y-16">
            <div class="space-y-10">
                <div class="flex justify-center gap-4">
                    <h1 class=" text-white font-bold  text-4xl lg:text-8xl text-center lg:text-start">Contactez
                    </h1>
                    <h1 class=" stroke text-white font-bold  text-4xl lg:text-8xl text-center lg:text-start">nous
                    </h1>
                </div>

            </div>
            <div
                class="max-w-4xl mx-auto space-y-16 bg-[#ffffff7a] bg-opacity-48 border border-white shadow-md rounded-lg p-4 transform transition-transform scale-100">
                @livewire('contact-form')
            </div>

        </div>
        <div class="mt-16">
            <x-footer />
        </div>

    </div>


    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slider', () => ({
                activeImage: null,
                switchImage(el) {
                    this.$refs.image_preview.src = el.src;
                    this.activeImage = el;
                }
            }))
        })
    </script>
@endsection
