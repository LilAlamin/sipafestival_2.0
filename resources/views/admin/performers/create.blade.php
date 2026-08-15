@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
            <a href="{{ route('admin.performers.index') }}" class="hover:text-[#4F1C51] transition-colors">Line Up & Performers</a>
            <span>/</span>
            <span class="text-gray-900 font-semibold">Tambah Penampil Baru</span>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Tambah Performer Baru
        </h2>
    </div>
    <div>
        <a href="{{ route('admin.performers.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-arrow-left"></i>
            <span>Kembali ke Daftar</span>
        </a>
    </div>
</div>

<div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8 max-w-4xl">
    <form action="{{ route('admin.performers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Performer Name -->
            <div class="md:col-span-2">
                <label for="name" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Nama Penampil / Artis / Grup <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="name" 
                       id="name" 
                       value="{{ old('name') }}" 
                       required 
                       placeholder="Contoh: Khambatta Dance Company"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
            </div>

            <!-- Delegate Type -->
            <div>
                <label for="type" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Tipe Delegasi <span class="text-red-500">*</span>
                </label>
                <select name="type" 
                        id="type" 
                        required
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
                    <option value="international" {{ old('type') === 'international' ? 'selected' : '' }}>🌍 International Delegate (Delegasi Internasional)</option>
                    <option value="national" {{ old('type') === 'national' ? 'selected' : '' }}>🇮🇩 National Delegate (Delegasi Nasional)</option>
                </select>
            </div>

            <!-- Category / Genre -->
            <div>
                <label for="category" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Kategori Seni / Genre
                </label>
                <input type="text" 
                       name="category" 
                       id="category" 
                       value="{{ old('category') }}" 
                       placeholder="Contoh: Contemporary Dance / Physical Theater / Ethnic Music"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
            </div>

            <!-- Country / Origin -->
            <div>
                <label for="country" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Negara / Asal Kota <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="country" 
                       id="country" 
                       value="{{ old('country') }}" 
                       required 
                       placeholder="Contoh: United States of America / South Korea / Bali"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
            </div>

            <!-- Country Badge -->
            <div>
                <label for="country_badge" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Singkatan Badge Negara / Asal <span class="text-xs font-normal text-gray-400">(Muncul di sudut kartu)</span>
                </label>
                <input type="text" 
                       name="country_badge" 
                       id="country_badge" 
                       value="{{ old('country_badge') }}" 
                       placeholder="Contoh: USA / KOR / IDN / BALI"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all uppercase">
            </div>

            <!-- Order Index -->
            <div>
                <label for="order" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Urutan Tampil <span class="text-xs font-normal text-gray-400">(Angka lebih kecil tampil duluan)</span>
                </label>
                <input type="number" 
                       name="order" 
                       id="order" 
                       value="{{ old('order', 0) }}" 
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
            </div>

            <!-- Featured On Home Checkbox -->
            <div class="flex items-center pt-8">
                <label class="relative flex items-center gap-3 cursor-pointer select-none">
                    <input type="checkbox" 
                           name="is_featured_home" 
                           value="1" 
                           {{ old('is_featured_home') ? 'checked' : '' }}
                           class="w-5 h-5 rounded border-gray-300 text-[#4F1C51] focus:ring-[#4F1C51]">
                    <span class="text-sm font-bold text-gray-800">
                        🌟 Tampilkan di Beranda (Meet Our Performers)
                    </span>
                </label>
            </div>

            <!-- Description -->
            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Deskripsi Singkat Profil Penampil <span class="text-xs font-normal text-gray-400">(Opsional)</span>
                </label>
                <textarea name="description" 
                          id="description" 
                          rows="3" 
                          placeholder="Tuliskan biografi singkat atau keunikan karya penampil..."
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all resize-none">{{ old('description') }}</textarea>
            </div>

            <!-- Photo Upload with Automatic WebP Conversion -->
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 mb-1.5">
                    Foto Performer <span class="text-red-500">*</span>
                    <span class="text-xs font-normal text-emerald-600 ml-1">⚡ Otomatis dikonversi ke format WebP ringan</span>
                </label>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-center">
                    
                    <!-- File Input Dropzone -->
                    <div class="md:col-span-8 border-2 border-dashed border-gray-300 hover:border-[#4F1C51] rounded-2xl p-6 text-center transition-all bg-gray-50/50 hover:bg-[#4F1C51]/5 cursor-pointer relative">
                        <input type="file" 
                               name="image" 
                               id="image" 
                               accept="image/*" 
                               required
                               class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                        <div class="flex flex-col items-center justify-center space-y-1.5 pointer-events-none">
                            <i class="bi bi-image text-3xl text-[#4F1C51]"></i>
                            <span class="text-sm font-bold text-[#4F1C51]">Pilih Foto Penampil</span>
                            <span class="text-xs text-gray-500">Mendukung JPEG, PNG, JPG, WEBP (Maks. 10MB)</span>
                        </div>
                    </div>

                    <!-- Live Image Preview Card -->
                    <div class="md:col-span-4 flex flex-col items-center justify-center">
                        <div class="w-28 h-36 rounded-2xl overflow-hidden bg-gray-100 border-2 border-gray-200 flex items-center justify-center text-gray-400 relative shadow-sm">
                            <img id="imagePreview" src="#" alt="Preview" class="w-full h-full object-cover hidden">
                            <span id="previewPlaceholder" class="text-xs text-center px-2">Preview Foto</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="pt-6 border-t border-gray-150 flex items-center justify-end gap-3">
            <a href="{{ route('admin.performers.index') }}" class="px-5 py-2.5 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-50 text-sm font-semibold transition-all">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-bold shadow-md transition-all">
                <i class="bi bi-check-lg text-lg"></i>
                <span>Simpan Performer</span>
            </button>
        </div>

    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const preview = document.getElementById('imagePreview');
        const placeholder = document.getElementById('previewPlaceholder');

        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endsection
