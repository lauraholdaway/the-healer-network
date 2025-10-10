<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modality extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
    ];

public function practitioner()
    {
        return $this->belongsTo(Practitioner::class, 'practitioner_id', 'id');
    }
}
