<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Resources\CustomerResource\Widgets;
use OpenSpout\Writer\Common\ColumnWidth;

class ViewCustomer extends ViewRecord
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            Widgets\CustomerWallet::class,
            Widgets\CustomerOverview::class,
            Widgets\SIMInformation::class,
            Widgets\SimInformation2::class
        ];
    }
}
