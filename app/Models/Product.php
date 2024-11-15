<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relationship with orders (One-to-Many)
    public function orders()
    {
        return $this->hasMany(Order::class, 'product_id'); // Ensure 'product_id' matches the foreign key in the orders table
    }

    // Check if the product has ongoing or finished orders
    public function hasOngoingOrders()
    {
        return $this->orders()->whereIn('status', ['Ongoing Service', 'Finished'])->exists();
    }

    // Relationship with ratings through orders (Many-to-Many via Order)
    public function ratings()
    {
        return $this->hasManyThrough(Rating::class, Order::class, 'product_id', 'order_id', 'id', 'id');
    }
}
