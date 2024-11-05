<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'vehicle_id');
    }

    protected $casts = [
        'sizes' => 'array', // This assumes sizes is stored as JSON in the database
    ];

    public function setSizesAttribute($value)
    {
        // Remove special characters from each size and ensure it's an array
        $cleanedSizes = array_map(function($size) {
            return preg_replace('/[^a-zA-Z0-9]/', '', $size); // Keep only alphanumeric characters
        }, (array) $value);
        
        $this->attributes['sizes'] = json_encode(array_values(array_filter($cleanedSizes))); // Store as JSON
    }
}
