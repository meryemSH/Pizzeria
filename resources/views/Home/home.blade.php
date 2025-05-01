@extends('layouts.welcome')

@section('content')
   <div class="relative bg-no-repeat bg-cover main">
      <div class="bg-no-repeat rounded-xl z-30 mx-auto">
        <x-navbar />
        <div>
          <section class="home section my-3" id="home">
            <div class="home__container container grid">
               <div class="home__data">
                 <h1 class="home__title">Crispy And <br> Delicious Pizzas</h1>

                 <p class="home__description">
                   Order the best pizzas to end your hunger
                   and make your family moments more
                   memorable, place your order now.
                 </p>

                 <a href="{{ route('workshop-enligne') }}" class="button">Order Pizza Now</a>

                 <img src="assets/img/sticker-pizza.svg" alt="image" class="home__sticker-1">
                 <img src="assets/img/sticker-leaf.svg" alt="image" class="home__sticker-2">
               </div>

               <div class="home__images">
                 <img src="assets/img/home-pizza.png" alt="image" class="home__pizza">
                 <img src="assets/img/home-board.png" alt="image" class="home__board">

                 <img src="assets/img/home-leaf-1.png" alt="image" class="home__ingredient home__leaf-1">
                 <img src="assets/img/home-leaf-2.png" alt="image" class="home__ingredient home__leaf-2">
                 <img src="assets/img/home-pepperoni.png" alt="image" class="home__ingredient home__pepperoni">
                 <img src="assets/img/home-mushroom.png" alt="image" class="home__ingredient home__mushroom">
                 <img src="assets/img/home-olive.png" alt="image" class="home__ingredient home__olive">
                 <img src="assets/img/home-tomato.png" alt="image" class="home__ingredient home__tomato">
               </div>
            </div>
          </section>

          <section class="about section" id="about">
            <div class="about__container container grid">
               <div class="about__data">
                 <h2 class="section__title">Learn More About Us</h2>

                 <p class="about__description">
                   PIZZA NEAR ME is a new and visually appealing pizzeria located in Ronkonkoma, NY.
                   Our pizzeria focuses on using fresh ingredients and quality recipes,
                   allowing customers to select how they want their pizza cooked (
                   lightly, regular, or crispy).
                   We take pride in offering the best hours of operation,
                   open until 2am every day. Our target audience includes service industry workers, college kids, high
                   school kids, and individuals in their 20s and 30s. At PIZZA NEAR ME, we prioritize online ordering
                   and delivery, and we highlight specialty items such as rainbow cookies and cold cheese pizza.
                   Additionally, we have implemented a rewards program to show appreciation to our loyal customers.
                   Our brand identity is represented by the theme colors of red, black, white, and beige/deep
                   yellow/cheese color.
                 </p>

                 <a href="#popular" class="button">The Best Pizzas</a>

                 <img src="assets/img/sticker-cheese.svg" alt="image" class="about__sticker">
               </div>

               <img src="assets/img/about-img.png" alt="image" class="about__img">
            </div>
          </section>
        </div>
      </div>

      <div class="relative z-40" id="popular">
 
        <section class="popular section" id="popular">
          <div class="popular__container container grid">
            <div class="popular__data">
               <h2 class="section__title">Discover <br> Popular Orders</h2>

               <p class="popular__description">
                 Select the best prepared and delicious flavors.
                 We have collected some popular recipes from around
                 the world for you to choose your favorite.
               </p>
            </div>

            <div class="popular__swiper swiper">
               <img src="assets/img/popular-dish.png" alt="image" class="popular__dish">

               <div class="swiper-wrapper">
                 <article class="popular__card swiper-slide">
                   <img src="assets/img/popular-1.png" alt="image" class="popular__img">
                   <h3 class="popular__title">Margherita Pizza</h3>
                 </article>

                 <article class="popular__card swiper-slide">
                   <img src="assets/img/popular-2.png" alt="image" class="popular__img">
                   <h3 class="popular__title">Mushroom Pizza</h3>
                 </article>

                 <article class="popular__card swiper-slide">
                   <img src="assets/img/popular-3.png" alt="image" class="popular__img">
                   <h3 class="popular__title">Pepperoni Pizza</h3>
                 </article>
               </div>
            </div>
          </div>
        </section>
      </div>

   </div>

   <section class="recipe section">
      <h2 class="section__title">Fresh And <br> Natural Ingredients</h2>

      <div class="recipe__container container grid">
        <div class="recipe__list grid">
          <div class="recipe__ingredient">
            <img src="assets/img/recipe-flour.png" alt="image" class="recipe__image">

            <div>
               <h3 class="recipe__name">Flour</h3>
               <p class="recipe__description">The best wheat from the field for the best flour.</p>
            </div>
          </div>

          <div class="recipe__ingredient">
            <img src="assets/img/recipe-cheese.png" alt="image" class="recipe__image">

            <div>
               <h3 class="recipe__name">Cheese</h3>
               <p class="recipe__description">Indulge in cheese for a healthy future.</p>
            </div>
          </div>

          <div class="recipe__ingredient">
            <img src="assets/img/recipe-sauces.png" alt="image" class="recipe__image">

            <div>
               <h3 class="recipe__name">Sauces</h3>
               <p class="recipe__description">Add a touch of salsa to your life and it will taste better.</p>
            </div>
          </div>

          <div class="recipe__ingredient">
            <img src="assets/img/recipe-tomato.png" alt="image" class="recipe__image">

            <div>
               <h3 class="recipe__name">Vegetables</h3>
               <p class="recipe__description">Vegetables full of the essence of nature and organic.</p>
            </div>
          </div>

          <div class="recipe__ingredient">
            <img src="assets/img/recipe-meat.png" alt="image" class="recipe__image">

            <div>
               <h3 class="recipe__name">Meats</h3>
               <p class="recipe__description">The best fresh meats for your health.</p>
            </div>
          </div>
        </div>

        <img src="assets/img/recipe-img.png" alt="img" class="recipe__img">
      </div>
   </section>

   <section class="products section" id="products">
      <h2 class="section__title">The Most <br> Devoured Pizzas</h2>

      <div class="products__container container grid">

        @foreach ($workshopEnLigne as $EnLigne)
          <article class="products__card">
              <img src="{{ asset('storage/' . $EnLigne->image) }}" alt="{{ $EnLigne->name }}" class="products__img rounded-full w-32 h-32
               lg:w-44 lg:h-44">

              <h3 class="products__name">{{ $EnLigne->name }}</h3>
              <span class="products__price">${{ $EnLigne->price }}</span>

              <livewire:add-product-to-cart :slug="$EnLigne->slug" class="bg-gray-client" />
          </article>
        @endforeach

      </div>

      <a href="{{ route('workshop-enligne') }}" class="button block justify-center max-w-52 mx-auto text-center mt-5">See
        all product</a>
   </section>

   <section class="contact section max-w-6xl mx-auto" id="contact">
      <div class="contact__container container grid">
        <div class="contact__data">
          <h2 class="section__title">Contact Now</h2>

          <div class="contact__info grid">
            <div>
               <h3 class="contact__title">Write Us</h3>

               <div class="contact__social">
                 <a href="https://api.whatsapp.com/send?phone=51123456789&text=Hello, more information!"
                   target="_blank" class="contact__social-link">
                   <i class="ri-whatsapp-fill"></i>
                 </a>

                 <a href="https://m.me/bedimcode" target="_blank" class="contact__social-link">
                   <i class="ri-messenger-fill"></i>
                 </a>

                 <a href="https://t.me/telegram" target="_blank" class="contact__social-link">
                   <i class="ri-telegram-2-fill"></i>
                 </a>
               </div>
            </div>

            <div>
               <h3 class="contact__title">Delivery</h3>

               <address class="contact__address">
                +1 631-710-6655 <br>
               </address>
            </div>

            <div>
               <h3 class="contact__title">Location</h3>

               <address class="contact__address">
                708 Portion Rd., Ronkonkoma, New York 11779 <br>
                 
               </address>

               <a href="https://maps.app.goo.gl/SGXBroFL9nZeF6Eg8?g_st=iw" target="_blank" class="contact__map">
                 <i class="ri-map-pin-fill"></i>
                 <span>View On Map</span>
               </a>
            </div>
          </div>
        </div>

        <div class="contact__image">
          <img src="assets/img/contact-img.png" alt="image" class="contact__img">
        </div>

        <img src="assets/img/sticker-tomato.svg" alt="image" class="contact__sticker-1">
        <img src="assets/img/sticker-mushroom.svg" alt="image" class="contact__sticker-2">
        <img src="assets/img/sticker-onion.svg" alt="image" class="contact__sticker-3">
      </div>
   </section>

   <x-footer />



   </div>



   <!-- <script>
         function initSlider(sliderId) {
            let slider = document.getElementById(sliderId);
            let cards = slider.querySelectorAll(".card");
            let currentIndex = Math.floor(cards.length / 3);

            function updateSlider() {
               const cardWidth = cards[0].offsetWidth;
               const sliderWidth = slider.offsetWidth;
               const offset = (sliderWidth - cardWidth) / 2 - currentIndex * cardWidth;

               cards.forEach((card, index) => {
                  const distanceFromCenter = Math.abs(currentIndex - index);
                  const blurLevel = Math.min(1, distanceFromCenter);
                  card.style.transform = `translateX(${offset}px) scale(${1 - blurLevel * 0.3})`;
                  card.style.filter = `blur(${blurLevel * 3}px)`;
               });

               cards.forEach((card, index) => {
                  if (index === currentIndex) {
                     card.classList.add("active");
                  } else {
                     card.classList.remove("active");
                  }
               });
            }

            function prevSlide() {
               currentIndex = (currentIndex - 1 + cards.length) % cards.length;
               updateSlider();
            }

            function nextSlide() {
               currentIndex = (currentIndex + 1) % cards.length;
               updateSlider();
            }

            // Ajoutez des gestionnaires d'événements pour les boutons de navigation ici
            // Par exemple, si vous avez des boutons avec les identifiants "prevBtn" et "nextBtn"
            document.getElementById("prevBtn").addEventListener("click", prevSlide);
            document.getElementById("nextBtn").addEventListener("click", nextSlide);

            updateSlider();
         }

         // Initialisez les deux carrousels
         initSlider("slider");
         initSlider("slider2");
      </script> -->

   <script>
      document.addEventListener('alpine:init', () => {
        Alpine.store('accordion', {
          tab: 0
        });

        Alpine.data('accordion', (idx) => ({
          init() {
            this.idx = idx;
          },
          idx: -1,
          handleClick() {
            this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
          },
          handleRotate() {
            return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
          },
          handleToggle() {
            return this.$store.accordion.tab === this.idx ?
               `max-height: ${this.$refs.tab.scrollHeight}px` : '';
          }
        }));
      })
   </script>



   <script>
      const moreTextEl = document.getElementById('more-text');
      const toggleBtnEl = document.getElementById('toggle-btn');
      const hideBtnEl = document.getElementById('hide-btn');

      toggleBtnEl.addEventListener('click', () => {
        moreTextEl.classList.toggle('hidden');
        toggleBtnEl.classList.toggle('hidden');
        hideBtnEl.classList.toggle('hidden');
      });

      hideBtnEl.addEventListener('click', () => {
        moreTextEl.classList.toggle('hidden');
        toggleBtnEl.classList.toggle('hidden');
        hideBtnEl.classList.toggle('hidden');
      });
   </script>
@endsection