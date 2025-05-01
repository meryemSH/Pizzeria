@extends('layouts.welcome')

@section("content")
    <div class="relative bg-primary py-8">
        <img src="/assets/images/signLeft.svg" alt="" class="absolute left-0 top-0 z-0">
        <img src="/assets/images/signLeftBottom.svg" alt="" class="absolute left-0 top-1/4 z-0">
        <img src="/assets/images/signCircle.svg" alt="" class="absolute left-[15%] top-1/4 lg:top-0 w-1/3 lg:w-1/4 z-0">
        <img src="/assets/images/signTriangle.svg" alt=""
             class="hidden lg:flex absolute left-[20%] lg:w-1/4 top-1/2 z-0">
        <img src="/assets/images/signCa.svg" alt=""
             class="absolute left-1/2 lg:left-2/3 w-1/2 lg:w-1/4 top-1/3 lg:top-1/4 z-0">
        <img src="/assets/images/signButtom.svg" alt="" class="absolute lg:left-1/2  bottom-0 z-0">
        <img src="/assets/images/signRight.svg" alt="" class="absolute right-0 top-0 z-0">

        <div
            class="mb-24 max-w-64 flex justify-center items-center mx-auto bg-white/50 border border-white shadow-md rounded-lg p-4">
            <img src="assets/img/logo_black.png" alt="logo" class="z-10 w-40 h-12"/>
        </div>

        <div class="flex flex-col items-center justify-center h-full p-4 lg:px-4 my-24 lg:mt-0">
            <div class="flex items-center justify-center w-56 py-6 gap-x-2 bg-white rounded-lg shadow-lg z-0">
                <div class="text-primary font-bold text-2xl lg:text-3xl">Sign</div>
                <div class="text-purple font-bold text-2xl lg:text-3xl">Up</div>
            </div>
            <div class="max-w-4xl mx-auto space-y-8 bg-white/50 -mt-4 bg-opacity-48 border border-white shadow-md
                        rounded-lg p-8 z-50 backdrop-blur">

                <livewire:client-register/>

            </div>
        </div>
    </div>
@endsection
