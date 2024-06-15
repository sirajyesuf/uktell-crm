<?php

namespace App\Filament\Resources\StaffResource\Pages;

use App\Filament\Resources\StaffResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Mail\StaffCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class CreateStaff extends CreateRecord
{
    protected static string $resource = StaffResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $temporaryPassword = Str::random(6);

        $user  =  static::getModel()::create(array_merge($data,[
            'password' => Hash::make($temporaryPassword)
        ]));


        $superAdmin = Auth()->user();

        Mail::to($user->email)->send(new StaffCreated($superAdmin,$user,$temporaryPassword));
                
        return $user;

    }
}
