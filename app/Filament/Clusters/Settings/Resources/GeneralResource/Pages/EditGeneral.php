<?php

namespace App\Filament\Clusters\Settings\Resources\GeneralResource\Pages;

use App\Filament\Clusters\Settings\Resources\GeneralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeneral extends EditRecord
{
    protected static string $resource = GeneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
