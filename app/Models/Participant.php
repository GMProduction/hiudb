<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_event',
        'status',
        'url_payment',
        'reason_of_reject',
        'id_member'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getMember(){
        return $this->belongsTo(Member::class,'id_member');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getEvent(){
        return $this->belongsTo(Event::class,'id_event');
    }
}
