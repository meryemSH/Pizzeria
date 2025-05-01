<?php

namespace App\Filament\Admin\Resources\ExtracurricularOfferResource\Pages;

use Filament\Actions;
use Filament\Tables\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Admin\Resources\ExtracurricularOfferResource;

class ViewExtracurricularOffer extends ViewRecord
{
    protected static string $resource = ExtracurricularOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
