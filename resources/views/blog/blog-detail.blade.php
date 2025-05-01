@extends('layouts.welcome')

@section('content')
    <div class="relative bg-no-repeat bg-gray-bg lg:pb-40 pb-20">
        <img src="/assets/images/imageblogpurple1.svg" class="absolute w-1/4 left-0 mt-6" alt="">
        <img src="/assets/images/imageblogpurple2.svg" class="absolute right-0 mt-6" alt="">

        <x-navbar />
        <div class="p-3 lg:p-6 relative max-w-7xl mx-auto">
            <div class="relative flex flex-col items-center h-96 justify-center rounded-md mx-auto my-16 max-w-6xl gap-6 bg-cover"
                style="background-image: url({{ Storage::url($blog->image) }})">
                <div
                    class="absolute inset-0 bg-gradient-to-tr from-primary via-transparent to-transparent rounded-md  max-w-3xl">
                </div>
                <div class="relative z-10 flex flex-col items-end h-96 py-4 justify-end gap-4 w-full">
                    <h3 class="w-full text-4xl lg:text-7xl font-bold text-white">
                        {{ $blog->title }}
                    </h3>

                </div>
            </div>
        </div>


        <div class="relative lg:p-6 py-7 lg:py-10 text-center max-w-7xl mx-auto">

            <div class="flex flex-col space-y-16 px-4">
                <div class="w-full">

                    <div class="flex justify-start items-center ">
                        <p class="font-bold text-black text-3xl lg:text-5xl">{{ $blog->title }}</p>
                    </div>

                    <div class="flex mt-5">
                        <div class="font-medium text-justify text-black text-sm ">
                            {!! $blog->content !!}
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="relative lg:p-6 py-12 lg:py-14 text-center max-w-7xl mx-auto">

            <div class="flex flex-col lg:flex-row my-16 lg:space-x-4 px-4">

                @foreach ($blogs as $blog)
                    <x-blog-card :blog="$blog" />
                @endforeach
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
