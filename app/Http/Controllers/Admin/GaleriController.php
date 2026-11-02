<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('photographer', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_slug', $request->category);
        }

        $galeris = $query->latest('id')->paginate(12)->withQueryString();

        $categories = Galeri::select('category_label', 'category_slug')
            ->distinct()
            ->get();

        return view('admin.galeri.index', compact('galeris', 'categories'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_label' => ['required', 'string', 'max:100'],
            'date' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:150'],
            'photographer' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'image_url' => ['nullable', 'string', 'max:255'],
        ]);

        $imagePath = $request->image_url ?: 'images/galeri/wisuda.jpg';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'galeri_' . time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/galeri');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/galeri/' . $filename;
        }

        Galeri::create([
            'title' => $validated['title'],
            'category_slug' => Str::slug($validated['category_label']),
            'category_label' => $validated['category_label'],
            'date' => $request->input('date') ?: now()->translatedFormat('d F Y'),
            'location' => $request->input('location') ?: 'Kampus SMK Gema Cyber School',
            'photographer' => $request->input('photographer') ?: 'Tim Dokumentasi Sekolah',
            'image' => $imagePath,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto dokumentasi berhasil ditambahkan!');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category_label' => ['required', 'string', 'max:100'],
            'date' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:150'],
            'photographer' => ['nullable', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:4096'],
            'image_url' => ['nullable', 'string', 'max:255'],
        ]);

        $imagePath = $galeri->image;

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'galeri_' . time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/galeri');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/galeri/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $galeri->update([
            'title' => $validated['title'],
            'category_slug' => Str::slug($validated['category_label']),
            'category_label' => $validated['category_label'],
            'date' => $request->input('date') ?: $galeri->date,
            'location' => $request->input('location', $galeri->location),
            'photographer' => $request->input('photographer', $galeri->photographer),
            'image' => $imagePath,
            'description' => $request->input('description', $galeri->description),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Dokumentasi foto berhasil diperbarui!');
    }

    public function destroy(Galeri $galeri)
    {
        $title = $galeri->title;
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', "Foto '{$title}' berhasil dihapus.");
    }
}
