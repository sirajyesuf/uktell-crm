<?php

namespace App\Filament\Clusters\Rates\Resources\InternationalRateResource\Pages;

use App\Filament\Clusters\Rates\Resources\InternationalRateResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewInternationalRate extends ViewRecord
{
    protected static string $resource = InternationalRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
