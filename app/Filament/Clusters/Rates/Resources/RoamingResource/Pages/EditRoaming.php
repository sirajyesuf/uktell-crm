<?php

namespace App\Filament\Clusters\Rates\Resources\RoamingResource\Pages;

use App\Filament\Clusters\Rates\Resources\RoamingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRoaming extends EditRecord
{
    protected static string $resource = RoamingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
