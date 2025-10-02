<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorAvailability extends Model
{
    protected $fillable = ['doctor_id', 'date', 'times'];
    protected $casts = ['times' => 'array'];
}
