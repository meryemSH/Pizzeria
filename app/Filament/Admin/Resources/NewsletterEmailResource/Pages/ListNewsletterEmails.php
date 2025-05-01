<?php

namespace App\Filament\Admin\Resources\NewsletterEmailResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Admin\Resources\NewsletterEmailResource;

class ListNewsletterEmails extends ListRecords
{
    protected static string $resource = NewsletterEmailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
