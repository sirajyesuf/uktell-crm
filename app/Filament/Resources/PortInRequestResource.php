<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortInRequestResource\Pages;
use App\Filament\Resources\PortInRequestResource\RelationManagers;
use App\Models\PortInRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortInRequestResource extends Resource
{
    // protected static ?string $model = PortInRequest::class;

    protected static ?string $navigationIcon = 'zondicon-dial-pad';
    protected static ?string $navigationGroup = 'Requests';
    protected static ?int $navigationSort = 2;



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
                //
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
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
            'index' => Pages\ListPortInRequests::route('/'),
            // 'create' => Pages\CreatePortInRequest::route('/create'),
            // 'view' => Pages\ViewPortInRequest::route('/{record}'),
            // 'edit' => Pages\EditPortInRequest::route('/{record}/edit'),
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
