@extends('admin.layouts.main')

@section('content')

<div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
    <!-- Card Header -->
    <div class="flex items-center justify-between p-6 border-b border-gray-100">
        <h3 class="text-sm font-extrabold tracking-wider text-gray-400 uppercase">
            Daftar Berita
        </h3>
        <a href="/admin/dashboard/news/makeNews" 
           class="inline-flex items-center gap-1.5 px-4 py-2.5 bg-[#4F1C51] hover:bg-[#3e1540] text-white font-bold rounded-xl shadow-lg shadow-[#4F1C51]/15 text-sm transition-all">
            <i class="bi bi-plus-lg"></i>
            Buat Berita
        </a>
    </div>

    <!-- Table Container -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/75 border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-400">
                    <th class="px-6 py-4 w-[5%] text-center">No</th>
                    <th class="px-6 py-4 w-[65%]">Berita</th>
                    <th class="px-6 py-4 w-[30%] text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($news as $index => $new)
                    <tr class="hover:bg-gray-50/25 transition-colors">
                        <td class="px-6 py-5 text-center font-bold text-gray-400 select-none align-top">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-6 py-5 align-top">
                            <h4 class="font-extrabold text-gray-900 text-base leading-snug tracking-tight">
                                {{ $new->title }}
                            </h4>
                            <div class="text-[10px] text-gray-400 mt-1 font-semibold uppercase tracking-wider">
                                {{ $new->created_at->translatedFormat('d M Y - H:i') }} WIB
                            </div>
                            
                            <!-- News Image Preview -->
                            <div class="my-3">
                                <img src="{{ asset('/images/news/' . $new->image_path) }}" 
                                     alt="{{ $new->title }}" 
                                     class="max-h-32 w-auto object-cover rounded-xl border border-gray-150 shadow-sm">
                            </div>

                            <p class="text-sm text-gray-600 leading-relaxed max-w-3xl">
                                {{ Str::limit($new->description, 200, '...') }}
                            </p>
                        </td>
                        <td class="px-6 py-5 text-center align-middle whitespace-nowrap">
                            <div class="flex flex-col sm:flex-row items-center justify-center gap-2">
                                <!-- View -->
                                <a href="{{ url('/admin/dashboard/news/' . $new->slug) }}"
                                   class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-bold text-emerald-600 bg-emerald-50/50 hover:bg-emerald-50 border border-emerald-100 rounded-lg transition-colors">
                                    <i class="bi bi-eye-fill"></i>
                                    View
                                </a>

                                <!-- Edit -->
                                <a href="{{ url('/admin/dashboard/news/edit/' . $new->slug) }}"
                                   class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-bold text-amber-600 bg-amber-50/50 hover:bg-amber-50 border border-amber-100 rounded-lg transition-colors">
                                    <i class="bi bi-pencil-fill"></i>
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('news.destroy', $new->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Yakin hapus berita ini?')" 
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center gap-1.5 px-3 py-2 text-xs font-bold text-rose-600 bg-rose-50/50 hover:bg-rose-50 border border-rose-100 rounded-lg transition-colors">
                                        <i class="bi bi-trash3-fill"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-gray-400 font-medium">
                            <i class="bi bi-journal-x text-3xl block mb-2"></i>
                            Belum ada berita yang diterbitkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

