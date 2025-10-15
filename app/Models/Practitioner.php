<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // extend Authenticatable if login needed
use Illuminate\Notifications\Notifiable;

class Practitioner extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'practitioners';
    protected $fillable = [
        'user_id',
        'primary_contact_number',
        'mobile_number',
        'address',
        'social_media_handle',
        'modalities',
        'practice_location',
        'about',
        'practicing_since',
        'clients_per_month',
        'free_trial_sessions',
        'happy_to_provide_free_session',
        'referred_by',
        'price',
        'website',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function modalities()
    {
        return $this->belongsToMany(Modality::class, 'modalitypivots', 'practitioner_id', 'modality_id');
    }
}
