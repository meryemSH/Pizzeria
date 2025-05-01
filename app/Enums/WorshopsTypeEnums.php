<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum WorshopsTypeEnums : string implements HasLabel , HasIcon , HasColor
{

    case online = 'En ligne';
    case offline = 'Hors ligne';


    public static function toSelectArray(): array
    {
        return [
            self::online->value => self::online->value,
            self::offline->value => self::offline->value,
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::offline => Color::Gray,
            self::online => Color::Green,
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::online => 'heroicon-m-eye',
            self::offline => 'heroicon-m-eye-slash',

        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::online => 'En ligne',
            self::offline => 'Hors ligne',

        };
    }

    public static function online(): string
    {
        return self::online->value;
    }

    public static function offline(): string
    {
        return self::offline->value;
    }
}
