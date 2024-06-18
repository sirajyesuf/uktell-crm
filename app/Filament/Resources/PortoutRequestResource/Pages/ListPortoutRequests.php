<?php

namespace App\Filament\Resources\PortoutRequestResource\Pages;

use App\Filament\Resources\PortoutRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPortoutRequests extends ListRecords
{
    protected static string $resource = PortoutRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
