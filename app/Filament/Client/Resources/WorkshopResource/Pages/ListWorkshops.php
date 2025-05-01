<?php

namespace App\Filament\Client\Resources\WorkshopResource\Pages;

use App\Filament\Client\Resources\WorkshopResource;
use Filament\Resources\Pages\ListRecords;

class ListWorkshops extends ListRecords
{
    protected static string $resource = WorkshopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\ViewAction::make(),
        ];
    }
}
