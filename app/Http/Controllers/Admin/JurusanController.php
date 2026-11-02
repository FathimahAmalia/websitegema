<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::orderBy('id', 'asc')->get();
        return view('admin.jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'short_name' => ['required', 'string', 'max:50'],
            'code' => ['nullable', 'string', 'max:20'],
            'head_of_program' => ['nullable', 'string', 'max:150'],
            'accent_color' => ['nullable', 'string', 'max:20'],
            'icon' => ['nullable', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'vision' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'career_prospects' => ['nullable', 'string'],
            'competencies' => ['nullable', 'string'],
            'facilities' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imagePath = $request->image_url ?: 'images/jurusan-tjkt-hd.png';

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'jurusan_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/jurusan');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/jurusan/' . $filename;
        }

        $slug = Str::slug($request->short_name ?: $request->name);

        Jurusan::create([
            'slug' => $slug,
            'name' => $validated['name'],
            'short_name' => $validated['short_name'],
            'code' => $request->input('code'),
            'head_of_program' => $request->input('head_of_program'),
            'accent_color' => $request->input('accent_color') ?: '#2563eb',
            'icon' => $request->input('icon') ?: 'bi-award',
            'description' => $validated['description'],
            'vision' => $request->input('vision'),
            'mission' => $request->input('mission'),
            'career_prospects' => $request->filled('career_prospects') ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('career_prospects'))))) : null,
            'competencies' => $request->filled('competencies') ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('competencies'))))) : null,
            'facilities' => $request->filled('facilities') ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('facilities'))))) : null,
            'image' => $imagePath,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Program keahlian berhasil ditambahkan!');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'short_name' => ['required', 'string', 'max:50'],
            'code' => ['nullable', 'string', 'max:20'],
            'head_of_program' => ['nullable', 'string', 'max:150'],
            'accent_color' => ['nullable', 'string', 'max:20'],
            'icon' => ['nullable', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'vision' => ['nullable', 'string'],
            'mission' => ['nullable', 'string'],
            'career_prospects' => ['nullable', 'string'],
            'competencies' => ['nullable', 'string'],
            'facilities' => ['nullable', 'string'],
            'image_file' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:3072'],
            'image_url' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $imagePath = $jurusan->image;

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = 'jurusan_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('uploads/jurusan');
            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $imagePath = 'uploads/jurusan/' . $filename;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->image_url;
        }

        $jurusan->update([
            'name' => $validated['name'],
            'short_name' => $validated['short_name'],
            'code' => $request->input('code', $jurusan->code),
            'head_of_program' => $request->input('head_of_program', $jurusan->head_of_program),
            'accent_color' => $request->input('accent_color') ?: $jurusan->accent_color,
            'icon' => $request->input('icon') ?: $jurusan->icon,
            'description' => $validated['description'],
            'vision' => $request->input('vision', $jurusan->vision),
            'mission' => $request->input('mission', $jurusan->mission),
            'career_prospects' => $request->filled('career_prospects') ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('career_prospects'))))) : $jurusan->career_prospects,
            'competencies' => $request->filled('competencies') ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('competencies'))))) : $jurusan->competencies,
            'facilities' => $request->filled('facilities') ? json_encode(array_filter(array_map('trim', explode("\n", $request->input('facilities'))))) : $jurusan->facilities,
            'image' => $imagePath,
            'is_active' => $request->has('is_active') ? $request->boolean('is_active') : true,
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', "Program keahlian {$jurusan->short_name} berhasil diperbarui!");
    }

    public function destroy(Jurusan $jurusan)
    {
        $name = $jurusan->name;
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success', "Program keahlian {$name} berhasil dihapus.");
    }
}
