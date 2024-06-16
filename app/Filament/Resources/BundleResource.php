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
use Filament\Resources\Pages\Page;

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
                Forms\Components\TextInput::make('name')
                ->required(),
                Forms\Components\TextInput::make('data_allowance')
                ->integer()
                ->suffix('GB')
                ->required(),
                Forms\Components\TextInput::make('price')
                ->integer()
                ->prefix('GBP')
                ->minValue(0)
                ->required(),
                Forms\Components\TextInput::make('stripe_price_id')
                ->label('Stripe PriceID')
                ->required(),
                Forms\Components\Textarea::make('short_description')
                ->cols(3)
                ->rows(3)
                ->required(),
                Forms\Components\Textarea::make('popupbox_description')
                ->cols(3)
                ->rows(3)
                ->required()
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('data_allowance'),
                Tables\Columns\TextColumn::make('short_description'),
                Tables\Columns\TextColumn::make('popupbox_description'),
                Tables\Columns\TextColumn::make('stripe_price_id')
                ->badge(),
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


    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewBundle::class,
            Pages\EditBundle::class
        ]);
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
