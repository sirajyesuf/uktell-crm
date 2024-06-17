<?php

namespace App\Filament\Resources\CustomerResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;


class CustomerOverview extends Widget
{
    public ?Model $record = null;
    public $activeSubscription = null;
    protected static string $view = 'filament.resources.customer-resource.widgets.customer-overview';
    protected int | string | array $columnSpan = 1;


    public function mount(){
        
        $this->activeSubscription = $this->record->activeSubscription();
    }

    public static function canView(): bool
    {
        return true;
    }
}
