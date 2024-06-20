<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roaming extends Model
{
    use HasFactory;

    const TYPE_VOICE = 'voice';
    const TYPE_DATA = 'data';
    const TYPE_SMS = 'sms';
    
    protected $guarded = [];
    
}
