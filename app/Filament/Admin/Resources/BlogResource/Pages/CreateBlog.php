<?php

namespace App\Filament\Admin\Resources\BlogResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\BlogResource;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;
}
