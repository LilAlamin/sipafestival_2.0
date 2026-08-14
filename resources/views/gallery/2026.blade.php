<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIPA Festival 2026 - Kinetic Kinship: Beyond Boundaries</title>
  
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
      color: #ffffff;
      overflow-x: hidden;
    }
  </style>
</head>
<body class="bg-[#0b0c10] text-white font-cabinet selection:bg-[#406422] selection:text-white">

  <!-- Fixed Top Navbar Component -->
  <x-navbar2026 />

  <!-- MAIN WRAPPER (Exact Figma 1440px Scale) -->
  <main class="w-full bg-[#0b0c10] relative">

    <!-- ========================================================= -->
    <!-- 1. HERO SECTION (Figma Node 4152:12798)                   -->
    <!-- ========================================================= -->
    <section class="relative w-full h-[850px] lg:h-[900px] bg-black overflow-hidden flex flex-col justify-between pt-[90px]">
      
      <!-- Hero Background Image (Exact Figma Node 4152:13846) -->
      <div class="absolute inset-0">
        <img src="{{ asset('images/gallery/hero_sipa2026.png') }}" alt="SIPA 2026 - Kinetic Kinship" class="w-full h-full object-cover object-center brightness-95 contrast-105">
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
              Solo International Performing Arts 2026
            </span>
            <h1 class="font-cabinet font-bold text-2xl sm:text-3xl lg:text-[38px] text-white tracking-tight leading-[1.2] drop-shadow-[0_0_25px_rgba(255,255,255,0.7)]">
              Kinetic Kinship: Beyond Boundaries
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
    <!-- 2. ABOUT [YEAR] & TEASER SECTION (Figma Node 4152:13816) -->
    <!-- ========================================================= -->
    <section class="relative w-full min-h-[900px] bg-cover bg-center overflow-hidden py-16 sm:py-20" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
      
      <!-- Left Theatrical Curtains (Node 4152:13818) -->
      <div class="absolute inset-y-0 left-0 w-[200px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
        <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Right Theatrical Curtains (Node 4152:13819) -->
      <div class="absolute inset-y-0 right-0 w-[200px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
        <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Top Vector Shadow (Node 4152:13821) -->
      <div class="absolute top-0 inset-x-0 h-[337px] pointer-events-none z-10 -scale-y-100">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Bottom Vector Shadow (Node 4152:13820) -->
      <div class="absolute bottom-0 inset-x-0 h-[337px] pointer-events-none z-10">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Content Container (1040px width strictly matching Figma) -->
      <div class="max-w-[1040px] mx-auto px-4 sm:px-6 lg:px-0 relative z-20 space-y-16">
        
        <!-- About Year Lockup (Node 4152:13822: left-[197px] top-[69px] w-[597px]) -->
        <div class="max-w-[597px] space-y-4">
          
          <!-- Title Row: SIPA Festival 2026 (Node 4152:13823) -->
          <div class="flex flex-wrap items-center gap-x-3 gap-y-1">
            <span class="text-[32px] sm:text-[36px] font-cabinet font-medium text-white tracking-tight leading-[1.2]">
              SIPA
            </span>
            <span class="text-[36px] sm:text-[40px] font-script italic text-white leading-[1.2] drop-shadow-[0_0_15px_rgba(255,255,255,0.4)]">
              Festival
            </span>
            <span class="text-[32px] sm:text-[36px] font-cabinet font-medium text-white tracking-tight leading-[1.2]">
              2026
            </span>
          </div>

          <!-- Description Paragraph (Node 4152:13827: text-[20px] leading-[1.2]) -->
          <p class="font-cabinet font-medium text-base sm:text-[20px] text-white leading-[1.2] text-left">
            Solo International Performing Arts (SIPA) 2024 is an annual event that celebrates the beauty of performing arts from around the world. Held in the city of Solo, SIPA 2025 showcases a variety of captivating performances, from traditional dances to innovative contemporary shows. With the theme "Performing Royal Genesis" and featuring Gusti Sura as the mascot, SIPA 2024 successfully highlighted the richness of Javanese culture while presenting a modern atmosphere.
          </p>
        </div>

        <!-- Teaser Video Lockup (Node 4152:13828: top-[366px] w-[1040px]) -->
        <div class="w-full flex flex-col items-center gap-5">
          
          <!-- Teaser Header: Teaser SIPA Festival 2026 (Node 4152:13829) -->
          <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-white">
            <span class="text-[36px] sm:text-[40px] font-script italic leading-[1.2] drop-shadow-[0_0_15px_rgba(255,255,255,0.4)]">
              Teaser
            </span>
            <span class="text-[32px] sm:text-[36px] font-cabinet font-medium leading-[1.2]">
              SIPA Festival 2026
            </span>
          </div>

          <!-- Video Player Box (Node 4152:13832: rounded-[20px] h-[400px]) -->
          <div class="w-full h-[320px] sm:h-[400px] rounded-[20px] overflow-hidden bg-black/60 shadow-[0_20px_50px_rgba(0,0,0,0.8)] border border-white/10 relative">
            <iframe class="w-full h-full" src="https://www.youtube.com/embed/eOg3baFV5q8" title="Teaser SIPA Festival 2026" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

        </div>

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
    });
  </script>

</body>
</html>
