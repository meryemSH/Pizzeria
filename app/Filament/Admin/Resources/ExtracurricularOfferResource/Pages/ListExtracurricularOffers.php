<?php

namespace App\Filament\Admin\Resources\ExtracurricularOfferResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\ExtracurricularOfferResource;

class ListExtracurricularOffers extends ListRecords
{
    protected static string $resource = ExtracurricularOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
