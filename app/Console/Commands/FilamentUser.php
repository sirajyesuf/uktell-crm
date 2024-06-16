<?php

namespace App\Console\Commands;

use App\Enums\Role;
use Illuminate\Console\Command;
use Filament\Commands\MakeUserCommand;
use function Laravel\Prompts\password;
use function Laravel\Prompts\text;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;


class FilamentUser extends MakeUserCommand
{

    protected $signature = 'make:filament-user
    {--first_name= : The first name of the user}
    {--last_name= : The  last name of the user}
    {--email= : A valid and unique email address}
    {--phone_number= : A valid and unique phone number}
    {--password= : The password for the user (min. 8 characters)}'
    
    
    ;

    protected function getUserData(): array
    {
        return [
            'first_name' => $this->options['first_name'] ?? text(
                label: 'First Name',
                required: true,
            ),

            'last_name' => $this->options['last_name'] ?? text(
                label: 'Last Name',
                required: true,
            ),

            'email' => $this->options['email'] ?? text(
                label: 'Email address',
                required: true,
                validate: fn (string $email): ?string => match (true) {
                    ! filter_var($email, FILTER_VALIDATE_EMAIL) => 'The email address must be valid.',
                    static::getUserModel()::where('email', $email)->exists() => 'A user with this email address already exists',
                    default => null,
                },
            ),

            'phone_number' => $this->options['phone_number'] ?? text(
                label: 'Phone Number',
                required: true,
                validate: fn (string $phone_number): ?string => match (true) {
                    static::getUserModel()::where('email', $phone_number)->exists() => 'A user with this phone number already exists',
                    default => null,
                },
            ),

            'password' => Hash::make($this->options['password'] ?? password(
                label: 'Password',
                required: true,
            )),

        ];
    }

    protected function createUser(): Authenticatable
    {
        return static::getUserModel()::create(array_merge($this->getUserData(),['role'=>Role::ADMIN->value]));
    }
}
