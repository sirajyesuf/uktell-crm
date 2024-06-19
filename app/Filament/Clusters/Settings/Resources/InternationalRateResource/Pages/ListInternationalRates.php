<?php

namespace App\Filament\Clusters\Settings\Resources\InternationalRateResource\Pages;

use App\Filament\Clusters\Settings\Resources\InternationalRateResource;
use App\Filament\Exports\InternationalRateExporter;
use App\Models\InternationalRate;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use App\Filament\Imports\VoiceInternationalRateImporter;
use App\Filament\Imports\TextInternationalRateImporter;
use Filament\Support\Enums\ActionSize;

class ListInternationalRates extends ListRecords
{
    protected static string $resource = InternationalRateResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\ActionGroup::make([

                Actions\ImportAction::make()
                ->label('Import International Voice Rate')
                ->importer(VoiceInternationalRateImporter::class)
                ->options([
                    'updateExisting' => true,
                    'type' => InternationalRate::TYPE_VOICE
                ]),

                Actions\ImportAction::make()
                ->label('Import International Text Rate')
                ->importer(TextInternationalRateImporter::class)
                ->options([
                    'updateExisting' => true,
                    'type' => InternationalRate::TYPE_SMS
                ])
            ])
            ->label('Import')
            ->icon('heroicon-m-ellipsis-vertical')
            ->size(ActionSize::Small)
            ->color('primary')
            ->button(),


            // export 
            // Actions\ActionGroup::make([

                Actions\ExportAction::make()
                ->label('Export')
                ->exporter(InternationalRateExporter::class),

                // Actions\ImportAction::make()
                // ->label('Import International Text Rate')
                // ->importer(InternationalRate::class)
                // ->options([
                //     'updateExisting' => true,
                //     'type' => InternationalRate::TYPE_SMS
                // ])
            // ])
            // ->label('Export')
            // ->icon('heroicon-m-ellipsis-vertical')
            // ->size(ActionSize::Small)
            // ->color('primary')
            // ->button(),


            Actions\CreateAction::make()
            ->label('Add InternationRate'),
        ];
    }



    public function getTabs(): array
    {
        return [
            'International Voice' => Tab::make()->query(fn ($query) => $query->where('type',InternationalRate::TYPE_VOICE)),
            'International Text' => Tab::make()->query(fn ($query) => $query->where('type',InternationalRate::TYPE_SMS)),
        ];
    }
}
