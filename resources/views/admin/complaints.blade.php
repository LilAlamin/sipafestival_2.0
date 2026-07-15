@extends('admin.layouts.main')

@section('content')

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <!-- Card Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-6 gap-4 border-b border-gray-100">
        <h3 class="text-sm font-extrabold tracking-wider text-gray-400 uppercase">
            Daftar Aduan / Keluhan
        </h3>
        <form class="flex" role="search">
            <div class="relative flex items-center border border-gray-200 rounded-xl overflow-hidden bg-gray-50 focus-within:bg-white focus-within:border-[#4F1C51] focus-within:ring-4 focus-within:ring-[#4F1C51]/10 transition-all">
                <i class="bi bi-search absolute left-4 text-gray-400"></i>
                <input class="pl-11 pr-4 py-2 bg-transparent text-sm text-gray-800 placeholder-gray-400 focus:outline-none w-64" type="search" placeholder="Cari keluhan..." aria-label="Search" />
            </div>
        </form>
    </div>

    <!-- Table Container -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/75 border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-400">
                    <th class="px-6 py-4 w-[5%] text-center">No</th>
                    <th class="px-6 py-4 w-[75%]">Aduan</th>
                    <th class="px-6 py-4 w-[20%] text-center">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($complaints as $index => $complaint)
                    <tr class="hover:bg-gray-50/25 transition-colors">
                        <td class="px-6 py-5 text-center font-bold text-gray-400 select-none">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-5">
                            <!-- Sender Information -->
                            <div class="flex flex-wrap items-baseline gap-2">
                                <span class="font-semibold text-gray-900">{{ $complaint->name }}</span>
                                <span class="text-xs text-gray-400 font-medium">&#8226; {{ $complaint->email }}</span>
                            </div>
                            <div class="text-[10px] text-gray-400 mt-1 font-semibold uppercase tracking-wider">
                                Dikirim: {{ $complaint->created_at->translatedFormat('d M Y - H.i') }} WIB
                            </div>

                            <!-- Subject & Message -->
                            <div class="mt-3">
                                <h4 class="text-sm font-bold text-gray-800 tracking-tight">
                                    Subjek: {{ $complaint->subject }}
                                </h4>
                                <p class="text-sm text-gray-600 mt-1 leading-relaxed bg-gray-50 p-4 rounded-xl border border-gray-100">
                                    {{ $complaint->message }}
                                </p>
                            </div>

                            <!-- Action button if unreplied -->
                            @if ($complaint->status === 'belum dibalas')
                                <div class="mt-3">
                                    <a href="{{ route('admin.dashboard.sendEmail', $complaint->id) }}"
                                       class="inline-flex items-center gap-2 text-xs font-bold text-gray-500 hover:text-[#4F1C51] bg-white border border-gray-200 hover:border-[#4F1C51]/30 hover:bg-purple-50/50 px-4 py-2 rounded-lg shadow-sm transition-all">
                                        <i class="bi bi-reply-fill text-sm"></i>
                                        Balas Keluhan
                                    </a>
                                </div>
                            @endif
                                  
                            <!-- Reply history if replied -->
                            @if ($complaint->status === 'sudah dibalas')
                                <div class="mt-4 pl-4 border-l-2 border-purple-200 flex gap-3 items-start">
                                    <div class="p-1.5 rounded-lg bg-purple-50 text-[#4F1C51] mt-0.5">
                                        <i class="bi bi-reply-all-fill text-base leading-none"></i>
                                    </div>
                                    <div class="space-y-1">
                                        <div class="flex flex-wrap items-baseline gap-2">
                                            <span class="text-xs font-bold text-[#4F1C51]">
                                                Dibalas oleh: {{ $complaint->response_by ?: 'Administrator' }}
                                            </span>
                                            <span class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">
                                                {{ $complaint->updated_at->translatedFormat('d M Y - H.i') }} WIB
                                            </span>
                                        </div>
                                        <div class="text-xs font-bold text-gray-800">
                                            Subjek: {{ $complaint->response_subject }}
                                        </div>
                                        <p class="text-xs text-gray-500 leading-relaxed">
                                            {{ $complaint->response_message }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-5 text-center align-middle whitespace-nowrap">
                            @if ($complaint->status === 'sudah dibalas')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-emerald-500 rounded-full"></span>
                                    Sudah Dibalas
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-amber-500 rounded-full animate-pulse"></span>
                                    Belum Dibalas
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-gray-400 font-medium">
                            <i class="bi bi-inbox text-3xl block mb-2"></i>
                            Belum ada keluhan masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection