<?php

namespace App\Http\Controllers;

use App\Helper\CustomController;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends CustomController
{
    //
    public function index(){


        $user = User::with(['getMember.getParticipant.getEvent'])->find(Auth::id());
        return view('user.dashboard')->with(['user' => $user]);
    }

    public function profile(){
        if ($this->request->isMethod('POST')){
            try {
                $fieldMember = $this->request->validate(
                    [
                        'name'         => 'required|string',
                        'dob'          => 'required',
                        'country'      => 'required|string',
                        'institute'    => 'required|string',
                        'gender'       => 'required|string',
                        'passport'     => 'required',
                        'phone'        => 'required',
                        'address'      => 'required',
                    ]
                );

                $user = User::find(Auth::id());
                $dataSave =  [
                    'name'         => $fieldMember['name'],
                    'address'      => $fieldMember['address'],
                    'phone'        => $fieldMember['phone'],
                    'gender'       => $fieldMember['gender'],
                    'country'      => $fieldMember['country'],
                    'institute'    => $fieldMember['institute'],
                    'passport'     => $fieldMember['passport'],
                    'dob'          => $fieldMember['dob'],
                ];

                $imageProfile = $this->request->files->get('image');
                if($imageProfile || $imageProfile != ''){
                    if ($user->getMember->image){
                        if (file_exists('../public'.$user->getMember->image)) {
                            unlink('../public'.$user->getMember->image);
                        }
                    }
                    $image = $this->generateImageName('image');
                    $stringImg = '/images/profile/'.$image;
                    $this->uploadImage('image', $image, 'imageProfile');
                    $dataSave = Arr::add($dataSave, 'image', $stringImg);
                }

                $imageFile = $this->request->files->get('url_passport');
                if($imageFile || $imageFile != ''){
                    if ($user->getMember->url_passport){
                        if (file_exists('../public'.$user->getMember->url_passport)) {
                            unlink('../public'.$user->getMember->url_passport);
                        }
                    }
                    $image = $this->generateImageName('url_passport');
                    $stringImg = '/images/passport/'.$image;
                    $this->uploadImage('url_passport', $image, 'imagePassport');
                    $dataSave = Arr::add($dataSave, 'url_passport', $stringImg);
                }
                $user->getMember->update($dataSave);
                return $this->jsonResponse(['msg' => 'berhasil merubah data'], 200);
            }catch (\Exception $err){
                return $this->jsonResponse(['msg' => $err->getMessage()], 500);
            }
        }
        $profil = User::with('getMember')->find(Auth::id());
        return view('user.profil')->with(['user' => $profil]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function editAccount(){
        $field = $this->request->validate(
            [
                'email'    => 'required|string',
                'password' => 'required|string|confirmed',
            ]
        );
        $cekEmail = User::where([['id', '!=', Auth::id()], ['email', '=', $field['email']]])->first();
        if ($cekEmail) {
            return response()->json(
                [
                    "msg" => "The email has already been taken.",
                ],
                '201'
            );
        }
        $user     = User::find(Auth::id());
        $user->update(
            [
                'email'    => $field['email'],
            ]
        );
        if (strpos($field['password'], '*') === false) {
            $user->update(
                [
                    'password' => Hash::make($field['password']),
                ]
            );
        }
        return $this->jsonResponse(['msg' => 'berhasil merubah account'], 200);

    }
}
