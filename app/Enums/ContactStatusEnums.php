<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ContactStatusEnums : string implements HasLabel , HasIcon , HasColor
{

    case processed = 'Traité';
    case pending = 'En attente';


    public static function toSelectArray(): array
    {
        return [
            self::processed->value => self::processed->value,
            self::pending->value => self::pending->value,
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::processed => Color::Green,
            self::pending => Color::Gray,
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::processed => 'heroicon-m-eye',
            self::pending => 'heroicon-m-eye-slash',

        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::processed => 'Traité',
            self::pending => 'En attente',

        };
    }

}
