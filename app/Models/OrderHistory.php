<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $table = 'order_history';

    protected $fillable = [
        'user_id', 'subscription_id', 'meal_plan_snapshot', 'payment_id', 'ordered_at'
    ];

    protected $casts = [
        'meal_plan_snapshot' => 'array',
        'ordered_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
