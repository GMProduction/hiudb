<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'start_date',
        'end_date',
        'event_location',
        'latitude',
        'longitude',
        'description',
        'start_register_date',
        'end_register_date',
        'quota',
        'url_cover',
        'id_comitee',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getComitee(){
        return $this->belongsTo(Comitee::class, 'id_comitee');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getParticipant(){
        return $this->hasMany(Participant::class,'id_event')->orderBy('status','ASC');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getReport(){
        return $this->hasOne(ReportEvent::class,'id_event');
    }
}
