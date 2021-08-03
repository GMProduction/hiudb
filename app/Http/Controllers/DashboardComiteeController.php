<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Comitee;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class DashboardComiteeController extends CustomController
{
    //
    public function index()
    {
//        $event = Comitee::with(['getEvent'])->where('id_user', '=', Auth::id())->first();
        $event = Event::with('getComitee')->whereHas(
            'getComitee',
            function ($query) {
                return $query->where('id_user', '=', Auth::id());
            }
        )->get();
        if ($event) {
            foreach ($event as $key => $e) {
                $dataEvent[$key] = $e;
                $participant     = Participant::where([['id_event', '=', $e->id], ['status', '=', 1]])->get();
                $sold            = count($participant);
                $stok            = (int)$e->quota - (int)$sold;
                $dataEvent[$key] = Arr::add($e, 'remaining', $stok);
            }
        }

        return view('comitee.dashboard')->with(['event' => $event]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getParticipant($id)
    {
        $event = Event::with(['getParticipant.getMember.getUser','getReport'])->find($id);
        if ($event) {
            $participant = Participant::where([['id_event', '=', $event->id], ['status', '=', 1]])->get();
            $sold        = count($participant);
            $stok        = (int)$event->quota - (int)$sold;
            $event       = Arr::add($event, 'remaining', $stok);
        }

        return $event;
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function reportEvent($id){
        $event = Event::find($id);
        $field = $this->request->validate([
            'information' => 'required'
        ]);

        if ($this->request->get('id_report')){
            $event->getReport()->update([
                'information' => $field['information']
            ]);
        }else{
            $event->getReport()->create([
                'information' => $field['information']
            ]);
        }
        return $this->jsonResponse(['msg' => 'berhasil']);
    }
}
