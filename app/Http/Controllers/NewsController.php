<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slug' => 'nullable|string|unique:news,slug',
            ]);

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('images/news');
            $image->move($destinationPath, $imageName);

            // hanya nama file disimpan ke database
            $path = $imageName;

            $slug = $request->slug ?: Str::slug($request->title);

            DB::beginTransaction();

            News::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'image_path' => $path, // simpan nama file saja
                'sent_at' => now(),
            ]);

            DB::commit();

            return redirect()->route('news.showNews')->with('success', 'Berita berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saat simpan berita: ' . $e->getMessage());
            return back()->with('error', 'Gagal menyimpan berita: ' . $e->getMessage());
        }
    }

    public function showNews()
    {
        $news = News::all();
        return view('admin.news.showNews', compact('news'));
    }

    public function showNewsHome()
    {
        $news = News::all();
        return view('home', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        try {
            $news = News::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'slug' => 'nullable|string|unique:news,slug,' . $news->id,
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $destinationPath = public_path('images/news');
                $image->move($destinationPath, $imageName);
                $news->image_path = $imageName; // simpan nama file saja
            }

            $news->title = $request->title;
            $news->description = $request->description;
            $news->slug = $request->slug ?: Str::slug($request->title);
            $news->save();

            return redirect()->route('news.showNews')->with('success', 'Berita berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error saat update berita: ' . $e->getMessage());
            return back()->with('error', 'Gagal memperbarui berita: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);

            // hapus gambar di folder public/images/news
            $filePath = public_path('images/news/' . $news->image_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $news->delete();

            return redirect()->route('news.showNews')->with('success', 'Berita berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error saat hapus berita: ' . $e->getMessage());
            return back()->with('error', 'Gagal menghapus berita: ' . $e->getMessage());
        }
    }

    public function viewBySlug($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('admin.news.viewNews', compact('news'));
    }

    public function editBySlug($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        return view('admin.news.edit', compact('news'));
    }
}
