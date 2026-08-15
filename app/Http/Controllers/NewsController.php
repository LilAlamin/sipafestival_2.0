<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:10240',
                'slug' => 'nullable|string|unique:news,slug',
            ]);

            $imagePath = $this->convertAndSaveNewsWebp($request->file('image'), $request->title);
            $slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

            // Ensure unique slug
            $originalSlug = $slug;
            $count = 1;
            while (News::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}-{$count}";
                $count++;
            }

            DB::beginTransaction();

            $status = $request->input('action') === 'draft' ? 'draft' : 'published';
            $sentAt = $status === 'published' ? now() : null;

            News::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'image_path' => $imagePath,
                'status' => $status,
                'sent_at' => $sentAt,
            ]);

            DB::commit();

            return redirect()->route('news.showNews')->with('success', 'Berita berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saat simpan berita: '.$e->getMessage());

            return back()->withInput()->with('error', 'Gagal menyimpan berita: '.$e->getMessage());
        }
    }

    public function showNews(Request $request)
    {
        $query = News::query();

        // Shortlist by Status (published / draft)
        if ($request->filled('status') && in_array($request->status, ['published', 'draft'])) {
            $query->where('status', $request->status);
        }

        // Search by Title or Content
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $news = $query->orderBy('created_at', 'desc')->get();

        $totalAll = News::count();
        $totalPublished = News::where('status', 'published')->count();
        $totalDraft = News::where('status', 'draft')->count();

        return view('admin.news.showNews', compact('news', 'totalAll', 'totalPublished', 'totalDraft'));
    }

    public function showNewsHome()
    {
        $news = News::where('status', 'published')->orderBy('sent_at', 'desc')->get();

        return view('home', compact('news'));
    }

    public function showNewsHomeBackup()
    {
        $news = News::where('status', 'published')->orderBy('sent_at', 'desc')->get();

        return view('archive.home_2025', compact('news'));
    }

    public function showNewsHome2026()
    {
        $news = News::where('status', 'published')->orderBy('sent_at', 'desc')->get();

        return view('home2026', compact('news'));
    }

    public function showAllNews()
    {
        $news = News::where('status', 'published')->orderBy('sent_at', 'desc')->get();

        return view('news', compact('news'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.makeNews', compact('news'));
    }

    public function updateBySlug(Request $request, $slug)
    {
        try {
            $news = News::where('slug', $slug)->firstOrFail();

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:10240',
                'slug' => 'nullable|string|unique:news,slug,'.$news->id,
            ]);

            if ($request->hasFile('image')) {
                // Delete old image if custom
                $oldPath = public_path('images/news/'.$news->image_path);
                if (file_exists($oldPath) && str_starts_with($news->image_path, 'news_')) {
                    @unlink($oldPath);
                }

                $news->image_path = $this->convertAndSaveNewsWebp($request->file('image'), $request->title);
            }

            $status = $request->input('action') === 'draft' ? 'draft' : 'published';
            $sentAt = $status === 'published' ? ($news->sent_at ?: now()) : null;

            $newSlug = $request->slug ? Str::slug($request->slug) : Str::slug($request->title);

            $news->title = $request->title;
            $news->description = $request->description;
            $news->slug = $newSlug;
            $news->status = $status;
            $news->sent_at = $sentAt;
            $news->save();

            return redirect()->route('news.showNews')->with('success', 'Berita berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error saat update berita: '.$e->getMessage());

            return back()->withInput()->with('error', 'Gagal memperbarui berita: '.$e->getMessage());
        }
    }

    /**
     * Helper to convert news image into lightweight WebP.
     */
    private function convertAndSaveNewsWebp($imageFile, $title)
    {
        $destinationDir = public_path('images/news');

        if (! file_exists($destinationDir)) {
            mkdir($destinationDir, 0755, true);
        }

        $slug = Str::slug($title);
        $filename = 'news_'.$slug.'_'.time().'.webp';
        $targetPath = $destinationDir.'/'.$filename;

        $sourcePath = $imageFile->getRealPath();
        $sourceData = file_get_contents($sourcePath);

        $imageResource = @imagecreatefromstring($sourceData);

        if ($imageResource !== false) {
            imagepalettetotruecolor($imageResource);
            imagealphablending($imageResource, true);
            imagesavealpha($imageResource, true);

            imagewebp($imageResource, $targetPath, 85);
            imagedestroy($imageResource);
        } else {
            $filename = 'news_'.$slug.'_'.time().'.'.$imageFile->getClientOriginalExtension();
            $imageFile->move($destinationDir, $filename);
        }

        return $filename;
    }

    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);

            // hapus gambar di folder public/images/news
            $filePath = public_path('images/news/'.$news->image_path);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $news->delete();

            return redirect()->route('news.showNews')->with('success', 'Berita berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error saat hapus berita: '.$e->getMessage());

            return back()->with('error', 'Gagal menghapus berita: '.$e->getMessage());
        }
    }

    public function viewBySlug($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('admin.news.viewNews', compact('news'));
    }

    public function viewNews($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('detailNews', compact('news'));
    }

    public function editBySlug($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('admin.news.makeNews', compact('news'));
    }

    public function publish($id)
    {
        try {
            $news = News::findOrFail($id);
            $news->status = 'published';
            $news->sent_at = now();
            $news->save();

            return redirect()->back()->with('success', 'Berita berhasil dipublikasikan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mempublikasikan berita: '.$e->getMessage());
        }
    }
}
