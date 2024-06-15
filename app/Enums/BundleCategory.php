<?php
namespace App\Enums;

enum BundleCategory: string {

    case Base = 'Base';
    case Standard = 'Standard';
    case Premium = 'Premium';
    case Unlimited = 'Unlimited';


    public static function toArray(): array
    {
        return [
            self::Base->value,
            self::Standard->value,
            self::Premium->value,
            self::Unlimited->value
        ];
    }
}