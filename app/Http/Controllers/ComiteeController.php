<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComiteeController extends Controller
{
    //
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        return view('admin.comitee.comitee');
    }
}
