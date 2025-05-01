<div class="mt-10">
    <select wire:model="selectedCategorie" wire:change="filterByCategorie" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600 max-w-xl">
        <option value="">Toutes les catégories</option>
        @foreach ($categories as $categorie)
            <option value="{{ $categorie->id }}">{{ $categorie->title }}</option>
        @endforeach
      </select>

    <div class="grid grid-cols-1 lg:grid-cols-3 my-16 gap-12 px-4">
        @foreach ($blogs as $blog)
            <x-blog-card :blog="$blog" />
        @endforeach
    </div>
</div>
