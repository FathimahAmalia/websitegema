<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PpdbPendaftaran;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    public function index(Request $request)
    {
        $query = PpdbPendaftaran::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%{$search}%")
                  ->orWhere('nomor_pendaftaran', 'like', "%{$search}%")
                  ->orWhere('nisn', 'like', "%{$search}%")
                  ->orWhere('asal_sekolah', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('jurusan') && $request->jurusan !== 'all') {
            $query->where('pilihan_jurusan_1', 'like', "%{$request->jurusan}%");
        }

        $pendaftarans = $query->latest('id')->paginate(10)->withQueryString();

        $statusCounts = [
            'all' => PpdbPendaftaran::count(),
            'Menunggu Verifikasi' => PpdbPendaftaran::where('status', 'Menunggu Verifikasi')->count(),
            'Diverifikasi' => PpdbPendaftaran::where('status', 'Diverifikasi')->count(),
            'Diterima' => PpdbPendaftaran::where('status', 'Diterima')->count(),
            'Ditolak' => PpdbPendaftaran::where('status', 'Ditolak')->count(),
        ];

        $jurusans = Jurusan::where('is_active', true)->get();

        return view('admin.ppdb.index', compact('pendaftarans', 'statusCounts', 'jurusans'));
    }

    public function create()
    {
        $jurusans = Jurusan::where('is_active', true)->get();
        return view('admin.ppdb.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nisn' => ['nullable', 'string', 'max:20'],
            'nik' => ['nullable', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tempat_lahir' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'agama' => ['nullable', 'string', 'max:50'],
            'no_hp' => ['required', 'string', 'max:25'],
            'email' => ['nullable', 'email', 'max:150'],
            'alamat' => ['nullable', 'string'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'pilihan_jurusan_1' => ['required', 'string', 'max:255'],
            'pilihan_jurusan_2' => ['nullable', 'string', 'max:255'],
            'nama_orang_tua' => ['nullable', 'string', 'max:255'],
            'no_hp_orang_tua' => ['nullable', 'string', 'max:25'],
            'jalur_pendaftaran' => ['required', 'string', 'max:100'],
            'status' => ['required', 'string', 'in:Menunggu Verifikasi,Diverifikasi,Diterima,Ditolak'],
            'catatan_admin' => ['nullable', 'string'],
        ]);

        $pendaftaran = PpdbPendaftaran::create($validated);

        return redirect()->route('admin.ppdb.index')
            ->with('success', "Calon siswa {$pendaftaran->nama_lengkap} ({$pendaftaran->nomor_pendaftaran}) berhasil didaftarkan!");
    }

    public function show(PpdbPendaftaran $ppdb)
    {
        return view('admin.ppdb.show', compact('ppdb'));
    }

    public function edit(PpdbPendaftaran $ppdb)
    {
        $jurusans = Jurusan::where('is_active', true)->get();
        return view('admin.ppdb.edit', compact('ppdb', 'jurusans'));
    }

    public function update(Request $request, PpdbPendaftaran $ppdb)
    {
        $validated = $request->validate([
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'nisn' => ['nullable', 'string', 'max:20'],
            'nik' => ['nullable', 'string', 'max:20'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'tempat_lahir' => ['nullable', 'string', 'max:100'],
            'tanggal_lahir' => ['nullable', 'date'],
            'agama' => ['nullable', 'string', 'max:50'],
            'no_hp' => ['required', 'string', 'max:25'],
            'email' => ['nullable', 'email', 'max:150'],
            'alamat' => ['nullable', 'string'],
            'asal_sekolah' => ['required', 'string', 'max:255'],
            'pilihan_jurusan_1' => ['required', 'string', 'max:255'],
            'pilihan_jurusan_2' => ['nullable', 'string', 'max:255'],
            'nama_orang_tua' => ['nullable', 'string', 'max:255'],
            'no_hp_orang_tua' => ['nullable', 'string', 'max:25'],
            'jalur_pendaftaran' => ['required', 'string', 'max:100'],
            'status' => ['required', 'string', 'in:Menunggu Verifikasi,Diverifikasi,Diterima,Ditolak'],
            'catatan_admin' => ['nullable', 'string'],
        ]);

        $ppdb->update($validated);

        return redirect()->route('admin.ppdb.show', $ppdb)
            ->with('success', "Data pendaftaran {$ppdb->nama_lengkap} berhasil diperbarui!");
    }

    public function updateStatus(Request $request, PpdbPendaftaran $ppdb)
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:Menunggu Verifikasi,Diverifikasi,Diterima,Ditolak'],
            'catatan_admin' => ['nullable', 'string'],
        ]);

        $ppdb->update([
            'status' => $validated['status'],
            'catatan_admin' => $request->input('catatan_admin', $ppdb->catatan_admin),
        ]);

        return back()->with('success', "Status pendaftaran {$ppdb->nomor_pendaftaran} berhasil diubah menjadi: {$validated['status']}");
    }

    public function destroy(PpdbPendaftaran $ppdb)
    {
        $nomor = $ppdb->nomor_pendaftaran;
        $nama = $ppdb->nama_lengkap;
        $ppdb->delete();

        return redirect()->route('admin.ppdb.index')
            ->with('success', "Data pendaftaran {$nama} ({$nomor}) berhasil dihapus.");
    }
}
