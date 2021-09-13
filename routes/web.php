<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ComiteeController;
use App\Http\Controllers\DashboardComiteeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\MemberController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Comitee;
use App\Http\Middleware\Member;
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

Route::get('/laporan-event/{id}',[homeController::class,'laporan']);

Route::get(
    '/about-us',
    function () {
        return view('tentang');
    }
);

Route::get('/event-now', [homeController::class, 'getNowEvent']);
Route::get('/incoming-event', [homeController::class, 'incomingEvent']);
Route::get('/past-event', [homeController::class, 'pastEvent']);
Route::post('/register-event', [homeController::class, 'registerEvent']);

Route::get(
    '/login',
    function () {
        return view('login');
    }
);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get(
    '/register-page',
    function () {
        return view('registerPage');
    }
);
Route::post('/register-page', [AuthController::class, 'registerMember']);



Route::prefix('/admin')->middleware(Admin::class)->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::prefix('/event')->group(
        function () {
            Route::get('/', [EventController::class, 'index']);
            Route::post('/', [EventController::class, 'index']);
            Route::get('/{id}', [EventController::class, 'getDetailEvent'])->name('detail-event');
            Route::get('/{id}/delete', [EventController::class, 'delete']);
            Route::post('/{id}/konfirmasi/{participant}', [EventController::class, 'konfirmasi']);
        }
    );


    Route::get('/commitee', [ComiteeController::class, 'index']);
    Route::post('/commitee', [ComiteeController::class, 'index']);

    Route::get('/member', [MemberController::class, 'index']);
});


Route::prefix('/user')->middleware(Member::class)->group(function () {
    Route::get('/', [DashboardUserController::class, 'index']);
    Route::post('/chgange-payment/{id}', [DashboardUserController::class, 'changePayment']);
    Route::post('/repair/{id}', [DashboardUserController::class, 'repair']);
    Route::post('/profile/account', [DashboardUserController::class, 'editAccount']);
    Route::match(['post', 'get'], '/profile', [DashboardUserController::class, 'profile']);
    Route::get('/cetakPendaftaran/{id}', [MemberController::class, 'cetakPendaftaran'])->name('cetakPendaftaran');
});

Route::prefix('/commitee')->middleware(Comitee::class)->group(function () {
    Route::match(['post', 'get'], '/', [DashboardComiteeController::class, 'index']);
    Route::get('/event/{id}', [DashboardComiteeController::class, 'getParticipant']);
    Route::post('/event/report/{id}', [DashboardComiteeController::class, 'reportEvent']);
});




Route::post('/register', [AuthController::class, 'register']);
Route::get(
    '/cetak',
    function () {
        return view('user/cetakPendaftaran');
    }
);
