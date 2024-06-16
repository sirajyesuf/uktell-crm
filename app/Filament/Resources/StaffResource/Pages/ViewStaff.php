<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Models\User as Staff;

class ViewStaff extends ViewRecord
{
    protected static string $resource = StaffResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\Action::make('Suspend')
            ->hidden(fn(Staff $record) => !$record->isActive())
            ->requiresConfirmation()
            ->action(fn(Staff $record) => StaffResource::suspendStaff($record)),

            Actions\Action::make('Activate')
            ->requiresConfirmation()
            ->hidden(fn(Staff $record) => $record->isActive())
            ->action(fn(Staff $record) => StaffResource::activateStaff($record)),

            Actions\DeleteAction::make()

        ];
    }







}
