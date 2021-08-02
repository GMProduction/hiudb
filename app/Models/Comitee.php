<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comitee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'id_user'
    ];
}
