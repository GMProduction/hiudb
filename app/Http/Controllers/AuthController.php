<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends CustomController
{
    //
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerMember()
    {
        $fieldUser = $this->request->validate(
            [
                'email'    => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed',
            ]
        );

        $fieldMember = $this->request->validate(
            [
                'name'         => 'required|string',
                'dob'          => 'required',
                'country'      => 'required|string',
                'institute'    => 'required|string',
                'gender'       => 'required|string',
                'passport'     => 'required',
                'url_passport' => 'required',
                'phone'        => 'required',
                'address'      => 'required',
            ]
        );

        $user = User::create(
            [
                'email'    => $fieldUser['email'],
                'role'     => 'member',
                'password' => Hash::make($fieldUser['password']),
            ]
        );
        $image = $this->generateImageName('url_passport');
        $stringImg = '/images/passport/'.$image;
        $this->uploadImage('url_passport', $image, 'imagePassport');
        $member = $user->getMember()->create(
            [
                'name'         => $fieldMember['name'],
                'address'      => $fieldMember['address'],
                'phone'        => $fieldMember['phone'],
                'gender'       => $fieldMember['gender'],
                'country'      => $fieldMember['country'],
                'institute'    => $fieldMember['institute'],
                'passport'     => $fieldMember['passport'],
                'dob'          => $fieldMember['dob'],
                'url_passport' => $stringImg,
            ]
        );

        return $this->jsonResponse(['msg' => 'berhasil mendaftar'], 200);

    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(){
        $credentials = [
            'email' => $this->request->get('email'),
            'password' => $this->request->get('password'),
        ];
        if ($this->isAuth($credentials)) {
            $redirect = '/';

            if (Auth::user()->role === 'admin'){
                $redirect = '/admin';
            }

            return redirect($redirect);
        }

        return redirect()->back()->withInput()->with('failed', 'Periksa Kembali Username dan Password Anda');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(){
        Auth::logout();

        return redirect('/');
    }

}
