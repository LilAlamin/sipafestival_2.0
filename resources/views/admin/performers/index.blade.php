@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Kelola Line Up & Performers
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">
            Tambah, edit, dan atur penampil (delegasi internasional & nasional) untuk ditampilkan di beranda dan halaman Line Up.
        </p>
    </div>
    <div class="flex items-center gap-3">
        <a href="/lineup" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl border border-gray-300 hover:bg-gray-50 text-gray-700 text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-box-arrow-up-right"></i>
            <span>Lihat Halaman Line Up</span>
        </a>
        <a href="{{ route('admin.performers.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-plus-lg text-base"></i>
            <span>Tambah Performer</span>
        </a>
    </div>
</div>

<!-- Filter and Search Bar -->
<div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-4 sm:p-5 mb-6 flex flex-col md:flex-row items-center justify-between gap-4">
    
    <!-- Type Filter Tabs -->
    <div class="flex items-center gap-2 w-full md:w-auto overflow-x-auto pb-1 md:pb-0">
        <a href="{{ route('admin.performers.index') }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ !request('type') ? 'bg-gray-900 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            Semua ({{ \App\Models\Performer::count() }})
        </a>
        <a href="{{ route('admin.performers.index', ['type' => 'international']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('type') === 'international' ? 'bg-blue-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            🌍 Internasional ({{ \App\Models\Performer::where('type', 'international')->count() }})
        </a>
        <a href="{{ route('admin.performers.index', ['type' => 'national']) }}" 
           class="px-4 py-2 rounded-xl text-xs font-bold transition-all whitespace-nowrap {{ request('type') === 'national' ? 'bg-emerald-600 text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
            🇮🇩 Nasional ({{ \App\Models\Performer::where('type', 'national')->count() }})
        </a>
    </div>

    <!-- Search Input -->
    <form action="{{ route('admin.performers.index') }}" method="GET" class="w-full md:w-72">
        @if(request('type'))
            <input type="hidden" name="type" value="{{ request('type') }}">
        @endif
        <div class="relative">
            <input type="text" 
                   name="search" 
                   value="{{ request('search') }}" 
                   placeholder="Cari nama, negara, genre..." 
                   class="w-full pl-10 pr-4 py-2 rounded-xl border border-gray-200 text-xs font-medium focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50">
            <i class="bi bi-search absolute left-3.5 top-2.5 text-gray-400 text-xs"></i>
        </div>
    </form>

</div>

<!-- Performers Grid / Table Card -->
<div class="bg-white rounded-2xl border border-gray-150 shadow-sm overflow-hidden">
    @if($performers->count() > 0)
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-gray-600">
            <thead class="bg-gray-50 border-b border-gray-150 text-xs uppercase font-bold text-gray-700 tracking-wider">
                <tr>
                    <th scope="col" class="py-4 px-6">Foto</th>
                    <th scope="col" class="py-4 px-6">Nama Penampil</th>
                    <th scope="col" class="py-4 px-6">Negara / Asal</th>
                    <th scope="col" class="py-4 px-6">Kategori / Genre</th>
                    <th scope="col" class="py-4 px-6">Tipe Delegasi</th>
                    <th scope="col" class="py-4 px-6 text-center">Tampil di Beranda</th>
                    <th scope="col" class="py-4 px-6 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 font-medium">
                @foreach($performers as $item)
                <tr class="hover:bg-gray-50/80 transition-colors">
                    
                    <!-- Thumbnail Photo -->
                    <td class="py-3 px-6">
                        <div class="w-14 h-16 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 shrink-0 shadow-sm">
                            <img src="{{ asset('images/' . $item->image_path) }}" 
                                 alt="{{ $item->name }}" 
                                 class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        </div>
                    </td>

                    <!-- Performer Name -->
                    <td class="py-3 px-6">
                        <span class="font-bold text-gray-900 text-sm block">{{ $item->name }}</span>
                        @if($item->description)
                        <span class="text-xs text-gray-400 line-clamp-1 mt-0.5">{{ $item->description }}</span>
                        @endif
                    </td>

                    <!-- Country & Badge -->
                    <td class="py-3 px-6">
                        <div class="flex items-center gap-1.5">
                            <span class="px-2 py-0.5 rounded-md bg-gray-100 border border-gray-200 text-gray-700 text-xs font-bold uppercase">
                                {{ $item->country_badge ?: substr($item->country, 0, 4) }}
                            </span>
                            <span class="text-xs text-gray-600">{{ $item->country }}</span>
                        </div>
                    </td>

                    <!-- Category / Genre -->
                    <td class="py-3 px-6">
                        <span class="text-xs text-gray-700 font-medium">{{ $item->category ?: '-' }}</span>
                    </td>

                    <!-- Delegate Type Badge -->
                    <td class="py-3 px-6">
                        @if($item->type === 'international')
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 border border-blue-200">
                            <i class="bi bi-globe"></i> Internasional
                        </span>
                        @else
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                            <i class="bi bi-geo-alt"></i> Nasional
                        </span>
                        @endif
                    </td>

                    <!-- Featured on Homepage -->
                    <td class="py-3 px-6 text-center">
                        @if($item->is_featured_home)
                        <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-800 border border-amber-300">
                            <i class="bi bi-star-fill text-amber-500 text-[10px]"></i> Beranda
                        </span>
                        @else
                        <span class="text-xs text-gray-400">-</span>
                        @endif
                    </td>

                    <!-- Action Buttons -->
                    <td class="py-3 px-6 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.performers.edit', $item->id) }}" 
                               class="w-8 h-8 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 flex items-center justify-center transition-all" 
                               title="Edit Performer">
                                <i class="bi bi-pencil-square text-xs"></i>
                            </a>
                            <form action="{{ route('admin.performers.destroy', $item->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus performer \'{{ $item->name }}\'?')" 
                                  class="inline-block m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="w-8 h-8 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 flex items-center justify-center transition-all" 
                                        title="Hapus Performer">
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
        <i class="bi bi-people text-4xl text-gray-300 mb-3 block"></i>
        <p class="text-base font-bold text-gray-700">Tidak ada performer ditemukan.</p>
        <p class="text-xs text-gray-400 mt-1">Silakan tambahkan performer baru atau ubah filter pencarian.</p>
    </div>
    @endif
</div>
@endsection
