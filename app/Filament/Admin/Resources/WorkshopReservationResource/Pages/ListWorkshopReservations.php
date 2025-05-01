<?php

namespace App\Filament\Admin\Resources\WorkshopReservationResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\WorkshopReservationResource;
use Filament\Resources\Components\Tab;

class ListWorkshopReservations extends ListRecords
{
    protected static string $resource = WorkshopReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('Tous'),
            'En attente' => Tab::make()->query(fn ($query) => $query->where('status', 'pending')),
            'Confirmé' => Tab::make()->query(fn ($query) => $query->where('status', 'confirmed')),
            'Annulé' => Tab::make()->query(fn ($query) => $query->where('status', 'canceled')),
        ];
    }
}
