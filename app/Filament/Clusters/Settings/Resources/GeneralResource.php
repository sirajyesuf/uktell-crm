<?php

namespace App\Filament\Clusters\Settings\Resources;

use App\Filament\Clusters\Settings;
use App\Filament\Clusters\Settings\Resources\GeneralResource\Pages;
use App\Filament\Clusters\Settings\Resources\GeneralResource\RelationManagers;
use App\Models\General;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Nnjeim\World\World;
use Illuminate\Support\Facades\DB;

class GeneralResource extends Resource
{
    protected static ?string $model = General::class;

    protected static ?string $navigationIcon = null;

    protected static ?string $cluster = Settings::class;

    public static function form(Form $form): Form
    {

        $country = DB::table('countries')->get()->pluck('name','name');
        $currencies = DB::table('currencies')->get()->pluck('code','name');

        return $form
            ->schema([

                    Forms\Components\Select::make('home_country')
                    ->searchable()
                    ->preload()
                    ->options($country)
                    ->columnSpan(1),

                    Forms\Components\Select::make('currency')
                    ->searchable()
                    ->preload()
                    ->options($currencies)
                    ->columnSpan(1),
                
                forms\Components\Section::make('Rate')
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

                ])->columnSpan(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->paginated(false)
            ->columns([
                Tables\Columns\TextColumn::make('data_rate')
                ->suffix(' USD/GB'),
                Tables\Columns\TextColumn::make('voice_rate')
                 ->suffix(' USD/MIN'),
                Tables\Columns\TextColumn::make('sms_rate')
                ->suffix(' USD/SMS'),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListGenerals::route('/'),
            'create' => Pages\CreateGeneral::route('/create'),
            // 'view' => Pages\ViewGeneral::route('/{record}'),
            'edit' => Pages\EditGeneral::route('/{record}/edit'),
        ];
    }
}
