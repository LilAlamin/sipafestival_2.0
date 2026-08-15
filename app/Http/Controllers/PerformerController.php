<?php

namespace App\Http\Controllers;

use App\Models\Performer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PerformerController extends Controller
{
    /**
     * Display a listing of the performers for admin.
     */
    public function index(Request $request)
    {
        $query = Performer::query();

        if ($request->filled('type') && in_array($request->type, ['international', 'national'])) {
            $query->where('type', $request->type);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('country', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%");
            });
        }

        $performers = $query->orderBy('type')->orderBy('order')->orderBy('name')->get();

        return view('admin.performers.index', compact('performers'));
    }

    /**
     * Show the form for creating a new performer.
     */
    public function create()
    {
        return view('admin.performers.create');
    }

    /**
     * Store a newly created performer in database with automatic WebP conversion.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'country_badge' => 'nullable|string|max:50',
            'category' => 'nullable|string|max:255',
            'type' => 'required|in:international,national',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:10240', // Max 10MB
            'order' => 'nullable|integer',
            'is_featured_home' => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        $imagePath = $this->convertAndSaveWebp($request->file('image'), $request->name);

        $badge = $request->country_badge ?: strtoupper(substr($request->country, 0, 4));

        Performer::create([
            'name' => trim($request->name),
            'country' => trim($request->country),
            'country_badge' => trim($badge),
            'category' => trim($request->category ?? ''),
            'type' => $request->type,
            'image_path' => $imagePath,
            'order' => (int) ($request->order ?? 0),
            'is_featured_home' => $request->has('is_featured_home'),
            'description' => $request->description,
        ]);

        return redirect()->route('admin.performers.index')->with('success', 'Performer berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified performer.
     */
    public function edit($id)
    {
        $performer = Performer::findOrFail($id);

        return view('admin.performers.edit', compact('performer'));
    }

    /**
     * Update the specified performer in database.
     */
    public function update(Request $request, $id)
    {
        $performer = Performer::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'country_badge' => 'nullable|string|max:50',
            'category' => 'nullable|string|max:255',
            'type' => 'required|in:international,national',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:10240',
            'order' => 'nullable|integer',
            'is_featured_home' => 'nullable|boolean',
            'description' => 'nullable|string',
        ]);

        $badge = $request->country_badge ?: ($performer->country_badge ?: strtoupper(substr($request->country, 0, 4)));

        $data = [
            'name' => trim($request->name),
            'country' => trim($request->country),
            'country_badge' => trim($badge),
            'category' => trim($request->category ?? ''),
            'type' => $request->type,
            'order' => (int) ($request->order ?? 0),
            'is_featured_home' => $request->has('is_featured_home'),
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old custom image if exists
            $oldPath = public_path('images/'.$performer->image_path);
            if (File::exists($oldPath) && ! str_contains($performer->image_path, 'delegates/Khambatta')) {
                @unlink($oldPath);
            }

            $data['image_path'] = $this->convertAndSaveWebp($request->file('image'), $request->name);
        }

        $performer->update($data);

        return redirect()->route('admin.performers.index')->with('success', 'Data Performer berhasil diperbarui!');
    }

    /**
     * Remove the specified performer from database.
     */
    public function destroy($id)
    {
        try {
            $performer = Performer::findOrFail($id);
            $filePath = public_path('images/'.$performer->image_path);

            if (File::exists($filePath) && str_starts_with($performer->image_path, 'delegates/performer_')) {
                @unlink($filePath);
            }

            $performer->delete();

            return redirect()->route('admin.performers.index')->with('success', 'Performer berhasil dihapus!');
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus performer: '.$e->getMessage());
        }
    }

    /**
     * Helper to convert any uploaded image into optimized WebP format.
     */
    private function convertAndSaveWebp($imageFile, $name)
    {
        $destinationDir = public_path('images/delegates');

        if (! File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        $slug = Str::slug($name);
        $filename = 'performer_'.$slug.'_'.time().'.webp';
        $targetPath = $destinationDir.'/'.$filename;

        $sourcePath = $imageFile->getRealPath();
        $sourceData = file_get_contents($sourcePath);

        $imageResource = @imagecreatefromstring($sourceData);

        if ($imageResource !== false) {
            // Preserve transparency for PNG / WebP
            imagepalettetotruecolor($imageResource);
            imagealphablending($imageResource, true);
            imagesavealpha($imageResource, true);

            // Save as WebP with 85% high quality compression
            imagewebp($imageResource, $targetPath, 85);
            imagedestroy($imageResource);
        } else {
            // Fallback move file directly if GD fails
            $filename = 'performer_'.$slug.'_'.time().'.'.$imageFile->getClientOriginalExtension();
            $imageFile->move($destinationDir, $filename);
        }

        return 'delegates/'.$filename;
    }
}
