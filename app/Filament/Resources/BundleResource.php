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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                

            Wizard::make([

                Wizard\Step::make('General')
                    ->schema([

                        Forms\Components\TextInput::make('name'),
                        Forms\Components\TextInput::make('reference'),
                        Forms\Components\Select::make('validity')
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
                        ->helperText('incl. VAT')
                        ->hint('Sell Price to all your customers.')
                        ->integer()
                        ->minValue(0),

                        Forms\Components\TextInput::make('buy_price')
                        ->hint('The cost to you to provide this service.')
                        ->integer()
                        ->minValue(0),

                        Forms\Components\TextInput::make('stripe_price_id')
                        ->label('Stripe PriceID')
                        
                    ]),

                Wizard\Step::make('AIOD')
                    ->schema([
                        Forms\Components\TextInput::make('data_allowance')
                        ->integer()
                        ->minValue(0),

                        Forms\Components\TextInput::make('intl_voice_allowance')
                        ->integer()
                        ->minValue(0),

                        Forms\Components\TextInput::make('intl_voice_aoid')
                        ,

                        Forms\Components\TextInput::make('data_aoid')
                        ,

                        Forms\Components\TextInput::make('sms_aoid')
                        ,

                        Forms\Components\TextInput::make('voice_aoid')
                        ,

                        Forms\Components\TextInput::make('throttled_data_aoid')


                    ])->columnSpan(2),

            ])->columnSpanFull()
            ->skippable()

        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
