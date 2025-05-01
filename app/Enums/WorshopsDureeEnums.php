<?php

namespace App\Enums;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum WorshopsDureeEnums : string implements HasLabel
{

    case day = 'Jour';
    case week = 'Semaine';
    case month = 'Mois';
    case quarter = 'Trimestre';

    public static function toSelectArray(): array
    {
        return [
            self::day->value => self::day->value,
            self::week->value => self::week->value,
            self::month->value => self::month->value,
            self::quarter->value => self::quarter->value,
        ];
    }


    public function getLabel(): ?string
    {
        return match ($this) {
            self::day => 'Jour',
            self::week => 'Semaine',
            self::month => 'Mois',
            self::quarter => 'Trimestre',
        };
    }

    public static function randomValue(): string
    {
        $cases = self::cases();
        $randomKey = array_rand($cases);
        return $cases[$randomKey]->value;
    }

}
