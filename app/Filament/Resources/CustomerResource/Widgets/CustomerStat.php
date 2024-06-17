<?php

namespace App\Filament\Resources\CustomerResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Customer;
use App\Enums\SubscriptionStatus;

class CustomerStat extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Customers',Customer::count())
            ->description('Total number Customers')
            ->descriptionIcon('heroicon-o-users')
            ->chart([1, 2, 10, 20, 30, 40, 70,89,0,88,78,90])
            ->color('success'),
            Stat::make('Active Customers',Customer::whereRelation('subscriptions','status',SubscriptionStatus::ACTIVE)->count()),
            Stat::make('InActive Customers',Customer::whereRelation('subscriptions','status',SubscriptionStatus::INACTIVE)->count())

        ];
    }
}
