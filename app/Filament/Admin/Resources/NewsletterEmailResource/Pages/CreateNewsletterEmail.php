<?php

namespace App\Filament\Admin\Resources\NewsletterEmailResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\NewsletterEmailResource;

class CreateNewsletterEmail extends CreateRecord
{
    protected static string $resource = NewsletterEmailResource::class;
}
