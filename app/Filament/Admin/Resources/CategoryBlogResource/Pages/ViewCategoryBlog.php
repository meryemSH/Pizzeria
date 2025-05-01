<?php

namespace App\Filament\Admin\Resources\CategoryBlogResource\Pages;

use App\Filament\Admin\Resources\CategoryBlogResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryBlog extends ViewRecord
{
    protected static string $resource = CategoryBlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
