@extends('admin.layouts.main')

@section('content')
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 max-w-4xl">
    <h3 class="text-xl font-extrabold text-[#4F1C51] tracking-tight mb-6 flex items-center gap-2">
        <i class="bi {{ isset($news) ? 'bi-pencil-square' : 'bi-plus-circle-fill' }}"></i>
        {{ isset($news) ? 'Edit Berita' : 'Buat Berita Baru' }}
    </h3>

    <form action="{{ isset($news) ? route('news.updateBySlug', $news->slug) : route('news.store') }}" 
          method="POST" 
          enctype="multipart/form-data" 
          class="space-y-6">
        @csrf
        @if(isset($news))
            @method('PUT')
        @endif

        <!-- Judul Berita -->
        <div>
            <label for="title" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">
                Judul Berita
            </label>
            <input name="title" 
                   type="text" 
                   id="title"
                   value="{{ old('title', $news->title ?? '') }}" 
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#4F1C51] focus:ring-4 focus:ring-[#4F1C51]/10 text-sm transition-all" 
                   placeholder="Masukkan judul berita..." 
                   required>
        </div>

        <!-- Isi Berita -->
        <div>
            <label for="description" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">
                Isi Berita
            </label>
            <textarea name="description" 
                      id="description" 
                      rows="8" 
                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#4F1C51] focus:ring-4 focus:ring-[#4F1C51]/10 text-sm transition-all" 
                      placeholder="Tulis isi berita di sini..." 
                      required>{{ old('description', $news->description ?? '') }}</textarea>
        </div>

        <!-- Foto Upload -->
        <div>
            <label for="image" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">
                Foto Berita (JPG, PNG, JPEG; maks 2MB)
            </label>
            <input type="file" 
                   id="image" 
                   name="image" 
                   accept=".jpg, .jpeg, .png"
                   class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:outline-none focus:border-[#4F1C51] focus:ring-4 focus:ring-[#4F1C51]/10 text-sm file:mr-4 file:py-1.5 file:px-3.5 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-purple-50 file:text-[#4F1C51] hover:file:bg-purple-100 transition-all"
                   {{ isset($news) ? '' : 'required' }}>
            
            <!-- Current Image Preview -->
            @if(isset($news) && $news->image_path)
                <div class="mt-4 p-4 bg-gray-50/50 border border-gray-100 rounded-2xl max-w-sm">
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Gambar saat ini:</span>
                    <img src="{{ asset('/images/news/' . $news->image_path) }}" 
                         alt="Gambar lama" 
                         class="max-h-48 w-auto object-cover rounded-xl shadow-sm border border-gray-150">
                </div>
            @endif
        </div>

        <!-- Submit & Back Buttons -->
        <div class="flex flex-wrap items-center gap-3 pt-2">
            <button type="submit" 
                    name="action"
                    value="publish"
                    class="px-6 py-3 bg-[#4F1C51] hover:bg-[#3e1540] text-white font-bold rounded-xl shadow-lg shadow-[#4F1C51]/15 transition-all text-sm cursor-pointer">
                <i class="bi bi-send-fill mr-1.5 text-xs"></i>
                {{ isset($news) && $news->status === 'published' ? 'Update Berita' : 'Terbitkan Sekarang' }}
            </button>
            <button type="submit" 
                    name="action"
                    value="draft"
                    class="px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 font-bold rounded-xl transition-all text-sm cursor-pointer">
                <i class="bi bi-file-earmark-text-fill mr-1.5 text-xs text-amber-500"></i>
                Simpan sebagai Draft
            </button>
            <a href="{{ route('news.showNews') }}" 
               class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl transition-all text-sm text-center">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

