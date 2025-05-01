<x-filament-panels::page>
    <p>
        {{ $record->short_description }}
    </p>

    <h2 class="text-lg font-bold">{{ __("La lesson en video") }}</h2>

    <iframe width="100%" class="aspect-video"
            src="{{ $record->url }}?modestbranding=1&showinfo=0"
            title="{{ $record->title }}"
            frameborder="0"
            modestbranding=0
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen></iframe>

    <div>
        {!! $record->content !!}
    </div>

    <!-- Lesson Navigation -->
        <div class="flex justify-between">

            <a @if($record->hasPrevious()) href="{{ \App\Filament\Client\Resources\WorkshopResource\Pages\Lesson::getUrl(['lesson' => $record->getPrevious()->slug]) }}" @else disabled @endif
                class="px-4 py-2 bg-primary-600 text-white rounded flex gap-2 items-center disabled:bg-gray-600 disabled:cursor-not-allowed">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
                Previous Lesson
            </a>

            <a @if($record->hasNext()) href="{{ \App\Filament\Client\Resources\WorkshopResource\Pages\Lesson::getUrl(['lesson' => $record->getNext()->slug]) }}" @else disabled @endif
                class="px-4 py-2 bg-primary-600 text-white rounded flex gap-2 items-center disabled:bg-gray-600 disabled:cursor-not-allowed">
                Next Lesson
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
            </a>
        </div>
    <!-- End Lesson Navigation -->
</x-filament-panels::page>
