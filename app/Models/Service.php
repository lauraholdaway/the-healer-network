<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Service extends Model
{
        use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'rate_per_session',
        'currency',
        'ideal_for',
        'session_type',
        'doctor_id',
        'image_url',
    ];
}
