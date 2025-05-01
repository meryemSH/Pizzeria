@extends('layouts.welcome')

<div class="relative bg-primary py-7">
    <img src="/assets/images/signLeft.svg" alt="" class="absolute left-0 top-0 z-0">
    <img src="/assets/images/signLeftBottom.svg" alt="" class="absolute left-0 top-1/4 z-0">
    <img src="/assets/images/signCircle.svg" alt="" class="absolute left-[15%] top-1/4 lg:top-0 w-1/3 lg:w-1/4 z-0">
    <img src="/assets/images/signTriangle.svg" alt="" class="hidden lg:flex absolute left-[20%] lg:w-1/4 top-1/2 z-0">
    <img src="/assets/images/signCa.svg" alt="" class="absolute left-1/2 lg:left-2/3 w-1/2 lg:w-1/4 top-1/3 lg:top-1/4 z-0">
    <img src="/assets/images/signButtom.svg" alt="" class="absolute lg:left-1/2  bottom-0 z-0">
    <img src="/assets/images/signRight.svg" alt="" class="absolute right-0 top-0 z-0">

    <div
        class="max-w-64 flex justify-center items-center mx-auto bg-[#ffffff7a] bg-opacity-48 border border-white shadow-md rounded-lg p-4 transform transition-transform scale-100 ">
        <img src="assets/img/logo_black.png" alt="logo" class="z-10 w-40 h-12" />
    </div>

    <div class="lg:flex items-center justify-center w-full h-screen p-4  pb-2 lg:px-0 mt-44 lg:mt-0">
        <div
            class="relative max-w-4xl mx-auto space-y-8 bg-[#ffffff7a] bg-opacity-48 border border-white shadow-md rounded-lg p-4 transform transition-transform scale-100 z-10">
            <div
                class="absolute flex items-center justify-center w-3/5 lg:w-2/5 lg:h-20 h-16 -top-[12%] lg:-top-[15%] left-1/2 transform -translate-x-1/2 bg-white rounded-lg shadow-lg backdrop-blur border-opacity-100 z-0">
                <div class="flex gap-x-2">
                    <div class="text-primary font-bold text-2xl lg:text-3xl">Sign</div>
                    <div class="text-purple font-bold text-2xl lg:text-3xl">In</div>
                </div>
            </div>

            <div class="lg:p-4">
                <form>
                    @csrf
                    <div class="flex flex-col w-full lg:gap-4">

                        <div class="flex flex-col">
                            <div class=" lg:w-1/2 my-4">
                                <input type="email" placeholder="Email"
                                    class="block  w-full h-14 lg:w-96 lg:h-14 p-4 text-black border border-white focus:border-white  rounded-lg text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-xl">
                                @error('email')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="lg:w-1/2 my-4">
                                <input type="password" placeholder="password"
                                    class="block w-full h-14 lg:w-96 lg:h-14 p-4 text-black border border-white focus:border-white rounded-lg text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-xl">
                                @error('password')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class=" w-full h-20 lg:h-16">
                            <button type="submit"
                                class="w-full h-12 flex justify-center items-center border-2 border-solid p-4 border-white bg-purple hover:bg-primary text-white py-7 text-lg lg:text-xl text-center align-middle font-semibold rounded-lg">
                                Sign In
                            </button>
                            <a href="{{route('signUp')}}" class="text-white font-medium text-base text-center flex justify-center items-center my-3">Sign Up </a>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
