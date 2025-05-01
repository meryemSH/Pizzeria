<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum schoolPartnershipsActivityEnums : string implements HasLabel
{

    case Clubs = 'Clubs';
    case Abonnements = 'Abonnements';

    public static function toSelectArray(): array
    {
        return [
            self::Clubs->value => self::Clubs->value,
            self::Abonnements->value => self::Abonnements->value,
        ];
    }

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Clubs => 'Clubs',
            self::Abonnements => 'Abonnements',

        };
    }

}
