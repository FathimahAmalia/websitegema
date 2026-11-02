<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Jurusan;
use App\Models\Ekstrakurikuler;
use App\Models\Prestasi;
use App\Models\Galeri;
use App\Models\PpdbPendaftaran;
use App\Models\PesanKontak;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_berita' => Berita::count(),
            'total_jurusan' => Jurusan::count(),
            'total_ekskul' => Ekstrakurikuler::count(),
            'total_prestasi' => Prestasi::count(),
            'total_galeri' => Galeri::count(),
            'total_ppdb' => PpdbPendaftaran::count(),
            'ppdb_menunggu' => PpdbPendaftaran::where('status', 'Menunggu Verifikasi')->count(),
            'ppdb_diverifikasi' => PpdbPendaftaran::where('status', 'Diverifikasi')->count(),
            'ppdb_diterima' => PpdbPendaftaran::where('status', 'Diterima')->count(),
            'ppdb_ditolak' => PpdbPendaftaran::where('status', 'Ditolak')->count(),
            'total_pesan' => PesanKontak::count(),
            'pesan_belum_dibaca' => PesanKontak::where('status_dibaca', false)->count(),
        ];

        $recentPpdb = PpdbPendaftaran::latest()->take(5)->get();
        $recentBerita = Berita::latest()->take(5)->get();
        $recentPesan = PesanKontak::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPpdb', 'recentBerita', 'recentPesan'));
    }
}
