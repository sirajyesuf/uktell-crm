<?php

namespace App\Filament\Resources\ResellersResource\Pages;

use App\Filament\Resources\ResellersResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditResellers extends EditRecord
{
    protected static string $resource = ResellersResource::class;

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
