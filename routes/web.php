<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register-page', function () {
    return view('registerPage');
});

Route::get('/user', function () {
    return view('user/dashboard');
});

Route::get('/admin', function () {
    return view('admin/dashboard');
});

Route::get('/admin/event', function () {
    return view('admin/event/event');
});

Route::get('/admin/comitee', function () {
    return view('admin/comitee/comitee');
});


Route::get('/admin/member', function () {
    return view('admin/member/member');
});

Route::get('/user/profile', function () {
    return view('user/profil');
});

Route::get('/comitee', function () {
    return view('comitee/dashboard');
});

Route::post('/register',[AuthController::class,'register']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'createProduct']);
