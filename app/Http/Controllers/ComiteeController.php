<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Comitee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ComiteeController extends CustomController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function index(){
        if ($this->request->isMethod('POST')){
            $field = $this->request->validate([
               'name' => 'required',
               'email' => 'required|string|unique:users,email',
               'password' => 'required|string|confirmed',
               'phone' => 'required',
            ]);
            $user = User::create([
                'email' => $field['email'],
                'role'     => 'comitee',
                'password' => Hash::make($field['password']),
            ]);

            $comite = $user->getComitee()->create([
                'name' => $field['name'],
                'phone' => $field['phone'],
            ]);

            return redirect('/admin/comitee');
        }

        $comitee = User::with(['getComitee'])->where('role','=','comitee')->get();
        return view('admin.comitee.comitee')->with(['comitee' => $comitee]);
    }
}
