<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EventController extends CustomController
{
    //
    public function index(){
        $event = Event::all();
        $dataEvent = [];

        if ($event){
            foreach ($event as $key => $e){
                $dataEvent[$key] = $e;
                $participant = Participant::where('id_event','=',$e->id)->get();
                $sold = count($participant);
                $stok = (int) $e->quota - (int)$sold;
                $dataEvent[$key] = Arr::add($e, 'remaining', $stok);
            }
        }
        return view('admin.event.event')->with(['event' => $event]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getDetailEvent($id){
        $event = Event::with(['getParticipant.getMember.getUser'])->find($id);
        if ($event){
            $participant = Participant::where('id_event','=',$event->id)->get();
            $sold = count($participant);
            $stok = (int) $event->quota - (int)$sold;
            $event = Arr::add($event, 'remaining', $stok);
        }
        return $event;
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function konfirmasi($id,$participant){
        try {
            $participant = Participant::where([['id_event','=',$id],['id','=',$participant]])->first();
            if (!$participant){
                return $this->jsonResponse(['msg' => 'Data tidak ditemukan'],202);

            }
            $status = $this->request->get('status');
            $alasan = $this->request->get('alasan') ?? null;
            $participant->update([
                'status' => $status,
                'reason_of_reject' => $alasan
            ]);
            return $this->jsonResponse(['msg' => 'berhasil']);
        }catch (\Exception $err){
            return $this->jsonResponse(['msg' => $err->getMessage()], 500);

        }

    }
}
