<?php

namespace App\Filament\Admin\Resources\WorkshopReservationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Admin\Resources\WorkshopReservationResource;

class ViewWorkshopReservation extends ViewRecord
{
    protected static string $resource = WorkshopReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
