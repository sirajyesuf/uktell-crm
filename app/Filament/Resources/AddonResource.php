<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddonResource\Pages;
use App\Filament\Resources\AddonResource\RelationManagers;
use App\Models\Addon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Wizard; 
use App\Enums\BundleValidity;
use Nnjeim\World\World;

class AddonResource extends Resource
{
    protected static ?string $model = Addon::class;

    protected static ?string $navigationIcon = 'iconpark-addone';
    protected static ?string $navigationGroup = 'Plans';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {

        $world = World::countries()->data;

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

                    Wizard\Step::make('region')
                    ->schema([
                        Forms\Components\Select::make('region')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->options($world->pluck('name','name'))
                    ]),

                    Wizard\Step::make('locations')
                    ->schema([
                        Forms\Components\Select::make('locations')
                        ->required()
                        ->multiple()
                        ->searchable()
                        ->preload()
                        ->options($world->pluck('name','name'))
                    ])

            ])->columnSpanFull()
            ->skippable()
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('label'),
                Tables\Columns\TextColumn::make('sell_price'),
                Tables\Columns\TextColumn::make('buy_price'),
                Tables\Columns\TextColumn::make('validity'),
                Tables\Columns\TextColumn::make('voice_allowance'),
                Tables\Columns\TextColumn::make('sms_allowance'),
                Tables\Columns\TextColumn::make('data_allowance'),
                Tables\Columns\TextColumn::make('region')
                ->badge()

            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListAddons::route('/'),
            'create' => Pages\CreateAddon::route('/create'),
            'view' => Pages\ViewAddon::route('/{record}'),
            'edit' => Pages\EditAddon::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
