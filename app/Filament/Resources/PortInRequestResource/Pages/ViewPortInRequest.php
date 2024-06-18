<?php

namespace App\Filament\Resources\PortInRequestResource\Pages;

use App\Filament\Resources\PortInRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPortInRequest extends ViewRecord
{
    protected static string $resource = PortInRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
