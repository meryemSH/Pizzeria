@extends('layouts.welcome')

@section('content')
    <div class="relative bg-no-repeat bg-gray-bg lg:pb-44 pb-20">
        <img src="/assets/images/AssetAbout.svg" class="absolute right-0 z-0">
        <img src="/assets/images/AssetAbout2.svg" class="absolute top-2/3 lg:top-1/4 left-0 z-0">
        <img src="/assets/images/AssetAbout3.svg" class="absolute top-1/4 w-1/4 lg:top-1/2 2xl:w-1/6 right-0 z-0">

        <div class="xl:p-12 mt-10">
            <div class="relative rounded-xl bg-no-repeat bg-cover mx-auto"
                style="background-image: url('assets/images/about1.avif');  width: 100%; background-position: right;">

                <x-navbar />
                <div class="my-10">
                    <h1 class=" text-5xl lg:text-8xl text-red-700 font-bold flex flex-col justify-center items-center">
                        About Us
                    </h1>
                    <p
                        class="max-w-4xl mx-auto flex flex-col justify-center items-center text-center text-black font-medium text-lg mt-9 pb-20 px-4 lg:px-0">
                        Welcome to pizza near me where passion for authentic Italian cuisine meets quality ingredients and a warm, inviting atmosphere. 
                        Our pizzeria is dedicated to serving you the freshest, most flavorful pizzas, crafted with care and love.
                        Whether you're craving a classic Margherita, a creative signature pie, or a customizable pizza with your favorite toppings,
                        we have something to satisfy every taste.
                    </p>
                </div>

                <div class="absolute -bottom-1 left-0 w-full flex justify-center">
                    <img src="/assets/images/aproposDesign.svg" class="w-full" alt="">
                </div>
            </div>
        </div>

        <div class="lg:p-6 lg:space-y-44">

            <div class=" lg:space-y-44">
                <div class="max-w-7xl px-4 lg:px-16 mx-auto">

                    <div class="lg:flex">

                        <div class="lg:w-1/2 h-1/4 flex justify-center mt-6 lg:mt-0 lg:hover:scale-125  rounded-full">
                            <div class="relative">
                                <img src="/assets/images/about1.png" class="w-full rounded-full z-40" alt="">
                                <div
                                    class="absolute inset-0 opacity-0 hover:opacity-25 rounded-full transition duration-300">
                                </div>
                            </div>
                        </div>


                        <div class="lg:w-1/2 flex flex-col lg:justify-start  gap-y-2 lg:gap-y-4  mt-5 lg:mt-0">
                            <p class=" text-3xl text-center lg:text-start lg:text-6xl font-bold text-primary">
                                Welcome to <br><span class="text-red-700">PIZZA</span> NEAR  <span class="text-red-700">ME</span>  
                            </p>
                            <div x-data="{ isOpen: false }">
                                <p class="lg:mt-5 text-md font-normal lg:font-medium text-center lg:text-justify">

                                    At PIZZA NEAR ME , we use only the finest ingredients, including locally sourced vegetables,
                                     premium meats, and house-made dough and sauces. Our wood-fired ovens bake each pizza to perfection, 
                                     creating that crispy, golden crust and mouth-watering aroma that will leave you coming back for more.

                                    We pride ourselves on offering a friendly dining experience for all, whether you're enjoying a meal with family, 
                                    friends, or ordering for a cozy night in. Come join us and experience the true taste of Italy, right here in <strong>Ronkonkoma, NY.</strong>

                                    {{-- <span x-show="isOpen" id="more-mobdie">
                                        En s'adaptant continuellement aux avancées technologiques et en écoutant les besoins
                                        des
                                        enfants, Mobdie
                                        continue d'inspirer et de motiver la prochaine génération de penseurs créatifs et de
                                        résolveurs de problèmes.
                                        L'histoire de Mobdie est celle d'une passion devenue mission : préparer les enfants
                                        à
                                        naviguer avec assurance dans le futur, équipés de la curiosité, de la créativité et
                                        de
                                        la
                                        confiance nécessaires pour façonner le monde de demain. Chaque atelier, chaque
                                        sourire
                                        d'enfant, chaque découverte écrit un nouveau chapitre prometteur pour l'avenir, et
                                        cette
                                        histoire ne fait que commencer.
                                    </span>
                                <div class="mb-5 z-50 text-center lg:text-start"> 
                                    <button @click="isOpen = !isOpen" id="mobdie-btn" x-show="!isOpen"
                                        class="text-purple focus:outline-none">Voir plus</button>
                                    <button @click="isOpen = !isOpen" id="hide-mobdie-btn" x-show="isOpen"
                                        class="text-purple focus:outline-none">Masquer</button>
                                </div> --}}
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="max-w-7xl px-4 lg:px-10  mx-auto">
                    <div class="flex flex-col-reverse lg:flex-row">

                        <div
                            class="lg:w-1/2 flex flex-col justify-start text-center gap-y-2 lg:gap-y-4 mt-6 lg:mt-0">
                            <p class=" text-3xl text-center lg:text-6xl font-bold text-primary">
                                Our <span class="text-red-700">Signature</span> Pizzas  
                            </p>
                            <p class="lg:mt-5 text-sm font-medium text-start z-0">
                                At PIZZA NEAR ME, we take pride in our signature pizzas, each crafted with care and the freshest ingredients. Our menu features a variety of specialty pizzas, from classic margherita to gourmet options like truffle mushroom and BBQ chicken. We believe in offering a diverse range of pizzas to cater to different preferences. Whether you're a fan of traditional toppings or looking to explore unique flavors, we have something for everyone. Come and experience the perfect blend of flavors and textures in every bite at PIZZA NEAR ME.
                                {{-- <span class="hidden" id="more-mission">
                                    Notre engagement va au-delà de l'enseignement formel ; nous cherchons à cultiver la
                                    confiance chez les enfants, les dotant des compétences nécessaires pour résoudre des
                                    problèmes, penser de manière critique et contribuer de manière significative à un monde
                                    en constante évolution. En somme, la mission de Mobdie est de façonner un avenir où
                                    chaque
                                    enfant est prêt à aborder les défis avec créativité et confiance, armé des connaissances
                                    et des compétences nécessaires pour prospérer dans un monde axé sur la technologie.
                                </span> --}}

                            {{-- <div class="mb-5">
                                <button id="mission-btn" class="text-purple focus:outline-none">Voir plus</button>
                                <button id="hide-mission-btn" class="hidden text-purple focus:outline-none">Masquer</button>
                            </div> --}}
                            </p>

                        </div>

                        <div class="lg:w-1/2 h-1/4 flex justify-end text-end items-end mt-6 lg:mt-0 lg:hover:scale-125 ">
                            <div class="relative">
                                <img src="/assets/images/about2.png" class="w-2/3 rounded-full z-40" alt="">
                               
                            </div>
                        </div>


                    </div>

                </div>

            </div>

        </div>


        {{-- <div class="relative bg-no-repeat bg-cover w-full bg-primary rounded-xl max-w-6xl mx-auto h-full lg:pb-36 mt-32"
            style="background-image: url('assets/images/apropsImage4.png'); ">

            <div>
                <div class="lg:p-16 p-8">

                    <div class="flex flex-col w-full">
                        <div class="my-10">
                            <div class="lg:h-80 flex flex-col justify-center items-center lg:mt-10">
                                <!-- Ajout de la classe 'bouncy' pour l'animation -->
                                <h1 class="text-5xl lg:text-9xl text-white font-bold" id="about-us">valeurs</h1>
                                <p
                                    class="max-w-4xl mx-auto text-justify text-white font-bold px-4 text-sm lg:text-xl lg:mt-10">

                                    <span class="hidden cursor-pointer lg:px-0 text-justify" id="more-text">
                                        1. Innovation : Chez Mobdie, l'innovation est au cœur de notre approche éducative.
                                        Nous croyons fermement en l'importance de rester à la pointe de l'éducation STEM en
                                        intégrant en permanence les dernières technologies et méthodologies.
                                        <br>
                                        <br>
                                        2. Qualité : Notre engagement envers la qualité est inébranlable. Nous nous
                                        consacrons à offrir des programmes éducatifs de la plus haute qualité, conçus et
                                        animés par des experts passionnés et expérimentés.
                                        <br>
                                        <br>
                                        3. Inclusivité : Mobdie s'engage pleinement à créer un environnement d'apprentissage
                                        inclusif et accueillant pour tous les enfants. Indépendamment de leur niveau de
                                        compétence ou de leurs antécédents, nous croyons en l'égalité des chances en matière
                                        d'éducation.
                                        <br>
                                        <br>
                                        4. Curiosité : La curiosité est le moteur de l'apprentissage chez Mobdie. Nous
                                        encourageons activement une culture de la curiosité et de l'exploration, incitant
                                        les enfants à poser des questions, à expérimenter et à découvrir par eux-mêmes.

                                    </span>

                                    <span id="toggle-btn" class="mt-4 focus:outline-none cursor-pointer">Voir plus</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div> --}}

    </div>

    </div>

    <div class="relative b">
        <img src="/assets/images/aproposDesign2.svg" class="w-full top-0.5" alt="">

        <img src="/assets/images/pizzatriangle.png" class="hidden lg:flex lg:absolute z-0 w-96 top-6 -left-16">
            <x-footer />

    </div>
    <script>
        const moreTextEl = document.getElementById('more-text');
        const toggleBtnEl = document.getElementById('toggle-btn');
        const aboutUsEl = document.getElementById('about-us'); // Sélection du titre "About Us"

        toggleBtnEl.addEventListener('click', () => {
            moreTextEl.classList.toggle('hidden');
            toggleBtnEl.classList.toggle('hidden');
            aboutUsEl.classList.add('bounce'); // Ajout de la classe 'bouncy' pour l'animation
            setTimeout(() => {
                moreTextEl.classList.remove('hidden');
            }, 1000);


        });

        moreTextEl.addEventListener('click', () => {
            moreTextEl.classList.add('hidden');
            toggleBtnEl.classList.remove('hidden');
            aboutUsEl.classList.add('bouncy'); // Ajout de la classe 'bouncy' pour l'animation
            setTimeout(() => {
                aboutUsEl.classList.remove('bouncy'); // Retrait de la classe 'bouncy' après 0.5s
            }, 500);
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const moreTextEl = document.getElementById('more-mission');
            const toggleBtnEl = document.getElementById('mission-btn');
            const hideBtnEl = document.getElementById('hide-mission-btn');

            toggleBtnEl.addEventListener('click', function() {
                moreTextEl.classList.toggle('hidden');
                toggleBtnEl.classList.toggle('hidden');
                hideBtnEl.classList.toggle('hidden');
            });

            hideBtnEl.addEventListener('click', function() {
                moreTextEl.classList.toggle('hidden');
                toggleBtnEl.classList.toggle('hidden');
                hideBtnEl.classList.toggle('hidden');
            });
        });
    </script>
@endsection
