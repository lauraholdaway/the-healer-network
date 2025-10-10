<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
     protected $fillable = [
        'user_id',
        'doctor_id',
        'date',
        'time',
        'status',
        'session',
        'payment_id',
        'payment',
        'currency',
        'replay',
        'Zomemeting',
        'rating',
        'email',
        'name',
        'country',
        'zoom_join_url',
        'zoom_start_url',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function doctorpackage()
    {
        return $this->hasOne(DoctorPackage::class, 'id', 'session');
    }
}
