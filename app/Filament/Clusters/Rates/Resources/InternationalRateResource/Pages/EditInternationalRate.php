<?php

namespace App\Filament\Clusters\Rates\Resources\InternationalRateResource\Pages;

use App\Filament\Clusters\Rates\Resources\InternationalRateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInternationalRate extends EditRecord
{
    protected static string $resource = InternationalRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
