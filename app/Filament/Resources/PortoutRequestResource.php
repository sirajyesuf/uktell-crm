<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PortoutRequestResource\Pages;
use App\Filament\Resources\PortoutRequestResource\RelationManagers;
use App\Models\PortoutRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PortoutRequestResource extends Resource
{
    // protected static ?string $model = PortoutRequest::class;
    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationIcon = 'zondicon-dial-pad';
    protected static ?string $navigationGroup = 'Requests';
    protected static ?int $navigationSort = 3;

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
            'index' => Pages\ListPortoutRequests::route('#'),
            // 'create' => Pages\CreatePortoutRequest::route('/create'),
            // 'view' => Pages\ViewPortoutRequest::route('/{record}'),
            // 'edit' => Pages\EditPortoutRequest::route('/{record}/edit'),
        ];
    }
}
