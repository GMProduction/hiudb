<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_event',
        'information',
    ];

}
