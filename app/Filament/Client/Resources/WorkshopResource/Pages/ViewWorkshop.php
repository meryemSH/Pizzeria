<?php

namespace App\Filament\Client\Resources\WorkshopResource\Pages;

use App\Filament\Client\Resources\WorkshopResource;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Contracts\Support\Htmlable;

class ViewWorkshop extends ViewRecord
{
    protected static string $resource = WorkshopResource::class;

    public function getTitle(): string | Htmlable
    {
        /** @var Post */
        $record = $this->getRecord();

        return $record->name;
    }

    protected function getHeaderActions(): array
    {
        return [];
    }
}
