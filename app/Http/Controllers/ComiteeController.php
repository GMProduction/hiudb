<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Comitee;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class ComiteeController extends CustomController
{

    /**
     * @return Factory|View|JsonResponse|RedirectResponse|Redirector
     */
    public function index()
    {
        if ($this->request->isMethod('POST')) {
            $field = $this->request->validate(
                [
                    'name'     => 'required',
                    'phone'    => 'required',
                    'password' => 'required|string|confirmed',
                ]
            );
            if ($this->request->get('id')) {
                $fieldEmail = $this->request->validate(
                    [
                        'email' => 'required|string',
                    ]
                );
                $cekEmail = User::where([['id', '!=', $this->request->get('id')], ['email', '=', $fieldEmail['email']]])->first();
                if ($cekEmail) {
                    return response()->json(
                        [
                            "msg" => "The username has already been taken.",
                        ],
                        '201'
                    );
                }
                $user     = User::find($this->request->get('id'));
                $user->update(
                    [
                        'email'    => $fieldEmail['email'],
                    ]
                );
                if (strpos($field['password'], '*') === false) {
                    $user->update(
                        [
                            'password' => Hash::make($field['password']),
                        ]
                    );
                }
                $user->getComitee()->update(
                    [
                        'name'  => $field['name'],
                        'phone' => $field['phone'],
                    ]
                );
            } else {
                $fieldEmail = $this->request->validate(
                    [
                        'email' => 'required|string|unique:users,email',
                        'password' => 'required|string|confirmed',

                    ]
                );
                $user       = User::create(
                    [
                        'email'    => $fieldEmail['email'],
                        'role'     => 'comitee',
                        'password' => Hash::make($fieldEmail['password']),
                    ]
                );

                $comite = $user->getComitee()->create(
                    [
                        'name'  => $field['name'],
                        'phone' => $field['phone'],
                    ]
                );
            }

            return redirect('/admin/comitee');
        }

        $comitee = User::with(['getComitee'])->where('role', '=', 'comitee')->get();

        return view('admin.comitee.comitee')->with(['comitee' => $comitee]);
    }
}
