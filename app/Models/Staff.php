<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    // Relationship with orders (One-to-Many)
    public function orders()
    {
        return $this->hasMany(Order::class, 'staff_id'); // Ensure 'staff_id' matches the foreign key in the orders table
    }

    // Check if the staff member has ongoing orders
    public function hasOngoingOrders()
    {
        return $this->orders()->whereIn('status', ['Ongoing Service', 'Finished'])->exists();
    }

    // Additional relationships if needed, for example with products, services, etc.
}
