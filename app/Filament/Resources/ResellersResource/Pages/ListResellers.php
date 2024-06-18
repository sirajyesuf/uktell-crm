<?php

namespace App\Filament\Resources\ResellersResource\Pages;

use App\Filament\Resources\ResellersResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResellers extends ListRecords
{
    protected static string $resource = ResellersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
