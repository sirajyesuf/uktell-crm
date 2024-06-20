<?php

namespace App\Filament\Clusters\Settings\Resources;

use App\Filament\Clusters\Settings;
use App\Filament\Clusters\Settings\Resources\InternationalRateResource\Pages;
use App\Filament\Clusters\Settings\Resources\InternationalRateResource\RelationManagers;
use App\Models\InternationalRate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Actions;

class InternationalRateResource extends Resource
{
    protected static ?string $model = InternationalRate::class;

    protected static ?string $navigationIcon = 'heroicon-c-globe-americas';

    protected static ?string $cluster = Settings::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country_name'),
                Tables\Columns\TextColumn::make('country_code'),
                Tables\Columns\TextColumn::make('rate'),
            ])
            ->filters([
                //
            ])
            ->actions([

                // Tables\Actions\ViewAction::make()
                // ->slideOver(),
                // Tables\Actions\EditAction::make()
        

                Tables\Actions\EditAction::make()
                ->form([
                    Forms\Components\TextInput::make('country_name')
                        ->required(),

                    Forms\Components\TextInput::make('country_code')
                    ->required(),

                    Forms\Components\TextInput::make('rate')
                    ->required()
                ])
                ->action(function ($data, $record): void {
                    
                    $record->country_name = $data['country_name'];
                    $record->country_code = $data['country_code'];
                    $record->rate = $data['rate'];
                    $record->save();

                })
                ->slideOver()


            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                // ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInternationalRates::route('/'),
            // 'create' => Pages\CreateInternationalRate::route('/create'),
            // 'view' => Pages\ViewInternationalRate::route('/{record}'),
            // 'edit' => Pages\EditInternationalRate::route('/{record}/edit'),
        ];
    }
}
