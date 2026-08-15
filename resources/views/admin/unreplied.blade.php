@extends('admin.layouts.main')

@section('content')

<div class="space-y-6">

    <!-- Page Header & Stats Summary Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight flex items-center gap-2.5">
                <i class="bi bi-envelope-exclamation-fill text-amber-600"></i>
                Aduan Belum Dibalas
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                Daftar feedback dan aduan publik yang membutuhkan respons atau tindak lanjut dari admin.
            </p>
        </div>

        <!-- Filter Status Tabs -->
        <div class="flex items-center gap-2 bg-gray-100/80 p-1.5 rounded-xl text-xs font-bold shrink-0">
            <a href="{{ route('admin.dashboard.showComplaint') }}" 
               class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.dashboard.showComplaint') ? 'bg-white text-[#4F1C51] shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                <span>Semua</span>
                <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-gray-200 text-gray-700">
                    {{ $totalAll ?? 0 }}
                </span>
            </a>
            <a href="{{ route('admin.dashboard.showUnreadComplaints') }}" 
               class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.dashboard.showUnreadComplaints') ? 'bg-white text-amber-700 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                <span>Belum Dibalas</span>
                <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-amber-100 text-amber-800">
                    {{ $totalUnread ?? count($complaints) }}
                </span>
            </a>
            <a href="{{ route('admin.dashboard.showReadComplaints') }}" 
               class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.dashboard.showReadComplaints') ? 'bg-white text-emerald-700 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                <span>Sudah Dibalas</span>
                <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-emerald-100 text-emerald-800">
                    {{ $totalReplied ?? 0 }}
                </span>
            </a>
        </div>
    </div>

    <!-- Main Table Container -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        
        <!-- Search & Control Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-5 gap-4 border-b border-gray-100 bg-gray-50/40">
            <div class="flex items-center gap-2">
                <span class="text-xs font-extrabold uppercase tracking-wider text-amber-800 flex items-center gap-1.5">
                    <i class="bi bi-hourglass-split text-amber-600"></i>
                    Menunggu Balasan
                </span>
                <span class="text-xs text-gray-400 font-medium">
                    (Urut Terbaru &bull; {{ count($complaints) }} Pesan)
                </span>
            </div>

            <!-- Search Bar Form -->
            <form action="{{ url()->current() }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
                <div class="relative flex items-center w-full sm:w-80">
                    <i class="bi bi-search absolute left-3.5 text-gray-400 text-sm"></i>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari pengirim, email, subjek..." 
                           class="w-full pl-9 pr-8 py-2 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-amber-600 focus:ring-2 focus:ring-amber-500/10 transition-all shadow-sm" />
                    @if(request('search'))
                        <a href="{{ url()->current() }}" class="absolute right-2.5 text-gray-400 hover:text-gray-600 text-xs font-bold" title="Hapus pencarian">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </div>
                <button type="submit" class="px-3.5 py-2 bg-amber-600 hover:bg-amber-700 text-white text-xs font-bold rounded-xl transition-all shadow-sm shrink-0">
                    Cari
                </button>
            </form>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                        <th class="px-5 py-3.5 w-12 text-center">No</th>
                        <th class="px-5 py-3.5 w-64">Pengirim</th>
                        <th class="px-5 py-3.5 min-w-[320px]">Subjek & Isi Aduan</th>
                        <th class="px-5 py-3.5 w-36 text-center">Status</th>
                        <th class="px-5 py-3.5 w-44 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($complaints as $index => $complaint)
                        <tr class="hover:bg-amber-50/20 transition-colors group">
                            <!-- Index -->
                            <td class="px-5 py-4 text-center font-bold text-gray-400 text-xs select-none align-top pt-5">
                                {{ $index + 1 }}
                            </td>

                            <!-- Sender Info -->
                            <td class="px-5 py-4 align-top">
                                <div class="flex items-start gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-amber-100 to-yellow-100 border border-amber-200 text-amber-800 font-extrabold text-xs flex items-center justify-center shrink-0 shadow-sm">
                                        {{ strtoupper(substr($complaint->name, 0, 2)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="text-sm font-bold text-gray-900 truncate leading-tight">
                                            {{ $complaint->name }}
                                        </h4>
                                        <a href="mailto:{{ $complaint->email }}" class="text-xs text-gray-500 hover:text-amber-800 font-medium transition-colors block truncate mt-0.5" title="{{ $complaint->email }}">
                                            <i class="bi bi-envelope text-[11px] mr-1"></i>{{ $complaint->email }}
                                        </a>
                                        <span class="text-[10px] text-gray-400 font-semibold block mt-1.5 uppercase tracking-wide">
                                            <i class="bi bi-clock text-[10px] mr-1"></i>{{ $complaint->created_at ? $complaint->created_at->translatedFormat('d M Y - H:i') : '-' }} WIB
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <!-- Subject & Message Preview -->
                            <td class="px-5 py-4 align-top">
                                <div class="space-y-1.5">
                                    <h5 class="text-xs sm:text-sm font-bold text-amber-900 tracking-tight">
                                        {{ $complaint->subject }}
                                    </h5>
                                    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100/80 text-xs text-gray-700 leading-relaxed font-normal">
                                        {{ $complaint->message }}
                                    </div>
                                </div>
                            </td>

                            <!-- Status Badge -->
                            <td class="px-5 py-4 text-center align-middle whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-200 shadow-sm">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-amber-500 rounded-full animate-pulse"></span>
                                    Belum Dibalas
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="px-5 py-4 text-center align-middle whitespace-nowrap">
                                <a href="{{ route('admin.dashboard.sendEmail', $complaint->id) }}" 
                                   class="inline-flex items-center gap-1.5 text-xs font-bold text-white bg-[#4F1C51] hover:bg-[#3e1540] px-3.5 py-2 rounded-xl transition-all shadow-sm">
                                    <i class="bi bi-reply-fill"></i>
                                    Balas Aduan
                                </a>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="5" class="py-14 text-center">
                                <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-3 text-2xl">
                                    <i class="bi bi-check2-all"></i>
                                </div>
                                <h4 class="text-sm font-bold text-gray-800">Semua aduan sudah terbalas!</h4>
                                <p class="text-xs text-gray-500 mt-1 max-w-sm mx-auto">
                                    @if(request('search'))
                                        Tidak ada aduan belum dibalas yang cocok dengan kata kunci "<strong>{{ request('search') }}</strong>".
                                    @else
                                        Tidak ada aduan baru yang belum dibalas saat ini.
                                    @endif
                                </p>
                                @if(request('search'))
                                    <a href="{{ url()->current() }}" class="inline-block mt-3 px-3.5 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-bold rounded-lg transition-all">
                                        Reset Pencarian
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection