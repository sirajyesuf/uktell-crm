<?php

namespace App\Filament\Clusters\Rates\Resources\GeneralResource\Pages;

use App\Filament\Clusters\Rates\Resources\GeneralResource;
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
