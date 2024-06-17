<?php

namespace App\Models;

use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'status' => SubscriptionStatus::class
    ];


    public function bundle(){

        return $this->belongsTo(Bundle::class);
    }

    public function customer(){
        
        return $this->belongsTo(Customer::class);
    }
}
