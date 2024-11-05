<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relationship with User
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    // Relationship with Product
    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    // Relationship with Staff
    public function staff()
    {
        return $this->belongsTo('App\Models\Staff', 'staff_id');
    }

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id');
    }

    public function hasOngoingOrders()
{
    return $this->orders()->where('status', 'Ongoing Service', 'Finished')->exists();
}

public function rating()
{
    return $this->hasOne(Rating::class);
}

}
