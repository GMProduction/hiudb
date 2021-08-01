<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function getComitee(){
        return $this->belongsTo(Comitee::class, 'id_comitee');
    }
}
