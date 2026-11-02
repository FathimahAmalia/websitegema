<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('students', 'like', "%{$search}%")
                  ->orWhere('event', 'like', "%{$search}%");
            });
        }

        if ($request->filled('level') && $request->level !== 'all') {
            $query->where('level_slug', $request->level);
        }

        $prestasis = $query->latest('year')->latest('id')->paginate(10)->withQueryString();

        $levels = Prestasi::select('level', 'level_slug')
            ->distinct()
            ->get();

        return view('admin.prestasi.index', compact('prestasis', 'levels'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'event' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:100'],
            'year' => ['required', 'string', 'max:10'],
            'category' => ['required', 'string', 'max:100'],
            'medal' => ['required', 'string', 'max:100'],
            'students' => ['required', 'string', 'max:255'],
            'instructor' => ['nullable', 'string', 'max:150'],
            'date' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:150'],
            'organizer' => ['nullable', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'highlights' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'image_url' => ['nullable', 'string', 'max:255'],
        ]);

        $imagePath = $request->image_url ?: 'images/prestasi/lks-cyber-security.jpg';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'prestasi_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/prestasi');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/prestasi/' . $filename;
        }

        $levelBadge = match (strtolower($request->level)) {
            'tingkat internasional' => 'purple',
            'tingkat nasional' => 'danger',
            'tingkat provinsi' => 'primary',
            default => 'success',
        };

        $medalColor = str_contains(strtolower($request->medal), 'emas') || str_contains(strtolower($request->medal), 'juara 1')
            ? '#f59e0b'
            : (str_contains(strtolower($request->medal), 'perak') || str_contains(strtolower($request->medal), 'juara 2')
                ? '#94a3b8'
                : '#b45309');

        $highlights = $request->filled('highlights')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->highlights))))
            : null;

        Prestasi::create([
            'title' => $validated['title'],
            'event' => $validated['event'],
            'level' => $validated['level'],
            'level_slug' => Str::slug($validated['level']),
            'level_badge' => $levelBadge,
            'year' => $validated['year'],
            'category' => $validated['category'],
            'category_slug' => Str::slug($validated['category']),
            'medal' => $validated['medal'],
            'medal_icon' => 'bi-trophy-fill',
            'medal_color' => $medalColor,
            'image' => $imagePath,
            'students' => $validated['students'],
            'instructor' => $request->input('instructor'),
            'date' => $request->input('date'),
            'location' => $request->input('location'),
            'organizer' => $request->input('organizer'),
            'description' => $validated['description'],
            'highlights' => $highlights,
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi baru berhasil ditambahkan!');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'event' => ['required', 'string', 'max:255'],
            'level' => ['required', 'string', 'max:100'],
            'year' => ['required', 'string', 'max:10'],
            'category' => ['required', 'string', 'max:100'],
            'medal' => ['required', 'string', 'max:100'],
            'students' => ['required', 'string', 'max:255'],
            'instructor' => ['nullable', 'string', 'max:150'],
            'date' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:150'],
            'organizer' => ['nullable', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'highlights' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'image_url' => ['nullable', 'string', 'max:255'],
        ]);

        $imagePath = $prestasi->image;

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'prestasi_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/prestasi');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/prestasi/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $highlights = $request->filled('highlights')
            ? json_encode(array_filter(array_map('trim', explode("\n", $request->highlights))))
            : $prestasi->highlights;

        $prestasi->update([
            'title' => $validated['title'],
            'event' => $validated['event'],
            'level' => $validated['level'],
            'level_slug' => Str::slug($validated['level']),
            'year' => $validated['year'],
            'category' => $validated['category'],
            'category_slug' => Str::slug($validated['category']),
            'medal' => $validated['medal'],
            'image' => $imagePath,
            'students' => $validated['students'],
            'instructor' => $request->input('instructor', $prestasi->instructor),
            'date' => $request->input('date', $prestasi->date),
            'location' => $request->input('location', $prestasi->location),
            'organizer' => $request->input('organizer', $prestasi->organizer),
            'description' => $validated['description'],
            'highlights' => $highlights,
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui!');
    }

    public function destroy(Prestasi $prestasi)
    {
        $title = $prestasi->title;
        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', "Prestasi '{$title}' berhasil dihapus.");
    }
}
