<?php

namespace App\Filament\Client\Resources\WorkshopResource\Pages;

use App\Filament\Client\Resources\WorkshopResource;
use App\Models\Workshop;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;

class Lesson extends Page
{
    use InteractsWithRecord;

    public function mount(int | string $lesson): void
    {
        $this->record = \App\Models\Lesson::where('slug', $lesson)->first();

        abort_unless($this->userCanViewLesson(), '404');
    }

    protected function userCanViewLesson(): bool
    {
        return in_array(
            $this->record->workshop_id,
            Workshop::query()
                ->whereHas('users', fn ($query) => $query->where('user_id', auth()->id()))
                ->pluck('id')
                ->toArray(),
        true);
    }

    protected static string $resource = WorkshopResource::class;

    public static function getEloquentQuery(): Builder
    {
        return Workshop::query()
            ->whereHas('users', function ($query){
                $query->where('user_id', auth()->id());
            });
    }

    public function getTitle(): string | Htmlable
    {
        return $this->record->title;
    }

    protected static string $view = 'filament.client.resources.workshop-resource.pages.lesson';
}
