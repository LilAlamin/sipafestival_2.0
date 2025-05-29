<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeNewsController;


// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [NewsController::class, 'showNewsHome'])->name('news.showNewsHome');
Route::get('/news', [NewsController::class, 'showAllNews'])->name('news.showAllNews');
Route::get('/news/{slug}', [NewsController::class, 'viewBySlug'])->name('news.HomeView');

Route::get('/lineup', function () {
    return view('lineup');
});
Route::get('/aboutus/history', function () {
    return view('aboutus/history');
});
Route::get('/aboutus/director', function () {
    return view('aboutus/director');
});
Route::get('/gallery/2009', function () {
    return view('gallery/2009');
});
Route::get('/gallery/2010', function () {
    return view('gallery/2010');
});
Route::get('/gallery/2011', function () {
    return view('gallery/2011');
});
Route::get('/gallery/2012', function () {
    return view('gallery/2012');
});
Route::get('/gallery/2013', function () {
    return view('gallery/2013');
});
Route::get('/gallery/2013', function () {
    return view('gallery/2013');
});
Route::get('/gallery/2014', function () {
    return view('gallery/2014');
});
Route::get('/gallery/2015', function () {
    return view('gallery/2015');
});
Route::get('/gallery/2016', function () {
    return view('gallery/2016');
});
Route::get('/gallery/2017', function () {
    return view('gallery/2017');
});
Route::get('/gallery/2018', function () {
    return view('gallery/2018');
});
Route::get('/gallery/2019', function () {
    return view('gallery/2019');
});
Route::get('/gallery/2020', function () {
    return view('gallery/2020');
});
Route::get('/gallery/2021', function () {
    return view('gallery/2021');
});
Route::get('/gallery/2022', function () {
    return view('gallery/2022');
});
Route::get('/gallery/2023', function () {
    return view('gallery/2023');
});
Route::get('/gallery/2024', function () {
    return view('gallery/2024');
});

Route::post('/', [ComplaintController::class, 'store'])->name('data.store');

// admin

Route::get('/admin/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [loginController::class, 'login'])->name('loginbaru');
Route::post('/admin/logout', [loginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Route::get('/admin/dashboard', [dashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('/admin/dashboard/', [ComplaintController::class, 'store'])->name('admin.dashboard.store');
    Route::get('/admin/dashboard/', [ComplaintController::class, 'showComplaint'])->name('admin.dashboard.showComplaint');

    Route::get('/admin/dashboard/{id}/reply', [ComplaintController::class, 'sendEmail'])->name('admin.dashboard.sendEmail');
    Route::post('/admin/dashboard/{id}/reply', [EmailController::class, 'sendEmail'])->name('admin.ReplyEmail');

    Route::get('/admin/dashboard/reply', function () {
        return view('admin.reply');
    });

    Route::get('/admin/dashboard/news/makeNews', function () {
        return view('admin.news.makeNews');
    });

    Route::post('/admin/dashboard/news/makeNews', [NewsController::class, 'store'])->name('news.store');
    Route::get('/admin/dashboard/news', [NewsController::class, 'showNews'])->name('news.showNews');

    // News routes (dalam group middleware auth)
    Route::get('/admin/dashboard/news/{slug}', [NewsController::class, 'viewBySlug'])->name('news.view');
    Route::get('/admin/dashboard/news/edit/{slug}', [NewsController::class, 'editBySlug'])->name('news.editBySlug');
    Route::put('/admin/dashboard/news/edit/{slug}', [NewsController::class, 'updateBySlug'])->name('news.updateBySlug');
    Route::delete('/admin/dashboard/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');
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
