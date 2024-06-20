<?php

namespace App\Filament\Clusters\Rates\Resources;

use App\Filament\Clusters\Rates;
use App\Filament\Clusters\Rates\Resources\RoamingResource\Pages;
use App\Filament\Clusters\Rates\Resources\RoamingResource\RelationManagers;
use App\Models\Roaming;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;

class RoamingResource extends Resource
{
    protected static ?string $model = Roaming::class;

    protected static ?string $navigationIcon = 'emblem-mobile-network-full-roaming';

    protected static ?string $cluster = Rates::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {

        $columns  = [
            Tables\Columns\TextColumn::make('country_code'),
            Tables\Columns\TextColumn::make('country_name'),
        ];

        return $table
            ->columns([

                Tables\Columns\TextColumn::make('data_rate')
                ->visible(function($record){
                    return $record == Roaming::TYPE_DATA ?? true;
                })
                ->suffix('USD/GB'),
                Tables\Columns\TextColumn::make('incoming_rate')
                ->visible(function($record){
                    return $record == Roaming::TYPE_VOICE;
                }),
                Tables\Columns\TextColumn::make('outgoingtolocal_rate')
                ->visible(function($record){
                    return $record == Roaming::TYPE_VOICE;
                }),
                Tables\Columns\TextColumn::make('outgoingtohomecountry_rate')
                ->visible(function($record){
                    return $record == Roaming::TYPE_VOICE;
                }),
                Tables\Columns\TextColumn::make('outgoingtorestoftheworld_rate')
                ->visible(function($record){
                    return $record == Roaming::TYPE_VOICE;
                })
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListRoamings::route('/'),
            'create' => Pages\CreateRoaming::route('/create'),
            'view' => Pages\ViewRoaming::route('/{record}'),
            'edit' => Pages\EditRoaming::route('/{record}/edit'),
        ];
    }
}
