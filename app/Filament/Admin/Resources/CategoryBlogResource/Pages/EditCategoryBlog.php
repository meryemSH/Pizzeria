<?php

namespace App\Filament\Admin\Resources\CategoryBlogResource\Pages;

use App\Filament\Admin\Resources\CategoryBlogResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryBlog extends EditRecord
{
    protected static string $resource = CategoryBlogResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
