<?php

namespace App\Filament\Clusters\Rates\Resources\GeneralResource\Pages;

use App\Filament\Clusters\Rates\Resources\GeneralResource;
use App\Models\General;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Illuminate\Support\Facades\DB;

class ListGenerals extends ListRecords
{
    protected static string $resource = GeneralResource::class;

    protected function getHeaderActions(): array
    {

        $country = DB::table('countries')->get()->pluck('name','name');
        $currencies = DB::table('currencies')->get()->pluck('code','name');


        return [
            Actions\CreateAction::make()
            ->label('Rate')
            ->hidden(General::count() == 1)
            ->form([

                Forms\Components\Select::make('home_country')
                ->searchable()
                ->preload()
                ->options($country)
                ->columnSpan([
                    'sm' => 1,
                    'xl' => 1,
                    '2xl' => 1,
                ]),

                Forms\Components\Select::make('currency')
                ->searchable()
                ->preload()
                ->options($currencies)
                ->columnSpan(2),
                
                forms\Components\Section::make('Rate')
                ->columns(1)
                ->schema([
                    Forms\Components\TextInput::make('voice_rate')
                    ->label('Voice')
                    ->prefixIcon('heroicon-s-phone')
                    ->suffix('MIN')
                    ->integer(),
                    Forms\Components\TextInput::make('data_rate')
                    ->label('Data')
                    ->prefixIcon('iconpark-international')
                    ->suffix('GB')
                    ->integer(),
                    Forms\Components\TextInput::make('sms_rate')
                    ->label('SMS')
                    ->prefixIcon('fas-sms')
                    ->integer()

                ])



            ])
            ->slideOver(),
        ];
    }

    


    protected function getTableEmptyStateDescription(): ?string
    {
        return "Add Rate";
    }
}
