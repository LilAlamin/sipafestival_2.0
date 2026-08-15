@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
            <a href="{{ route('news.showNews') }}" class="hover:text-[#4F1C51] transition-colors">Berita & Artikel</a>
            <span>/</span>
            <span class="text-gray-900 font-semibold">{{ isset($news) ? 'Edit Berita' : 'Buat Berita Baru' }}</span>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            {{ isset($news) ? 'Edit Berita' : 'Buat Berita Baru' }}
        </h2>
    </div>
    <div>
        <a href="{{ route('news.showNews') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>
</div>

<form action="{{ isset($news) ? route('news.updateBySlug', $news->slug) : route('news.store') }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @if(isset($news))
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Column: Main Article Content -->
        <div class="lg:col-span-8 bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8 space-y-6">
            
            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Judul Berita <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="title" 
                       id="title" 
                       value="{{ old('title', $news->title ?? '') }}" 
                       required 
                       placeholder="Contoh: SIPA 2026 Buka Kesempatan Relawan Internasional"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-base font-semibold focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
                
                <!-- Live Slug Helper -->
                <div class="flex items-center gap-1.5 mt-2 text-xs text-gray-400 font-mono">
                    <span>URL Slug: /news/</span>
                    <span id="slugPreview" class="text-gray-700 font-semibold">{{ $news->slug ?? 'judul-berita-otomatis' }}</span>
                </div>
            </div>

            <!-- Custom Slug (Optional) -->
            <div>
                <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-1.5">
                    Kustom Slug URL <span class="text-xs font-normal text-gray-400">(Opsional, otomatis dibuat dari judul jika dikosongkan)</span>
                </label>
                <input type="text" 
                       name="slug" 
                       id="slug" 
                       value="{{ old('slug', $news->slug ?? '') }}" 
                       placeholder="kustom-url-berita"
                       class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-gray-700 text-xs font-mono focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
            </div>

            <!-- Content / Description -->
            <div>
                <label for="description" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Isi Lengkap Berita / Artikel <span class="text-red-500">*</span>
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="12" 
                          required
                          placeholder="Tuliskan isi berita, siaran pers, atau liputan lengkap di sini..."
                          class="w-full px-4 py-3.5 rounded-xl border border-gray-200 text-gray-900 text-sm leading-relaxed focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all resize-y">{{ old('description', $news->description ?? '') }}</textarea>
            </div>

        </div>

        <!-- Right Column: Thumbnail Upload & Publish Actions -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Publish Action Card -->
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 space-y-4">
                <div class="border-b border-gray-100 pb-3">
                    <h4 class="font-bold text-gray-900 text-sm flex items-center justify-between">
                        <span>Status & Publikasi</span>
                        @if(isset($news) && $news->status === 'published')
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            Terbit
                        </span>
                        @elseif(isset($news))
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                            Draft
                        </span>
                        @endif
                    </h4>
                </div>

                <p class="text-xs text-gray-500">
                    Pilih untuk menerbitkan artikel langsung ke publik atau menyimpannya terlebih dahulu sebagai draft.
                </p>

                <div class="space-y-2.5 pt-2">
                    <button type="submit" 
                            name="action" 
                            value="publish" 
                            class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-bold shadow-md transition-all cursor-pointer">
                        <i class="bi bi-send-fill text-xs"></i>
                        <span>{{ isset($news) && $news->status === 'published' ? 'Simpan & Tetap Terbitkan' : 'Publikasikan Sekarang' }}</span>
                    </button>

                    <button type="submit" 
                            name="action" 
                            value="draft" 
                            class="w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all cursor-pointer">
                        <i class="bi bi-file-earmark-text text-xs text-amber-500"></i>
                        <span>Simpan sebagai Draft</span>
                    </button>
                </div>
            </div>

            <!-- Image Upload Card -->
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 space-y-4">
                <div class="border-b border-gray-100 pb-3">
                    <h4 class="font-bold text-gray-900 text-sm flex items-center justify-between">
                        <span>Foto Sampul Berita</span>
                        <span class="text-[11px] font-bold text-emerald-600">⚡ Auto WebP</span>
                    </h4>
                </div>

                <!-- Dropzone / File Picker -->
                <div class="border-2 border-dashed border-gray-300 hover:border-[#4F1C51] rounded-2xl p-5 text-center transition-all bg-gray-50/50 hover:bg-[#4F1C51]/5 cursor-pointer relative">
                    <input type="file" 
                           name="image" 
                           id="image" 
                           accept="image/*" 
                           {{ isset($news) ? '' : 'required' }}
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="flex flex-col items-center justify-center space-y-1 pointer-events-none">
                        <i class="bi bi-image text-2xl text-[#4F1C51]"></i>
                        <span class="text-xs font-bold text-[#4F1C51]">Pilih Foto Sampul</span>
                        <span class="text-[11px] text-gray-400">JPG, PNG, WEBP (Maks. 10MB)</span>
                    </div>
                </div>

                <!-- Image Preview -->
                <div>
                    <span class="block text-xs font-bold text-gray-500 mb-2">Pratinjau Foto:</span>
                    <div class="w-full h-44 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-400 relative shadow-sm">
                        @if(isset($news) && $news->image_path)
                            @php
                                $currentImg = file_exists(public_path('images/news/' . $news->image_path)) 
                                              ? asset('images/news/' . $news->image_path) 
                                              : asset('images/news/art1.png');
                            @endphp
                            <img id="imagePreview" src="{{ $currentImg }}" alt="Preview" class="w-full h-full object-cover">
                            <span id="previewPlaceholder" class="text-xs text-center px-2 hidden">Belum ada foto dipilih</span>
                        @else
                            <img id="imagePreview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                            <span id="previewPlaceholder" class="text-xs text-center px-2">Belum ada foto dipilih</span>
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('title');
        const customSlugInput = document.getElementById('slug');
        const slugPreview = document.getElementById('slugPreview');

        const imageInput = document.getElementById('image');
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('previewPlaceholder');

        // Auto slug generator from title
        function generateSlug(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }

        if (titleInput && slugPreview) {
            titleInput.addEventListener('input', function() {
                if (!customSlugInput.value.trim()) {
                    const slug = generateSlug(this.value);
                    slugPreview.textContent = slug || 'judul-berita-otomatis';
                }
            });
        }

        if (customSlugInput && slugPreview) {
            customSlugInput.addEventListener('input', function() {
                if (this.value.trim()) {
                    slugPreview.textContent = generateSlug(this.value);
                } else if (titleInput) {
                    slugPreview.textContent = generateSlug(titleInput.value) || 'judul-berita-otomatis';
                }
            });
        }

        // Live image preview
        if (imageInput) {
            imageInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.classList.remove('hidden');
                        if (placeholder) placeholder.classList.add('hidden');
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }
    });
</script>
@endsection
