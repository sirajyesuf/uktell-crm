<?php

namespace App\Filament\Clusters\Settings\Resources\RoamingResource\Pages;

use App\Filament\Clusters\Settings\Resources\RoamingResource;
use App\Models\Roaming;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use App\Filament\Imports\DataRoamingImporter;
use App\Filament\Imports\VoiceRoamingImporter;
use Filament\Support\Enums\ActionSize;

class ListRoamings extends ListRecords
{
    protected static string $resource = RoamingResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\ActionGroup::make([

                Actions\ImportAction::make()
                ->label('Import Data Roaming')
                ->importer(DataRoamingImporter::class)
                ->options([
                    'updateExisting' => true,
                    'type' => Roaming::TYPE_DATA
                ]),

                Actions\ImportAction::make()
                ->label('Import SMS Roaming')
                ->importer(DataRoamingImporter::class)
                ->options([
                    'updateExisting' => true,
                    'type' => Roaming::TYPE_DATA
                ]),

                Actions\ImportAction::make()
                ->label('Import Voice Roaming')
                ->importer(VoiceRoamingImporter::class)
                ->options([
                    'updateExisting' => true,
                    'type' => Roaming::TYPE_VOICE
                ]),

            ])
            ->label('More actions')
            ->icon('heroicon-m-ellipsis-vertical')
            ->size(ActionSize::Small)
            ->color('primary')
            ->button(),
            Actions\CreateAction::make()
            ->label('Add Roaming'),




        ];
    }




    public function getTabs(): array
    {
        return [
            'Voice Roaming' => Tab::make()->query(fn ($query) => $query->where('type',Roaming::TYPE_VOICE)),
            'SMS Roaming' => Tab::make()->query(fn ($query) => $query->where('type',Roaming::TYPE_SMS)),
            'Data Roaming'   => Tab::make()->query(fn ($query) => $query->where('type',Roaming::TYPE_DATA))
        ];
    }
}
