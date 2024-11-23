<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFinalization extends Model
{
    use HasFactory;

    // Add staff, vehicle, and size to the fillable array
    protected $fillable = ['order_id', 'total_price', 'description', 'staff', 'vehicle', 'size'];

    // Define the relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
