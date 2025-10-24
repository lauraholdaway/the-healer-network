<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rating extends Model
{
            use HasFactory;

    protected $fillable = [
        'doctor_id',
        'user_id',
        'appt_id',
        'msg',
        'rating',
    ];

      public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
      public function doctor()
    {
        return $this->belongsTo(User::class , 'doctor_id');
    }
      public function appt()
    {
        return $this->belongsTo(Appointment::class , 'appt_id');
    }
}
