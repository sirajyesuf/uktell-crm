<?php

namespace App\Filament\Resources\PortInRequestResource\Pages;

use App\Filament\Resources\PortInRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortInRequests extends ListRecords
{
    protected static string $resource = PortInRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
