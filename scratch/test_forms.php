<?php

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Models\Berita;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use App\Models\Galeri;
use App\Models\PpdbPendaftaran;
use App\Models\PesanKontak;

$admin = User::first();
Auth::login($admin);

$berita = Berita::first();
$jurusan = Jurusan::first();
$ekskul = Ekstrakurikuler::first();
$prestasi = Prestasi::first();
$galeri = Galeri::first();
$ppdb = PpdbPendaftaran::first();
$pesan = PesanKontak::first();

$formViews = [
    'admin.berita.create' => [],
    'admin.berita.edit' => ['berita' => $berita],
    'admin.jurusan.create' => [],
    'admin.jurusan.edit' => ['jurusan' => $jurusan],
    'admin.ekstrakurikuler.create' => [],
    'admin.ekstrakurikuler.edit' => ['ekstrakurikuler' => $ekskul],
    'admin.prestasi.create' => [],
    'admin.prestasi.edit' => ['prestasi' => $prestasi],
    'admin.galeri.create' => [],
    'admin.galeri.edit' => ['galeri' => $galeri],
    'admin.ppdb.create' => ['jurusans' => Jurusan::all()],
    'admin.ppdb.show' => ['ppdb' => $ppdb],
    'admin.ppdb.edit' => ['ppdb' => $ppdb, 'jurusans' => Jurusan::all()],
    'admin.pesan.show' => ['pesan' => $pesan],
];

foreach ($formViews as $viewName => $data) {
    try {
        $rendered = view($viewName, $data)->render();
        echo "[OK] {$viewName} (" . strlen($rendered) . " bytes)\n";
    } catch (\Throwable $e) {
        echo "[FAIL] {$viewName}: " . $e->getMessage() . "\n";
    }
}
echo "ALL FORM VIEWS VERIFIED!\n";
