<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum orderStutsEnums : string implements HasColor, HasLabel, HasIcon
{

    case Paye = 'Paye';
    case accepted = 'Accepté';
    case refuse = 'Refusé';

    public static function toSelectArray(): array
    {
        return [
            self::Paye->value => self::Paye->value,
            self::accepted->value => self::accepted->value,
            self::refuse->value => self::refuse->value,
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::accepted => Color::Green,
            self::Paye => Color::Amber,
            self::refuse => Color::Red,
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Paye => 'heroicon-m-pencil',
            self::accepted => 'heroicon-m-eye',
            // self::Published => 'heroicon-m-check',
            self::refuse => 'heroicon-m-x-mark',
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Paye => 'Demandé',
            self::accepted => 'Accepté',
            // self::Published => 'heroicon-m-check',
            self::refuse => 'Refusé',
        };
    }

}
