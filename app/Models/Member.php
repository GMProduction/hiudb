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
}
