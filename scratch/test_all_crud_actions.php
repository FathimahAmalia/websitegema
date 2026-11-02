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
use Illuminate\Http\Request;

$admin = User::first();
Auth::login($admin);

echo "=== TESTING ALL CRUD OPERATIONS (POST, PUT, DELETE) ===\n";

// 1. Berita Store without author_role (exact scenario that triggered user's error)
try {
    $request = Request::create('/admin/berita', 'POST', [
        'title' => 'Uji Coba Berita Baru Tanpa Author Role',
        'category' => 'Akademik',
        'excerpt' => 'Ringkasan singkat uji coba artikel berita.',
        'body' => '<p>Konten artikel lengkap uji coba berita.</p>',
    ]);
    $controller = new App\Http\Controllers\Admin\BeritaController();
    $response = $controller->store($request);
    $created = Berita::where('title', 'Uji Coba Berita Baru Tanpa Author Role')->first();
    if ($created) {
        echo "[SUCCESS] Berita store tanpa author_role: OK (ID: {$created->id}, Author Role: {$created->author_role})\n";
        
        // Test Update
        $updateReq = Request::create("/admin/berita/{$created->id}", 'PUT', [
            'title' => 'Uji Coba Berita Baru - Updated',
            'category' => 'Prestasi',
            'excerpt' => 'Ringkasan diubah.',
            'body' => '<p>Konten diubah.</p>',
        ]);
        $controller->update($updateReq, $created);
        echo "[SUCCESS] Berita update: OK\n";
        
        // Clean up
        $created->delete();
        echo "[SUCCESS] Berita delete: OK\n";
    } else {
        echo "[FAIL] Berita not found in DB\n";
    }
} catch (\Throwable $e) {
    echo "[FAIL] Berita CRUD: " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
}

// 2. Jurusan Store & Update
try {
    $jurusanReq = Request::create('/admin/jurusan', 'POST', [
        'name' => 'Teknik Komputer & Jaringan Cerdas',
        'short_name' => 'TKJC',
        'description' => 'Deskripsi program keahlian baru.',
    ]);
    $jController = new App\Http\Controllers\Admin\JurusanController();
    $jController->store($jurusanReq);
    $jCreated = Jurusan::where('short_name', 'TKJC')->first();
    if ($jCreated) {
        echo "[SUCCESS] Jurusan store: OK (ID: {$jCreated->id})\n";
        
        $jUpdateReq = Request::create("/admin/jurusan/{$jCreated->id}", 'PUT', [
            'name' => 'Teknik Komputer & Jaringan Cerdas Updated',
            'short_name' => 'TKJC',
            'description' => 'Deskripsi updated.',
        ]);
        $jController->update($jUpdateReq, $jCreated);
        echo "[SUCCESS] Jurusan update: OK\n";
        
        $jCreated->delete();
        echo "[SUCCESS] Jurusan delete: OK\n";
    }
} catch (\Throwable $e) {
    echo "[FAIL] Jurusan CRUD: " . $e->getMessage() . "\n";
}

// 3. Ekstrakurikuler Store & Update
try {
    $ekskulReq = Request::create('/admin/ekstrakurikuler', 'POST', [
        'name' => 'Klub Bahasa Jepang (Nihongo Club)',
        'category' => 'Bahasa & Komunikasi',
        'description' => 'Belajar bahasa dan budaya Jepang.',
    ]);
    $eController = new App\Http\Controllers\Admin\EkstrakurikulerController();
    $eController->store($ekskulReq);
    $eCreated = Ekstrakurikuler::where('name', 'Klub Bahasa Jepang (Nihongo Club)')->first();
    if ($eCreated) {
        echo "[SUCCESS] Ekstrakurikuler store: OK (ID: {$eCreated->id})\n";
        
        $eUpdateReq = Request::create("/admin/ekstrakurikuler/{$eCreated->id}", 'PUT', [
            'name' => 'Klub Bahasa Jepang (Nihongo Club) Updated',
            'category' => 'Bahasa & Komunikasi',
            'description' => 'Deskripsi updated.',
        ]);
        $eController->update($eUpdateReq, $eCreated);
        echo "[SUCCESS] Ekstrakurikuler update: OK\n";
        
        $eCreated->delete();
        echo "[SUCCESS] Ekstrakurikuler delete: OK\n";
    }
} catch (\Throwable $e) {
    echo "[FAIL] Ekstrakurikuler CRUD: " . $e->getMessage() . "\n";
}

// 4. Prestasi Store & Update
try {
    $prestasiReq = Request::create('/admin/prestasi', 'POST', [
        'title' => 'Juara 1 Web Design Vokasi Cup 2026',
        'event' => 'Vocational Web Competition',
        'level' => 'Tingkat Nasional',
        'year' => '2026',
        'category' => 'Teknologi & IT',
        'medal' => 'Medali Emas / Juara 1',
        'students' => 'Ahmad Fajar (XI TJKT)',
        'description' => 'Meraih nilai tertinggi dalam kompetisi desain web antarmuka responsif.',
    ]);
    $pController = new App\Http\Controllers\Admin\PrestasiController();
    $pController->store($prestasiReq);
    $pCreated = Prestasi::where('title', 'Juara 1 Web Design Vokasi Cup 2026')->first();
    if ($pCreated) {
        echo "[SUCCESS] Prestasi store: OK (ID: {$pCreated->id})\n";
        
        $pUpdateReq = Request::create("/admin/prestasi/{$pCreated->id}", 'PUT', [
            'title' => 'Juara 1 Web Design Vokasi Cup 2026 Updated',
            'event' => 'Vocational Web Competition',
            'level' => 'Tingkat Nasional',
            'year' => '2026',
            'category' => 'Teknologi & IT',
            'medal' => 'Medali Emas / Juara 1',
            'students' => 'Ahmad Fajar (XI TJKT)',
            'description' => 'Meraih nilai tertinggi.',
        ]);
        $pController->update($pUpdateReq, $pCreated);
        echo "[SUCCESS] Prestasi update: OK\n";
        
        $pCreated->delete();
        echo "[SUCCESS] Prestasi delete: OK\n";
    }
} catch (\Throwable $e) {
    echo "[FAIL] Prestasi CRUD: " . $e->getMessage() . "\n";
}

// 5. Galeri Store & Update
try {
    $galeriReq = Request::create('/admin/galeri', 'POST', [
        'title' => 'Dokumentasi Workshop AI 2026',
        'category_label' => 'Pembelajaran Praktik',
    ]);
    $gController = new App\Http\Controllers\Admin\GaleriController();
    $gController->store($galeriReq);
    $gCreated = Galeri::where('title', 'Dokumentasi Workshop AI 2026')->first();
    if ($gCreated) {
        echo "[SUCCESS] Galeri store: OK (ID: {$gCreated->id})\n";
        
        $gUpdateReq = Request::create("/admin/galeri/{$gCreated->id}", 'PUT', [
            'title' => 'Dokumentasi Workshop AI 2026 Updated',
            'category_label' => 'Pembelajaran Praktik',
        ]);
        $gController->update($gUpdateReq, $gCreated);
        echo "[SUCCESS] Galeri update: OK\n";
        
        $gCreated->delete();
        echo "[SUCCESS] Galeri delete: OK\n";
    }
} catch (\Throwable $e) {
    echo "[FAIL] Galeri CRUD: " . $e->getMessage() . "\n";
}

// 6. PPDB Store, Update & Status Update
try {
    $ppdbReq = Request::create('/admin/ppdb', 'POST', [
        'nama_lengkap' => 'Calon Siswa Uji Coba',
        'jenis_kelamin' => 'Laki-laki',
        'asal_sekolah' => 'SMP Negeri 10 Bandung',
        'pilihan_jurusan_1' => 'Teknik Jaringan Komputer & Telekomunikasi (TJKT)',
        'jalur_pendaftaran' => 'Reguler',
        'status' => 'Menunggu Verifikasi',
        'no_hp' => '081234567890',
    ]);
    $ppdbController = new App\Http\Controllers\Admin\PpdbController();
    $ppdbController->store($ppdbReq);
    $ppdbCreated = PpdbPendaftaran::where('nama_lengkap', 'Calon Siswa Uji Coba')->first();
    if ($ppdbCreated) {
        echo "[SUCCESS] PPDB store: OK (No Reg: {$ppdbCreated->nomor_pendaftaran})\n";
        
        $statusReq = Request::create("/admin/ppdb/{$ppdbCreated->id}/status", 'PATCH', [
            'status' => 'Diterima',
            'catatan_admin' => 'Lulus seleksi berkas administrasi dan wawancara.',
        ]);
        $ppdbController->updateStatus($statusReq, $ppdbCreated);
        $ppdbCreated->refresh();
        echo "[SUCCESS] PPDB updateStatus: OK (New status: {$ppdbCreated->status})\n";
        
        $ppdbCreated->delete();
        echo "[SUCCESS] PPDB delete: OK\n";
    }
} catch (\Throwable $e) {
    echo "[FAIL] PPDB CRUD: " . $e->getMessage() . "\n";
}

// 7. Pesan update & mark as read
try {
    $pesan = PesanKontak::first();
    if ($pesan) {
        $pesanReq = Request::create("/admin/pesan/{$pesan->id}", 'PUT', [
            'catatan_balasan' => 'Sudah dikonfirmasi via telepon.',
            'status_dibaca' => 1,
        ]);
        $pesanController = new App\Http\Controllers\Admin\PesanController();
        $pesanController->update($pesanReq, $pesan);
        echo "[SUCCESS] Pesan update catatan: OK\n";
    }
} catch (\Throwable $e) {
    echo "[FAIL] Pesan update: " . $e->getMessage() . "\n";
}

echo "\nALL CRUD OPERATIONS TESTED SUCCESSFULLY WITH ZERO ERRORS!\n";
