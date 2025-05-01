    <header x-data="{ navbarOpen: false }" class="flex bg-none rounded-xl max-w-7xl mx-auto">
        <div class="w-full lg:max-w-7xl flex justify-between">
            <div class="relative flex justify-between w-full py-4">
                <div class="max-w-full px-4 w-full lg:w-1/4">
                    <a href="/" class="block w-full py-5">
                        <img src="/assets/images/logoAbout.svg" alt="logo" class="z-10 w-40 h-12" />
                    </a>
                </div>
                <div class="flex items-center justify-between px-4">
                    <div class='w-full'>
                        <button @click="navbarOpen = !navbarOpen" x-cloak
                            :class="['absolute', 'right-4', 'top-1/2', 'block', '-translate-y-1/2', 'rounded-lg', 'px-3',
                                'py-my-1', 'ring-primary', 'focus:ring-2', 'lg:hidden', 'z-30', navbarOpen ?
                                'navbarTogglerActive' : ''
                            ]"
                            id="navbarToggler">
                            <span class="relative my-1 block h-1 w-7 bg-gray-client transform transition-all"></span>
                            <span class="relative my-1 block h-1 w-7 bg-gray-client transform transition-all"></span>
                            <span class="relative my-1 block h-1 w-7 bg-gray-client transform transition-all"></span>
                        </button>

                        <nav :class="!navbarOpen && 'hidden'" id="navbarCollapse"
                            class="absolute right-4 top-3/4 w-full max-w-64 rounded-lg bg-gray-home z-10 lg:bg-transparent py-5 px-6 shadow lg:static lg:block lg:w-full lg:max-w-full lg:shadow-none">
                            <ul class="block lg:flex gap-5">
                                <li class="z-10 flex flex-col lg:flex-row items-center lg:items-start">
                                    <a href="/"
                                        class="flex whitespace-nowrap py-2 text-lg font-semibold text-grey lg:text-gray-bg hover:text-primary lg:inline-flex">
                                        Accueil
                                    </a>
                                </li>
                                <li class="z-10 flex flex-col lg:flex-row items-center lg:items-start">
                                    <a href="{{ route('about') }}"
                                        class="flex whitespace-nowrap py-2 text-lg font-semibold text-grey lg:text-gray-bg hover:text-primary lg:inline-flex">
                                        À Propos
                                    </a>
                                </li>

                                <li class="z-20">
                                    <div x-data="{ open: false }" x-cloak class="relative inline-block text-left">
                                        <button @click="open = !open" class="flex justify-center w-full px-4 py-2 text-lg font-semibold text-grey lg:text-gray-bg hover:text-primary lg:inline-flex"> Atelier
                                            <svg class="h-5 mt-1.5 w-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                          </svg>
                                        </button>
                                        <div x-show="open" @click.away="open = false" class="origin-top-left absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 px-2 py-2">
                                          <a href="{{ route('workshop-enligne') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Atelier en ligne</a>
                                          <a href="{{ route('workshop-horsligne') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">Atelier offline</a>
                                        </div>
                                      </div>
                                </li>

                                <li class="z-10 flex flex-col lg:flex-row items-center lg:items-start">
                                    <a href="{{ route('nos-partenaire') }}"
                                        class="flex whitespace-nowrap py-2 text-lg font-semibold text-grey lg:text-gray-bg hover:text-primary lg:inline-flex">
                                        Offre parascolaire
                                    </a>
                                </li>

                                <li class="z-10 flex flex-col lg:flex-row items-center lg:items-start">
                                    <a href="{{ route('blog') }}"
                                        class="flex whitespace-nowrap py-2 text-lg font-semibold text-grey lg:text-gray-bg hover:text-primary lg:inline-flex">
                                        Blog
                                    </a>
                                </li>

                                <li class="lg:hidden flex flex-col w-full items-center">
                                    <livewire:nav-cart-manager>

                                        <x-slot:icon>
                                            <svg class="w-12 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
                                        </x-slot:icon>

                                    </livewire:nav-cart-manager>

                                    <a href="/client/login/" class="py-3 text-lg font-semibold px-4 text-grey lg:text-gray-bg hover:text-primary">
                                        Connecter
                                    </a>
                                    <a class="w-full h-12 rounded-md bg-primary hover:bg-blue-600 flex items-center justify-center text-lg text-white font-bold"
                                        href="/client/register">S'inscrire
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="justify-end hidden pr-16 lg:flex lg:pr-0">
                        <livewire:nav-cart-manager />
                        <a href="/client/login" class="py-3 text-lg font-semibold px-4 text-grey lg:text-gray-bg hover:text-primary">
                            Connecter
                        </a>
                        <a class="hidden w-32 h-12 rounded-md bg-primary hover:bg-blue-600 lg:flex items-center justify-center text-lg text-white font-bold z-30 relative after:-z-20 after:absolute after:h-1 after:w-1 after:bg-purple overflow-hidden after:-left-1 after:translate-y-full after:rounded-md after:hover:scale-[300] after:hover:transition-all after:hover:duration-1000 after:transition-all after:duration-1000 transition-all duration-1000"
                        href="/client/register">S'inscrire</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
