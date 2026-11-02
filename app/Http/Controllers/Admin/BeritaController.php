<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_slug', $request->category);
        }

        $beritas = $query->latest('published_at')->latest('id')->paginate(10)->withQueryString();

        $categories = Berita::select('category', 'category_slug')
            ->distinct()
            ->get();

        return view('admin.berita.index', compact('beritas', 'categories'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'author' => ['nullable', 'string', 'max:150'],
            'author_role' => ['nullable', 'string', 'max:150'],
            'read_time' => ['nullable', 'string', 'max:50'],
            'excerpt' => ['required', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'image_caption' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $imagePath = $request->image_url ?: 'images/berita-lks-cyber.png';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/berita');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/berita/' . $filename;
        }

        $slug = Str::slug($request->title);
        $count = Berita::where('slug', 'like', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        $tagsArray = $request->filled('tags')
            ? array_map('trim', explode(',', $request->tags))
            : ['SMK Gema', $request->category];

        Berita::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'],
            'category_slug' => Str::slug($validated['category']),
            'author' => $request->input('author') ?: 'Humas SMK Gema Cyber School',
            'author_role' => $request->input('author_role') ?: 'Tim Media Sekolah',
            'read_time' => $request->input('read_time') ?: '3 Menit Baca',
            'views' => 0,
            'image' => $imagePath,
            'image_caption' => $request->input('image_caption') ?: null,
            'is_featured' => $request->boolean('is_featured'),
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'tags' => json_encode($tagsArray),
            'published_at' => $request->input('published_at') ?: now()->toDateString(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Artikel berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'author' => ['nullable', 'string', 'max:150'],
            'author_role' => ['nullable', 'string', 'max:150'],
            'read_time' => ['nullable', 'string', 'max:50'],
            'excerpt' => ['required', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'tags' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'image_caption' => ['nullable', 'string', 'max:255'],
            'is_featured' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);

        $imagePath = $berita->image;

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/berita');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/berita/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $tagsArray = $request->filled('tags')
            ? array_map('trim', explode(',', $request->tags))
            : $berita->tags_list;

        $berita->update([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'category_slug' => Str::slug($validated['category']),
            'author' => $request->input('author') ?: $berita->author,
            'author_role' => $request->input('author_role') ?: $berita->author_role,
            'read_time' => $request->input('read_time') ?: $berita->read_time,
            'image' => $imagePath,
            'image_caption' => $request->input('image_caption') ?: $berita->image_caption,
            'is_featured' => $request->boolean('is_featured'),
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'tags' => json_encode($tagsArray),
            'published_at' => $request->input('published_at') ?: $berita->published_at,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Artikel berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        $title = $berita->title;
        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', "Artikel '{$title}' berhasil dihapus.");
    }
}
