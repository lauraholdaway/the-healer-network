<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorPackage extends Model
{
     protected $fillable = ['doctor_id', 'price', 'type' ,'time'];
}
