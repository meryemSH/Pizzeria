@extends('layouts.welcome')

@section('content')
    <div class="relative bg-no-repeat bg-gray-bg lg:pb-40 pb-20">
        <img src="/assets/images/imageblogpurple1.svg" class="absolute w-1/4 left-0 mt-6" alt="">
        <img src="/assets/images/imageblogpurple2.svg" class="absolute right-0 mt-6" alt="">
        <x-navbar />

        @if ($blogs->count() > 0)
            @if ($featured)
                <div class="p-3 lg:p-6 relative max-w-7xl mx-auto">
                    <div class="relative flex flex-col items-center h-96 justify-center rounded-md mx-auto my-16 max-w-6xl gap-6 bg-cover"
                        style="background-image: url({{ Storage::url($featured->image) }})">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-primary via-transparent to-transparent rounded-md  max-w-3xl">
                        </div>
                        <div class="relative h-96 z-10 flex flex-col justify-center lg:justify-end gap-4 px-4 py-4">
                            <h3 class="w-full text-2xl md:text-4xl font-bold text-white">
                                {{ $featured->title }}
                            </h3>
                            <p class="flex flex-col lg:flex-row  items-center lg:justify-between lg:items-end">
                                <span class="lg:w-1/2  text-sm font-medium text-white">
                                    {{ $featured->description }}
                                </span>
                                <span class="lg:w-1/2 flex justify-end">

                                    <a class="w-44 h-9 shadow-lg rounded-md bg-primary hover:bg-primary flex items-center justify-center text-xs text-white font-bold"
                                        href="{{ route('blog-detail', $featured->slug) }}">
                                        voir plus
                                    </a>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>
            @else
                @php
                    $latestBlog = $blogs->last();
                @endphp
                <div class="p-3 lg:p-6 relative max-w-7xl mx-auto">
                    <div class="relative flex flex-col items-center h-96 justify-center rounded-md mx-auto my-16 max-w-6xl gap-6 bg-cover"
                        style="background-image: url({{ Storage::url($latestBlog->image) }})">
                        <div
                            class="absolute inset-0 bg-gradient-to-tr from-primary via-transparent to-transparent rounded-md  max-w-3xl">
                        </div>
                        <div class="relative h-96 z-10 flex flex-col justify-center lg:justify-end gap-4 px-4 py-4">
                            <h3 class="w-full text-2xl md:text-4xl font-bold text-white">
                                {{ $latestBlog->title }}
                            </h3>
                            <p class="flex flex-col lg:flex-row  items-center lg:justify-between lg:items-end">
                                <span class="lg:w-1/2  text-sm font-medium text-white">
                                    {{ $latestBlog->description }}
                                </span>
                                <span class="lg:w-1/2 flex justify-end">

                                    <a class="w-44 h-9 shadow-lg rounded-md bg-primary hover:bg-primary flex items-center justify-center text-xs text-white font-bold"
                                        href="{{ route('blog-detail', $latestBlog->slug) }}">
                                        voir plus
                                    </a>
                                </span>
                            </p>

                        </div>
                    </div>
                </div>
            @endif

            <div class="relative lg:p-6 py-14 lg:py-16 text-center max-w-7xl mx-auto">
                <h1 class="stroke text-purple-dark font-bold text-4xl lg:text-7xl">Nos Articles</h1>
                <livewire:filter-blogs-by-category />
            </div>
        @else
            <div class="relative lg:p-6 py-14 lg:py-16 text-center max-w-7xl mx-auto">
                <h1 class="stroke text-purple-dark font-bold text-4xl lg:text-7xl">Aucun Post</h1>
            </div>
        @endif


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
