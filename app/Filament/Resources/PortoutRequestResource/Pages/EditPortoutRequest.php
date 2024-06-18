<?php

namespace App\Filament\Resources\PortoutRequestResource\Pages;

use App\Filament\Resources\PortoutRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPortoutRequest extends EditRecord
{
    protected static string $resource = PortoutRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
