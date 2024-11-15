<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function orders()
{
    return $this->hasMany(Order::class, 'product_id'); // Ensure 'product_id' matches the foreign key in the orders table
}

public function hasOngoingOrders()
{
    return $this->orders()->where('status', 'Ongoing Service', 'Finished')->exists();
}

// In Product.php model
public function ratings()
{
    return $this->hasManyThrough(Rating::class, Order::class, 'product_id', 'order_id', 'id', 'id');
}



}
