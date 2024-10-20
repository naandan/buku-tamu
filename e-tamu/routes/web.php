<?php

use App\Models\Tamu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TamuController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index',[
        'title' => 'Buku Tamu'
    ]);
})->name('index');

Route::get('/grafik', function () {
    return view('grafik',[
        'title' => 'Buku Tamu',
        'semua' => Tamu::all()->count(),
        'smk' => Tamu::where('instansi', 'like', '%smk%')->count(),
        'sma' => Tamu::where('instansi', 'like', '%sma%')->count(),
        'lain' => Tamu::where('instansi', 'not like', '%sma%')->where('instansi', 'not like', '%smk%')->count(),
    ]);
})->name('grafik');

Route::get('/data', function () {
    return view('data',[
        'title' => 'Buku Tamu',
        'tamus' => Tamu::where('created_at', 'like', '%'.now()->format('Y-m-d').'%')->get()
    ]);
})->name('data');

Route::get('/result', function () {
    return view('result',[
        'title' => 'Buku Tamu',
        'semua' => Tamu::all()->count(),
        'smk' => Tamu::where('instansi', 'like', '%smk%')->count(),
        'sma' => Tamu::where('instansi', 'like', '%sma%')->count(),
        'lain' => Tamu::where('instansi', 'not like', '%sma%')->where('instansi', 'not like', '%smk%')->count(),
    ]);
})->name('result');

Route::post('/', [TamuController::class, 'store'])->name('store');



Route::get('/admin', [TamuController::class, 'index'])->name('admin')->middleware('auth');
Route::get('/admin/data', [TamuController::class, 'data'])->name('admin_data')->middleware('auth');
Route::post('/admin/data', [TamuController::class, 'data'])->name('admin_data')->middleware('auth');

Route::get('/login', function () {
    return view('auth.login',[
        'title' => 'Buku Tamu'
    ]);
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

