<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountdownTimer extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'countdown_ends_at',
    ];

    /**
     * Define the relationship with the Order model.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
