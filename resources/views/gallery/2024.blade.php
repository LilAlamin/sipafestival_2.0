<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIPA Festival 2024 - Performing Royal Genesis</title>
  
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

  <!-- MAIN WRAPPER -->
  <main class="w-full bg-[#0b0c10] relative">

    <!-- ========================================================= -->
    <!-- 1. HERO SECTION (Matching Figma Exactly like 2026)        -->
    <!-- ========================================================= -->
    <section class="relative w-full h-[850px] lg:h-[900px] bg-black overflow-hidden flex flex-col justify-between pt-[90px]">
      
      <!-- Hero Background Maskot (Node 4151:8584 - Gusti Raden Ajeng / Mangkunegaran Maskot) -->
      <div class="absolute inset-0">
        <img src="{{ asset('images/maskot/2024.webp') }}" alt="SIPA 2024 - Performing Royal Genesis" class="w-full h-full object-cover object-center brightness-95 contrast-105">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/30"></div>
        <div class="absolute inset-0 bg-radial from-transparent via-black/10 to-black/60"></div>
      </div>

      <!-- Left Theatrical Ornate Curtain (Node 4152:12801) -->
      <div class="absolute inset-y-0 left-0 w-[180px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
        <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Right Theatrical Ornate Curtain (Node 4152:12802) -->
      <div class="absolute inset-y-0 right-0 w-[180px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
        <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Bottom Floor Vector Shadow (Node 4152:12813) -->
      <div class="absolute bottom-0 inset-x-0 h-[337px] pointer-events-none z-10">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Return Button Top Left -->
      <div class="max-w-[1040px] w-full mx-auto px-4 sm:px-6 lg:px-0 pt-6 relative z-20">
        <a href="/gallery" class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-black/50 backdrop-blur-md border border-white/20 text-xs font-semibold text-white/90 hover:text-white hover:bg-black/75 transition-all">
          <i class="fa-solid fa-arrow-left text-xs"></i>
          <span>Kembali ke Galeri Visual</span>
        </a>
      </div>

      <!-- Hero Bottom Content Lockup (Figma Exact Position) -->
      <div class="max-w-[1040px] w-full mx-auto px-4 sm:px-6 lg:px-0 pb-10 sm:pb-12 relative z-20 flex flex-col justify-end space-y-6">
        
        <!-- Row 1: Title Lockup Right Aligned (Node 4152:13811) -->
        <div class="w-full flex justify-end">
          <div class="text-right max-w-xl">
            <span class="font-cabinet text-xs sm:text-[14px] font-normal text-gray-200 tracking-wider block mb-1">
              Solo International Performing Arts 2024
            </span>
            <h1 class="font-cabinet font-bold text-2xl sm:text-3xl lg:text-[38px] text-white tracking-tight leading-[1.2] drop-shadow-[0_0_25px_rgba(255,255,255,0.7)]">
              Performing Royal Genesis
            </h1>
          </div>
        </div>

        <!-- Row 2: Official Support & Partners Logo Bar Centered (Node 4152:12814) -->
        <div class="w-full flex items-center justify-center gap-4 sm:gap-6 flex-wrap opacity-85 brightness-0 invert pt-2">
          <img src="{{ asset('images/sponsor/SCK1.png') }}" class="h-6 sm:h-8 w-auto object-contain" alt="Semarak Candrakirana">
          <img src="{{ asset('images/sponsor/SIPACOM.png') }}" class="h-5 sm:h-7 w-auto object-contain" alt="SIPA Community">
          <img src="{{ asset('images/sponsor/MANGKUNEGARAN.png') }}" class="h-6 sm:h-8 w-auto object-contain" alt="Pura Mangkunegaran">
          <img src="{{ asset('images/sponsor/PEMERINTAHKOTASURAKARTA.png') }}" class="h-6 sm:h-8 w-auto object-contain" alt="Pemkot Surakarta">
        </div>

      </div>

    </section>


    <!-- ========================================================= -->
    <!-- EDITION STORY & THEME NARRATIVE                           -->
    <!-- ========================================================= -->
    <section class="relative max-w-[1140px] mx-auto px-6 sm:px-10 py-16 sm:py-24 z-20">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center bg-white/[0.03] border border-white/10 rounded-[32px] p-6 sm:p-10 lg:p-12 backdrop-blur-md">
        
        <div class="lg:col-span-7 space-y-5">
          <div class="flex items-center gap-2 text-[#f19500] text-xs font-bold uppercase tracking-widest">
            <span class="w-2 h-2 rounded-full bg-[#f19500]"></span>
            <span>Tema & Filosofi Edisi 2024</span>
          </div>
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-cabinet font-bold text-white tracking-tight leading-snug">
            Performing Royal Genesis
          </h2>
          <p class="text-gray-300 text-base sm:text-lg leading-relaxed font-cabinet text-justify">
            Solo International Performing Arts (SIPA) Festival 2024 mengusung tema <em>"Performing Royal Genesis"</em> yang digelar di Pamedan Pura Mangkunegaran. Tema ini merayakan kembalinya panggung agung SIPA ke pelataran keraton Mangkunegaran, merefleksikan keagungan pusaka seni tradisional berpadu dengan inovasi kontemporer dari seniman mancanegara.
          </p>
        </div>

        <div class="lg:col-span-5 flex justify-center">
          <div class="relative w-full max-w-sm rounded-[24px] overflow-hidden border border-white/15 shadow-2xl group">
            <img src="{{ asset('images/maskot/2024.webp') }}" class="w-full h-[360px] object-cover group-hover:scale-105 transition-transform duration-700" alt="Maskot SIPA 2024">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent"></div>
            <div class="absolute bottom-4 inset-x-4 text-center">
              <span class="text-xs text-white/90 font-medium">Maskot Resmi: GRAj Ancillasura Marina Sudjiwo</span>
            </div>
          </div>
        </div>

      </div>

    </section>


    <!-- ========================================================= -->
    <!-- AFTERMOVIE SECTION                                        -->
    <!-- ========================================================= -->
    <section class="relative max-w-[1140px] mx-auto px-6 sm:px-10 pb-16 z-20">
      
      <div class="text-center mb-10">
        <span class="text-[#f19500] text-xs font-bold uppercase tracking-widest block mb-2">Dokumentasi Audio Visual</span>
        <h2 class="text-2xl sm:text-3xl font-cabinet font-bold text-white tracking-tight">
          After Movie SIPA Festival 2024
        </h2>
      </div>

      <div class="max-w-3xl mx-auto bg-white/5 border border-white/10 rounded-[28px] p-4 sm:p-6 backdrop-blur-md">
        <div class="w-full aspect-video rounded-[20px] overflow-hidden bg-black/60 shadow-xl">
          <iframe class="w-full h-full" src="https://www.youtube.com/embed/eOg3baFV5q8" title="After Movie SIPA 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>

    </section>


    <!-- ========================================================= -->
    <!-- PHOTO DOCUMENTATION GALLERY GRID                          -->
    <!-- ========================================================= -->
    @php
      $galleryImages2024 = ['a.webp', 'b.webp', 'c.webp', 'd.webp', 'e.webp', 'f.webp', 'g.webp'];
    @endphp

    <section class="relative max-w-[1240px] mx-auto px-6 sm:px-10 pb-24 z-20">
      
      <div class="flex items-center justify-between border-b border-white/10 pb-4 mb-8">
        <div>
          <span class="text-[#f19500] text-xs font-bold uppercase tracking-widest block mb-1">Momen Panggung & Suasana</span>
          <h2 class="text-2xl sm:text-3xl font-cabinet font-bold text-white tracking-tight">
            Dokumentasi Foto 2024
          </h2>
        </div>
        <span class="text-xs text-gray-400 font-medium">{{ count($galleryImages2024) }} Foto Arsip</span>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 photo-grid">
        @foreach ($galleryImages2024 as $index => $img)
          <div class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[220px] sm:h-[260px] shadow-xl border border-white/10 transition-all duration-300 hover:-translate-y-1.5 hover:border-[#f19500]/60">
            <img src="{{ asset('images/gallery/2024/' . $img) }}" alt="Foto Dokumentasi SIPA 2024 {{ $index + 1 }}" class="w-full h-full object-cover group-hover:scale-108 transition-transform duration-700 brightness-95 group-hover:brightness-105" loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
              <span class="text-xs text-white font-medium">SIPA 2024 #{{ $index + 1 }}</span>
            </div>
          </div>
        @endforeach
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

  <!-- GSAP Entrance Animation & Lenis Scroll -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
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
    });
  </script>

</body>
</html>