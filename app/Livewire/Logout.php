<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LogoutResponse;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.logout');
    }
}
