<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\CustomerResource\Widgets;
use Filament\Resources\Components\Tab;
use App\Enums\SubscriptionStatus;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Add Customer'),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\CustomerStat::class,
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'Active' => Tab::make()->query(fn ($query) => $query->whereRelation('subscriptions','status',SubscriptionStatus::ACTIVE)),
            'InActive' => Tab::make()->query(fn ($query) => $query->whereRelation('subscriptions','status',SubscriptionStatus::INACTIVE)),
            'New'   => Tab::make()->query(fn ($query) => $query->doesntHave('subscriptions'))
        ];
    }
}
