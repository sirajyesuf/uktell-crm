<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Bundle;
use App\Models\Addon;

class StatsOverviewWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    protected static ?string $pollingInterval = null;
    
    protected function getStats(): array
    {
        return [
            Stat::make('Download and Registered',600),
            Stat::make('Total Subscribers(active and inactive)',400),
            Stat::make('Paid Subscribers',100)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Revenue','134k')
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('gray')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('all physical SIM users',500)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('all eSIM users',300)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('pending SIM request',700)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            Stat::make('pending port-in request',700)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            
            Stat::make('pending port-out request',700)
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('info')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('esim inventory',5000),

            Stat::make('pysical SIM inventory',5000),

            Stat::make('Cost','55k')
                ->color('info')
                ->chart([1, 2, 3, 4, 15, 20, 30]),
        ];
    }
}
