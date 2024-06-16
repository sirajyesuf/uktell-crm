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
                ->required()
                ->maxLength(255)
                ->autofocus();        
    }


    protected function getLastNameFormComponent(): Component
    {
        return TextInput::make('last_name')
                ->required()
                ->maxLength(255);
    }

    protected function getPhoneNumberFormComponent(): Component
    {
        return \Ysfkaya\FilamentPhoneInput\Forms\PhoneInput::make('phone_number')
        ->unique(Staff::class, 'phone_number', ignoreRecord: true)
        ->required();
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return TextInput::make('passwordConfirmation')
            ->label(__('filament-panels::pages/auth/edit-profile.form.password_confirmation.label'))
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->required()
            ->dehydrated(false);
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
