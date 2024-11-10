<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFinalization extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'total_price', 'description'];

    // Define the relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    
}
