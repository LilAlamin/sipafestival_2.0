<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\News;
use Carbon\Carbon;

Carbon::setLocale('id');

class dashboardController extends Controller
{
    public function index()
    {
        $draftNews = News::where('status', 'draft')->orderBy('created_at', 'desc')->get();
        $publishedNews = News::where('status', 'published')->orderBy('sent_at', 'desc')->first();
        $feedbacks = Complaint::where('status', 'belum dibalas')->orderBy('sent_at', 'desc')->take(4)->get();

        return view('admin.dashboard', compact('draftNews', 'publishedNews', 'feedbacks'));
    }
}
