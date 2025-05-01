<form wire:submit="register">

    <div class="flex flex-col w-full">
        <div class="flex flex-col lg:flex-row lg:gap-8">
            <div class="lg:mb-6 lg:w-1/2 my-4">
                <x-form.input type='text' class="border-purple lg:w-60" wire:model="last_name" placeholder="Nom"/>
            </div>
            <div class="lg:mb-6 lg:w-1/2 my-4">
                <x-form.input type='text' class="border-purple lg:w-60" wire:model="first_name" placeholder="Prénom"/>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row  lg:gap-8">
            <div class="lg:mb-6 lg:w-1/2 my-4">
                <x-form.input class="border-purple lg:w-60" type="tel" wire:model="phone" placeholder="Télephone"/>
            </div>
            <div class="lg:mb-6 lg:w-1/2 my-4">
                <x-form.input class="border-purple lg:w-60" type="email" wire:model="email" placeholder="E-mail"/>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row  lg:gap-8">
            <div class="lg:mb-6 lg:w-1/2 my-4">
                <x-form.input class="border-purple lg:w-60" type="password" wire:model="password" placeholder="Mot de pass"
                              autocomplete="new-password"/>
            </div>
            <div class="lg:mb-6 lg:w-1/2 my-4">
                <x-form.input class="border-purple lg:w-60" type="password" wire:model="password_confirmation"
                              placeholder="Confirmation de mot de pass" autocomplete="new-password"/>
            </div>
        </div>
        <button type="submit"
                class="w-full h-14 flex justify-center items-center gap-2 border-2 border-solid p-4 border-white bg-purple hover:bg-primary text-white py-8 text-xl text-center align-middle font-semibold rounded-lg">
            <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                 class="animate-spin fi-btn-icon transition duration-75 h-5 w-5 text-white"
                 wire:loading.delay.default="" wire:target="register" element-id="40">
                <path clip-rule="evenodd"
                      d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                      fill-rule="evenodd" fill="currentColor" opacity="0.2" element-id="39"></path>
                <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"
                      element-id="38"></path>
            </svg>

            sign up
        </button>
        <a href="{{ filament()->getLoginUrl() }}"
           class="text-white font-medium text-base text-center flex justify-center items-center my-3">
            sign in
        </a>
    </div>
</form>
