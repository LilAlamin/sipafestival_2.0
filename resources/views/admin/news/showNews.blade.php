@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Kelola Berita & Artikel
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">
            Publikasikan berita terbaru, siaran pers, dan liputan festival SIPA untuk ditampilkan di beranda dan halaman News.
        </p>
    </div>
    <div class="flex items-center gap-3">
        <a href="/news" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-box-arrow-up-right"></i>
            <span>Lihat Halaman Berita</span>
        </a>
        <a href="{{ url('/admin/dashboard/news/makeNews') }}" 
           class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-plus-lg text-base"></i>
            <span>Buat Berita Baru</span>
        </a>
    </div>
</div>

<!-- Shortlist Filters & Search Bar -->
<div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-4 sm:p-5 mb-6 flex flex-col md:flex-row items-center justify-between gap-4">
    
    <!-- Status Shortlist Tabs -->
    <div class="flex items-center gap-2 w-full md:w-auto overflow-x-auto pb-1 md:pb-0">
        <a href="{{ route('news.showNews') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ !request('status') ? 'bg-gray-900 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Semua ({{ $totalAll ?? \App\Models\News::count() }})
        </a>
        <a href="{{ route('news.showNews', ['status' => 'published']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('status') === 'published' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            🟢 Terbit ({{ $totalPublished ?? \App\Models\News::where('status', 'published')->count() }})
        </a>
        <a href="{{ route('news.showNews', ['status' => 'draft']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('status') === 'draft' ? 'bg-amber-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            🟡 Draft ({{ $totalDraft ?? \App\Models\News::where('status', 'draft')->count() }})
        </a>
    </div>

    <!-- Search Input -->
    <form action="{{ route('news.showNews') }}" method="GET" class="w-full md:w-80">
        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif
        <div class="relative">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="Cari judul berita, isi artikel..." 
                   class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 text-xs font-medium focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all">
            <i class="bi bi-search absolute left-3.5 top-3 text-gray-400 text-xs"></i>
        </div>
    </form>

</div>

<!-- News Data Table Card -->
<div class="bg-white rounded-2xl border border-gray-150 shadow-sm overflow-hidden">
    @if($news->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 border-b border-gray-150 text-xs uppercase font-bold text-gray-700 tracking-wider">
                <tr>
                    <th scope="col" class="py-4 px-6 w-12 text-center">No</th>
                    <th scope="col" class="py-4 px-6 w-24">Foto</th>
                    <th scope="col" class="py-4 px-6">Judul & Cuplikan Berita</th>
                    <th scope="col" class="py-4 px-6">Status</th>
                    <th scope="col" class="py-4 px-6">Tanggal</th>
                    <th scope="col" class="py-4 px-6 text-right w-36">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 font-medium">
                @foreach($news as $index => $item)
                @php
                    $imgSrc = (!empty($item->image_path) && file_exists(public_path('images/news/' . $item->image_path))) 
                              ? asset('images/news/' . $item->image_path) 
                              : asset('images/news/art1.png');
                @endphp
                <tr class="hover:bg-gray-50/80 transition-colors">
                    
                    <!-- Index -->
                    <td class="py-4 px-6 text-center text-xs font-bold text-gray-400">
                        {{ $index + 1 }}
                    </td>

                    <!-- Thumbnail -->
                    <td class="py-4 px-6">
                        <div class="w-20 h-14 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 shrink-0 shadow-sm">
                            <img src="{{ $imgSrc }}" 
                                 alt="{{ $item->title }}" 
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </div>
                    </td>

                    <!-- Title & Excerpt -->
                    <td class="py-4 px-6 max-w-md">
                        <a href="{{ route('news.HomeView', $item->slug) }}" target="_blank" class="font-bold text-gray-900 text-sm hover:text-[#4F1C51] transition-colors leading-snug line-clamp-2">
                            {{ $item->title }}
                        </a>
                        <p class="text-xs text-gray-500 line-clamp-2 mt-1 leading-relaxed">
                            {!! strip_tags($item->description) !!}
                        </p>
                    </td>

                    <!-- Status Badge -->
                    <td class="py-4 px-6 whitespace-nowrap">
                        @if($item->status === 'published')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                            Terbit
                        </span>
                        @else
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                Draft
                            </span>
                            <form action="{{ route('news.publish', $item->id) }}" method="POST" class="inline m-0">
                                @csrf
                                <button type="submit" class="px-2 py-0.5 rounded-md bg-[#4F1C51] hover:bg-[#3e1540] text-white text-[11px] font-bold shadow-xs transition-all" title="Publikasikan Sekarang">
                                    Publish
                                </button>
                            </form>
                        </div>
                        @endif
                    </td>

                    <!-- Date -->
                    <td class="py-4 px-6 whitespace-nowrap text-xs text-gray-500">
                        <span class="block font-semibold text-gray-700">
                            {{ \Carbon\Carbon::parse($item->sent_at ?? $item->created_at)->translatedFormat('d M Y') }}
                        </span>
                        <span class="text-[11px] text-gray-400">
                            {{ \Carbon\Carbon::parse($item->sent_at ?? $item->created_at)->format('H:i') }} WIB
                        </span>
                    </td>

                    <!-- Actions -->
                    <td class="py-4 px-6 text-right whitespace-nowrap">
                        <div class="flex items-center justify-end gap-2">
                            <!-- View / Preview -->
                            <a href="{{ route('news.HomeView', $item->slug) }}" 
                               target="_blank"
                               class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-all shadow-xs" 
                               title="Lihat Berita di Tab Baru">
                                <i class="bi bi-eye text-xs"></i>
                            </a>

                            <!-- Edit -->
                            <a href="{{ url('/admin/dashboard/news/edit/' . $item->slug) }}" 
                               class="w-8 h-8 rounded-lg bg-amber-50 hover:bg-amber-100 text-amber-700 flex items-center justify-center transition-all shadow-xs" 
                               title="Edit Berita">
                                <i class="bi bi-pencil text-xs"></i>
                            </a>

                            <!-- Delete -->
                            <form action="{{ route('news.destroy', $item->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirmDelete(event, 'Hapus Berita?', 'Apakah Anda yakin ingin menghapus berita \'{{ addslashes($item->title) }}\'?')" 
                                  class="inline-block m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 flex items-center justify-center transition-all shadow-xs cursor-pointer" 
                                        title="Hapus Berita">
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
        <i class="bi bi-newspaper text-4xl text-gray-300 mb-3 block"></i>
        <p class="text-base font-bold text-gray-700">Tidak ada berita ditemukan.</p>
        <p class="text-xs text-gray-400 mt-1">Silakan buat berita baru atau sesuaikan filter pencarian.</p>
    </div>
    @endif
</div>
@endsection
