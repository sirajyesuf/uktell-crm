<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Subscription;
use App\Enums\SubscriptionStatus;
class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function subscriptions(){

        return $this->hasMany(Subscription::class);
    }


    public function activeSubscription(){

        return $this->subscriptions()->where('status',SubscriptionStatus::ACTIVE)->first();
    }
}
