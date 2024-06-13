<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class CreateStaff extends CreateRecord
{
    protected static string $resource = StaffResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $temporaryPassword = Str::random(6);

        $user  =  static::getModel()::create(array_merge($data,[
            'password' => Hash::make($temporaryPassword)
        ]));

        $user->temporaryPassword = $temporaryPassword;
        
        // Mail::to($user->email)->send(new UserRegistered($user,$temporaryPassword));
        
        return $user;

    }
}
