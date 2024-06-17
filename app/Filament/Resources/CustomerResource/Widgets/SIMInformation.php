<?php

namespace App\Filament\Resources\CustomerResource\Widgets;

use Filament\Widgets\Widget;

class SIMInformation extends Widget
{
    protected static string $view = 'filament.resources.customer-resource.widgets.sim-information';
    protected int | string | array $columnSpan = 1;


}
