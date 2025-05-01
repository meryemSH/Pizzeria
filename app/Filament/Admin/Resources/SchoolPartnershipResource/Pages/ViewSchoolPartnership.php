<?php

namespace App\Filament\Admin\Resources\SchoolPartnershipResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Admin\Resources\SchoolPartnershipResource;

class ViewSchoolPartnership extends ViewRecord
{
    protected static string $resource = SchoolPartnershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
