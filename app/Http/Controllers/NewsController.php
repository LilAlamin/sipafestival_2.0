<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use Illuminate\Support\Str; // untuk slug otomatis
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slug' => 'nullable|string|unique:news,slug', // opsional
            ]);


            // Simpan file gambar
            $path = $request->file('image')->store('images', 'public');

            // Generate slug jika tidak diberikan
            $slug = $request->slug ?: Str::slug($request->title);

            DB::beginTransaction();

            // Simpan data berita
            News::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'image_path' => $path,
                'sent_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('news.showNews')->with('success', 'Berita berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Logging untuk debug
            Log::error('Error saat simpan berita: ' . $e->getMessage());

            return back()->with('error', 'Gagal menyimpan berita: ' . $e->getMessage());
        }
    }

    public function showNews()
    {
        $news = News::all();
        return view('admin.news.showNews', compact('news'));
    }
}
