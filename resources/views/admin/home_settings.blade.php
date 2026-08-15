@extends('admin.layouts.main')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Pengaturan Konten Beranda
        </h2>
        <p class="text-sm text-gray-500 font-medium mt-1">
            Kelola konten utama dan video teaser YouTube yang tampil di halaman beranda SIPA Festival
        </p>
    </div>
    <div>
        <a href="/" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-gray-900 hover:bg-gray-800 text-white text-sm font-semibold transition-all shadow-sm">
            <i class="bi bi-box-arrow-up-right"></i>
            <span>Lihat Halaman Beranda</span>
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
    
    <!-- Left Column: Settings Form -->
    <div class="lg:col-span-6 bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8">
        <div class="border-b border-gray-100 pb-4 mb-6">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <i class="bi bi-youtube text-red-600 text-xl"></i>
                <span>Video Teaser SIPA 2026</span>
            </h3>
            <p class="text-xs text-gray-500 mt-1">
                Video ini akan disematkan pada section Teaser video beranda dengan judul <em>"A Festival That Moves Beyond Boundaries"</em>.
            </p>
        </div>

        <form action="{{ route('admin.homeSettings.update') }}" method="POST" class="space-y-6">
            @csrf

            <!-- YouTube URL Input -->
            <div>
                <label for="youtube_url" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Link Video YouTube <span class="text-red-500">*</span>
                </label>
                <div class="relative rounded-xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="bi bi-link-45deg text-lg"></i>
                    </div>
                    <input type="text" 
                           name="youtube_url" 
                           id="youtube_url" 
                           value="{{ old('youtube_url', $teaserRawUrl ?? $teaserEmbedUrl) }}"
                           placeholder="https://www.youtube.com/watch?v=... atau https://youtu.be/..."
                           required
                           class="block w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] transition-all bg-gray-50/50 hover:bg-white" />
                </div>
                
                <!-- Format Help Notes -->
                <div class="mt-2.5 p-3 rounded-xl bg-gray-50 border border-gray-200 text-xs text-gray-600 space-y-1">
                    <p class="font-semibold text-gray-700 flex items-center gap-1.5">
                        <i class="bi bi-info-circle-fill text-blue-500"></i> Format link yang didukung:
                    </p>
                    <ul class="list-disc list-inside space-y-0.5 text-gray-500 pl-1">
                        <li><code>https://www.youtube.com/watch?v=VIDEO_ID</code></li>
                        <li><code>https://youtu.be/VIDEO_ID</code></li>
                        <li><code>https://www.youtube.com/shorts/VIDEO_ID</code></li>
                        <li><code>https://www.youtube.com/embed/VIDEO_ID</code></li>
                    </ul>
                </div>
            </div>

            <!-- Video Title Input -->
            <div>
                <label for="teaser_title" class="block text-sm font-bold text-gray-700 mb-1.5">
                    Judul Aksesibilitas / Title Video
                </label>
                <div class="relative rounded-xl shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="bi bi-card-text text-lg"></i>
                    </div>
                    <input type="text" 
                           name="teaser_title" 
                           id="teaser_title" 
                           value="{{ old('teaser_title', $teaserTitle) }}"
                           placeholder="Solo International Performing Arts 2026 Official Teaser"
                           class="block w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 text-gray-900 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] transition-all bg-gray-50/50 hover:bg-white" />
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-3 border-t border-gray-100 flex items-center justify-end gap-3">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-sm font-bold shadow-md transition-all">
                    <i class="bi bi-check-lg text-lg"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>

    <!-- Right Column: Live Video Preview Player -->
    <div class="lg:col-span-6 bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-8">
        <div class="border-b border-gray-100 pb-4 mb-5 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <i class="bi bi-display text-gray-700"></i>
                    <span>Live Preview Video</span>
                </h3>
                <p class="text-xs text-gray-500 mt-0.5">
                    Pratinjau tampilan video yang akan muncul di halaman beranda
                </p>
            </div>
            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span>
                Live
            </span>
        </div>

        <div class="w-full aspect-video rounded-xl overflow-hidden border border-gray-200 shadow-md bg-black relative">
            <iframe id="livePreviewIframe"
                    class="w-full h-full object-cover"
                    src="{{ $teaserEmbedUrl }}"
                    title="Live Preview Video"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
            </iframe>
        </div>

        <div class="mt-4 p-3 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-between text-xs text-gray-500">
            <span>Current Embed URL:</span>
            <span id="currentEmbedUrlText" class="font-mono text-gray-700 truncate max-w-[280px]">
                {{ $teaserEmbedUrl }}
            </span>
        </div>
    </div>

</div>

<!-- Realtime Preview Update Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('youtube_url');
        const iframe = document.getElementById('livePreviewIframe');
        const textDisplay = document.getElementById('currentEmbedUrlText');

        function parseYouTubeUrl(url) {
            url = url.trim();
            if (!url) return null;

            // 1. Embed URL
            let match = url.match(/(?:youtube(?:-nocookie)?\.com\/embed\/)([a-zA-Z0-9_-]{11})/i);
            if (match) return 'https://www.youtube-nocookie.com/embed/' + match[1];

            // 2. Standard Watch
            match = url.match(/(?:youtube\.com\/watch\?(?:.*&)?v=)([a-zA-Z0-9_-]{11})/i);
            if (match) return 'https://www.youtube-nocookie.com/embed/' + match[1];

            // 3. youtu.be
            match = url.match(/(?:youtu\.be\/)([a-zA-Z0-9_-]{11})/i);
            if (match) return 'https://www.youtube-nocookie.com/embed/' + match[1];

            // 4. Shorts
            match = url.match(/(?:youtube\.com\/shorts\/)([a-zA-Z0-9_-]{11})/i);
            if (match) return 'https://www.youtube-nocookie.com/embed/' + match[1];

            // 5. 11-char ID
            if (/^[a-zA-Z0-9_-]{11}$/.test(url)) {
                return 'https://www.youtube-nocookie.com/embed/' + url;
            }

            return null;
        }

        input.addEventListener('input', function() {
            const embed = parseYouTubeUrl(this.value);
            if (embed) {
                iframe.src = embed;
                if (textDisplay) textDisplay.textContent = embed;
            }
        });
    });
</script>
@endsection
