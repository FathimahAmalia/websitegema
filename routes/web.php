<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;
use App\Http\Controllers\Admin\EkstrakurikulerController as AdminEkstrakurikulerController;
use App\Http\Controllers\Admin\PrestasiController as AdminPrestasiController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\Admin\PesanController as AdminPesanController;

/*
|--------------------------------------------------------------------------
| Web Routes - SMK Gema Cyber School
|--------------------------------------------------------------------------
*/

// Public Frontend Routes
Route::get('/', function () {
    return view('welcome');
})->name('beranda');

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/jurusan/{slug}/galeri', [JurusanController::class, 'gallery'])->name('jurusan.gallery');
Route::get('/jurusan/{slug}', [JurusanController::class, 'show'])->name('jurusan.show');

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

    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');

    Route::get('/kerjasama', function () {
        return view('profil.kerjasama');
    })->name('kerjasama');

    Route::get('/dokumen', function () {
        return view('profil.dokumen');
    })->name('dokumen');
});

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('index');
    Route::get('/kategori/{category}', [BeritaController::class, 'category'])->name('category');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('show');
});

// Authentication Routes
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

Auth::routes([
    'login' => false,
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Administrator Panel Routes (Protected by Auth Middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard.index');

        // CRUD Berita & Artikel
        Route::resource('berita', AdminBeritaController::class);

        // CRUD Program Keahlian (Jurusan)
        Route::resource('jurusan', AdminJurusanController::class);

        // CRUD Ekstrakurikuler
        Route::resource('ekstrakurikuler', AdminEkstrakurikulerController::class);

        // CRUD Prestasi Siswa
        Route::resource('prestasi', AdminPrestasiController::class);

        // CRUD Galeri Dokumentasi
        Route::resource('galeri', AdminGaleriController::class);

        // CRUD PPDB Online & Status Verification
        Route::patch('ppdb/{ppdb}/status', [AdminPpdbController::class, 'updateStatus'])->name('ppdb.updateStatus');
        Route::resource('ppdb', AdminPpdbController::class);

        // CRUD Pesan Masuk / Kontak
        Route::resource('pesan', AdminPesanController::class)->only(['index', 'show', 'update', 'destroy']);
    });
});
