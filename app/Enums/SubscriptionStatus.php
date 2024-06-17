<?php 
namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum SubscriptionStatus:int  implements HasColor,HasLabel {

    case ACTIVE = 1;
    case INACTIVE = 0;


    public function getLabel(): string 
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'In Active'
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::ACTIVE => 'success',
            self::INACTIVE => 'danger'
        };
    }


}