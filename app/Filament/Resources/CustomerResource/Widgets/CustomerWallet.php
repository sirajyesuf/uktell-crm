<?php

namespace App\Filament\Resources\CustomerResource\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class CustomerWallet extends Widget
{
    protected static string $view = 'filament.resources.customer-resource.widgets.customer-wallet';
    protected int | string | array $columnSpan = 2;

    public ?Model $record = null;
    public $activeSubscription = null;

    public function mount(){
        $this->activeSubscription = $this->record->activeSubscription();
    }
}
