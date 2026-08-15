@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
            <a href="{{ route('admin.gallery.index') }}" class="hover:text-[#4F1C51] transition-colors">Galeri Visual</a>
            <span>/</span>
            <span class="text-gray-900 font-semibold">Tambah Galeri Tahun Baru</span>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Tambah Galeri Tahun Baru
        </h2>
    </div>
    <div>
        <a href="{{ route('admin.gallery.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>
</div>

<form action="{{ route('admin.gallery.store') }}" 
      method="POST" 
      enctype="multipart/form-data">
    @csrf

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Left Column: Main Info -->
        <div class="lg:col-span-8 space-y-6">
            
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
                               value="{{ old('year', date('Y')) }}" 
                               required 
                               placeholder="Contoh: 2026"
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
                               value="{{ old('location', 'Benteng Vastenburg, Solo') }}" 
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
                           value="{{ old('theme_title') }}" 
                           required 
                           placeholder="Contoh: Kinetic Kinship : Beyond Boundaries"
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
                              placeholder="Tuliskan ulasan, cerita kilas balik, semangat tema, dan rangkuman festival di tahun ini..."
                              class="w-full px-4 py-3.5 rounded-xl border border-gray-200 text-gray-900 text-sm leading-relaxed focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all resize-y">{{ old('description') }}</textarea>
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
                           value="{{ old('aftermovie_url') }}" 
                           placeholder="https://www.youtube.com/watch?v=... atau https://youtu.be/..."
                           class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm font-mono focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
                </div>

            </div>

            <!-- Documentation Photos Upload -->
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8 space-y-4">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <h3 class="text-base font-bold text-gray-900 flex items-center gap-2">
                        <i class="bi bi-images text-[#4F1C51]"></i>
                        <span>Unggah Foto Dokumentasi (Banyak Foto Sekaligus)</span>
                    </h3>
                    <span class="text-xs font-bold text-emerald-600">⚡ Auto WebP</span>
                </div>

                <!-- Multi-file Dropzone -->
                <div class="border-2 border-dashed border-gray-300 hover:border-[#4F1C51] rounded-2xl p-8 text-center transition-all bg-gray-50/50 hover:bg-[#4F1C51]/5 cursor-pointer relative">
                    <input type="file" 
                           name="photos[]" 
                           id="photos" 
                           multiple 
                           accept="image/*" 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="flex flex-col items-center justify-center space-y-2 pointer-events-none">
                        <i class="bi bi-cloud-arrow-up text-4xl text-[#4F1C51]"></i>
                        <span class="text-sm font-bold text-[#4F1C51]">Klik atau seret foto-foto dokumentasi ke sini</span>
                        <span class="text-xs text-gray-400">Dapat memilih banyak foto sekaligus (JPG, PNG, WEBP). Sistem akan otomatis mengonversi ke format WebP ringan.</span>
                    </div>
                </div>

                <!-- Selected Files Counter & Preview -->
                <div id="photosPreviewGrid" class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-3 pt-2"></div>
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
                           {{ old('is_published', true) ? 'checked' : '' }} 
                           class="mt-1 w-4 h-4 text-[#4F1C51] rounded border-gray-300 focus:ring-[#4F1C51]">
                    <div>
                        <span class="text-sm font-bold text-gray-900 block">Terbitkan Galeri</span>
                        <span class="text-xs text-gray-500">Tampilkan tahun ini di halaman galeri publik (`/gallery`).</span>
                    </div>
                </label>

                <div class="pt-2">
                    <button type="submit" 
                            class="w-full inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-bold shadow-md transition-all cursor-pointer">
                        <i class="bi bi-check-circle-fill text-sm"></i>
                        <span>Simpan & Buat Galeri</span>
                    </button>
                </div>
            </div>

            <!-- Maskot Image Upload Card -->
            <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 space-y-4">
                <div class="border-b border-gray-100 pb-3 flex items-center justify-between">
                    <h4 class="font-bold text-gray-900 text-sm">
                        Foto Maskot / Poster Tahun
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
                        <span class="text-xs font-bold text-[#4F1C51]">Pilih Foto Maskot</span>
                        <span class="text-[11px] text-gray-400">JPG, PNG, WEBP</span>
                    </div>
                </div>

                <div>
                    <span class="block text-xs font-bold text-gray-500 mb-2">Pratinjau Maskot:</span>
                    <div class="w-full h-56 rounded-xl overflow-hidden bg-gray-900 border border-gray-200 flex items-center justify-center text-gray-400 relative shadow-sm">
                        <img id="maskotPreview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                        <span id="maskotPlaceholder" class="text-xs text-center px-2">Belum ada foto maskot dipilih</span>
                    </div>
                </div>

            </div>

        </div>

    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Maskot Preview
        const maskotInput = document.getElementById('maskot_image');
        const maskotPreview = document.getElementById('maskotPreview');
        const maskotPlaceholder = document.getElementById('maskotPlaceholder');

        if (maskotInput) {
            maskotInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        maskotPreview.src = e.target.result;
                        maskotPreview.classList.remove('hidden');
                        if (maskotPlaceholder) maskotPlaceholder.classList.add('hidden');
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
