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
        'type',
        'payment_method',
        'zip',
        'timezone',
    ];

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
    public function doctorDetails()
    {
        return $this->belongsTo(Practitioner::class, 'doctor_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctorpackage()
    {
        return $this->hasOne(DoctorPackage::class, 'id', 'session');
    }
    public function rating()
    {
        return $this->hasOne(Rating::class, 'appt_id', 'id');
    }
}
