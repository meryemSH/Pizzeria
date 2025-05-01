<div>
    <div class="lg:p-8">
        <form wire:submit.prevent="save">
                @csrf
            <div class="flex flex-col w-full">

                <div class="flex flex-col lg:flex-row lg:gap-10">
                    <div class="mb-6 lg:w-1/2 my-4">
                        <input wire:model="full_name" type="text" placeholder="nom complet"
                            class="block  w-full h-14 lg:w-96 lg:h-16 p-4 text-black border border-white focus:border-white  rounded-lg text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-xl">
                        @error('full_name')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6 lg:w-1/2 my-4">
                        <input wire:model="age" type="number" placeholder="age d’enfant"
                            class="block   w-full h-14 lg:w-96 lg:h-16 p-4 text-black border border-white focus:border-white rounded-lg text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-xl">
                        @error('age')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-col lg:flex-row  lg:gap-10">
                    <div class="mb-6 lg:w-1/2 my-4">
                        <input wire:model="phone" type="tel" placeholder="télephone"
                            class="block   w-full h-14 lg:w-96 lg:h-16 p-4 text-black border border-white focus:border-white  rounded-lg text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-xl">
                        @error('phone')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-6 lg:w-1/2 my-4">
                        <input wire:model="objet" type="text" placeholder="objet (ex: atelier, jouet...)"
                            class="block  w-full h-14 lg:w-96 lg:h-16 p-4 text-black border border-white focus:border-white rounded-lg text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-xl">
                        @error('objet')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="mb-6 w-full lg:gap-10 my-4">
                    <textarea wire:model="message" placeholder="message" cols="30"
                        class="block w-full lg:gap-10 p-4 text-black border border-white focus:border-white  rounded-lg text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-xl"></textarea>
                    @error('message')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6 w-full lg:gap-10 my-4">
                    <button type="submit"
                        class="w-full h-16 flex justify-center items-center border-2 border-solid p-4 border-white bg-purple hover:bg-primary text-white py-10 text-xl text-center align-middle font-semibold rounded-lg">
                        Envoyer
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>
