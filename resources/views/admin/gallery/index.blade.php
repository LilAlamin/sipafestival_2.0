@extends('admin.layouts.main')

@section('content')

<div class="space-y-6">

    <!-- Page Header & Action Bar -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight flex items-center gap-2.5">
                <i class="bi bi-images text-[#4F1C51]"></i>
                Kelola Galeri & Kilas Balik Visual
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 font-medium mt-1">
                Kelola arsip dokumentasi, maskot per tahun, deskripsi tema, dan video aftermovie SIPA Festival dari masa ke masa.
            </p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="/gallery" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 text-xs sm:text-sm font-bold transition-all shadow-sm">
                <i class="bi bi-box-arrow-up-right text-xs"></i>
                <span>Lihat Galeri Publik</span>
            </a>
            <a href="{{ route('admin.gallery.create') }}" 
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-xs sm:text-sm font-bold transition-all shadow-sm">
                <i class="bi bi-plus-lg text-sm"></i>
                <span>Tambah Galeri Tahun Baru</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Metric Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Metric 1: Total Tahun -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-50 border border-purple-100 flex items-center justify-center text-[#4F1C51] text-xl shrink-0 shadow-xs">
                <i class="bi bi-calendar3"></i>
            </div>
            <div class="min-w-0">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Total Edisi</span>
                <span class="text-xl sm:text-2xl font-black text-gray-900 tracking-tight">{{ $totalAll ?? count($galleries) }} Tahun</span>
            </div>
        </div>

        <!-- Metric 2: Total Foto -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 text-xl shrink-0 shadow-xs">
                <i class="bi bi-camera-fill"></i>
            </div>
            <div class="min-w-0">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Koleksi Foto</span>
                <span class="text-xl sm:text-2xl font-black text-gray-900 tracking-tight">{{ $totalPhotos ?? 0 }} Foto</span>
            </div>
        </div>

        <!-- Metric 3: Total Video -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center text-red-600 text-xl shrink-0 shadow-xs">
                <i class="bi bi-youtube"></i>
            </div>
            <div class="min-w-0">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Video Aftermovie</span>
                <span class="text-xl sm:text-2xl font-black text-gray-900 tracking-tight">{{ $totalVideos ?? 0 }} Video</span>
            </div>
        </div>

        <!-- Metric 4: Terbit Status -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 text-xl shrink-0 shadow-xs">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="min-w-0">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Status Terbit</span>
                <span class="text-xl sm:text-2xl font-black text-emerald-700 tracking-tight">{{ $totalPublished ?? 0 }} Publik</span>
            </div>
        </div>
    </div>

    <!-- Main Table Card Container -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        
        <!-- Filter & Search Toolbar Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-5 gap-4 border-b border-gray-100 bg-gray-50/40">
            
            <!-- Status Tabs -->
            <div class="flex items-center gap-2 bg-gray-100/80 p-1.5 rounded-xl text-xs font-bold shrink-0">
                <a href="{{ route('admin.gallery.index') }}" 
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ !request('status') ? 'bg-white text-[#4F1C51] shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                    <span>Semua Tahun</span>
                    <span class="px-1.5 py-0.5 rounded-full text-[10px] {{ !request('status') ? 'bg-purple-100 text-[#4F1C51]' : 'bg-gray-200 text-gray-700' }}">
                        {{ $totalAll }}
                    </span>
                </a>
                <a href="{{ route('admin.gallery.index', ['status' => 'published']) }}" 
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request('status') === 'published' ? 'bg-white text-emerald-700 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    <span>Terbit</span>
                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-emerald-100 text-emerald-800">
                        {{ $totalPublished }}
                    </span>
                </a>
                <a href="{{ route('admin.gallery.index', ['status' => 'draft']) }}" 
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request('status') === 'draft' ? 'bg-white text-amber-700 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                    <span>Draft</span>
                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-amber-100 text-amber-800">
                        {{ $totalDraft }}
                    </span>
                </a>
            </div>

            <!-- Search Input -->
            <form action="{{ route('admin.gallery.index') }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                <div class="relative flex items-center w-full sm:w-80">
                    <i class="bi bi-search absolute left-3.5 text-gray-400 text-sm"></i>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari tahun, tema, lokasi festival..." 
                           class="w-full pl-9 pr-8 py-2 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#4F1C51] focus:ring-2 focus:ring-[#4F1C51]/10 transition-all shadow-sm" />
                    @if(request('search'))
                        <a href="{{ route('admin.gallery.index', request('status') ? ['status' => request('status')] : []) }}" class="absolute right-2.5 text-gray-400 hover:text-gray-600 text-xs font-bold" title="Hapus pencarian">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </div>
                <button type="submit" class="px-3.5 py-2 bg-[#4F1C51] hover:bg-[#3e1540] text-white text-xs font-bold rounded-xl transition-all shadow-sm shrink-0">
                    Cari
                </button>
            </form>

        </div>

        <!-- Table View -->
        @if($galleries->count() > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                        <th class="px-5 py-3.5 w-12 text-center">No</th>
                        <th class="px-5 py-3.5 w-56">Edisi & Maskot</th>
                        <th class="px-5 py-3.5 min-w-[280px]">Tema & Lokasi Festival</th>
                        <th class="px-5 py-3.5 w-48 text-center">Dokumentasi Foto</th>
                        <th class="px-5 py-3.5 w-36 text-center">Aftermovie</th>
                        <th class="px-5 py-3.5 w-32 text-center">Status</th>
                        <th class="px-5 py-3.5 w-40 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($galleries as $index => $item)
                    @php
                        $photos = is_array($item->photos) ? $item->photos : [];
                        $photosCount = count($photos);
                    @endphp
                    <tr class="hover:bg-purple-50/20 transition-colors group">
                        
                        <!-- No -->
                        <td class="px-5 py-4 text-center font-bold text-gray-400 text-xs select-none align-middle">
                            {{ $index + 1 }}
                        </td>

                        <!-- Edisi & Maskot Identity Lockup -->
                        <td class="px-5 py-4 align-middle">
                            <div class="flex items-center gap-3">
                                <!-- Maskot Thumbnail -->
                                <div class="w-12 h-14 rounded-xl overflow-hidden bg-black/90 border border-gray-200 shrink-0 shadow-sm relative group/img">
                                    <img src="{{ $item->maskot_src }}" 
                                         alt="Maskot SIPA {{ $item->year }}" 
                                         class="w-full h-full object-cover group-hover/img:scale-110 transition-transform duration-300">
                                </div>
                                <!-- Year Badge -->
                                <div>
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-sm font-black bg-gradient-to-r from-purple-50 to-pink-50 text-[#4F1C51] border border-purple-200/80 shadow-xs font-mono">
                                        {{ $item->year }}
                                    </span>
                                    <span class="block text-[10px] font-bold text-gray-400 mt-1 uppercase tracking-wider">
                                        SIPA {{ $item->year }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <!-- Tema & Lokasi -->
                        <td class="px-5 py-4 align-middle">
                            <div class="space-y-1">
                                <h4 class="text-sm font-bold text-gray-900 leading-snug group-hover:text-[#4F1C51] transition-colors">
                                    {{ $item->theme_title }}
                                </h4>
                                <div class="flex items-center gap-1.5 text-xs text-gray-500">
                                    <i class="bi bi-geo-alt-fill text-[11px] text-gray-400"></i>
                                    <span>{{ $item->location ?: 'Solo, Jawa Tengah' }}</span>
                                </div>
                                @if($item->description)
                                    <p class="text-[11px] text-gray-400 line-clamp-1 italic">
                                        "{{ strip_tags($item->description) }}"
                                    </p>
                                @endif
                            </div>
                        </td>

                        <!-- Dokumentasi Foto (Interactive Photo Badge + Thumbnails) -->
                        <td class="px-5 py-4 text-center align-middle whitespace-nowrap">
                            <div class="inline-flex flex-col items-center gap-1.5">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200 shadow-xs">
                                    <i class="bi bi-images text-xs"></i>
                                    <span>{{ $photosCount }} Foto</span>
                                </span>

                                <!-- Photo Stack Preview (Up to 3 thumbnails) -->
                                @if($photosCount > 0)
                                    <div class="flex items-center -space-x-2 overflow-hidden py-0.5">
                                        @foreach(array_slice($photos, 0, 3) as $p)
                                            @php
                                                $pSrc = file_exists(public_path('images/' . $p)) ? asset('images/' . $p) : (file_exists(public_path($p)) ? asset($p) : asset('images/gallery/grid/g1.jpg'));
                                            @endphp
                                            <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white object-cover shadow-xs" 
                                                 src="{{ $pSrc }}" 
                                                 alt="Dokumentasi SIPA {{ $item->year }}">
                                        @endforeach
                                        @if($photosCount > 3)
                                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-gray-200 ring-2 ring-white text-[9px] font-bold text-gray-600 shadow-xs">
                                                +{{ $photosCount - 3 }}
                                            </span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </td>

                        <!-- Aftermovie Video Badge -->
                        <td class="px-5 py-4 text-center align-middle whitespace-nowrap">
                            @if($item->embed_url)
                                <button type="button" 
                                        onclick="openVideoModal('{{ $item->embed_url }}', 'SIPA {{ $item->year }} - {{ addslashes($item->theme_title) }}')"
                                        class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-red-50 hover:bg-red-100 text-red-700 border border-red-200 shadow-xs transition-colors cursor-pointer" 
                                        title="Klik untuk putar video aftermovie">
                                    <i class="bi bi-play-circle-fill text-red-600 text-sm"></i>
                                    <span>Tonton Video</span>
                                </button>
                            @else
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-[11px] font-medium text-gray-400 bg-gray-100">
                                    <i class="bi bi-dash"></i> Belum Ada
                                </span>
                            @endif
                        </td>

                        <!-- Status Badge -->
                        <td class="px-5 py-4 text-center align-middle whitespace-nowrap">
                            @if($item->is_published)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-sm">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-emerald-500 rounded-full"></span>
                                    Terbit
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200 shadow-sm">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-amber-500 rounded-full"></span>
                                    Draft
                                </span>
                            @endif
                        </td>

                        <!-- Actions Buttons -->
                        <td class="px-5 py-4 text-center align-middle whitespace-nowrap">
                            <div class="flex items-center justify-center gap-1.5">
                                <!-- Preview Public Page -->
                                <a href="{{ url('/gallery/' . $item->year) }}" 
                                   target="_blank"
                                   class="w-8 h-8 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-all shadow-xs" 
                                   title="Lihat Halaman Galeri Publik">
                                    <i class="bi bi-eye-fill text-xs"></i>
                                </a>

                                <!-- Edit / Kelola -->
                                <a href="{{ route('admin.gallery.edit', $item->id) }}" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-purple-50 hover:bg-[#4F1C51] text-[#4F1C51] hover:text-white border border-purple-200 text-xs font-bold transition-all shadow-xs"
                                   title="Kelola & Edit Galeri">
                                    <i class="bi bi-pencil-square text-xs"></i>
                                    <span>Kelola</span>
                                </a>

                                <!-- Delete Form -->
                                <form action="{{ route('admin.gallery.destroy', $item->id) }}" 
                                      method="POST" 
                                      class="inline m-0 p-0"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data galeri tahun {{ $item->year }} beserta seluruh fotonya?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-8 h-8 rounded-xl bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white flex items-center justify-center transition-all shadow-xs cursor-pointer"
                                            title="Hapus Galeri">
                                        <i class="bi bi-trash3-fill text-xs"></i>
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
        <div class="py-16 text-center">
            <div class="w-16 h-16 bg-purple-50 text-[#4F1C51] rounded-2xl flex items-center justify-center mx-auto mb-3 text-2xl shadow-xs">
                <i class="bi bi-images"></i>
            </div>
            <h4 class="text-base font-bold text-gray-800">Tidak ada galeri tahun ditemukan</h4>
            <p class="text-xs text-gray-500 mt-1 max-w-sm mx-auto">
                @if(request('search'))
                    Tidak ada galeri yang cocok dengan kata kunci "<strong>{{ request('search') }}</strong>".
                @else
                    Belum ada data galeri festival pada status ini. Silakan tambahkan galeri baru.
                @endif
            </p>
            <div class="mt-4 flex items-center justify-center gap-3">
                @if(request('search'))
                    <a href="{{ route('admin.gallery.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-xs font-bold rounded-xl transition-all">
                        Reset Pencarian
                    </a>
                @endif
                <a href="{{ route('admin.gallery.create') }}" class="px-4 py-2 bg-[#4F1C51] hover:bg-[#3e1540] text-white text-xs font-bold rounded-xl transition-all shadow-sm">
                    + Tambah Galeri Tahun Baru
                </a>
            </div>
        </div>
        @endif

    </div>

</div>

<!-- VIDEO AFTERMOVIE PREVIEW MODAL -->
<div id="video-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm hidden opacity-0 transition-opacity duration-200">
    <div class="bg-gray-950 rounded-2xl shadow-2xl border border-white/10 max-w-3xl w-full overflow-hidden transform scale-95 transition-transform duration-200 flex flex-col">
        <!-- Modal Header -->
        <div class="px-5 py-3.5 bg-gray-900 border-b border-white/10 text-white flex items-center justify-between">
            <div class="flex items-center gap-2">
                <i class="bi bi-youtube text-red-500 text-lg"></i>
                <span class="text-sm font-bold truncate max-w-lg" id="video-modal-title">Putar Video Aftermovie</span>
            </div>
            <button type="button" onclick="closeVideoModal()" class="text-white/70 hover:text-white text-xl p-1 rounded-lg hover:bg-white/10 transition-colors">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>
        <!-- Video Frame -->
        <div class="relative w-full aspect-video bg-black">
            <iframe id="video-iframe" 
                    class="w-full h-full" 
                    src="" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen></iframe>
        </div>
    </div>
</div>

<script>
function openVideoModal(embedUrl, title) {
    const modal = document.getElementById('video-modal');
    const iframe = document.getElementById('video-iframe');
    const titleEl = document.getElementById('video-modal-title');

    titleEl.textContent = title;
    iframe.src = embedUrl + (embedUrl.includes('?') ? '&autoplay=1' : '?autoplay=1');

    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.classList.remove('opacity-0');
        modal.querySelector('.transform').classList.remove('scale-95');
    }, 10);
}

function closeVideoModal() {
    const modal = document.getElementById('video-modal');
    const iframe = document.getElementById('video-iframe');

    iframe.src = '';
    modal.classList.add('opacity-0');
    modal.querySelector('.transform').classList.add('scale-95');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}

document.getElementById('video-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeVideoModal();
    }
});

document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeVideoModal();
    }
});
</script>

@endsection
