@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
            <a href="{{ route('admin.gallery.index') }}" class="hover:text-[#4F1C51] transition-colors">Galeri Visual</a>
            <span>/</span>
            <span class="text-gray-900 font-semibold">Kelola Galeri SIPA {{ $gallery->year }}</span>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Kelola Galeri SIPA {{ $gallery->year }}
        </h2>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ url('/gallery/' . $gallery->year) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-box-arrow-up-right"></i>
            <span>Lihat Halaman Publik</span>
        </a>
        <a href="{{ route('admin.gallery.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>
</div>

<form action="{{ route('admin.gallery.update', $gallery->id) }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Column: Main Info & Photo Gallery Manager -->
        <div class="lg:col-span-8 space-y-8">
            
            <!-- Basic Information Card -->
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8 space-y-6">
                <h3 class="text-base font-bold text-gray-900 border-b border-gray-100 pb-3 flex items-center gap-2">
                    <i class="bi bi-info-circle text-[#4F1C51]"></i>
                    <span>Informasi Festival</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-sm font-bold text-gray-700 mb-1.5">
                            Tahun Festival <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               name="year" 
                               id="year" 
                               min="2000" 
                               max="2099" 
                               value="{{ old('year', $gallery->year) }}" 
                               required 
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 font-mono font-bold text-base focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
                    </div>

                    <!-- Location / Subtitle -->
                    <div>
                        <label for="location" class="block text-sm font-bold text-gray-700 mb-1.5">
                            Lokasi / Tempat Penyelenggaraan
                        </label>
                        <input type="text" 
                               name="location" 
                               id="location" 
                               value="{{ old('location', $gallery->location) }}" 
                               placeholder="Contoh: Benteng Vastenburg, Solo"
                               class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm font-medium focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
                    </div>
                </div>

                <!-- Theme Title -->
                <div>
                    <label for="theme_title" class="block text-sm font-bold text-gray-700 mb-1.5">
                        Tema Utama Festival <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="theme_title" 
                           id="theme_title" 
                           value="{{ old('theme_title', $gallery->theme_title) }}" 
                           required 
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-base font-semibold focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-1.5">
                        Deskripsi Kilas Balik Festival
                    </label>
                    <textarea name="description" 
                              id="description" 
                              rows="6" 
                              placeholder="Tuliskan ulasan, cerita kilas balik, semangat tema, dan rangkuman festival..."
                              class="w-full px-4 py-3.5 rounded-xl border border-gray-200 text-gray-900 text-sm leading-relaxed focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all resize-y">{{ old('description', $gallery->description) }}</textarea>
                </div>

                <!-- Aftermovie YouTube URL -->
                <div>
                    <label for="aftermovie_url" class="block text-sm font-bold text-gray-700 mb-1.5 flex items-center justify-between">
                        <span>Link Video Aftermovie (YouTube)</span>
                        <span class="text-xs text-red-500 font-semibold"><i class="bi bi-youtube mr-1"></i> YouTube Embed/Watch Link</span>
                    </label>
                    <input type="url" 
                           name="aftermovie_url" 
                           id="aftermovie_url" 
                           value="{{ old('aftermovie_url', $gallery->aftermovie_url) }}" 
                           placeholder="https://www.youtube.com/watch?v=... atau https://youtu.be/..."
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm font-mono focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
                </div>

            </div>

            <!-- Existing Photo Gallery Manager Card -->
            @php
                $currentPhotos = is_array($gallery->photos) ? $gallery->photos : [];
            @endphp
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8 space-y-6">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                            <i class="bi bi-images text-[#4F1C51]"></i>
                            <span>Daftar Foto Dokumentasi Saat Ini ({{ count($currentPhotos) }} Foto)</span>
                        </h3>
                        <p class="text-xs text-gray-400 mt-0.5">Klik tombol hapus pada foto jika ingin menghapus foto tertentu.</p>
                    </div>
                </div>

                @if(count($currentPhotos) > 0)
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    @foreach($currentPhotos as $pIndex => $pPath)
                    @php
                        $imgUrl = file_exists(public_path('images/' . $pPath)) ? asset('images/' . $pPath) : (file_exists(public_path($pPath)) ? asset($pPath) : asset('images/gallery/2025/panggung (1).webp'));
                    @endphp
                    <div class="group relative rounded-xl overflow-hidden border border-gray-200 bg-gray-900 h-28 shadow-xs">
                        <img src="{{ $imgUrl }}" alt="Photo {{ $pIndex + 1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                            <button type="button" 
                                    onclick="deleteSpecificPhoto('{{ addslashes($pPath) }}')" 
                                    class="w-8 h-8 rounded-lg bg-red-600 hover:bg-red-700 text-white flex items-center justify-center shadow-md transition-all cursor-pointer"
                                    title="Hapus foto ini">
                                <i class="bi bi-trash text-xs"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="p-6 text-center text-gray-400 border-2 border-dashed border-gray-200 rounded-xl">
                    <p class="text-xs font-semibold">Belum ada foto dokumentasi di galeri tahun {{ $gallery->year }}.</p>
                </div>
                @endif

                <!-- Upload Additional Photos -->
                <div class="pt-4 border-t border-gray-100 space-y-4">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-bold text-gray-700">
                            Tambah Foto Baru (Upload Sekaligus)
                        </label>
                        <span class="text-xs font-bold text-emerald-600">⚡ Auto WebP</span>
                    </div>

                    <div class="border-2 border-dashed border-gray-300 hover:border-[#4F1C51] rounded-2xl p-6 text-center transition-all bg-gray-50/50 hover:bg-[#4F1C51]/5 cursor-pointer relative">
                        <input type="file" 
                               name="photos[]" 
                               id="photos" 
                               multiple 
                               accept="image/*" 
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="flex flex-col items-center justify-center space-y-1.5 pointer-events-none">
                            <i class="bi bi-cloud-plus text-3xl text-[#4F1C51]"></i>
                            <span class="text-xs font-bold text-[#4F1C51]">Pilih foto-foto baru untuk ditambahkan ke galeri</span>
                            <span class="text-[11px] text-gray-400">JPG, PNG, WEBP. Otomatis dikonversi ke WebP.</span>
                        </div>
                    </div>

                    <div id="photosPreviewGrid" class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3 pt-2"></div>
                </div>

            </div>

        </div>

        <!-- Right Column: Mascot & Publish Action -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Publish Card -->
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 space-y-4">
                <h4 class="font-bold text-gray-900 text-sm border-b border-gray-100 pb-3">
                    Status Publikasi
                </h4>

                <label class="flex items-start gap-3 p-3 rounded-xl border border-gray-200 bg-gray-50/50 hover:bg-gray-50 cursor-pointer transition-colors">
                    <input type="checkbox" 
                           name="is_published" 
                           value="1" 
                           {{ old('is_published', $gallery->is_published) ? 'checked' : '' }} 
                           class="mt-1 w-4 h-4 text-[#4F1C51] rounded border-gray-300 focus:ring-[#4F1C51]">
                    <div>
                        <span class="text-sm font-bold text-gray-900 block">Terbitkan Galeri</span>
                        <span class="text-xs text-gray-500">Tampilkan tahun ini di halaman galeri publik (`/gallery`).</span>
                    </div>
                </label>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-bold shadow-md transition-all cursor-pointer">
                        <i class="bi bi-check2-circle text-base"></i>
                        <span>Simpan Perubahan Galeri</span>
                    </button>
                </div>
            </div>

            <!-- Maskot Image Upload Card -->
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 space-y-4">
                <div class="border-b border-gray-100 pb-3 flex items-center justify-between">
                    <h4 class="font-bold text-gray-900 text-sm">
                        Foto Maskot / Poster
                    </h4>
                    <span class="text-[11px] font-bold text-emerald-600">⚡ Auto WebP</span>
                </div>

                <div class="border-2 border-dashed border-gray-300 hover:border-[#4F1C51] rounded-2xl p-5 text-center transition-all bg-gray-50/50 hover:bg-[#4F1C51]/5 cursor-pointer relative">
                    <input type="file" 
                           name="maskot_image" 
                           id="maskot_image" 
                           accept="image/*" 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="flex flex-col items-center justify-center space-y-1 pointer-events-none">
                        <i class="bi bi-person-badge text-2xl text-[#4F1C51]"></i>
                        <span class="text-xs font-bold text-[#4F1C51]">Ganti Foto Maskot</span>
                        <span class="text-[11px] text-gray-400">JPG, PNG, WEBP</span>
                    </div>
                </div>

                <div>
                    <span class="block text-xs font-bold text-gray-500 mb-2">Maskot Saat Ini:</span>
                    <div class="w-full h-56 rounded-xl overflow-hidden bg-gray-900 border border-gray-200 flex items-center justify-center text-gray-400 relative shadow-sm">
                        <img id="maskotPreview" src="{{ $gallery->maskot_src }}" alt="Preview" class="w-full h-full object-cover">
                    </div>
                </div>

            </div>

        </div>

    </div>
</form>

<!-- Separate Form for Photo Deletion -->
<form id="deletePhotoForm" action="{{ route('admin.gallery.deletePhoto', $gallery->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
    <input type="hidden" name="photo" id="photoToDeleteInput">
</form>

<script>
    function deleteSpecificPhoto(photoPath) {
        if (confirm('Yakin ingin menghapus foto dokumentasi ini?')) {
            document.getElementById('photoToDeleteInput').value = photoPath;
            document.getElementById('deletePhotoForm').submit();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Maskot Preview
        const maskotInput = document.getElementById('maskot_image');
        const maskotPreview = document.getElementById('maskotPreview');

        if (maskotInput && maskotPreview) {
            maskotInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        maskotPreview.src = e.target.result;
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }

        // Multi Photos Preview
        const photosInput = document.getElementById('photos');
        const photosPreviewGrid = document.getElementById('photosPreviewGrid');

        if (photosInput && photosPreviewGrid) {
            photosInput.addEventListener('change', function() {
                photosPreviewGrid.innerHTML = '';
                if (this.files && this.files.length > 0) {
                    Array.from(this.files).forEach((file, index) => {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const div = document.createElement('div');
                            div.className = 'relative h-20 rounded-lg overflow-hidden border border-gray-200 bg-gray-100 shadow-xs';
                            div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                            photosPreviewGrid.appendChild(div);
                        }
                        reader.readAsDataURL(file);
                    });
                }
            });
        }
    });
</script>
@endsection
