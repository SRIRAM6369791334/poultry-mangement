<?php

namespace App\Enums;

enum HousingType: string
{
    case DeepLitter = 'deep_litter';
    case OpenSided = 'open_sided';
    case EnvironmentallyControlled = 'environmentally_controlled';
    case Cages = 'cages';

    public function label(): string
    {
        return match ($this) {
            self::DeepLitter => 'Deep Litter',
            self::OpenSided => 'Open Sided',
            self::EnvironmentallyControlled => 'Environmentally Controlled (EC)',
            self::Cages => 'Cages',
        };
    }

    public static function labels(): array
    {
        $labels = [];
        foreach (self::cases() as $case) {
            $labels[$case->value] = $case->label();
        }

        return $labels;
    }
}