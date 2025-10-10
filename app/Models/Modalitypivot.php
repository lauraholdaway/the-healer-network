<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modalitypivot extends Model
{
    protected $fillable = [
        'practitioner_id',
        'modality_id',
    ];


}
