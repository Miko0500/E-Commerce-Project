<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walkin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'status',
        'staff_id',
        'vehicle_id',
        'size',
        'service_datetime',
        'isPriority',
    ];

    // Optionally, define relationships (if any)
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
