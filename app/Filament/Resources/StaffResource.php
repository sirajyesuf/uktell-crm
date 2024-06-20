<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StaffResource\Pages;
use App\Filament\Resources\StaffResource\RelationManagers;
use App\Models\User as Staff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Pages\Page;
use Filament\Notifications\Notification;
use App\Enums\Role;
use Illuminate\Support\Facades\Auth;



class StaffResource extends Resource
{
    protected static ?string $model = Staff::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $recordTitleAttribute = 'first_name';
    protected static ?int $navigationSort = 1000;
    protected static ?string $label = 'User';
    protected static ?string $navigationLabel = 'User Management';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                ->label('First Name')
                ->required(),

                Forms\Components\TextInput::make('last_name')
                ->label('Last Name')
                ->required(),

                Forms\Components\TextInput::make('email')
                ->unique(Staff::class, 'email', ignoreRecord: true)
                ->label('Email Address')
                ->required(),

                \Ysfkaya\FilamentPhoneInput\Forms\PhoneInput::make('phone_number')
                ->unique(Staff::class, 'phone_number', ignoreRecord: true)
                ->required(),

                Forms\Components\Select::make('role')
                ->required()
                ->options(Role::class),
                Forms\Components\Toggle::make('status')
                ->onColor('success')
                ->offColor('danger')
                ->inline(0)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('first_name')
                ->label('First Name')
                ->searchable(),

                Tables\Columns\TextColumn::make('last_name')
                ->label('Last Name')
                ->searchable(),

                Tables\Columns\TextColumn::make('email')
                ->label('Email Address')
                ->searchable(),

                \Ysfkaya\FilamentPhoneInput\Tables\PhoneColumn::make('phone_number')->displayFormat(\Ysfkaya\FilamentPhoneInput\PhoneInputNumberType::NATIONAL),


                
                Tables\Columns\ToggleColumn::make('status'),

                Tables\Columns\TextColumn::make('role')
                ->badge()
            ])
            ->filters([
                //
            ])
            ->actions([

                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),

                Tables\Actions\Action::make('Suspend')
                ->button()
                ->color('danger')
                ->hidden(fn(Staff $record) => !$record->isActive())
                ->requiresConfirmation()
                ->action(fn(Staff $record) => StaffResource::suspendStaff($record)),

                Tables\Actions\Action::make('Activate')
                ->button()
                ->color('success')
                ->requiresConfirmation()
                ->hidden(fn(Staff $record) => $record->isActive())
                ->action(fn(Staff $record) => StaffResource::activateStaff($record))
            ])
            ->bulkActions([

                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            Pages\ViewStaff::class,
            Pages\EditStaff::class
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
            'index' => Pages\ListStaff::route('/'),
            'create' => Pages\CreateStaff::route('/create'),
            'edit' => Pages\EditStaff::route('/{record}/edit'),
            'view' => Pages\ViewStaff::route('/{record}/view')
        ]; 
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
        ->where('id','!=',Auth::user()->id);
    }


    public static function suspendStaff(Staff $record){


        $record->status = Staff::STATUS_SUSPENDED;
        $record->save();


        Notification::make()
        ->title('Staff suspended.')
        ->success()
        ->send();

    }

    public static function activateStaff(Staff $record){


        $record->status = Staff::STATUS_ACTIVE;
        $record->save();


        Notification::make()
        ->title('Staff activated.')
        ->success()
        ->send();

    }
}
