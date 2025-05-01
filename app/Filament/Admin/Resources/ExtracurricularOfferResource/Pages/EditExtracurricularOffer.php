<?php

namespace App\Filament\Admin\Resources\ExtracurricularOfferResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\ExtracurricularOfferResource;

class EditExtracurricularOffer extends EditRecord
{
    protected static string $resource = ExtracurricularOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
