<?php
namespace App\Enums;

enum Role: string
{
    case ADMIN = 'admin';
    case EDITOR = 'editor';


    public static function toArray(): array
    {
        return [
            self::ADMIN->value,
            self::EDITOR->value
        ];
    }

    public static function option(): array
    {
        $keyValueArray = [];
        foreach (self::cases() as $case) {
            $keyValueArray[$case->value] = $case->name;
        }

        return $keyValueArray;
    }
}