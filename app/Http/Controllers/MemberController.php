<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function cetakPendaftaran(Request $request)
    {

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->dataPendaftaran($request))->setPaper('A5', 'potrait');
        return $pdf->stream();
    }

    public function dataPendaftaran($id)
    {
     
        return view('user/cetakPendaftaran');
    }
}
