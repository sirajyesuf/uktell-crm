<?php

namespace App\Filament\Clusters\Rates\Resources\InternationalRateResource\Pages;

use App\Filament\Clusters\Rates\Resources\InternationalRateResource;
use App\Filament\Exports\InternationalRateExporter;
use App\Models\InternationalRate;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use App\Filament\Imports\VoiceInternationalRateImporter;
use App\Filament\Imports\TextInternationalRateImporter;
use Filament\Support\Enums\ActionSize;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;

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
            ->label('Add InternationRate')
            ->form([

                Select::make('type')
                ->options([
                    InternationalRate::TYPE_VOICE => 'Voice',
                    InternationalRate::TYPE_SMS   => 'Text',
                ])
                ->live()
                ->afterStateUpdated(fn (Select $component) => $component
                    ->getContainer()
                    ->getComponent('dynamicTypeFields')
                    ->getChildComponentContainer()
                    ->fill()),
    
                Grid::make(2)
                    ->schema(fn (Get $get): array => match ($get('type')) {
                        InternationalRate::TYPE_VOICE => [
                            TextInput::make('country_code')
                                ->required(),
                            TextInput::make('country_name')
                                ->required(),
                            TextInput::make('rate')
                                ->integer()
                                ->required()
                                ->suffix('UKP/per min'),
                        ],
                        InternationalRate::TYPE_SMS => [
                            TextInput::make('country_code')
                                ->required(),
                            TextInput::make('country_name')
                                ->required(),
                            TextInput::make('rate')
                                ->integer()
                                ->required()
                                ->suffix('UKP/per message'),
                        ],
                        default => [],
                    })
                    ->key('dynamicTypeFields')])->slideOver(),
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
