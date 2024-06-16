<?php

namespace App\Filament\Pages;

use Filament\Pages\Auth\EditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Component;
use App\Models\User as Staff;

class MyProfile extends EditProfile
{
    protected function getNameFormComponent(): Component
    {
        return TextInput::make('first_name')
                ->label('First Name')
                ->required()
                ->maxLength(255)
                ->autofocus();        
    }


    protected function getLastNameFormComponent(): Component
    {
        return TextInput::make('last_name')
                ->label('Last Name')
                ->required()
                ->maxLength(255);
    }

    protected function getPhoneNumberFormComponent(): Component
    {
        return \Ysfkaya\FilamentPhoneInput\Forms\PhoneInput::make('phone_number')
        ->label('Phone Number')
        ->unique(Staff::class, 'phone_number', ignoreRecord: true)
        ->required();
    }

    
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->getNameFormComponent(),
                        $this->getLastNameFormComponent(),
                        $this->getEmailFormComponent(),
                        $this->getPhoneNumberFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->columns(2)
                    ->operation('edit')
                    ->model($this->getUser())
                    ->statePath('data')
            ),
        ];
    }
}
