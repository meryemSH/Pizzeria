<?php

namespace App\Filament\Admin\Resources\WorkshopReservationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\WorkshopReservationResource;

class EditWorkshopReservation extends EditRecord
{
    protected static string $resource = WorkshopReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
