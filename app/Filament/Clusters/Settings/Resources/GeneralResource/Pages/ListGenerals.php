<?php

namespace App\Filament\Clusters\Settings\Resources\GeneralResource\Pages;

use App\Filament\Clusters\Settings\Resources\GeneralResource;
use App\Models\General;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGenerals extends ListRecords
{
    protected static string $resource = GeneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('Rate')
            ->hidden(General::count() == 1),
        ];
    }

    


    protected function getTableEmptyStateDescription(): ?string
    {
        return "Add Rate";
    }
}
