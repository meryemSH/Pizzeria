@props(['type' => 'text', 'label' => null])

<div>
    @if($label)
        <label for="{{ $attributes->get('id') }}" class="text-lg font-medium text-black">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}" {{ $attributes->exceptProps(['label', 'error'])->twMerge(["class" => "block w-full h-14 lg:w-80 lg:h-14 p-4 text-black border border-white focus:border-white  rounded-lg text-lg placeholder-[#d7ccdd] placeholder:font-medium placeholder:text-xl"]) }}>

    @error($attributes->get('name') ?? $attributes->wire('model')->value())
    <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
