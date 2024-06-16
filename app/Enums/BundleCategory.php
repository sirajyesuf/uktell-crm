<?php
namespace App\Enums;

enum BundleCategory: string {

    case Base = 'Base';
    case Standard = 'Standard';
    case Premium = 'Premium';
    case Unlimited = 'Unlimited';
    case ROAMING = 'Roaming';
    case EXTRA_DATA = 'Extra Data';
    case INTERNATIONAL_MINUTES = 'International Minutes';



    public static function toArray(): array
    {
        return [
            self::Base->value,
            self::ROAMING->value,
            self::EXTRA_DATA->value,
            self::INTERNATIONAL_MINUTES->value
        ];
    }

    public static function option(): array
    {
        $keyValueArray = [];
        foreach (self::cases() as $case) {
            $keyValueArray[$case->name] = $case->value;
        }

        return $keyValueArray;
    }
}