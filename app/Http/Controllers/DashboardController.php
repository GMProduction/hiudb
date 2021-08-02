<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Event;
use App\Models\Participant;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DashboardController extends CustomController
{
    //

    public function index(){
        $event = Event::with(['getParticipant.getMember.getUser'])->where([['start_register_date','<=', date_format($this->now, 'Y-m-d')],['end_register_date','>=', date_format($this->now, 'Y-m-d')]])->orderBy('start_register_date','asc')->first();
//        return $event;
        if ($event){
            $participant = Participant::where([['id_event','=',$event->id],['status','=',1]])->get();
            $sold = count($participant);
            $stok = (int) $event->quota - (int)$sold;
            $event = Arr::add($event, 'remaining', $stok);
        }
        return view('admin.dashboard')->with(['event' => $event]);
    }
}
