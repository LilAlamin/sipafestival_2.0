@extends('admin.layouts.main')

@section('header_left')
<div>
    <h1 class="text-[30px] font-semibold text-[#212529] leading-[1.2]">
        Hi, {{ Auth::user()->name }}!
    </h1>
    <p class="text-[16px] font-medium text-[#6c757d] leading-[1.2] mt-1">
        {{ now()->translatedFormat('l, d F Y') }}
    </p>
</div>
@endsection

@section('content')
<!-- Top Divider Line -->
<hr class="border-t border-[#dee2e6] mb-6" />

<!-- Responsive Grid Layout (Fluid widths) -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-[24px] items-start w-full">
    
    <!-- Left Column (Unposted Draft & Newest Feedback) - Spans 2/3 width on desktop -->
    <div class="lg:col-span-2 flex flex-col gap-[24px] w-full">
        
        <!-- Unposted Draft Section -->
        <div class="flex flex-col gap-[12px] w-full">
            <!-- Section Header -->
            <div class="bg-[#e9ecef] px-[16px] py-[12px] rounded-[8px] flex items-center justify-between w-full shrink-0">
                <span class="text-[18px] font-semibold text-[#212529] tracking-tight leading-[1.2]">Unposted Draft</span>
                <span class="px-2 py-0.5 rounded-[8px] text-[12px] font-semibold bg-white text-[#212529] border border-[#dee2e6]">
                    {{ $draftNews->count() }} Drafts
                </span>
            </div>
            
            <!-- Draft Items List -->
            <div class="flex flex-col gap-[12px] w-full">
                @forelse($draftNews as $draft)
                    <div class="bg-[#f8f9fa] border border-[#dee2e6] border-solid rounded-[8px] p-[12px] flex flex-col sm:flex-row gap-[16px] items-start sm:items-center justify-between w-full hover:shadow-sm transition-shadow min-h-[116px]">
                        
                        <!-- Thumbnail Image -->
                        <div class="w-full sm:w-[133px] h-[92px] rounded-[6px] overflow-hidden bg-white border border-[#dee2e6] shrink-0">
                            @if($draft->image_path)
                                <img src="{{ asset('/images/news/' . $draft->image_path) }}" alt="{{ $draft->title }}" class="w-full h-full object-cover" />
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-300">
                                    <i class="bi bi-image text-2xl"></i>
                                </div>
                            @endif
                        </div>
                        
                        <!-- Content Details -->
                        <div class="flex-grow min-w-0 flex flex-col justify-between h-full sm:h-[92px] py-0.5">
                            <div>
                                <h4 class="text-[16px] font-semibold text-[#212529] truncate leading-[1.2] tracking-tight" title="{{ $draft->title }}">
                                    <a href="{{ route('news.editBySlug', $draft->slug) }}" class="hover:text-[#2196f3] transition-colors">{{ $draft->title }}</a>
                                </h4>
                                <div class="flex items-center gap-[12px] mt-1 flex-wrap">
                                    <span class="text-[14px] text-[#6c757d] font-medium leading-[1.2]">
                                        {{ $draft->created_at ? $draft->created_at->translatedFormat('d F Y H:i') : '-' }}
                                    </span>
                                    <span class="inline-flex items-center px-[10px] py-[2px] rounded-[8px] text-[12px] font-semibold bg-[#e3f2fd] text-[#2196f3] leading-[1.2] gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#2196f3]"></span>
                                        Draft
                                    </span>
                                </div>
                                <p class="text-[14px] text-[#8a939b] font-normal leading-[1.2] mt-1 line-clamp-2 h-[35px] overflow-hidden">
                                    {{ strip_tags($draft->description) }}
                                </p>
                            </div>
                        </div>

                        <!-- Right Actions Box (Responsive layout without absolute positioning) -->
                        <div class="flex sm:flex-col items-end justify-between sm:justify-between h-auto sm:h-[92px] w-full sm:w-auto shrink-0 gap-[12px] sm:gap-0 mt-3 sm:mt-0 pt-3 sm:pt-0 border-t sm:border-0 border-gray-150">
                            <!-- Edit/Delete Action Icons -->
                            <div class="flex items-center gap-[8px]">
                                <a href="{{ route('news.editBySlug', $draft->slug) }}" class="p-1 text-[#6c757d] hover:text-[#212529] transition-colors" title="Edit Draft">
                                    <i class="bi bi-pencil-square text-sm"></i>
                                </a>
                                <form action="{{ route('news.destroy', $draft->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus draft berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 text-[#6c757d] hover:text-rose-600 transition-colors cursor-pointer" title="Hapus Draft">
                                        <i class="bi bi-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Upload Form -->
                            <form action="{{ route('news.publish', $draft->id) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-[#2196f3] hover:bg-[#1e88e5] text-[#f8f9fa] px-[12px] py-[8px] rounded-[8px] text-[14px] font-medium flex items-center gap-[6px] cursor-pointer transition-colors shadow-sm">
                                    <i class="bi bi-send text-xs"></i>
                                    Upload
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="bg-[#f8f9fa] border border-[#dee2e6] rounded-[8px] p-[24px] text-center w-full">
                        <p class="text-sm text-gray-500 font-medium">Tidak ada draft berita saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Section: Newest Feedback -->
        <div class="flex flex-col gap-[12px] w-full">
            <!-- Section Header -->
            <div class="bg-[#e9ecef] px-[16px] py-[12px] rounded-[8px] flex items-center justify-between w-full shrink-0">
                <span class="text-[18px] font-semibold text-[#212529] tracking-tight leading-[1.2]">Newest Feedback</span>
                <span class="px-2 py-0.5 rounded-[8px] text-[12px] font-semibold bg-white text-[#212529] border border-[#dee2e6]">
                    Belum Dibalas
                </span>
            </div>
            
            <!-- 2x2 Grid Layout for Feedback Cards (Adapts to fill available width) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-[12px] w-full">
                @forelse($feedbacks as $feedback)
                    <div class="bg-[#f8f9fa] border border-[#dee2e6] border-solid rounded-[8px] p-[12px] flex flex-col justify-between h-[147px] w-full hover:shadow-sm transition-shadow">
                        <div class="flex-grow min-h-0">
                            <!-- Name & Date header -->
                            <div class="flex items-center gap-[8px] justify-between">
                                <span class="text-[16px] font-semibold text-[#212529] truncate" title="{{ $feedback->name }}">
                                    {{ $feedback->name }}
                                </span>
                                <span class="text-[12px] font-medium text-[#adb5bd] shrink-0">
                                    {{ $feedback->created_at ? $feedback->created_at->format('d M Y - H:i') : '-' }}
                                </span>
                            </div>
                            <!-- Message Body -->
                            <p class="text-[14px] text-[#6c757d] font-normal leading-[1.2] line-clamp-3 overflow-hidden mt-2">
                                {{ $feedback->message }}
                            </p>
                        </div>
                        
                        <!-- Actions Reply -->
                        <div class="flex items-center justify-end gap-[4px] text-[#2196f3] pt-2 mt-auto">
                            <i class="bi bi-reply text-lg"></i>
                            <a href="{{ route('admin.dashboard.sendEmail', $feedback->id) }}" class="text-[14px] font-medium hover:underline">
                                Reply
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 bg-[#f8f9fa] border border-[#dee2e6] rounded-[8px] p-[24px] text-center w-full">
                        <p class="text-sm text-gray-500 font-medium">Semua feedback sudah dibalas!</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

    <!-- Right Column (Published News & Gallery Upload) - Spans 1/3 width on desktop -->
    <div class="flex flex-col gap-[24px] w-full">
        
        <!-- Published News Section -->
        <div class="flex flex-col gap-[12px] w-full">
            <!-- Section Header -->
            <div class="bg-[#e9ecef] px-[16px] py-[12px] rounded-[8px] flex items-center justify-between w-full shrink-0">
                <span class="text-[18px] font-semibold text-[#212529] tracking-tight leading-[1.2]">Published News</span>
            </div>
            
            <!-- Published News Card -->
            <div class="bg-[#f8f9fa] border border-[#dee2e6] border-solid rounded-[8px] p-[12px] flex flex-col gap-[12px] w-full hover:shadow-sm transition-shadow">
                @if($publishedNews)
                    <!-- Cover Image -->
                    <div class="bg-white h-[160px] overflow-hidden rounded-[8px] border border-[#dee2e6] w-full shrink-0">
                        @if($publishedNews->image_path)
                            <img src="{{ asset('/images/news/' . $publishedNews->image_path) }}" alt="{{ $publishedNews->title }}" class="w-full h-full object-cover" />
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300">
                                <i class="bi bi-image text-3xl"></i>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Cover Content details -->
                    <div class="flex flex-col gap-[8px]">
                        <h4 class="text-[16px] font-semibold text-[#212529] leading-[1.2] line-clamp-1" title="{{ $publishedNews->title }}">
                            <a href="{{ route('news.view', $publishedNews->slug) }}" class="hover:text-[#2196f3] transition-colors">{{ $publishedNews->title }}</a>
                        </h4>
                        <span class="text-[14px] font-medium text-[#6c757d] leading-[1.2]">
                            {{ $publishedNews->sent_at ? \Carbon\Carbon::parse($publishedNews->sent_at)->translatedFormat('d M Y H:i') : '-' }}
                        </span>
                        <p class="text-[14px] font-normal text-[#8a939b] leading-[1.2] line-clamp-5">
                            {{ strip_tags($publishedNews->description) }}
                        </p>
                    </div>
                @else
                    <div class="p-[24px] text-center">
                        <p class="text-sm text-gray-500 font-medium">Belum ada berita terbit.</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Upload Photo to Gallery Section -->
        <div class="flex flex-col gap-[12px] w-full">
            <!-- Section Header -->
            <div class="bg-[#e9ecef] px-[16px] py-[12px] rounded-[8px] flex items-center justify-between w-full shrink-0">
                <span class="text-[18px] font-semibold text-[#212529] tracking-tight leading-[1.2]">Upload Photo to Galery</span>
            </div>
            
            <!-- Upload Photo Card -->
            <div class="bg-[#f8f9fa] border border-[#dee2e6] border-solid rounded-[8px] p-[12px] flex flex-col gap-[12px] w-full">
                <!-- Image dropzone box -->
                <div id="dropzone" class="border border-[#ced4da] border-dashed rounded-[8px] p-[16px] flex flex-col items-center justify-center text-center cursor-pointer hover:bg-gray-100/50 transition-colors">
                    <div class="w-9 h-9 flex items-center justify-center text-[#6c757d]">
                        <i class="bi bi-cloud-arrow-up text-3xl"></i>
                    </div>
                    <p class="text-[14px] font-semibold text-[#6c757d] mt-[8px] leading-[1.2]">
                        Click to upload or drag and drop image
                    </p>
                    <p class="text-[12px] font-medium text-[#8a939b] mt-[4px] leading-[1.2] max-w-[240px]">
                        Lorem ipsum dolor sit amet consectetur. Sit ipsum ridiculus odio tortor consequat magna
                    </p>
                    <input type="file" id="file-input" class="hidden" accept="image/*" />
                </div>
                
                <!-- Year Select Dropdown -->
                <div class="relative w-full">
                    <select id="gallery-year" class="w-full bg-[#f8f9fa] border border-[#dee2e6] h-[36px] px-3 py-1 text-sm font-semibold text-[#212529] rounded-[8px] appearance-none focus:outline-none focus:border-[#2196f3] cursor-pointer">
                        <option value="" disabled selected>Year</option>
                        @for($year = 2026; $year >= 2009; $year--)
                            <option value="{{ $year }}">SIPA {{ $year }}</option>
                        @endfor
                    </select>
                    <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-gray-400">
                        <i class="bi bi-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Dropzone Activation Script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('file-input');
        const yearSelect = document.getElementById('gallery-year');

        dropzone.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', () => {
            if (fileInput.files.length > 0) {
                const year = yearSelect.value || '2026';
                const fileName = fileInput.files[0].name;
                alert(`[DUMMY SUCCESS] Berhasil mengunggah "${fileName}" ke galeri SIPA ${year}!`);
                fileInput.value = '';
            }
        });
    });
</script>
@endsection
