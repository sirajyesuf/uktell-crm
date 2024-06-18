<?php

namespace App\Filament\Resources\SimRequestResource\Pages;

use App\Filament\Resources\SimRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSimRequest extends ViewRecord
{
    protected static string $resource = SimRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
