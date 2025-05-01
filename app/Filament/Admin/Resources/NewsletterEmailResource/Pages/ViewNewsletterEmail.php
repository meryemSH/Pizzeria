<?php

namespace App\Filament\Admin\Resources\NewsletterEmailResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Admin\Resources\NewsletterEmailResource;

class ViewNewsletterEmail extends ViewRecord
{
    protected static string $resource = NewsletterEmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
