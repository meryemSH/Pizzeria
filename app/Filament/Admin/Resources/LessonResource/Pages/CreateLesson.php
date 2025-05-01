<?php

namespace App\Filament\Admin\Resources\LessonResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Admin\Resources\LessonResource;

class CreateLesson extends CreateRecord
{
    protected static string $resource = LessonResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array {
        $video_id = extract_youtube_video_id($data['url']);

        $data['url'] = $video_id !== '' ? "https://www.youtube.com/embed/" . $video_id : null;

        return $data;
  }
}
