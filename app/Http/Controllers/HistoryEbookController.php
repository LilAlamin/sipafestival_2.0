<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HistoryEbookController extends Controller
{
    /**
     * Display the History PDF / E-Book management page.
     */
    public function index()
    {
        $pdfPath = SiteSetting::get('history_ebook_pdf_path', 'ebook/sipa_16_tahun.pdf');
        $title = SiteSetting::get('history_ebook_title', 'Enam Belas Tahun Perjalanan SIPA');
        $subtitle = SiteSetting::get('history_ebook_subtitle', 'Buku dokumentasi dan arsip profil festival seni pertunjukan Internasional Solo dari masa ke masa.');
        $originalName = SiteSetting::get('history_ebook_original_name', 'sipa_16_tahun.pdf');

        $fullPath = public_path($pdfPath);
        $fileExists = file_exists($fullPath);
        $fileSizeFormatted = '0 MB';
        $lastModified = null;

        if ($fileExists) {
            $bytes = filesize($fullPath);
            $fileSizeFormatted = number_format($bytes / 1048576, 2).' MB';
            $lastModified = date('d F Y, H:i', filemtime($fullPath));
        }

        return view('admin.history_ebook', compact(
            'pdfPath',
            'title',
            'subtitle',
            'originalName',
            'fileExists',
            'fileSizeFormatted',
            'lastModified'
        ));
    }

    /**
     * Update History E-Book settings and upload new PDF file.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:500',
            'pdf_file' => 'nullable|file|mimes:pdf|max:102400', // Max 100MB
        ]);

        SiteSetting::set('history_ebook_title', trim($request->input('title')));

        if ($request->filled('subtitle')) {
            SiteSetting::set('history_ebook_subtitle', trim($request->input('subtitle')));
        }

        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $originalName = $file->getClientOriginalName();
            $filename = 'sipa_history_'.time().'.pdf';
            $destinationPath = public_path('ebook');

            if (! File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Remove old uploaded PDF if it exists and differs from default
            $oldPath = SiteSetting::get('history_ebook_pdf_path');
            if ($oldPath && $oldPath !== 'ebook/sipa_16_tahun.pdf' && file_exists(public_path($oldPath))) {
                @unlink(public_path($oldPath));
            }

            $file->move($destinationPath, $filename);

            SiteSetting::set('history_ebook_pdf_path', 'ebook/'.$filename);
            SiteSetting::set('history_ebook_original_name', $originalName);
        }

        return redirect()->route('admin.historyEbook')->with('success', 'Pengaturan E-Book History & PDF berhasil disimpan!');
    }
}
