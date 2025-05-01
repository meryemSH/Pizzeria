<?php

namespace App\Filament\Admin\Resources\SchoolPartnershipResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\SchoolPartnershipResource;
use Filament\Pages\Concerns\ExposesTableToWidgets;
use Filament\Resources\Components\Tab;

class ListSchoolPartnerships extends ListRecords
{
    protected static string $resource = SchoolPartnershipResource::class;

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
            'Demandé' => Tab::make()->query(fn ($query) => $query->where('status', 'pending')),
            'Accepté' => Tab::make()->query(fn ($query) => $query->where('status', 'accepted')),
            'Refusé' => Tab::make()->query(fn ($query) => $query->where('status', 'refuse')),
        ];
    }
}
