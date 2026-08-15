<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HistoryEbookController;
use App\Http\Controllers\HomeSettingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PerformerController;
use App\Models\Performer;
use Illuminate\Support\Facades\Route;

Route::get('/trylang', function () {
    return view('trylang');
});

Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'id'])) {
        session(['locale' => $lang]);
    }

    return back();
})->name('lang.switch');

Route::get('/', [NewsController::class, 'showNewsHome'])->name('news.showNewsHome');
Route::get('/home2026', [NewsController::class, 'showNewsHome2026'])->name('news.showNewsHome2026');
Route::get('/2026', [NewsController::class, 'showNewsHome2026']);
Route::get('/home-backup', [NewsController::class, 'showNewsHomeBackup'])->name('news.showNewsHomeBackup');
Route::get('/home_backup', [NewsController::class, 'showNewsHomeBackup']);
Route::get('/news', [NewsController::class, 'showAllNews'])->name('news.showAllNews');
Route::get('/news/{slug}', [NewsController::class, 'viewNews'])->name('news.HomeView');

Route::get('/lineup', function () {
    $internationalPerformers = Performer::where('type', 'international')->orderBy('order')->get();
    $nationalPerformers = Performer::where('type', 'national')->orderBy('order')->get();

    return view('lineup', compact('internationalPerformers', 'nationalPerformers'));
});
Route::get('/aboutus/history', function () {
    return view('aboutus/history');
});
Route::get('/aboutus/director', function () {
    return view('aboutus/director');
});

// Dynamic Public Gallery Routes
Route::get('/gallery', [GalleryController::class, 'publicIndex'])->name('gallery.index');
Route::get('/gallery/{year}', [GalleryController::class, 'publicShow'])->name('gallery.show');

Route::get('/components/new-header', function () {
    return view('components.new-header');
});

Route::post('/', [ComplaintController::class, 'store'])->name('data.store');

// admin

Route::redirect('/admin', '/admin/dashboard');
Route::get('/admin/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [loginController::class, 'login']);
Route::post('/admin/logout', [loginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/dashboard/export-excel', [dashboardController::class, 'exportExcel'])->name('admin.exportExcel');
    Route::get('/admin/dashboard/export-pdf', [dashboardController::class, 'exportPdf'])->name('admin.exportPdf');

    Route::post('/admin/send-email', [EmailController::class, 'sendEmail'])->name('admin.sendEmail');

    // News Routes
    Route::get('/admin/dashboard/news', [NewsController::class, 'showNews'])->name('news.showNews');
    Route::get('/admin/dashboard/news/makeNews', function () {
        return view('admin.news.makeNews');
    })->name('news.makeNews');
    Route::post('/admin/dashboard/news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/dashboard/news/{slug}', [NewsController::class, 'viewNewsAdmin'])->name('news.viewNewsAdmin');
    Route::get('/admin/dashboard/news/edit/{slug}', [NewsController::class, 'editBySlug'])->name('news.editBySlug');
    Route::put('/admin/dashboard/news/edit/{slug}', [NewsController::class, 'updateBySlug'])->name('news.updateBySlug');
    Route::delete('/admin/dashboard/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::post('/admin/dashboard/news/{id}/publish', [NewsController::class, 'publish'])->name('news.publish');

    // Gallery CMS Routes
    Route::get('/admin/dashboard/gallery', [GalleryController::class, 'adminIndex'])->name('admin.gallery.index');
    Route::get('/admin/dashboard/gallery/create', [GalleryController::class, 'adminCreate'])->name('admin.gallery.create');
    Route::post('/admin/dashboard/gallery', [GalleryController::class, 'adminStore'])->name('admin.gallery.store');
    Route::get('/admin/dashboard/gallery/{id}/edit', [GalleryController::class, 'adminEdit'])->name('admin.gallery.edit');
    Route::put('/admin/dashboard/gallery/{id}', [GalleryController::class, 'adminUpdate'])->name('admin.gallery.update');
    Route::delete('/admin/dashboard/gallery/{id}/photo', [GalleryController::class, 'adminDeletePhoto'])->name('admin.gallery.deletePhoto');
    Route::delete('/admin/dashboard/gallery/{id}', [GalleryController::class, 'adminDestroy'])->name('admin.gallery.destroy');

    // Homepage Content Settings
    Route::get('/admin/dashboard/home-settings', [HomeSettingController::class, 'index'])->name('admin.homeSettings');
    Route::post('/admin/dashboard/home-settings', [HomeSettingController::class, 'update'])->name('admin.homeSettings.update');

    // History E-Book & PDF Settings
    Route::get('/admin/dashboard/history-ebook', [HistoryEbookController::class, 'index'])->name('admin.historyEbook');
    Route::post('/admin/dashboard/history-ebook', [HistoryEbookController::class, 'update'])->name('admin.historyEbook.update');

    // Performers / Line Up Management
    Route::get('/admin/dashboard/performers', [PerformerController::class, 'index'])->name('admin.performers.index');
    Route::get('/admin/dashboard/performers/create', [PerformerController::class, 'create'])->name('admin.performers.create');
    Route::post('/admin/dashboard/performers', [PerformerController::class, 'store'])->name('admin.performers.store');
    Route::get('/admin/dashboard/performers/{id}/edit', [PerformerController::class, 'edit'])->name('admin.performers.edit');
    Route::put('/admin/dashboard/performers/{id}', [PerformerController::class, 'update'])->name('admin.performers.update');
    Route::delete('/admin/dashboard/performers/{id}', [PerformerController::class, 'destroy'])->name('admin.performers.destroy');
});
// Route::get('/admin/dashboard/news/{id}/delete', function ($id) {
//     $news = News::findOrFail($id);
//     $news->delete();
//     return redirect()->back()->with('success', 'News deleted successfully');
// })->name('news.delete');
// Route::get('/admin/dashboard/news/{id}/edit', function ($id) {
//     $news = News::findOrFail($id);
//     return view('admin.news.editNews', compact('news'));
// })->name('news.edit');
// Route::post('/admin/dashboard/news/{id}/edit', function (Request $request, $id) {
//     $news = News::findOrFail($id);
//     $news->update($request->all());
//     return redirect()->route('news.showNews')->with('success', 'News updated successfully');
// })->name('news.update');
// Route::get('/admin/dashboard/news/{id}/delete', function ($id) {
//     $news = News::findOrFail($id);
//     $news->delete();
//     return redirect()->back()->with('success', 'News deleted successfully');
// })->name('news.delete');
// Route::get('/admin/dashboard/news/{id}/edit', function ($id) {
//     $news = News::findOrFail($id);
//     return view('admin.news.editNews', compact('news'));
// })->name('news.edit');
