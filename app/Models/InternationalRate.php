<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternationalRate extends Model
{
    use HasFactory;
    const TYPE_VOICE = 'voice';
    const TYPE_SMS = 'sms';

    protected $guarded = [];
}
