<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display public gallery listing page.
     */
    public function publicIndex()
    {
        $galleries = Gallery::where('is_published', true)
            ->orderBy('year', 'desc')
            ->get();

        return view('gallery', compact('galleries'));
    }

    /**
     * Display public dynamic year gallery page (e.g. /gallery/2025, /gallery/2024, etc).
     */
    public function publicShow($year)
    {
        $gallery = Gallery::where('year', $year)
            ->where('is_published', true)
            ->first();

        if (! $gallery) {
            // Check if hardcoded view exists as fallback
            if (view()->exists("gallery.{$year}")) {
                return view("gallery.{$year}");
            }
            abort(404, 'Galeri tahun tersebut tidak ditemukan.');
        }

        return view('gallery.show', compact('gallery'));
    }

    /**
     * Admin gallery management list.
     */
    public function adminIndex(Request $request)
    {
        $query = Gallery::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('year', 'like', "%{$search}%")
                    ->orWhere('theme_title', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'published') {
                $query->where('is_published', true);
            } elseif ($request->status === 'draft') {
                $query->where('is_published', false);
        $galleries = $query->orderBy('year', 'desc')->get();

        $totalAll = Gallery::count();
        $totalPublished = Gallery::where('is_published', true)->count();
        $totalDraft = Gallery::where('is_published', false)->count();
        $totalVideos = Gallery::whereNotNull('aftermovie_url')->where('aftermovie_url', '!=', '')->count();

        $allGalleriesForCount = Gallery::all();
        $totalPhotos = 0;
        foreach ($allGalleriesForCount as $g) {
            if (is_array($g->photos)) {
                $totalPhotos += count($g->photos);
            }
        }

        return view('admin.gallery.index', compact('galleries', 'totalAll', 'totalPublished', 'totalDraft', 'totalVideos', 'totalPhotos'));
    }

    /**
     * Admin create gallery view.
     */
    public function adminCreate()
    {
        return view('admin.gallery.create');
    }

    /**
     * Admin store new gallery.
     */
    public function adminStore(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:2099|unique:galleries,year',
            'theme_title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'aftermovie_url' => 'nullable|string|max:500',
            'maskot_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:10240',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:10240',
            'is_published' => 'nullable|boolean',
        ]);

        $year = (int) $request->year;
        $maskotPath = "maskot/{$year}.webp";

        if ($request->hasFile('maskot_image')) {
            $maskotPath = $this->convertAndSaveMaskotWebp($request->file('maskot_image'), $year);
        }

        $photoPaths = [];
        if ($request->hasFile('photos')) {
            $photoPaths = $this->convertAndSaveGalleryPhotosWebp($request->file('photos'), $year);
        }

        Gallery::create([
            'year' => $year,
            'theme_title' => $request->theme_title,
            'location' => $request->location ?: 'Solo, Jawa Tengah',
            'description' => $request->description,
            'maskot_image' => $maskotPath,
            'aftermovie_url' => $request->aftermovie_url,
            'photos' => $photoPaths,
            'is_published' => $request->has('is_published'),
            'order' => 2030 - $year,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', "Galeri SIPA {$year} berhasil ditambahkan!");
    }

    /**
     * Admin edit gallery view.
     */
    public function adminEdit($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Admin update gallery.
     */
    public function adminUpdate(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:2099|unique:galleries,year,'.$gallery->id,
            'theme_title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'aftermovie_url' => 'nullable|string|max:500',
            'maskot_image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:10240',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:10240',
            'is_published' => 'nullable|boolean',
        ]);

        $year = (int) $request->year;

        if ($request->hasFile('maskot_image')) {
            $gallery->maskot_image = $this->convertAndSaveMaskotWebp($request->file('maskot_image'), $year);
        }

        $existingPhotos = is_array($gallery->photos) ? $gallery->photos : [];

        if ($request->hasFile('photos')) {
            $newPhotos = $this->convertAndSaveGalleryPhotosWebp($request->file('photos'), $year);
            $existingPhotos = array_merge($existingPhotos, $newPhotos);
        }

        $gallery->year = $year;
        $gallery->theme_title = $request->theme_title;
        $gallery->location = $request->location;
        $gallery->description = $request->description;
        $gallery->aftermovie_url = $request->aftermovie_url;
        $gallery->photos = array_values(array_unique($existingPhotos));
        $gallery->is_published = $request->has('is_published');
        $gallery->save();

        return redirect()->route('admin.gallery.index')->with('success', "Galeri SIPA {$year} berhasil diperbarui!");
    }

    /**
     * Admin delete specific photo from gallery.
     */
    public function adminDeletePhoto(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $photoToDelete = $request->input('photo');

        if ($photoToDelete) {
            $photos = is_array($gallery->photos) ? $gallery->photos : [];
            $updatedPhotos = array_filter($photos, function ($p) use ($photoToDelete) {
                return $p !== $photoToDelete;
            });

            $gallery->photos = array_values($updatedPhotos);
            $gallery->save();

            // Optionally delete physical file
            $filePath = public_path('images/'.$photoToDelete);
            if (File::exists($filePath)) {
                @unlink($filePath);
            }

            return back()->with('success', 'Foto berhasil dihapus dari galeri.');
        }

        return back()->with('error', 'Foto tidak ditemukan.');
    }

    /**
     * Admin delete entire gallery.
     */
    public function adminDestroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $year = $gallery->year;
        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', "Galeri SIPA {$year} berhasil dihapus.");
    }

    /**
     * Helper to convert Mascot image into WebP format.
     */
    private function convertAndSaveMaskotWebp($imageFile, $year)
    {
        $destinationDir = public_path('images/maskot');

        if (! File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        $filename = "{$year}.webp";
        $targetPath = "{$destinationDir}/{$filename}";

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
            $filename = "{$year}.".$imageFile->getClientOriginalExtension();
            $imageFile->move($destinationDir, $filename);
        }

        return "maskot/{$filename}";
    }

    /**
     * Helper to convert multiple uploaded gallery photos into WebP.
     */
    private function convertAndSaveGalleryPhotosWebp(array $files, $year)
    {
        $destinationDir = public_path("images/gallery/{$year}");

        if (! File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        $savedPaths = [];

        foreach ($files as $index => $file) {
            $randomStr = Str::random(6);
            $filename = 'photo_'.time()."_{$index}_{$randomStr}.webp";
            $targetPath = "{$destinationDir}/{$filename}";

            $sourcePath = $file->getRealPath();
            $sourceData = file_get_contents($sourcePath);

            $imageResource = @imagecreatefromstring($sourceData);

            if ($imageResource !== false) {
                imagepalettetotruecolor($imageResource);
                imagealphablending($imageResource, true);
                imagesavealpha($imageResource, true);

                imagewebp($imageResource, $targetPath, 85);
                imagedestroy($imageResource);
                $savedPaths[] = "gallery/{$year}/{$filename}";
            } else {
                $origFilename = 'photo_'.time()."_{$index}.".$file->getClientOriginalExtension();
                $file->move($destinationDir, $origFilename);
                $savedPaths[] = "gallery/{$year}/{$origFilename}";
            }
        }

        return $savedPaths;
    }
}
