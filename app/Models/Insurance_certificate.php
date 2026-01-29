<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance_certificate extends Model
{
    protected $fillable = ['doctor_id', 'title', 'certificate'];
}
