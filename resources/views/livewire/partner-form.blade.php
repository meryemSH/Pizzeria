<form wire:submit.prevent="save">

    <div class="flex flex-col justify-center items-center px-6 lg:px-10 py-24 h-full gap-5">

        @if ($errors->any())
            <div class="text-red-600 z-30">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex flex-col lg:flex-row w-full gap-8">
            <input type="text" id="large-input" wire:model="responsible_name" placeholder="Nom et prénom"
                class="w-full lg:w-1/2 p-4 text-black border border-white focus:border-white  rounded-lg bg-[#ffffff7a] text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-2xl z-10">
            <input type="text" id="large-input" wire:model="company_name" placeholder="Etablissement"
                class="w-full lg:w-1/2 p-4 text-black border border-white focus:border-white  rounded-lg bg-[#ffffff7a] text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-2xl z-10">
        </div>

        <div class="flex flex-col lg:flex-row w-full gap-8">
            <input type="number" id="large-input" placeholder="Téléphone" wire:model="responsible_phone"
                class="w-full lg:w-1/2 p-4 text-black border border-white focus:border-white  rounded-lg bg-[#ffffff7a] text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-2xl z-10">
            <input type="text" id="large-input" placeholder="Adresse mail" wire:model="responsible_email"
                class="w-full lg:w-1/2 p-4 text-black border border-white focus:border-white  rounded-lg bg-[#ffffff7a] text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-2xl z-10">
        </div>

        <div class="flex flex-col lg:flex-row w-full gap-8">
            <select name="" id="" placeholder="Activités" wire:model="activity"
                class="w-full lg:w-1/2 p-4 text-black border border-white focus:border-white  rounded-lg bg-[#ffffff7a] text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-2xl z-10">
                <option value="0" class="text-[#d7ccdd] font-medium text-2xl">Activités</option>
                <option value="Clubs">clubs</option>
                <option value="Abonnements">Abonnement</option>
            </select>
            <button
                class="w-full lg:w-1/2 flex justify-center items-center border-2 border-solid p-4 border-primary bg-primary text-white py-4 text-3xl text-center align-middle font-sans font-medium rounded-lg z-10"
                type="submit" data-ripple-dark="true">
                Envoyer
            </button>


        </div>
    </div>
</form>
