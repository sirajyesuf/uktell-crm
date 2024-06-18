<?php

namespace App\Filament\Resources\ResellersResource\Pages;

use App\Filament\Resources\ResellersResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewResellers extends ViewRecord
{
    protected static string $resource = ResellersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
