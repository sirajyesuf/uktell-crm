<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BundleResource\Pages;
use App\Filament\Resources\BundleResource\RelationManagers;
use App\Models\Bundle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Wizard; 
use App\Enums\BundleValidity;
class BundleResource extends Resource
{
    protected static ?string $model = Bundle::class;

    protected static ?string $navigationIcon = 'feathericon-package';
    protected static ?string $navigationGroup = 'Plans';
    protected static ?int $navigationSort = 1;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                

            Wizard::make([

                Wizard\Step::make('General')
                    ->schema([

                        Forms\Components\TextInput::make('name')
                        ->required(),
                        Forms\Components\TextInput::make('label')
                        ->required(),
                        Forms\Components\Select::make('validity')
                        ->required()
                        ->options(BundleValidity::option())
                        
                    ]),

                Wizard\Step::make('Details')
                    ->schema([
                        Forms\Components\Repeater::make('features')
                        ->schema([
                            Forms\Components\TextInput::make('feature')->required(),
                        ])
                        ->addActionLabel('Add Feature')
                    ]),

                Wizard\Step::make('Pricing')
                    ->schema([
                        Forms\Components\TextInput::make('sell_price')
                        ->required()
                        ->helperText('incl. VAT')
                        ->hint('Sell Price to all your customers.')
                        ->integer()
                        ->minValue(0),

                        Forms\Components\TextInput::make('buy_price')
                        ->required()
                        ->hint('The cost to you to provide this service.')
                        ->integer()
                        ->minValue(0)
                    ]),

                Wizard\Step::make('Voice')
                    ->schema([

                        Forms\Components\TextInput::make('voice_allowance')
                        ->required()
                        ->integer()
                        ->minValue(0),

                    ]),

                    Wizard\Step::make('Text')
                    ->schema([
                        Forms\Components\TextInput::make('sms_allowance')
                        ->integer()
                        ->minValue(0)
                        ->required()
                    ]),

                    Wizard\Step::make('Data')
                    ->schema([
                        Forms\Components\TextInput::make('data_allowance')
                        ->required()
                        ->integer()
                        ->minValue(0),
                    ]),

            ])->columnSpanFull()
            ->skippable()
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('label'),
                Tables\Columns\TextColumn::make('reference'),
                Tables\Columns\TextColumn::make('sell_price'),
                Tables\Columns\TextColumn::make('buy_price'),
                Tables\Columns\TextColumn::make('validity'),
                Tables\Columns\TextColumn::make('voice_allowance'),
                Tables\Columns\TextColumn::make('sms_allowance'),
                Tables\Columns\TextColumn::make('data_allowance'),
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
            'index' => Pages\ListBundles::route('/'),
            'create' => Pages\CreateBundle::route('/create'),
            'view' => Pages\ViewBundle::route('/{record}'),
            'edit' => Pages\EditBundle::route('/{record}/edit'),
        ];
    }
}
