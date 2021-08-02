<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ComiteeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\homeController;
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

Route::get(
    '/',
    function () {
        return view('home');
    }
);
Route::get('/event-now', [homeController::class, 'getNowEvent']);
Route::get('/incoming-event', [homeController::class, 'incomingEvent']);
Route::get('/past-event', [homeController::class, 'pastEvent']);
Route::post('/register-event', [homeController::class, 'registerEvent']);

Route::get('/login',function () {
        return view('login');
    }
);

Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout']);

Route::get(
    '/register-page',
    function () {
        return view('registerPage');
    }
);
Route::post('/register-page', [AuthController::class, 'registerMember']);

Route::get(
    '/user',
    function () {
        return view('user/dashboard');
    }
);


Route::prefix('/admin')->group(function (){
    Route::get('/',function () {
            return view('admin/dashboard');
        }
    );

    Route::prefix('/event')->group(function (){
        Route::get('/',[EventController::class,'index']);
        Route::get('/{id}',[EventController::class,'getDetailEvent'])->name('detail-event');
        Route::post('/{id}/konfirmasi/{participant}', [EventController::class, 'konfirmasi']);
    });

    Route::get('/comitee',[ComiteeController::class,'index']);




Route::get('/admin/member', function () {
    return view('admin/member/member');
});

Route::get('/user/profile', function () {
    return view('user/profil');

});

Route::get('/comitee', function () {
    return view('comitee/dashboard');
});


Route::get(
    '/admin/barang',
    function () {
        return view('admin/barang/barang');
    }
);

Route::get(
    '/admin/guru',
    function () {
        return view('admin/guru/guru');
    }
);

Route::get(
    '/admin/siswa',
    function () {
        return view('admin/siswa/siswa');
    }
);

Route::get(
    '/admin/mapel',
    function () {
        return view('admin/mapel/mapel');
    }
);

Route::get(
    '/admin/laporanpinjaman',
    function () {
        return view('admin/laporan/pinjamalat');
    }
);

Route::post('/register', [AuthController::class, 'register']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'createProduct']);
