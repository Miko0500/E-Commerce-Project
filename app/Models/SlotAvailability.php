<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlotAvailability extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name is the plural form of the model)
    protected $table = 'slot_availability';

    // Define the fillable columns (optional if using mass assignment)
    protected $fillable = ['status'];
}
