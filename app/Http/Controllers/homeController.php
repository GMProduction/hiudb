<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Event;
use App\Models\Member;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class homeController extends CustomController
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        return view('home');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getNowEvent(){
        $event = Event::with(['getParticipant.getMember.getUser'])->where([['start_register_date','<=', date_format($this->now, 'Y-m-d')],['end_register_date','>=', date_format($this->now, 'Y-m-d')]])->orderBy('start_register_date','asc')->first();

        if ($event){
            $participant = Participant::where([['id_event','=',$event->id],['status','=',1]])->get();
            $sold = count($participant);
            $stok = (int) $event->quota - (int)$sold;
            $event = Arr::add($event, 'remaining', $stok);
        }

        return $event;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function incomingEvent(){
        $event = Event::whereDate('start_register_date','>', $this->now->format('Y-m-d'))->get();
        return $event;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function pastEvent(){
        $event = Event::whereDate('end_register_date','<', $this->now)->get();
        return $event;
    }

    /**
     * @param $id
     */
    public function registerEvent(){
//        try {
//
//        }catch (\Exception $er){
//            return $this->jsonResponse(['msg' => $er->getMessage()],500);
//        }
        $participant = Participant::whereHas('getMember', function ($query){
            $query->where('id_user','=',Auth::id());
        })->first();
        if ($participant !== null){
            return response()->json(['msg' => 'Anda sudah mendaftar event ini'], 202);
        }
        $member = Member::where('id_user', '=',Auth::id())->first();
        $image = $this->generateImageName('payment');
        $stringImg = '/images/payment/'.$image;
        $this->uploadImage('payment', $image, 'imagePayment');
        $data = Participant::create([
            'id_event' => $this->request->get('id_event'),
            'url_payment' => $stringImg,
            'status' => 0,
            'id_member' => $member->id
        ]);

        return $this->jsonResponse(['msg' => 'berhasil mendaftar'], 200);
    }

    public function laporan($id){
        $event = Event::with(['getReport','getComitee'])->find($id);
        $participant = Participant::where([['id_event','=',$id],['status','=',1]])->count('*');
        $data = [
          'event' => $event,
          'participant' => $participant
        ];
        return view('laporanEvent')->with($data);
    }
}
