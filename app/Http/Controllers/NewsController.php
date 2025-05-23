<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\News; // Make sure you have a Complaint model
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'title' => 'required|string',
                'slug' => 'required|email',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // dd($validated);

            $path = $request->file('image')->store('images', 'public');

            DB::beginTransaction();
            // Save complaint data
            $news = News::create([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'image_path' => $path,
                'sent_at' => now()
            ]);

            DB::commit();
            return redirect('/')->with('success', 'berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal mengirim keluhan: ' . $e->getMessage());
        }
    }

    public function showNews()
    {
        $News = News::all();
        return view('admin/news/showNews');
    }
}
