<?php

namespace App\Filament\Clusters\Rates\Resources\RegionResource\Pages;

use App\Filament\Clusters\Rates\Resources\RegionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRegion extends ViewRecord
{
    protected static string $resource = RegionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
