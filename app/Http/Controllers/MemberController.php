<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Member;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends CustomController
{
    //

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $user = User::with('getMember')->where('role','=','member')->get();
        return view('admin.member.member')->with(['user' => $user]);
    }

    public function cetakPendaftaran($id)
    {
//        return $this->dataPendaftaran($id);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->dataPendaftaran($id))->setPaper('A5', 'potrait');
        return $pdf->stream();
    }

    public function dataPendaftaran($id)
    {
        $member = Member::where('id_user','=', Auth::id())->first();
        $participant = Participant::with(['getEvent.getComitee','getMember'])->where([['id_event','=',$id],['id_member','=',$member->id]])->first();
        return view('user.cetakPendaftaran')->with(['data' => $participant]);
    }
}
