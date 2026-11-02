<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanKontak;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $query = PesanKontak::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subjek', 'like', "%{$search}%")
                  ->orWhere('pesan', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'unread') {
                $query->where('status_dibaca', false);
            } elseif ($request->status === 'read') {
                $query->where('status_dibaca', true);
            }
        }

        $pesans = $query->latest('id')->paginate(10)->withQueryString();

        $unreadCount = PesanKontak::where('status_dibaca', false)->count();
        $totalCount = PesanKontak::count();

        return view('admin.pesan.index', compact('pesans', 'unreadCount', 'totalCount'));
    }

    public function show(PesanKontak $pesan)
    {
        if (!$pesan->status_dibaca) {
            $pesan->update(['status_dibaca' => true]);
        }

        return view('admin.pesan.show', compact('pesan'));
    }

    public function update(Request $request, PesanKontak $pesan)
    {
        $validated = $request->validate([
            'catatan_balasan' => ['nullable', 'string'],
            'status_dibaca' => ['nullable', 'boolean'],
        ]);

        $pesan->update([
            'catatan_balasan' => $request->input('catatan_balasan'),
            'status_dibaca' => $request->has('status_dibaca') ? $request->boolean('status_dibaca') : $pesan->status_dibaca,
        ]);

        return back()->with('success', 'Catatan balasan pesan berhasil disimpan!');
    }

    public function destroy(PesanKontak $pesan)
    {
        $subjek = $pesan->subjek;
        $pesan->delete();

        return redirect()->route('admin.pesan.index')->with('success', "Pesan '{$subjek}' berhasil dihapus.");
    }
}
