<?php

namespace App\Filament\Admin\Resources\SchoolPartnershipResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Admin\Resources\SchoolPartnershipResource;

class EditSchoolPartnership extends EditRecord
{
    protected static string $resource = SchoolPartnershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
