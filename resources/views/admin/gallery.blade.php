@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            SIPA Photo Gallery
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">
            Manage and view photos uploaded across festival years
        </p>
    </div>
</div>

<!-- Gallery Grid -->
<div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for($year = 2025; $year >= 2020; $year--)
            <div class="group rounded-xl border border-gray-100 overflow-hidden bg-gray-50 shadow-sm hover:shadow-md transition-all">
                <!-- Gallery Cover Image -->
                <div class="h-40 bg-gray-200 overflow-hidden relative">
                    <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=500&auto=format&fit=crop&q=60" alt="SIPA {{ $year }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                        <span class="text-2xl font-black text-white tracking-widest">SIPA {{ $year }}</span>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="p-4 flex items-center justify-between">
                    <span class="text-xs text-gray-400 font-bold uppercase tracking-wider">
                        12 Photos
                    </span>
                    <a href="/gallery/{{ $year }}" target="_blank" class="inline-flex items-center gap-1 text-xs font-bold text-[#4F1C51] hover:text-[#3e1540]">
                        View Live Page
                        <i class="bi bi-box-arrow-up-right text-xs"></i>
                    </a>
                </div>
            </div>
        @endfor
    </div>
</div>
@endsection
