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

        if ($this->request->isMethod('POST')){
            $comite = Comitee::where('id_user','=',Auth::id())->first();

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
                    'id_comitee' => $comite->id

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
                    'id_comitee' => $comite->id,
                ]);
            }
            return redirect('/commitee');
        }
        $event = Event::with('getComitee')->orderByDesc('start_date')->whereHas(
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
