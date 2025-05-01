<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum WorshopsResevationstatus : string implements HasLabel , HasIcon , HasColor
{

    case pending = 'En attente';
    case confirmed = 'Confirmé';
    case canceled = 'Annulé';

    public static function toSelectArray(): array
    {
        return [
            self::pending->value => self::pending->value,
            self::confirmed->value => self::confirmed->value,
            self::canceled->value => self::canceled->value,
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::confirmed => Color::Green,
            self::pending => Color::Amber,
            self::canceled => Color::Red,
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::pending => 'heroicon-m-pencil',
            self::confirmed => 'heroicon-m-eye',
            self::canceled => 'heroicon-m-x-mark',
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::pending => 'En attente',
            self::confirmed => 'Confirmé',
            self::canceled => 'Annulé',
        };
    }

}
