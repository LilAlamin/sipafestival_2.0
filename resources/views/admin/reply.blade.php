@extends('admin.layouts.main')

@section('content')
<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 max-w-4xl">
    <h3 class="text-xl font-extrabold text-[#4F1C51] tracking-tight mb-6 flex items-center gap-2">
        <i class="bi bi-reply-all-fill"></i>
        Balas Aduan Masuk
    </h3>

    <!-- Received Complaint Info Card -->
    <div class="bg-purple-50/50 border border-purple-100 rounded-2xl p-6 mb-8 text-sm">
        <h4 class="font-bold text-[#4F1C51] text-xs uppercase tracking-wider mb-4">
            Detail Aduan Yang Diterima
        </h4>
        <dl class="grid grid-cols-1 md:grid-cols-4 gap-y-3 gap-x-6">
            <dt class="font-bold text-gray-500">Nama Pengirim</dt>
            <dd class="md:col-span-3 text-gray-800 font-semibold">{{ $complaint->name }}</dd>

            <dt class="font-bold text-gray-500">Email Pengirim</dt>
            <dd class="md:col-span-3 text-gray-800 font-semibold">{{ $complaint->email }}</dd>

            <dt class="font-bold text-gray-500">Subjek Aduan</dt>
            <dd class="md:col-span-3 text-gray-800 font-semibold">{{ $complaint->subject }}</dd>

            <dt class="font-bold text-gray-500">Isi Pesan</dt>
            <dd class="md:col-span-3 text-gray-700 leading-relaxed italic bg-white p-4 rounded-xl border border-purple-100/50">
                "{{ $complaint->message }}"
            </dd>
        </dl>
    </div>

    <!-- Response Form -->
    <form action="{{ route('admin.ReplyEmail', $complaint->id) }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">
                Subjek Email Balasan
            </label>
            <input name="response_subject" 
                   type="text" 
                   id="subject" 
                   value="Re: {{ $complaint->subject }}"
                   class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#4F1C51] focus:ring-4 focus:ring-[#4F1C51]/10 text-sm transition-all" 
                   placeholder="Masukkan subjek balasan..." 
                   required>
        </div>

        <div>
            <label for="message" class="block text-xs font-bold uppercase tracking-wider text-gray-400 mb-2">
                Isi Pesan Balasan
            </label>
            <textarea name="response_message" 
                      id="message" 
                      rows="8" 
                      class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:border-[#4F1C51] focus:ring-4 focus:ring-[#4F1C51]/10 text-sm transition-all" 
                      placeholder="Tulis pesan balasan Anda di sini..." 
                      required></textarea>
        </div>

        <div class="flex items-center gap-3 pt-2">
            <button type="submit" 
                    class="px-6 py-3 bg-[#4F1C51] hover:bg-[#3e1540] text-white font-bold rounded-xl shadow-lg shadow-[#4F1C51]/15 transition-all text-sm">
                Kirim Balasan Email
            </button>
            <a href="/admin/dashboard/" 
               class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-bold rounded-xl transition-all text-sm text-center">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

