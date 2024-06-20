<?php

namespace App\Filament\Clusters\Rates\Resources\RoamingResource\Pages;

use App\Filament\Clusters\Rates\Resources\RoamingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRoaming extends ViewRecord
{
    protected static string $resource = RoamingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
