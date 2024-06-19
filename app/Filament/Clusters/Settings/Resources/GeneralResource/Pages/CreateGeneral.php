<?php

namespace App\Filament\Clusters\Settings\Resources\GeneralResource\Pages;

use App\Filament\Clusters\Settings\Resources\GeneralResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGeneral extends CreateRecord
{
    protected static string $resource = GeneralResource::class;


    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction(),
            $this->getCancelFormAction(),
        ];
    }
}
