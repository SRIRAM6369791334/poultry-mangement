<?php

namespace App\Enums;

enum FarmType: string
{
    case Broiler = 'broiler';
    case Layer = 'layer';
    case Breeder = 'breeder';
    case Rearing = 'rearing';
    case Turkey = 'turkey';
    case Mixed = 'mixed';

    public function label(): string
    {
        return match ($this) {
            self::Broiler => 'Broiler',
            self::Layer => 'Layer',
            self::Breeder => 'Breeder',
            self::Rearing => 'Rearing',
            self::Turkey => 'Turkey',
            self::Mixed => 'Mixed',
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