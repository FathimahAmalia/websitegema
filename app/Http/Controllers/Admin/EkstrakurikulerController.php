<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class EkstrakurikulerController extends Controller
{
    public function index(Request $request)
    {
        $query = Ekstrakurikuler::query();

        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('instructor', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category_slug', $request->category);
        }

        $ekskuls = $query->orderBy('name', 'asc')->paginate(10)->withQueryString();

        $categories = Ekstrakurikuler::select('category', 'category_slug')
            ->distinct()
            ->get();

        return view('admin.ekstrakurikuler.index', compact('ekskuls', 'categories'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'schedule' => ['nullable', 'string', 'max:150'],
            'days' => ['nullable', 'string', 'max:100'],
            'time' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:150'],
            'instructor' => ['nullable', 'string', 'max:150'],
            'instructor_role' => ['nullable', 'string', 'max:150'],
            'members_count' => ['nullable', 'string', 'max:50'],
            'badge' => ['nullable', 'string', 'max:50'],
            'icon' => ['nullable', 'string', 'max:50'],
            'color' => ['nullable', 'string', 'max:20'],
            'achievements' => ['nullable', 'string'],
            'requirements' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'image_url' => ['nullable', 'string', 'max:255'],
        ]);

        $imagePath = $request->image_url ?: 'images/ekskul/cyber-security.jpg';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'ekskul_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/ekskul');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/ekskul/' . $filename;
        }

        $slug = Str::slug($request->name);

        Ekstrakurikuler::create([
            'slug' => $slug,
            'name' => $validated['name'],
            'category' => $validated['category'],
            'category_slug' => Str::slug($validated['category']),
            'tagline' => $request->input('tagline'),
            'description' => $validated['description'],
            'schedule' => $request->input('schedule') ?: ($request->input('days') . ', ' . $request->input('time')),
            'days' => $request->input('days'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'instructor' => $request->input('instructor'),
            'instructor_role' => $request->input('instructor_role'),
            'members_count' => $request->input('members_count') ?: '30 Siswa',
            'badge' => $request->input('badge'),
            'icon' => $request->input('icon') ?: 'bi-star-fill',
            'color' => $request->input('color') ?: '#2563eb',
            'achievements' => $request->input('achievements'),
            'requirements' => $request->input('requirements'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler baru berhasil ditambahkan!');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'tagline' => ['nullable', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'schedule' => ['nullable', 'string', 'max:150'],
            'days' => ['nullable', 'string', 'max:100'],
            'time' => ['nullable', 'string', 'max:100'],
            'location' => ['nullable', 'string', 'max:150'],
            'instructor' => ['nullable', 'string', 'max:150'],
            'instructor_role' => ['nullable', 'string', 'max:150'],
            'members_count' => ['nullable', 'string', 'max:50'],
            'badge' => ['nullable', 'string', 'max:50'],
            'icon' => ['nullable', 'string', 'max:50'],
            'color' => ['nullable', 'string', 'max:20'],
            'achievements' => ['nullable', 'string'],
            'requirements' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'image_url' => ['nullable', 'string', 'max:255'],
        ]);

        $imagePath = $ekstrakurikuler->image;

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'ekskul_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/ekskul');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/ekskul/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $ekstrakurikuler->update([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'category_slug' => Str::slug($validated['category']),
            'tagline' => $request->input('tagline', $ekstrakurikuler->tagline),
            'description' => $validated['description'],
            'schedule' => $request->input('schedule') ?: ($request->input('days') . ', ' . $request->input('time')),
            'days' => $request->input('days', $ekstrakurikuler->days),
            'time' => $request->input('time', $ekstrakurikuler->time),
            'location' => $request->input('location', $ekstrakurikuler->location),
            'instructor' => $request->input('instructor', $ekstrakurikuler->instructor),
            'instructor_role' => $request->input('instructor_role', $ekstrakurikuler->instructor_role),
            'members_count' => $request->input('members_count', $ekstrakurikuler->members_count),
            'badge' => $request->input('badge', $ekstrakurikuler->badge),
            'icon' => $request->input('icon') ?: $ekstrakurikuler->icon,
            'color' => $request->input('color') ?: $ekstrakurikuler->color,
            'achievements' => $request->input('achievements', $ekstrakurikuler->achievements),
            'requirements' => $request->input('requirements', $ekstrakurikuler->requirements),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', "Ekstrakurikuler {$ekstrakurikuler->name} berhasil diperbarui!");
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $name = $ekstrakurikuler->name;
        $ekstrakurikuler->delete();

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', "Ekstrakurikuler {$name} berhasil dihapus.");
    }
}
