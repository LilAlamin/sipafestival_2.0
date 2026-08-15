@extends('admin.layouts.main')

@section('content')

<div class="space-y-6">

    <!-- Page Header & Stats Summary Bar -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight flex items-center gap-2.5">
                <i class="bi bi-envelope-check-fill text-emerald-600"></i>
                Aduan Sudah Dibalas
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                Riwayat aduan dan feedback publik yang telah berhasil direspons oleh tim SIPA via email.
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
                    {{ $totalUnread ?? 0 }}
                </span>
            </a>
            <a href="{{ route('admin.dashboard.showReadComplaints') }}" 
               class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request()->routeIs('admin.dashboard.showReadComplaints') ? 'bg-white text-emerald-700 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                <span>Sudah Dibalas</span>
                <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-emerald-100 text-emerald-800">
                    {{ $totalReplied ?? count($complaints) }}
                </span>
            </a>
        </div>
    </div>

    <!-- Main Table Container -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        
        <!-- Search & Control Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-5 gap-4 border-b border-gray-100 bg-gray-50/40">
            <div class="flex items-center gap-2">
                <span class="text-xs font-extrabold uppercase tracking-wider text-emerald-800 flex items-center gap-1.5">
                    <i class="bi bi-check2-circle text-emerald-600"></i>
                    Riwayat Balasan Terkirim
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
                           placeholder="Cari pengirim, email, subjek, balasan..." 
                           class="w-full pl-9 pr-8 py-2 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-emerald-600 focus:ring-2 focus:ring-emerald-500/10 transition-all shadow-sm" />
                    @if(request('search'))
                        <a href="{{ url()->current() }}" class="absolute right-2.5 text-gray-400 hover:text-gray-600 text-xs font-bold" title="Hapus pencarian">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </div>
                <button type="submit" class="px-3.5 py-2 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl transition-all shadow-sm shrink-0">
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
                        <tr class="hover:bg-emerald-50/20 transition-colors group">
                            <!-- Index -->
                            <td class="px-5 py-4 text-center font-bold text-gray-400 text-xs select-none align-top pt-5">
                                {{ $index + 1 }}
                            </td>

                            <!-- Sender Info -->
                            <td class="px-5 py-4 align-top">
                                <div class="flex items-start gap-3">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-100 to-teal-100 border border-emerald-200 text-emerald-800 font-extrabold text-xs flex items-center justify-center shrink-0 shadow-sm">
                                        {{ strtoupper(substr($complaint->name, 0, 2)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <h4 class="text-sm font-bold text-gray-900 truncate leading-tight">
                                            {{ $complaint->name }}
                                        </h4>
                                        <a href="mailto:{{ $complaint->email }}" class="text-xs text-gray-500 hover:text-emerald-700 font-medium transition-colors block truncate mt-0.5" title="{{ $complaint->email }}">
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
                                    <h5 class="text-xs sm:text-sm font-bold text-gray-900 tracking-tight">
                                        {{ $complaint->subject }}
                                    </h5>
                                    <div class="bg-gray-50 rounded-xl p-3 border border-gray-100/80 text-xs text-gray-700 leading-relaxed font-normal">
                                        {{ $complaint->message }}
                                    </div>

                                    <!-- Quick reply pill -->
                                    <div class="mt-2 flex items-center gap-1.5 text-[11px] text-emerald-700 font-semibold bg-emerald-50/80 border border-emerald-200/60 px-2.5 py-1 rounded-lg w-fit">
                                        <i class="bi bi-check2-circle text-emerald-600"></i>
                                        <span>Dibalas: {{ $complaint->response_at ? \Carbon\Carbon::parse($complaint->response_at)->translatedFormat('d M Y, H:i') : ($complaint->updated_at ? $complaint->updated_at->translatedFormat('d M Y, H:i') : '-') }} WIB</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Status Badge -->
                            <td class="px-5 py-4 text-center align-middle whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shadow-sm">
                                    <span class="w-1.5 h-1.5 mr-1.5 bg-emerald-500 rounded-full"></span>
                                    Sudah Dibalas
                                </span>
                            </td>

                            <!-- Actions -->
                            <td class="px-5 py-4 text-center align-middle whitespace-nowrap">
                                <button type="button" 
                                        onclick="openDetailModal({{ $complaint->id }})" 
                                        class="inline-flex items-center gap-1.5 text-xs font-bold text-[#4F1C51] bg-purple-50 hover:bg-[#4F1C51] hover:text-white border border-purple-200 px-3.5 py-2 rounded-xl transition-all shadow-sm cursor-pointer">
                                    <i class="bi bi-eye-fill"></i>
                                    Lihat Detail
                                </button>
                            </td>
                        </tr>

                        <!-- HIDDEN DATA STORE FOR DETAIL MODAL -->
                        <template id="complaint-data-{{ $complaint->id }}">
                            {
                                "id": {{ $complaint->id }},
                                "name": @json($complaint->name),
                                "email": @json($complaint->email),
                                "subject": @json($complaint->subject),
                                "message": @json($complaint->message),
                                "sent_at": @json($complaint->created_at ? $complaint->created_at->translatedFormat('d F Y - H:i') . ' WIB' : '-'),
                                "replied_by": @json($complaint->response_by ?: 'Administrator'),
                                "replied_at": @json($complaint->response_at ? \Carbon\Carbon::parse($complaint->response_at)->translatedFormat('d F Y - H:i') . ' WIB' : ($complaint->updated_at ? $complaint->updated_at->translatedFormat('d F Y - H:i') . ' WIB' : '-')),
                                "response_subject": @json($complaint->response_subject ?: 'Re: ' . $complaint->subject),
                                "response_message": @json($complaint->response_message ?: '-')
                            }
                        </template>

                    @empty
                        <tr>
                            <td colspan="5" class="py-14 text-center">
                                <div class="w-16 h-16 bg-gray-100 text-gray-400 rounded-full flex items-center justify-center mx-auto mb-3 text-2xl">
                                    <i class="bi bi-inbox"></i>
                                </div>
                                <h4 class="text-sm font-bold text-gray-800">Tidak ada riwayat balasan</h4>
                                <p class="text-xs text-gray-500 mt-1 max-w-sm mx-auto">
                                    @if(request('search'))
                                        Tidak ada pesan yang cocok dengan kata kunci "<strong>{{ request('search') }}</strong>".
                                    @else
                                        Belum ada aduan yang telah dibalas.
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

<!-- DETAIL MODAL POPUP FOR REPLIED COMPLAINTS -->
<div id="detail-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm hidden opacity-0 transition-opacity duration-200">
    <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 max-w-2xl w-full overflow-hidden transform scale-95 transition-transform duration-200 flex flex-col max-h-[90vh]">
        
        <!-- Modal Header -->
        <div class="px-6 py-4 bg-gradient-to-r from-[#4F1C51] to-[#341336] text-white flex items-center justify-between shrink-0">
            <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-base">
                    <i class="bi bi-chat-left-quote-fill"></i>
                </div>
                <div>
                    <h3 class="text-base font-bold leading-tight" id="modal-title">Detail Aduan & Balasan</h3>
                    <span class="text-[11px] text-white/80 font-medium">Riwayat korespondensi email</span>
                </div>
            </div>
            <button type="button" onclick="closeDetailModal()" class="text-white/70 hover:text-white text-xl p-1 rounded-lg hover:bg-white/10 transition-colors">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <!-- Modal Body (Scrollable) -->
        <div class="p-6 space-y-6 overflow-y-auto flex-1">
            
            <!-- SECTION 1: INCOMING COMPLAINT -->
            <div class="bg-gray-50 border border-gray-200/80 rounded-xl p-4 sm:p-5 relative">
                <div class="flex items-center justify-between mb-3 border-b border-gray-200/60 pb-2.5">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-gray-500 flex items-center gap-1.5">
                        <i class="bi bi-person-fill text-[#4F1C51]"></i>
                        Pesan Masuk dari Pengirim
                    </span>
                    <span class="text-[11px] text-gray-400 font-semibold" id="modal-sent-at"></span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs mb-3">
                    <div>
                        <span class="text-gray-400 font-medium block">Nama Pengirim:</span>
                        <span class="font-bold text-gray-900 text-sm" id="modal-sender-name"></span>
                    </div>
                    <div>
                        <span class="text-gray-400 font-medium block">Email:</span>
                        <a href="#" id="modal-sender-email-link" class="font-bold text-[#4F1C51] hover:underline">
                            <span id="modal-sender-email"></span>
                        </a>
                    </div>
                </div>

                <div class="text-xs mb-2">
                    <span class="text-gray-400 font-medium block">Subjek Aduan:</span>
                    <span class="font-bold text-gray-800 text-xs sm:text-sm" id="modal-subject"></span>
                </div>

                <div class="mt-2">
                    <span class="text-gray-400 font-medium block text-xs mb-1">Isi Pesan:</span>
                    <div class="p-3.5 bg-white rounded-lg border border-gray-200 text-xs text-gray-700 leading-relaxed font-normal whitespace-pre-line" id="modal-message"></div>
                </div>
            </div>

            <!-- SECTION 2: ADMIN RESPONSE (REPLY) -->
            <div class="bg-emerald-50/50 border border-emerald-200 rounded-xl p-4 sm:p-5 relative">
                <div class="flex items-center justify-between mb-3 border-b border-emerald-200/70 pb-2.5">
                    <span class="text-xs font-extrabold uppercase tracking-wider text-emerald-800 flex items-center gap-1.5">
                        <i class="bi bi-reply-all-fill text-emerald-600"></i>
                        Balasan dari Tim SIPA
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-emerald-100 text-emerald-800 border border-emerald-300">
                        <i class="bi bi-check-all mr-1"></i> Terkirim ke Email
                    </span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs mb-3">
                    <div>
                        <span class="text-gray-500 font-medium block">Dibalas Oleh:</span>
                        <span class="font-bold text-emerald-900" id="modal-replied-by"></span>
                    </div>
                    <div>
                        <span class="text-gray-500 font-medium block">Waktu Dibalas:</span>
                        <span class="font-bold text-gray-800" id="modal-replied-at"></span>
                    </div>
                </div>

                <div class="text-xs mb-2">
                    <span class="text-gray-500 font-medium block">Subjek Email Balasan:</span>
                    <span class="font-bold text-gray-900" id="modal-response-subject"></span>
                </div>

                <div class="mt-2">
                    <span class="text-gray-500 font-medium block text-xs mb-1">Isi Pesan Balasan:</span>
                    <div class="p-3.5 bg-white rounded-lg border border-emerald-200 text-xs text-gray-800 leading-relaxed font-normal whitespace-pre-line shadow-inner" id="modal-response-message"></div>
                </div>
            </div>

        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3 shrink-0">
            <button type="button" 
                    onclick="closeDetailModal()" 
                    class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold text-xs rounded-xl transition-all">
                Tutup
            </button>
        </div>

    </div>
</div>

<!-- JAVASCRIPT FOR MODAL INTERACTION -->
<script>
function openDetailModal(complaintId) {
    const template = document.getElementById('complaint-data-' + complaintId);
    if (!template) return;

    try {
        const data = JSON.parse(template.innerHTML);
        
        document.getElementById('modal-sender-name').textContent = data.name;
        document.getElementById('modal-sender-email').textContent = data.email;
        document.getElementById('modal-sender-email-link').href = 'mailto:' + data.email;
        document.getElementById('modal-sent-at').textContent = data.sent_at;
        document.getElementById('modal-subject').textContent = data.subject;
        document.getElementById('modal-message').textContent = data.message;

        document.getElementById('modal-replied-by').textContent = data.replied_by;
        document.getElementById('modal-replied-at').textContent = data.replied_at;
        document.getElementById('modal-response-subject').textContent = data.response_subject;
        document.getElementById('modal-response-message').textContent = data.response_message;

        const modal = document.getElementById('detail-modal');
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.querySelector('.transform').classList.remove('scale-95');
        }, 10);
    } catch(e) {
        console.error('Error parsing complaint data:', e);
    }
}

function closeDetailModal() {
    const modal = document.getElementById('detail-modal');
    modal.classList.add('opacity-0');
    modal.querySelector('.transform').classList.add('scale-95');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 200);
}

// Close on backdrop click
document.getElementById('detail-modal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDetailModal();
    }
});

// Close on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeDetailModal();
    }
});
</script>

@endsection