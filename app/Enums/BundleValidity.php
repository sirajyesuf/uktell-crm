<?php
namespace App\Enums;

enum BundleValidity: int {

    case ONE_DAY = 1;
    case SEVEN_DAYS = 7;
    case THIRTY_DAYS = 30;
    case NINETY_DAYS = 90;
    case ONE_HUNDRED_EIGHTY_DAYS = 180;
    case THREE_HUNDRED_SIXTY_FIVE_DAYS = 365;


    public static function toArray()
    {
        return [
            self::ONE_DAY,
            self::SEVEN_DAYS,
            self::THIRTY_DAYS,
            self::NINETY_DAYS,
            self::ONE_HUNDRED_EIGHTY_DAYS,
            self::THREE_HUNDRED_SIXTY_FIVE_DAYS,
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