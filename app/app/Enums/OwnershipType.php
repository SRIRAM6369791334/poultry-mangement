<?php

namespace App\Enums;

enum OwnershipType: string
{
    case Owned = 'owned';
    case Leased = 'leased';
    case Contract = 'contract';

    public function label(): string
    {
        return match ($this) {
            self::Owned => 'Owned',
            self::Leased => 'Leased',
            self::Contract => 'Contract (Integration)',
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