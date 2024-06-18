<?php

namespace App\Filament\Resources\PortInRequestResource\Pages;

use App\Filament\Resources\PortInRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortInRequest extends EditRecord
{
    protected static string $resource = PortInRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
