@extends('admin.layouts.main')

@section('content')
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 max-w-4xl">
    <!-- Title -->
    <h3 class="text-2xl font-black text-gray-900 leading-snug tracking-tight mb-2">
        {{ $news->title }}
    </h3>
    
    <!-- Time metadata -->
    <div class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider mb-6">
        Diterbitkan: {{ $news->created_at->translatedFormat('d F Y - H:i') }} WIB
    </div>

    <!-- Image -->
    <div class="mb-6">
        <img src="{{ asset('/images/news/' . $news->image_path) }}" 
             class="max-h-96 w-auto object-cover rounded-2xl shadow-sm border border-gray-150" 
             alt="{{ $news->title }}">
    </div>

    <!-- Description -->
    <p class="text-gray-600 leading-relaxed text-sm whitespace-pre-line bg-gray-50 p-6 rounded-2xl border border-gray-100">
        {{ $news->description }}
    </p>

    <!-- Navigation -->
    <div class="mt-6 pt-2">
        <a href="{{ route('news.showNews') }}" 
           class="inline-flex items-center gap-1.5 px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl transition-all text-sm">
            <i class="bi bi-arrow-left"></i>
            Kembali Ke Daftar Berita
        </a>
    </div>
</div>
@endsection

