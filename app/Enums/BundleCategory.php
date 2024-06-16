<?php
namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum BundleCategory: string  implements HasLabel{

    case Base = 'Base';
    case ROAMING = 'Roaming';
    case EXTRA_DATA = 'Extra Data';
    case INTERNATIONAL_MINUTES = 'International Minutes';

    public function getLabel(): ?string
    {
        return match($this) {
            self::Base => 'Base',
            self::ROAMING => 'Roaming',
            self::EXTRA_DATA => 'Extra Data',
            self::INTERNATIONAL_MINUTES => 'International Minutes'
        };
    }
}