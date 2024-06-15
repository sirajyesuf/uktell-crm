<?php
namespace App\Enums;

enum BundleCategory: string {

    case Base = 'Base';
    case Standard = 'Standard';
    case Premium = 'Premium';
    case Unlimited = 'Unlimited';


    public static function toArray()
    {
        return [
            self::Base,
            self::Standard,
            self::Premium,
            self::Unlimited
        ];
    }
}