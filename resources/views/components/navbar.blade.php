<header x-data="{ navbarOpen: false }" class="header">
    <div class="w-full lg:max-w-7xl flex justify-between mx-auto">
        <div class="relative flex justify-between w-full">
            <div class="max-w-full w-full lg:w-1/4">
                <a href="/" class="block">
                    <img src="assets/img/logo_black.png" alt="logo" class="z-10 w-44 h-28" />
                </a>
            </div>
            <div class="flex items-center justify-between px-4" x-cloak>
                <div class="w-full">
                    <nav class="nav container">

                        <div class="nav__menu" id="nav-menu">
                            <ul class="nav__list">
                                <li>
                                    <a href="/" class="nav__link active-link">Home</a>
                                </li>

                                <li>
                                    <a href="{{ route('about') }}" class="nav__link">About Us</a>
                                </li>

                                {{-- <li>
                                    <a href="#popular" class="nav__link">Popular</a>
                                </li> --}}

                                <li>
                                    <a href="{{ route('workshop-enligne') }}" class="nav__link">Products</a>
                                </li>

                                {{-- <li>
                                    <a href="#contact" class="nav__link">Contact</a>
                                </li> --}}

                                <li class="lg:hidden">
                                    <livewire:nav-cart-manager />
                                </li>

                                <li class="lg:hidden">
                                    <a href="/client/login"
                                        class="nav__link">
                                        Sign In
                                    </a>
                                </li>

                                <li class="lg:hidden max-w-4xl">
                                    <a class="max-w-64 mx-auto h-12 rounded-md bg-primary hover:bg-red-700 flex items-center justify-center text-lg text-white font-bold"
                                        href="/client/register">Sign Up</a>
                                </li>

                                <li class="hidden lg:flex">
                                    <livewire:nav-cart-manager />
                                </li>

                                <li class="hidden lg:flex">
                                    <a href="/client/login" class="nav__link ">
                                        Sign In
                                    </a>
                                </li>
                                <li class="hidden lg:flex">
                                    <a class="hidden p-3 -top-3 rounded-md bg-primary hover:bg-red-700 lg:flex items-center justify-center text-lg text-white font-bold SignUp"
                                        href="/client/register">Sign Up</a>
                                </li>

                            </ul>

                            <!-- Close button -->
                            <div class="nav__close" id="nav-close">
                                <i class="ri-close-large-line"></i>
                            </div>
                        </div>

                        <!-- Toggle button -->
                        <div class="nav__toggle" id="nav-toggle">
                            <i class="ri-apps-2-fill"></i>
                        </div>
                    </nav>



                </div>


            </div>
        </div>
    </div>
</header>
