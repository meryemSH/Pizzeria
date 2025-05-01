<?php

namespace App\Filament\Admin\Resources\FaqResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\FaqResource;

class CreateFaq extends CreateRecord
{
    protected static string $resource = FaqResource::class;
}
