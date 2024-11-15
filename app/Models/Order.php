<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relationship with User (One-to-One)
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    // Relationship with Products (Many-to-Many)
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'order_product');
    }

    // Relationship with Staff (Many-to-Many)
    public function staff()
    {
        return $this->belongsToMany('App\Models\Staff', 'order_staff');
    }

    // Relationship with Vehicle (One-to-One)
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }

    // Check if there are ongoing or finished orders
    public function hasOngoingOrders()
    {
        return $this->orders()->whereIn('status', ['Ongoing Service', 'Finished'])->exists();
    }

    // Relationship with Rating (One-to-One)
    public function rating()
    {
        return $this->hasOne(Rating::class);
    }

    // Relationship with OrderFinalization (One-to-One)
    public function finalization()
    {
        return $this->hasOne(OrderFinalization::class);
    }

    // Relationship with CountdownTimer (One-to-One)
    public function countdownTimer()
    {
        return $this->hasOne(CountdownTimer::class);
    }
}
