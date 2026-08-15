<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $news->title }} - Solo International Performing Arts (SIPA)</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('images/sipalogo.png') }}">

  <!-- Google Fonts & Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- GSAP & Lenis Smooth Scroll -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script>

  <!-- Vite / Tailwind CSS -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    @font-face {
      font-family: 'Cabinet Grotesk';
      src: url('https://cdn.fontshare.com/wf/J6PPRPKWXDUIYA47IXLEQB4R4OPVYDQH/N2ZXAXWEHVMLISD2TIXJC7EF4GOY43L4/NXM4Z4TDCMYWBZ7AVI2N6DQ5VMWNENMU.woff2') format('woff2');
      font-weight: 400;
      font-display: swap;
      font-style: normal;
    }
    @font-face {
      font-family: 'Cabinet Grotesk';
      src: url('https://cdn.fontshare.com/wf/CKQBK2QBTCDREE7L3MXZ3PPW7LDNJCWU/OTOY7FQFSFOJVZKJWKO2EHUJLOGBDN4Q/4CO2ETY7NITKLUDKMYJ75RHJSPHOJ7XT.woff2') format('woff2');
      font-weight: 500;
      font-display: swap;
      font-style: normal;
    }
    @font-face {
      font-family: 'Cabinet Grotesk';
      src: url('https://cdn.fontshare.com/wf/XMXWOHABYLQDJ42L65EFRYNVRY37HQCB/B2O4O6V3JMFM2WDCYQI3A47L5U4THDUL/WN5274VQ3AUBDFP74GB4EC4XYJ3EKVNE.woff2') format('woff2');
      font-weight: 700;
      font-display: swap;
      font-style: normal;
    }

    .font-cabinet {
      font-family: 'Cabinet Grotesk', sans-serif !important;
    }
    .font-script {
      font-family: 'Alex Brush', cursive !important;
    }

    body {
      background-color: #0b0c10;
      color: #fafafa;
      overflow-x: hidden;
    }
  </style>
</head>
<body class="bg-[#0b0c10] text-[#fafafa] font-cabinet selection:bg-[#406422] selection:text-white">

  <!-- Fixed Top Navbar Component -->
  <x-navbar2026 />

  <!-- MAIN ARTICLE CONTAINER -->
  <main class="w-full bg-[#0b0c10] relative">

    <!-- ========================================================= -->
    <!-- HERO SECTION (100% Matching Figma Node 4152:12798)       -->
    <!-- ========================================================= -->
    <section class="relative w-full h-[650px] sm:h-[780px] lg:h-[900px] bg-black overflow-hidden flex items-end">
      
      <!-- Hero Background Image with Atmospheric Lighting -->
      <div class="absolute inset-0">
        @php
          $detailImg = (!empty($news->image_path) && file_exists(public_path('images/news/' . $news->image_path)))
                      ? asset('/images/news/' . $news->image_path)
                      : asset('images/news/art1.png');
        @endphp
        <img src="{{ $detailImg }}" 
             onerror="this.onerror=null;this.src='{{ asset('images/news/art1.png') }}'" 
             alt="{{ $news->title }}" 
             class="w-full h-full object-cover object-center brightness-95 contrast-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-black/50"></div>
        <div class="absolute inset-0 bg-radial from-transparent via-black/20 to-black/70"></div>
      </div>

      <!-- Left Theatrical Ornate Curtain Border Overlay -->
      <div class="absolute inset-y-0 left-0 w-[180px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
        <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Right Theatrical Ornate Curtain Border Overlay -->
      <div class="absolute inset-y-0 right-0 w-[180px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
        <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Bottom Floor Vector Shadow (Node 4152:12813) -->
      <div class="absolute bottom-0 inset-x-0 h-[337px] pointer-events-none z-10">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Hero Overlays Content (Title & Sponsors Strip) -->
      <div class="max-w-[1280px] w-full mx-auto px-6 sm:px-10 lg:px-16 pb-12 sm:pb-16 relative z-20 flex flex-col justify-end">
        
        <!-- Top Return Pill -->
        <div class="mb-auto pt-28 sm:pt-32">
          <a href="/news" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-black/40 backdrop-blur-md border border-white/20 text-xs font-semibold text-white/90 hover:text-white hover:bg-black/60 transition-all">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            <span>Kembali ke Warta SIPA</span>
          </a>
        </div>

        <!-- Hero Bottom Info & Sponsors (Node 4152:13811 & 4152:12814) -->
        <div class="flex flex-col lg:flex-row items-end justify-between gap-8 pt-8 border-t border-white/10">
          
          <!-- Bottom Left: Official Support & Partners Logo Bar (Node 4152:12814) -->
          <div class="flex items-center gap-5 sm:gap-7 flex-wrap opacity-85 brightness-0 invert order-2 lg:order-1">
            <img src="{{ asset('images/sponsor/SCK1.png') }}" class="h-7 sm:h-9 w-auto object-contain" alt="SCK">
            <img src="{{ asset('images/sponsor/SIPACOM.png') }}" class="h-6 sm:h-8 w-auto object-contain" alt="SIPA Community">
            <img src="{{ asset('images/sponsor/MANGKUNEGARAN.png') }}" class="h-6 sm:h-8 w-auto object-contain" alt="Pura Mangkunegaran">
            <img src="{{ asset('images/sponsor/PEMERINTAHKOTASURAKARTA.png') }}" class="h-7 sm:h-9 w-auto object-contain" alt="Pemkot Surakarta">
          </div>

          <!-- Bottom Right: Title Lockup (Node 4152:13811) -->
          <div class="text-right max-w-2xl order-1 lg:order-2 ml-auto">
            <span class="font-cabinet text-xs sm:text-sm font-medium text-gray-300 tracking-wider block mb-1">
              Solo International Performing Arts • {{ $news->created_at->translatedFormat('d F Y') }}
            </span>
            <h1 class="font-cabinet font-bold text-2xl sm:text-4xl lg:text-[44px] text-white tracking-tight leading-tight drop-shadow-[0_0_25px_rgba(255,255,255,0.7)]">
              {{ $news->title }}
            </h1>
          </div>

        </div>

      </div>

    </section>


    <!-- ========================================================= -->
    <!-- ARTICLE BODY SECTION                                      -->
    <!-- ========================================================= -->
    <section class="relative max-w-[900px] mx-auto px-6 sm:px-8 py-16 sm:py-24 z-20">
      
      <!-- Article Metadata Card -->
      <div class="flex flex-wrap items-center justify-between gap-4 p-5 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-md mb-12 text-xs sm:text-sm text-gray-300">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-[#f19500]/20 border border-[#f19500]/40 flex items-center justify-center text-[#f19500]">
            <i class="fa-solid fa-feather-pointed"></i>
          </div>
          <div>
            <span class="block text-[11px] text-gray-400 uppercase tracking-wider">Publikasi Resmi</span>
            <strong class="text-white font-semibold">Redaksi SIPA Festival</strong>
          </div>
        </div>

        <div class="flex items-center gap-4 ml-auto">
          <div class="flex items-center gap-2">
            <i class="fa-regular fa-calendar text-[#f19500]"></i>
            <span>{{ $news->created_at->translatedFormat('d F Y') }}</span>
          </div>
          <div class="flex items-center gap-2">
            <i class="fa-regular fa-clock text-[#f19500]"></i>
            <span>{{ $news->created_at->format('H:i') }} WIB</span>
          </div>
        </div>
      </div>

      <!-- Main Article Description & Prose -->
      <article class="prose prose-invert max-w-none text-gray-200 text-base sm:text-lg leading-relaxed font-cabinet font-normal space-y-6 text-justify">
        {!! nl2br(e($news->description)) !!}
      </article>

      <!-- Share & Navigation Footer -->
      <div class="mt-16 pt-8 border-t border-white/10 flex flex-wrap items-center justify-between gap-4">
        
        <div class="flex items-center gap-3">
          <span class="text-xs text-gray-400 font-semibold uppercase tracking-wider">Bagikan:</span>
          <a href="https://api.whatsapp.com/send?text={{ urlencode($news->title . ' - ' . url()->current()) }}" target="_blank" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#25D366] text-white flex items-center justify-center transition-all" title="Share via WhatsApp">
            <i class="fa-brands fa-whatsapp text-sm"></i>
          </a>
          <a href="https://twitter.com/intent/tweet?text={{ urlencode($news->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="w-9 h-9 rounded-full bg-white/10 hover:bg-black text-white flex items-center justify-center transition-all" title="Share via X">
            <i class="fa-brands fa-x-twitter text-sm"></i>
          </a>
          <button type="button" onclick="navigator.clipboard.writeText(window.location.href); alert('Tautan berita berhasil disalin!');" class="w-9 h-9 rounded-full bg-white/10 hover:bg-[#f19500] text-white flex items-center justify-center transition-all" title="Salin Tautan">
            <i class="fa-solid fa-link text-sm"></i>
          </button>
        </div>

        <a href="/news" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#f19500] hover:bg-[#f19500]/90 text-black font-bold text-xs tracking-wider uppercase transition-all shadow-[0_0_20px_rgba(241,149,0,0.4)]">
          <span>Lihat Warta Lainnya</span>
          <i class="fa-solid fa-chevron-right text-xs"></i>
        </a>

      </div>

    </section>

  </main>

  <!-- Footer Component -->
  <footer class="border-t border-white/10 bg-[#0b0c10] py-10 text-center text-xs text-gray-400 relative z-20">
    <div class="max-w-[1440px] mx-auto px-6 space-y-4">
      <div class="flex justify-center items-center">
        <img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Logo" class="h-8 w-auto brightness-0 invert">
      </div>
      <p class="max-w-md mx-auto text-gray-400">Solo International Performing Arts 2026 • Kinetic Kinship : Beyond Boundaries</p>
      <p>&copy; {{ date('Y') }} SIPA Festival. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- GSAP Animations & Lenis Scroll -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // 1. Initialize Lenis Smooth Scroll
      if (typeof Lenis !== 'undefined') {
        const lenis = new Lenis({
          duration: 1.2,
          easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
          smoothWheel: true
        });

        function raf(time) {
          lenis.raf(time);
          requestAnimationFrame(raf);
        }
        requestAnimationFrame(raf);
      }

      // 2. Entrance Animation
      if (typeof gsap !== 'undefined') {
        gsap.from('article p', {
          opacity: 0,
          y: 20,
          duration: 0.8,
          stagger: 0.1,
          ease: 'power2.out'
        });
      }
    });
  </script>

</body>
</html>