@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="bg-[hsl(24,86%,88%)]  h-screen bg-cover main">

    
    <a href="/"
       class=" mb-24 max-w-64 flex justify-center items-center mx-auto bg-white/50 border border-white shadow-md rounded-lg p-2">
        <img src="/assets/img/logo_black.png" alt="logo" class="z-10 w-40 h-20"/>
    </a>

    <div class="flex flex-col items-center justify-center p-4 lg:px-4 my-24 lg:mt-0">
        <div class="flex items-center justify-center w-56 py-6 gap-x-2 bg-white rounded-lg shadow-lg z-0">
            <div class="text-primary font-bold text-2xl lg:text-3xl">sign</div>
            <div class="text-red-700 font-bold text-2xl lg:text-3xl">in</div>
        </div>
        <div class="max-w-6xl mx-auto space-y-8 bg-white/50 -mt-4 bg-opacity-48 border border-white shadow-md
                        rounded-lg p-8 z-50 backdrop-blur">

            <livewire:client-login/>

        </div>
    </div>
</div>
