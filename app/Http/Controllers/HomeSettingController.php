<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    /**
     * Display the homepage settings page in admin dashboard.
     */
    public function index()
    {
        $teaserEmbedUrl = SiteSetting::get('home_teaser_youtube_url', 'https://www.youtube-nocookie.com/embed/zH0uYvN35sM');
        $teaserRawUrl = SiteSetting::get('home_teaser_raw_url', $teaserEmbedUrl);
        $teaserTitle = SiteSetting::get('home_teaser_title', 'Solo International Performing Arts 2026 Official Teaser');

        return view('admin.home_settings', compact('teaserEmbedUrl', 'teaserRawUrl', 'teaserTitle'));
    }

    /**
     * Update homepage settings.
     */
    public function update(Request $request)
    {
        $request->validate([
            'youtube_url' => 'required|string',
            'teaser_title' => 'nullable|string|max:255',
        ]);

        $rawUrl = trim($request->input('youtube_url'));
        $embedUrl = $this->parseYouTubeEmbedUrl($rawUrl);

        if (! $embedUrl) {
            return back()->withInput()->with('error', 'Format link YouTube tidak valid. Harap masukkan link YouTube yang benar.');
        }

        SiteSetting::set('home_teaser_youtube_url', $embedUrl);
        SiteSetting::set('home_teaser_raw_url', $rawUrl);

        if ($request->filled('teaser_title')) {
            SiteSetting::set('home_teaser_title', trim($request->input('teaser_title')));
        }

        return redirect()->route('admin.homeSettings')->with('success', 'Pengaturan video teaser beranda berhasil diperbarui!');
    }

    /**
     * Convert various YouTube URL formats to standard privacy-enhanced embed URL.
     */
    private function parseYouTubeEmbedUrl(string $url): ?string
    {
        // 1. If it's already an embed URL
        if (preg_match('#(?:youtube(?:-nocookie)?\.com/embed/)([a-zA-Z0-9_-]{11})#i', $url, $matches)) {
            return 'https://www.youtube-nocookie.com/embed/'.$matches[1];
        }

        // 2. Standard watch URL: youtube.com/watch?v=VIDEO_ID
        if (preg_match('#(?:youtube\.com/watch\?(?:.*&)?v=)([a-zA-Z0-9_-]{11})#i', $url, $matches)) {
            return 'https://www.youtube-nocookie.com/embed/'.$matches[1];
        }

        // 3. Shortened youtu.be URL: youtu.be/VIDEO_ID
        if (preg_match('#(?:youtu\.be/)([a-zA-Z0-9_-]{11})#i', $url, $matches)) {
            return 'https://www.youtube-nocookie.com/embed/'.$matches[1];
        }

        // 4. Shorts URL: youtube.com/shorts/VIDEO_ID
        if (preg_match('#(?:youtube\.com/shorts/)([a-zA-Z0-9_-]{11})#i', $url, $matches)) {
            return 'https://www.youtube-nocookie.com/embed/'.$matches[1];
        }

        // 5. Just the 11 character ID
        if (preg_match('#^[a-zA-Z0-9_-]{11}$#', $url)) {
            return 'https://www.youtube-nocookie.com/embed/'.$url;
        }

        return null;
    }
}
