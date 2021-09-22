<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Comitee;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class EventController extends CustomController
{
    //
    public function index(){

        if ($this->request->isMethod('POST')){
            if ($this->request->get('id')){
                $event = Event::find($this->request->get('id'));
                $dataSave = [
                    'event_name' => $this->request->get('event_name'),
                    'start_date' => $this->request->get('start_date'),
                    'end_date' => $this->request->get('end_date'),
                    'event_location' => $this->request->get('event_location'),
                    'description' => $this->request->get('description'),
                    'start_register_date' => $this->request->get('start_register_date'),
                    'end_register_date' => $this->request->get('end_register_date'),
                    'quota' => $this->request->get('quota'),
                    'id_comitee' => $this->request->get('id_comitee'),
                ];
                $imageFile = $this->request->files->get('url_cover');
                if($imageFile || $imageFile != ''){
                    if ($event->url_cover){
                        if (file_exists('../public'.$event->url_cover)) {
                            unlink('../public'.$event->url_cover);
                        }
                    }
                    $image = $this->generateImageName('url_cover');
                    $stringImg = '/images/event/'.$image;
                    $this->uploadImage('url_cover', $image, 'imageEvent');
                    $dataSave = Arr::add($dataSave, 'url_cover', $stringImg);
                }
                $event->update($dataSave);

            }else{
                $image = $this->generateImageName('url_cover');
                $stringImg = '/images/event/'.$image;
                $this->uploadImage('url_cover', $image, 'imageEvent');
                Event::create([
                    'event_name' => $this->request->get('event_name'),
                    'start_date' => $this->request->get('start_date'),
                    'end_date' => $this->request->get('end_date'),
                    'event_location' => $this->request->get('event_location'),
                    'description' => $this->request->get('description'),
                    'start_register_date' => $this->request->get('start_register_date'),
                    'end_register_date' => $this->request->get('end_register_date'),
                    'quota' => $this->request->get('quota'),
                    'url_cover' => $stringImg,
                    'id_comitee' => $this->request->get('id_comitee'),
                ]);
            }
            return redirect('/admin/event');
        }

        $event = Event::orderByDesc('start_date')->get();
        $comitee = Comitee::all();
        $dataEvent = [];

        if ($event){
            foreach ($event as $key => $e){
                $dataEvent[$key] = $e;
                $participant = Participant::where([['id_event','=',$e->id],['status','=',1]])->get();
                $sold = count($participant);
                $stok = (int) $e->quota - (int)$sold;
                $dataEvent[$key] = Arr::add($e, 'remaining', $stok);
                if ($e->start_date > $this->now->format('Y-m-d')){
                    if ($e->start_register_date <=  $this->now->format('Y-m-d') && $e->end_register_date >= $this->now->format('Y-m-d')){
                        Arr::set($dataEvent[$key], 'status', 'Registration');
                    }else{
                        Arr::set($dataEvent[$key], 'status', 'Incoming Event');
                    }
                }elseif ($e->start_date <= $this->now->format('Y-m-d') && $e->end_date >= $this->now->format('Y-m-d')){
                    Arr::set($dataEvent[$key],'status', 'Ongoing Event');
                }else{
                    Arr::set($dataEvent[$key],'status', 'Past Event');
                }
            }
        }
        return view('admin.event.event')->with(['event' => $event, 'comitee' => $comitee]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getDetailEvent($id){
        $event = Event::with(['getParticipant.getMember.getUser'])->find($id);
        if ($event){
            $participant = Participant::where([['id_event','=',$event->id],['status','=',1]])->get();
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
            $alasan = $this->request->get('alasan') == '' ? null : $this->request->get('alasan');
            $participant->update([
                'status' => $status,
                'reason_of_reject' => $alasan
            ]);
            return $this->jsonResponse(['msg' => 'berhasil']);
        }catch (\Exception $err){
            return $this->jsonResponse(['msg' => $err->getMessage()], 500);

        }

    }

    function delete($id){
        $event = Event::find($id);
        if ($event->url_cover){
            if (file_exists('../public'.$event->url_cover)) {
                unlink('../public'.$event->url_cover);
            }
        }
        Event::destroy($id);
        return response()->json('success');
    }
}
