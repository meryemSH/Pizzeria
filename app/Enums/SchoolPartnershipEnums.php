<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum SchoolPartnershipEnums : string implements HasColor, HasLabel, HasIcon
{

    case pending = 'Demandé';
    case accepted = 'Accepté';
    case refuse = 'Refusé';

    public static function toSelectArray(): array
    {
        return [
            self::pending->value => self::pending->value,
            self::accepted->value => self::accepted->value,
            self::refuse->value => self::refuse->value,
        ];
    }


    public function getColor(): string | array | null
    {
        return match ($this) {
            self::accepted => Color::Green,
            self::pending => Color::Amber,
            self::refuse => Color::Red,
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::pending => 'heroicon-m-pencil',
            self::accepted => 'heroicon-m-eye',
            // self::Published => 'heroicon-m-check',
            self::refuse => 'heroicon-m-x-mark',
        };
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::pending => 'Demandé',
            self::accepted => 'Accepté',
            // self::Published => 'heroicon-m-check',
            self::refuse => 'Refusé',
        };
    }

}
