@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Kelola Galeri & Kilas Balik Visual
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">
            Kelola arsip dokumentasi, maskot per tahun, deskripsi tema, dan video aftermovie SIPA Festival dari masa ke masa.
        </p>
    </div>
    <div class="flex items-center gap-3">
        <a href="/gallery" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-box-arrow-up-right"></i>
            <span>Lihat Galeri Publik</span>
        </a>
        <a href="{{ route('admin.gallery.create') }}" 
           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-plus-lg text-base"></i>
            <span>Tambah Galeri Tahun Baru</span>
        </a>
    </div>
</div>

<!-- Shortlist Filters & Search Bar -->
<div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-4 sm:p-5 mb-6 flex flex-col md:flex-row items-center justify-between gap-4">
    
    <!-- Status Filter Tabs -->
    <div class="flex items-center gap-2 w-full md:w-auto overflow-x-auto pb-1 md:pb-0">
        <a href="{{ route('admin.gallery.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ !request('status') ? 'bg-gray-900 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Semua Tahun ({{ $totalAll }})
        </a>
        <a href="{{ route('admin.gallery.index', ['status' => 'published']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('status') === 'published' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            🟢 Terbit ({{ $totalPublished }})
        </a>
        <a href="{{ route('admin.gallery.index', ['status' => 'draft']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('status') === 'draft' ? 'bg-amber-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            🟡 Draft ({{ $totalDraft }})
        </a>
    </div>

    <!-- Search Input -->
    <form action="{{ route('admin.gallery.index') }}" method="GET" class="w-full md:w-80">
        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        <div class="relative">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="Cari tahun, tema festival..." 
                   class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 text-xs font-medium focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
            <i class="bi bi-search absolute left-3.5 top-3 text-gray-400 text-xs"></i>
        </div>
    </form>

</div>

<!-- Gallery Data Table Card -->
<div class="bg-white rounded-2xl border border-gray-150 shadow-sm overflow-hidden">
    @if($galleries->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 border-b border-gray-150 text-xs uppercase font-bold text-gray-700 tracking-wider">
                <tr>
                    <th scope="col" class="py-4 px-6 w-12 text-center">No</th>
                    <th scope="col" class="py-4 px-6 w-20">Maskot</th>
                    <th scope="col" class="py-4 px-6 w-24">Tahun</th>
                    <th scope="col" class="py-4 px-6">Tema & Lokasi</th>
                    <th scope="col" class="py-4 px-6 text-center">Foto Dokumentasi</th>
                    <th scope="col" class="py-4 px-6 text-center">Aftermovie</th>
                    <th scope="col" class="py-4 px-6">Status</th>
                    <th scope="col" class="py-4 px-6 text-right w-36">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 font-medium">
                @foreach($galleries as $index => $item)
                @php
                    $photosCount = is_array($item->photos) ? count($item->photos) : 0;
                @endphp
                <tr class="hover:bg-gray-50/80 transition-colors">
                    
                    <!-- Index -->
                    <td class="py-4 px-6 text-center text-xs font-bold text-gray-400">
                        {{ $index + 1 }}
                    </td>

                    <!-- Mascot Thumbnail -->
                    <td class="py-4 px-6">
                        <div class="w-14 h-16 rounded-xl overflow-hidden bg-gray-900 border border-gray-200 shrink-0 shadow-sm">
                            <img src="{{ $item->maskot_src }}" 
                                 alt="SIPA {{ $item->year }}" 
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </div>
                    </td>

                    <!-- Year Badge -->
                    <td class="py-4 px-6 whitespace-nowrap">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-xl font-extrabold text-sm bg-purple-50 text-[#4F1C51] border border-purple-100 shadow-xs font-mono">
                            {{ $item->year }}
                        </span>
                    </td>

                    <!-- Theme & Location -->
                    <td class="py-4 px-6 max-w-sm">
                        <h4 class="font-bold text-gray-900 text-sm leading-snug">
                            {{ $item->theme_title }}
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5 flex items-center gap-1">
                            <i class="bi bi-geo-alt text-[11px] text-gray-400"></i>
                            <span>{{ $item->location ?: 'Solo, Jawa Tengah' }}</span>
                        </p>
                    </td>

                    <!-- Total Photos Badge -->
                    <td class="py-4 px-6 text-center whitespace-nowrap">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                            <i class="bi bi-images text-xs"></i>
                            <span>{{ $photosCount }} Foto</span>
                        </span>
                    </td>

                    <!-- Aftermovie Status -->
                    <td class="py-4 px-6 text-center whitespace-nowrap">
                        @if($item->embed_url)
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-red-50 text-red-700 border border-red-200" title="Ada Aftermovie Video">
                            <i class="bi bi-youtube text-red-600"></i>
                            <span>Video Ada</span>
                        </span>
                        @else
                        <span class="text-xs text-gray-400">-</span>
                        @endif
                    </td>

                    <!-- Published Status -->
                    <td class="py-4 px-6 whitespace-nowrap">
                        @if($item->is_published)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Terbit
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                            Draft
                        </span>
                        @endif
                    </td>

                    <!-- Actions -->
                    <td class="py-4 px-6 text-right whitespace-nowrap">
                        <div class="flex items-center justify-end gap-2">
                            <!-- View / Preview -->
                            <a href="{{ url('/gallery/' . $item->year) }}" 
                               target="_blank"
                               class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-all shadow-xs" 
                               title="Lihat Halaman Galeri">
                                <i class="bi bi-eye text-xs"></i>
                            </a>

                            <!-- Edit & Manage Photos -->
                            <a href="{{ route('admin.gallery.edit', $item->id) }}" 
                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-800 text-xs font-bold transition-all shadow-xs" 
                               title="Edit & Kelola Foto">
                                <i class="bi bi-pencil-square text-xs"></i>
                                <span>Kelola</span>
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('admin.gallery.destroy', $item->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus arsip galeri SIPA {{ $item->year }}?')" 
                                  class="inline-block m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 flex items-center justify-center transition-all shadow-xs cursor-pointer" 
                                        title="Hapus Galeri">
                                    <i class="bi bi-trash text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="p-12 text-center text-gray-500">
        <i class="bi bi-images text-4xl text-gray-300 mb-3 block"></i>
        <p class="text-base font-bold text-gray-700">Tidak ada data galeri ditemukan.</p>
        <p class="text-xs text-gray-400 mt-1">Silakan tambahkan galeri tahun baru atau sesuaikan filter.</p>
    </div>
    @endif
</div>
@endsection
