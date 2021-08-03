<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'passport',
        'country',
        'institute',
        'address',
        'dob',
        'gender',
        'url_passport',
        'phone',
        'id_user'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getUser(){
        return $this->belongsTo(User::class,'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getParticipant(){
        return $this->hasMany(Participant::class, 'id_member');
    }
}
