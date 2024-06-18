<?php

namespace App\Filament\Resources\PortoutRequestResource\Pages;

use App\Filament\Resources\PortoutRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPortoutRequest extends ViewRecord
{
    protected static string $resource = PortoutRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
