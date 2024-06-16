<?php

namespace App\Filament\Resources;

use App\Enums\BundleCategory;
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
use Filament\Resources\Pages\Page;


class AddonResource extends Resource
{
    protected static ?string $model = Addon::class;

    protected static ?string $navigationIcon = 'heroicon-c-bolt';
    protected static ?string $navigationGroup = 'Plans';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required(),
                Forms\Components\TextInput::make('price')
                ->integer()
                ->prefix('GBP')
                ->minValue(0)
                ->required(),
                Forms\Components\TextInput::make('stripe_price_id')
                ->label('Stripe PriceID')
                ->required(),
                Forms\Components\Select::make('category')
                ->options(BundleCategory::class),

                Forms\Components\Textarea::make('short_description')
                ->cols(3)
                ->rows(3)
                ->required(),
                Forms\Components\Textarea::make('popupbox_description')
                ->cols(3)
                ->rows(3)
                ->required()
            ]);

    }    public static function option(): array
    {
        $keyValueArray = [];
        foreach (self::cases() as $case) {
            $keyValueArray[$case->name] = $case->value;
        }

        return $keyValueArray;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->searchable(),
                Tables\Columns\TextColumn::make('price'),
                Tables\Columns\TextColumn::make('stripe_price_id'),
                Tables\Columns\TextColumn::make('short_description'),
                Tables\Columns\TextColumn::make('popupbox_description'),
                Tables\Columns\TextColumn::make('category')
                ->badge(),



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



    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewAddon::class,
            Pages\EditAddon::class
        ]);
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
