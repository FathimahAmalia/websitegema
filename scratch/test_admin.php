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

echo "=== DATABASE STATS ===\n";
echo "Users: " . User::count() . "\n";
echo "Beritas: " . Berita::count() . "\n";
echo "Jurusans: " . Jurusan::count() . "\n";
echo "Ekskuls: " . Ekstrakurikuler::count() . "\n";
echo "Prestasis: " . Prestasi::count() . "\n";
echo "Galeris: " . Galeri::count() . "\n";
echo "PPDB: " . PpdbPendaftaran::count() . "\n";
echo "Pesan: " . PesanKontak::count() . "\n";

$admin = User::first();
echo "\nDefault Admin: " . $admin->name . " (" . $admin->email . ")\n";

echo "\nTesting view rendering...\n";
Auth::login($admin);

$viewsToTest = [
    'admin.dashboard' => [
        'stats' => [
            'total_berita' => Berita::count(),
            'total_jurusan' => Jurusan::count(),
            'total_ekskul' => Ekstrakurikuler::count(),
            'total_prestasi' => Prestasi::count(),
            'total_galeri' => Galeri::count(),
            'total_ppdb' => PpdbPendaftaran::count(),
            'ppdb_menunggu' => 0,
            'ppdb_diverifikasi' => 0,
            'ppdb_diterima' => 0,
            'ppdb_ditolak' => 0,
            'total_pesan' => PesanKontak::count(),
            'pesan_belum_dibaca' => 0,
        ],
        'recentPpdb' => PpdbPendaftaran::take(5)->get(),
        'recentBerita' => Berita::take(5)->get(),
        'recentPesan' => PesanKontak::take(5)->get(),
    ],
    'admin.login' => [],
    'admin.berita.index' => [
        'beritas' => Berita::paginate(10),
        'categories' => Berita::select('category', 'category_slug')->distinct()->get(),
    ],
    'admin.jurusan.index' => [
        'jurusans' => Jurusan::all(),
    ],
    'admin.ekstrakurikuler.index' => [
        'ekskuls' => Ekstrakurikuler::paginate(10),
        'categories' => Ekstrakurikuler::select('category', 'category_slug')->distinct()->get(),
    ],
    'admin.prestasi.index' => [
        'prestasis' => Prestasi::paginate(10),
        'levels' => Prestasi::select('level', 'level_slug')->distinct()->get(),
    ],
    'admin.galeri.index' => [
        'galeris' => Galeri::paginate(10),
        'categories' => Galeri::select('category_label', 'category_slug')->distinct()->get(),
    ],
    'admin.ppdb.index' => [
        'pendaftarans' => PpdbPendaftaran::paginate(10),
        'statusCounts' => [
            'all' => PpdbPendaftaran::count(),
            'Menunggu Verifikasi' => 0,
            'Diverifikasi' => 0,
            'Diterima' => 0,
            'Ditolak' => 0,
        ],
        'jurusans' => Jurusan::all(),
    ],
    'admin.pesan.index' => [
        'pesans' => PesanKontak::paginate(10),
        'unreadCount' => 0,
        'totalCount' => PesanKontak::count(),
    ],
];

foreach ($viewsToTest as $viewName => $data) {
    try {
        $rendered = view($viewName, $data)->render();
        echo "[OK] View {$viewName} rendered successfully (" . strlen($rendered) . " bytes)\n";
    } catch (\Throwable $e) {
        echo "[FAIL] View {$viewName}: " . $e->getMessage() . "\n";
    }
}

echo "\nALL TESTS COMPLETED!\n";
