<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('beranda');

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/', function () {
        return view('profil.tentang');
    })->name('index');

    Route::get('/tentang', function () {
        return view('profil.tentang');
    })->name('tentang');

    Route::get('/visi-misi', function () {
        return view('profil.visi-misi');
    })->name('visi-misi');

    Route::get('/sejarah', function () {
        return view('profil.sejarah');
    })->name('sejarah');

    Route::get('/struktur-organisasi', function () {
        return view('profil.struktur');
    })->name('struktur');

    Route::get('/guru-staf', function () {
        return view('profil.guru');
    })->name('guru');

    Route::get('/fasilitas', function () {
        return view('profil.fasilitas');
    })->name('fasilitas');

    Route::get('/prestasi', function () {
        return view('profil.prestasi');
    })->name('prestasi');

    Route::get('/kerjasama', function () {
        return view('profil.kerjasama');
    })->name('kerjasama');

    Route::get('/dokumen', function () {
        return view('profil.dokumen');
    })->name('dokumen');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
