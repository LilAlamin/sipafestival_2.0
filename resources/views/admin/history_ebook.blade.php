@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Kelola E-Book & PDF History
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">
            Unggah dan perbarui file PDF buku dokumentasi sejarah SIPA yang ditampilkan pada flipbook interaktif di halaman History.
        </p>
    </div>
    <div>
        <a href="/aboutus/history" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gray-900 hover:bg-gray-800 text-white text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-box-arrow-up-right"></i>
            <span>Lihat Halaman History</span>
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Left Column: Upload & Settings Form -->
    <div class="lg:col-span-7 bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8">
        <div class="border-b border-gray-100 pb-4 mb-6">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <i class="bi bi-file-earmark-pdf-fill text-red-600 text-xl"></i>
                <span>Formulir Pengaturan E-Book</span>
            </h3>
            <p class="text-xs text-gray-500 mt-1">
                Ubah judul buku, deskripsi, atau unggah dokumen PDF baru untuk menggantikan file yang sedang aktif.
            </p>
        </div>

        <form action="{{ route('admin.historyEbook.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- E-Book Title -->
            <div>
                <label for="title" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Judul E-Book / Dokumen <span class="text-red-500">*</span>
                </label>
                <div class="relative rounded-xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="bi bi-book text-base"></i>
                    </div>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title', $title) }}"
                           placeholder="Contoh: Enam Belas Tahun Perjalanan SIPA"
                           required
                           class="block w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] transition-all bg-gray-50/50 hover:bg-white" />
                </div>
            </div>

            <!-- E-Book Subtitle / Description -->
            <div>
                <label for="subtitle" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Deskripsi / Subtitle E-Book
                </label>
                <textarea name="subtitle" 
                          id="subtitle" 
                          rows="2"
                          placeholder="Buku dokumentasi dan arsip profil festival seni pertunjukan Internasional Solo dari masa ke masa."
                          class="block w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] transition-all bg-gray-50/50 hover:bg-white resize-none">{{ old('subtitle', $subtitle) }}</textarea>
            </div>

            <!-- PDF File Upload Dropzone -->
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1.5">
                    Unggah File PDF Baru <span class="text-xs font-normal text-gray-500">(Opsional jika hanya ingin mengubah judul)</span>
                </label>
                
                <div id="dropzone" class="border-2 border-dashed border-gray-300 hover:border-[#4F1C51] rounded-2xl p-6 text-center transition-all bg-gray-50/50 hover:bg-[#4F1C51]/5 cursor-pointer relative">
                    <input type="file" 
                           name="pdf_file" 
                           id="pdf_file" 
                           accept="application/pdf"
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" />
                    
                    <div class="flex flex-col items-center justify-center space-y-2 pointer-events-none">
                        <div class="w-12 h-12 rounded-full bg-red-50 text-red-600 flex items-center justify-center text-2xl">
                            <i class="bi bi-cloud-arrow-up-fill"></i>
                        </div>
                        <div class="text-sm">
                            <span class="font-bold text-[#4F1C51]">Klik untuk memilih file PDF</span> atau seret file ke sini
                        </div>
                        <p class="text-xs text-gray-500">
                            Format yang didukung: <strong>.PDF</strong> (Maksimal 100 MB)
                        </p>
                        <div id="fileSelectedFeedback" class="hidden mt-2 inline-flex items-center gap-2 px-3 py-1.5 rounded-lg bg-emerald-100 text-emerald-800 text-xs font-bold">
                            <i class="bi bi-file-earmark-check-fill"></i>
                            <span id="selectedFileName">File terpilih</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-3 border-t border-gray-100 flex items-center justify-end gap-3">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-bold shadow-md transition-all">
                    <i class="bi bi-check-lg text-lg"></i>
                    <span>Simpan & Perbarui E-Book</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Right Column: Current Active PDF Status & Card Info -->
    <div class="lg:col-span-5 space-y-6">
        
        <!-- Active File Card -->
        <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8">
            <div class="border-b border-gray-100 pb-4 mb-5 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="bi bi-check-circle-fill text-emerald-500"></i>
                        <span>Status Dokumen Aktif</span>
                    </h3>
                    <p class="text-xs text-gray-500 mt-0.5">
                        Dokumen yang saat ini dimuat pada flipbook web
                    </p>
                </div>
            </div>

            <div class="p-4 rounded-xl bg-gray-50 border border-gray-200 flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-2xl shrink-0">
                    <i class="bi bi-file-pdf"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="text-sm font-bold text-gray-900 truncate" title="{{ $title }}">
                        {{ $title }}
                    </h4>
                    <p class="text-xs text-gray-500 truncate mt-0.5">
                        {{ $originalName }}
                    </p>
                    <div class="flex items-center gap-3 mt-2 text-xs text-gray-500">
                        <span class="inline-flex items-center gap-1 font-semibold text-gray-700">
                            <i class="bi bi-hdd-fill text-gray-400"></i> {{ $fileSizeFormatted }}
                        </span>
                        @if($lastModified)
                        <span>•</span>
                        <span>{{ $lastModified }}</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Action Buttons for Current PDF -->
            <div class="mt-6 flex flex-col sm:flex-row gap-3">
                <a href="{{ asset($pdfPath) }}" target="_blank" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-xs font-bold transition-all shadow-sm">
                    <i class="bi bi-eye-fill"></i>
                    <span>Buka PDF di Tab Baru</span>
                </a>
                <a href="{{ asset($pdfPath) }}" download="{{ \Illuminate\Support\Str::slug($title) }}.pdf" class="flex-1 inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-[#406422] hover:bg-[#2d4718] text-white text-xs font-bold transition-all shadow-sm">
                    <i class="bi bi-download"></i>
                    <span>Unduh PDF</span>
                </a>
            </div>
        </div>

        <!-- Information Help Box -->
        <div class="bg-amber-50 rounded-2xl border border-amber-200 p-5 text-amber-900 text-xs leading-relaxed space-y-2">
            <h4 class="font-bold flex items-center gap-2 text-amber-950">
                <i class="bi bi-lightbulb-fill text-amber-600 text-sm"></i>
                <span>Tips Flipbook E-Book</span>
            </h4>
            <p>
                Flipbook pada halaman History menggunakan teknologi <strong>PDF.js</strong> dan <strong>StPageFlip 3D Engine</strong> yang merender halaman buku secara otomatis.
            </p>
            <p>
                Untuk performa terbaik pada browser pengunjung, pastikan file PDF telah dikompresi dengan resolusi teks dan foto yang optimal.
            </p>
        </div>

    </div>

</div>

<!-- Dropzone Feedback Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('pdf_file');
        const feedback = document.getElementById('fileSelectedFeedback');
        const fileNameSpan = document.getElementById('selectedFileName');

        fileInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                const file = this.files[0];
                const sizeMb = (file.size / (1024 * 1024)).toFixed(2);
                fileNameSpan.textContent = file.name + ' (' + sizeMb + ' MB)';
                feedback.classList.remove('hidden');
            } else {
                feedback.classList.add('hidden');
            }
        });
    });
</script>
@endsection
