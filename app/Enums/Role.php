<?php
namespace App\Enums;
use Filament\Support\Contracts\HasLabel;

enum Role: string implements HasLabel{
    case ADMIN = 'Admin';
    case EDITOR = 'Editor';


    public function getLabel(): ?string
    {
        return match($this) {
            self::ADMIN => 'Admin',
            self::EDITOR => 'Editor',
        };
    }


}