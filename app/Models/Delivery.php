<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'subscription_id', 'delivery_date', 'day', 'delivery_status', 'address'
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
