<div {{ $attributes->merge(["class" => "lg:flex lg:flex-row"]) }}>

    <div class="lg:w-1/2 flex  justify-center mt-6">
        <div class="bg-white bg-opacity-50 w-96 h-96 backdrop-blur-8 p-4 rounded-lg shadow-lg flex justify-center items-center">
            <img src="{{ Storage::url($partenaire->image) }}" alt="" class="w-80 h-80 rounded-sm">
        </div>

    </div>

    <div class="lg:w-1/2 flex flex-col lg:justify-center gap-y-2 lg:items-center mt-5 lg:mt-0">

        <div
            class="lg:w-5/6 lg:mt-5 text-sm font-normal lg:font-medium text-center lg:text-justify">
                {!! $partenaire->content !!}
        </div>

    </div>
</div>
