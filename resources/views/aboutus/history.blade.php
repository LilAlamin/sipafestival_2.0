<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>History of SIPA - Solo International Performing Arts</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('images/sipalogo.png') }}">

  <!-- Google Fonts & Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- GSAP, Lenis Smooth Scroll, StPageFlip & PDF.js Engine -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.js"></script>

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

  <!-- SECTION 1: YEARS TO YEARS HISTORY 3x3 EDGE-TO-EDGE GRID HERO (100% Figma Node 4152:17277 Match) -->
  <section id="history-hero" class="relative w-full bg-[#0b0c10] z-10 overflow-hidden pt-20 sm:pt-24">
    
    <!-- Floating Title & Logo Lockup Overlay (Melayang di Tengah Grid) -->
    <div class="absolute inset-0 z-30 flex flex-col items-center justify-center px-4 text-center pointer-events-none">
      
      <!-- Top Title Lockup: Years to Years History -->
      <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 mb-4 sm:mb-6">
        <h1 class="text-2xl sm:text-4xl lg:text-[44px] font-cabinet font-medium text-white tracking-tight leading-tight">
          Years to Years
        </h1>
        <span class="text-3xl sm:text-5xl lg:text-[54px] font-script italic text-white drop-shadow-[0_0_25px_rgba(255,255,255,0.6)] leading-tight">
          History
        </span>
      </div>

      <!-- Central Floating White Artwork Logo -->
      <div class="w-full max-w-[340px] sm:max-w-[480px] lg:max-w-[580px] xl:max-w-[620px] mx-auto">
        <img src="{{ asset('images/logo_putih.png') }}" 
             alt="Solo International Performing Arts — Kinetic Kinship : Beyond Boundaries" 
             class="w-full h-auto object-contain mx-auto drop-shadow-[0_0_50px_rgba(255,255,255,0.95)]" 
             loading="eager" 
             decoding="async">
      </div>

    </div>

    <!-- Left Theatrical Ornate Curtain Border Overlay -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-20 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border Overlay -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-20 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-20"></div>
    <div class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-20"></div>

    <!-- 3x3 Full-Width Edge-to-Edge Grid (Matching Figma Node 4152:17304) -->
    <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-0 bg-black relative z-10">
      
      <!-- Row 1, Item 1 (g1.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g1.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 1, Item 2 (g2.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g2.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 1, Item 3 (g3.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g3.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 2, Item 1 (g4.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g4.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 2, Item 2 (g5.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g5.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 2, Item 3 (g6.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g6.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 3, Item 1 (g7.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g7.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 3, Item 2 (g8.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g8.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 3, Item 3 (g9.jpg) -->
      <div class="group relative overflow-hidden h-[250px] sm:h-[300px] lg:h-[360px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g9.jpg') }}" alt="SIPA Festival History" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 opacity-75" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/50 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

    </div>
  </section>



  <!-- SECTION 2: HISTORY STORY & CAROUSEL (100% Matching Figma Node 4152:17669) -->
  <section id="history-narrative" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1060px] mx-auto px-6 sm:px-8 lg:px-0 relative z-20">
      
      <!-- Section Header Lockup (Figma Node 4152:17576) -->
      <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-center mb-10 sm:mb-12">
        <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
          Solo International Performing Arts
        </h2>
        <span class="text-3xl sm:text-4xl lg:text-[44px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
          Story
        </span>
      </div>

      <!-- 3-Card Carousel Slider Component (Figma Node 4152:17579) -->
      <div class="relative w-full overflow-hidden mb-6">
        <div id="story-slider-track" class="flex transition-transform duration-500 ease-out">
          
          <!-- Slide 1: 2025, 2024, 2023 -->
          <div class="w-full shrink-0 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- 2025 Card -->
            <a href="/gallery/2025" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2025.webp') }}" alt="SIPA Festival 2025" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2025</span>
              </div>
            </a>

            <!-- 2024 Card -->
            <a href="/gallery/2024" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2024.webp') }}" alt="SIPA Festival 2024" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2024</span>
              </div>
            </a>

            <!-- 2023 Card -->
            <a href="/gallery/2023" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2023.webp') }}" alt="SIPA Festival 2023" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2023</span>
              </div>
            </a>
          </div>

          <!-- Slide 2: 2022, 2021, 2020 -->
          <div class="w-full shrink-0 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- 2022 Card -->
            <a href="/gallery/2022" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2022.webp') }}" alt="SIPA Festival 2022" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2022</span>
              </div>
            </a>

            <!-- 2021 Card -->
            <a href="/gallery/2021" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2021.webp') }}" alt="SIPA Festival 2021" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2021</span>
              </div>
            </a>

            <!-- 2020 Card -->
            <a href="/gallery/2020" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2020.webp') }}" alt="SIPA Festival 2020" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2020</span>
              </div>
            </a>
          </div>

          <!-- Slide 3: 2019, 2018, 2017 -->
          <div class="w-full shrink-0 grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- 2019 Card -->
            <a href="/gallery/2019" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2019.webp') }}" alt="SIPA Festival 2019" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2019</span>
              </div>
            </a>

            <!-- 2018 Card -->
            <a href="/gallery/2018" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2018.webp') }}" alt="SIPA Festival 2018" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2018</span>
              </div>
            </a>

            <!-- 2017 Card -->
            <a href="/gallery/2017" class="group relative rounded-[20px] overflow-hidden bg-[#18161c] h-[240px] shadow-xl border border-white/10 block">
              <img src="{{ asset('images/maskot/2017.webp') }}" alt="SIPA Festival 2017" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent"></div>
              <div class="absolute bottom-5 left-5 z-10">
                <span class="font-cabinet text-xs text-gray-300 font-medium tracking-wider uppercase block mb-0.5">SIPA Festival</span>
                <span class="font-cabinet text-2xl font-bold text-white tracking-tight">2017</span>
              </div>
            </a>
          </div>

        </div>
      </div>

      <!-- Controls & Discover More Link (Figma Node 4152:17592) -->
      <div class="flex items-center justify-between w-full mb-12 sm:mb-14">
        
        <!-- Prev/Next & Dots Indicator -->
        <div class="flex items-center gap-2">
          <!-- Prev Button -->
          <button id="story-prev-btn" type="button" aria-label="Previous story cards" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/70 hover:text-white hover:border-white/50 hover:bg-white/5 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
          </button>

          <!-- 3 Dots Indicator -->
          <div class="flex items-center gap-2 px-3 py-2 bg-white/5 rounded-full border border-white/10">
            <button type="button" data-story-dot="0" aria-label="Slide 1" class="w-2 h-2 rounded-full bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all cursor-pointer"></button>
            <button type="button" data-story-dot="1" aria-label="Slide 2" class="w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60 transition-all cursor-pointer"></button>
            <button type="button" data-story-dot="2" aria-label="Slide 3" class="w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60 transition-all cursor-pointer"></button>
          </div>

          <!-- Next Button -->
          <button id="story-next-btn" type="button" aria-label="Next story cards" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/70 hover:text-white hover:border-white/50 hover:bg-white/5 transition-all">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
        </div>

        <!-- Discover Our Full History Link -->
        <a href="/gallery" class="inline-flex items-center gap-1.5 font-cabinet font-medium text-base sm:text-lg text-white hover:text-white/80 transition-colors underline underline-offset-4 decoration-white/60 hover:decoration-white">
          <span>Discover Our Full History</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
          </svg>
        </a>

      </div>

      <!-- Story Narrative Paragraphs Directly on Background (Figma Node 4152:17675) -->
      <div class="space-y-6 text-white/95 font-cabinet font-normal text-base sm:text-lg lg:text-[20px] leading-[1.65] text-justify">
        <p>
          @lang('messages.history_description_1')
        </p>
        <p>
          @lang('messages.history_description_2')
        </p>
        <p>
          @lang('messages.history_description_3')
        </p>
        <p>
          @lang('messages.history_description_4')
        </p>
      </div>

    </div>
  </section>

  <!-- SECTION 3: INTERACTIVE STPAGEFLIP E-BOOK DOCUMENTATION (Native 3D Page Turn, Zero Watermark) -->
  <section id="history-ebook" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1280px] mx-auto px-4 sm:px-8 lg:px-12 relative z-20">
      
      <!-- Section Header -->
      <div class="flex flex-col items-center text-center max-w-2xl mx-auto mb-8 sm:mb-10">
        <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 mb-2">
          <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
            SIPA Official
          </h2>
          <span class="text-3xl sm:text-4xl lg:text-[42px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
            E-Book
          </span>
        </div>
        <p class="font-cabinet text-gray-300/90 text-sm sm:text-base font-normal leading-relaxed">
          Buku dokumentasi dan arsip profil festival seni pertunjukan internasional Solo dari masa ke masa.
        </p>
      </div>

      <!-- Modern Flipbook Container Card -->
      <div id="flipbook-wrapper" class="relative w-full max-w-[1040px] mx-auto bg-black/40 backdrop-blur-md rounded-[24px] sm:rounded-[32px] border border-white/15 p-4 sm:p-6 lg:p-8 shadow-2xl flex flex-col items-center">
        
        <!-- Top Toolbar & Navigation Controls -->
        <div class="w-full flex flex-wrap items-center justify-between gap-3 border-b border-white/10 pb-4 mb-6 text-xs sm:text-sm font-cabinet">
          <!-- Title & Hint -->
          <div class="flex items-center gap-2 text-gray-300">
            <i class="fa-solid fa-book-open text-[#f19500]"></i>
            <span class="font-semibold text-white">Enam Belas Tahun Perjalanan SIPA</span>
            <span class="text-xs text-gray-400 hidden sm:inline">• Tarik ujung kertas untuk membalik</span>
          </div>

          <!-- Page Flip Navigation Actions -->
          <div class="flex items-center gap-2 sm:gap-3 ml-auto">
            <button id="book-prev-btn" type="button" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 border border-white/15 flex items-center justify-center text-white transition-all cursor-pointer" title="Halaman Sebelumnya">
              <i class="fa-solid fa-chevron-left text-xs"></i>
            </button>
            
            <span class="text-gray-300 font-medium px-1 sm:px-2">
              Hal. <span id="book-current-page" class="text-white font-bold">1</span> / <span id="book-total-pages">286</span>
            </span>

            <button id="book-next-btn" type="button" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 border border-white/15 flex items-center justify-center text-white transition-all cursor-pointer" title="Halaman Berikutnya">
              <i class="fa-solid fa-chevron-right text-xs"></i>
            </button>

            <!-- Download PDF Button -->
            <a href="{{ asset('ebook/sipa_16_tahun.pdf') }}" download="Enam_Belas_Tahun_Perjalanan_SIPA.pdf" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 border border-white/15 flex items-center justify-center text-white transition-all" title="Unduh PDF Resmi">
              <i class="fa-solid fa-download text-xs"></i>
            </a>

            <!-- Fullscreen Button -->
            <button id="book-fullscreen-btn" type="button" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-white/20 border border-white/15 flex items-center justify-center text-white transition-all cursor-pointer" title="Layar Penuh">
              <i class="fa-solid fa-expand text-xs"></i>
            </button>
          </div>
        </div>

        <!-- Flipbook Canvas Mount Container -->
        <div class="relative w-full flex justify-center items-center overflow-hidden min-h-[380px] sm:min-h-[520px] lg:min-h-[600px] py-2">
          
          <!-- Loading Spinner -->
          <div id="pdf-loading-spinner" class="absolute inset-0 flex flex-col items-center justify-center gap-3 bg-black/60 z-30 transition-opacity">
            <div class="w-10 h-10 border-4 border-[#f19500] border-t-transparent rounded-full animate-spin"></div>
            <p class="font-cabinet text-sm text-gray-200">Memuat Dokumen Asli SIPA (<span id="loading-progress">0%</span>)...</p>
          </div>

          <div id="st-flipbook" class="mx-auto shadow-[0_20px_50px_rgba(0,0,0,0.8)]">
            <!-- Rendered by PDF.js into StPageFlip Canvas -->
          </div>
        </div>

      </div>

    </div>
  </section>

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
    // Ensure browser starts at top of page on reload
    if ('scrollRestoration' in history) {
      history.scrollRestoration = 'manual';
    }
    window.scrollTo(0, 0);

    document.addEventListener('DOMContentLoaded', () => {
      window.scrollTo(0, 0);

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

      // 2. SIPA Story Carousel Logic with GSAP
      const initStoryCarousel = () => {
        let currentPage = 0;
        const totalPages = 3;
        const track = document.getElementById('story-slider-track');
        const prevBtn = document.getElementById('story-prev-btn');
        const nextBtn = document.getElementById('story-next-btn');
        const dots = document.querySelectorAll('[data-story-dot]');

        if (!track || !prevBtn || !nextBtn || dots.length === 0) return;

        const updateSlider = (page) => {
          currentPage = (page + totalPages) % totalPages;
          
          if (typeof gsap !== 'undefined') {
            gsap.to(track, {
              xPercent: -currentPage * 100,
              duration: 0.75,
              ease: 'power3.out'
            });

            const activeSlide = track.children[currentPage];
            if (activeSlide) {
              const cards = activeSlide.querySelectorAll('a');
              gsap.fromTo(cards, 
                { opacity: 0.35, y: 20, scale: 0.96 },
                { opacity: 1, y: 0, scale: 1, duration: 0.55, stagger: 0.08, ease: 'power2.out' }
              );
            }
          } else {
            track.style.transform = `translateX(-${currentPage * 100}%)`;
          }
          
          dots.forEach((dot, idx) => {
            if (idx === currentPage) {
              dot.className = 'w-2 h-2 rounded-full bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all cursor-pointer';
            } else {
              dot.className = 'w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60 transition-all cursor-pointer';
            }
          });
        };

        prevBtn.addEventListener('click', () => updateSlider(currentPage - 1));
        nextBtn.addEventListener('click', () => updateSlider(currentPage + 1));
        dots.forEach((dot, idx) => {
          dot.addEventListener('click', () => updateSlider(idx));
        });
      };

      initStoryCarousel();

      // 3. GSAP ScrollTrigger Animations
      if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
        gsap.registerPlugin(ScrollTrigger);

        // Grid Photos Safe Reveal
        gsap.from('#history-hero .grid > div', {
          opacity: 0,
          scale: 0.95,
          duration: 0.9,
          stagger: 0.08,
          ease: 'power3.out'
        });

        // Narrative Reveal
        gsap.from('#history-narrative .space-y-6 > p', {
          opacity: 0,
          y: 30,
          duration: 0.8,
          stagger: 0.12,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: '#history-narrative',
            start: 'top 80%',
            once: true
          }
        });

        // Flipbook Container Reveal
        gsap.from('#flipbook-wrapper', {
          opacity: 0,
          scale: 0.96,
          duration: 1,
          ease: 'power3.out',
          scrollTrigger: {
            trigger: '#history-ebook',
            start: 'top 80%',
            once: true
          }
        });
      }

      // 4. Initialize PDF.js and StPageFlip 3D Book Engine for sipa_16_tahun.pdf (Full 286 Pages On-Demand Streaming)
      const initPdfFlipbook = async () => {
        const bookElem = document.getElementById('st-flipbook');
        const spinner = document.getElementById('pdf-loading-spinner');
        const progressSpan = document.getElementById('loading-progress');
        const curPageSpan = document.getElementById('book-current-page');
        const totalPageSpan = document.getElementById('book-total-pages');
        const prevBtn = document.getElementById('book-prev-btn');
        const nextBtn = document.getElementById('book-next-btn');
        const fsBtn = document.getElementById('book-fullscreen-btn');
        const wrapper = document.getElementById('flipbook-wrapper');

        if (!bookElem || typeof pdfjsLib === 'undefined' || typeof St === 'undefined' || !St.PageFlip) return;

        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        try {
          const pdfDoc = await pdfjsLib.getDocument('{{ asset("ebook/sipa_16_tahun.pdf") }}').promise;
          const totalPages = pdfDoc.numPages; // 286
          if (totalPageSpan) totalPageSpan.textContent = totalPages;

          // 1. Build all 286 page containers
          bookElem.innerHTML = '';
          for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
            const pageDiv = document.createElement('div');
            pageDiv.className = 'page bg-white overflow-hidden shadow-sm flex items-center justify-center relative select-none';
            pageDiv.setAttribute('data-page-num', pageNum);
            if (pageNum === 1 || pageNum === totalPages) {
              pageDiv.setAttribute('data-density', 'hard');
            }

            pageDiv.innerHTML = `
              <canvas class="w-full h-full object-contain hidden"></canvas>
              <div class="page-placeholder absolute inset-0 flex flex-col items-center justify-center gap-2 bg-[#fafafa] text-gray-500 font-cabinet">
                <div class="w-6 h-6 border-2 border-[#f19500] border-t-transparent rounded-full animate-spin"></div>
                <span class="text-xs font-medium">Memuat Halaman ${pageNum}...</span>
              </div>
            `;
            bookElem.appendChild(pageDiv);
          }

          // 2. Set up On-Demand Page Rendering
          const renderedPages = new Set();
          const renderingQueue = new Set();

          const renderPage = async (pageNum) => {
            if (pageNum < 1 || pageNum > totalPages || renderedPages.has(pageNum) || renderingQueue.has(pageNum)) return;
            renderingQueue.add(pageNum);

            try {
              const pageDiv = bookElem.querySelector(`[data-page-num="${pageNum}"]`);
              if (!pageDiv) return;

              const page = await pdfDoc.getPage(pageNum);
              const viewport = page.getViewport({ scale: 1.3 });
              
              const canvas = pageDiv.querySelector('canvas');
              const placeholder = pageDiv.querySelector('.page-placeholder');
              
              if (canvas) {
                canvas.width = viewport.width;
                canvas.height = viewport.height;
                const ctx = canvas.getContext('2d');

                await page.render({ canvasContext: ctx, viewport: viewport }).promise;
                canvas.classList.remove('hidden');
                if (placeholder) placeholder.style.display = 'none';
                renderedPages.add(pageNum);
              }
            } catch (err) {
              console.warn('Page render error for page', pageNum, err);
            } finally {
              renderingQueue.delete(pageNum);
            }
          };

          const renderAdjacentPages = (currentPageIndex) => {
            const current = currentPageIndex + 1;
            // Pre-load a window of pages ahead and behind for seamless flipping
            for (let offset = -4; offset <= 8; offset++) {
              const target = current + offset;
              if (target >= 1 && target <= totalPages) {
                renderPage(target);
              }
            }
          };

          // Render first 6 initial pages before revealing
          for (let initP = 1; initP <= Math.min(6, totalPages); initP++) {
            await renderPage(initP);
            if (progressSpan) {
              progressSpan.textContent = Math.round((initP / 6) * 100) + '%';
            }
          }

          if (spinner) {
            spinner.style.opacity = '0';
            setTimeout(() => spinner.style.display = 'none', 300);
          }

          // 3. Initialize StPageFlip with all 286 pages
          const isMobile = window.innerWidth < 768;
          const pageFlip = new St.PageFlip(bookElem, {
            width: isMobile ? 320 : 420,
            height: isMobile ? 460 : 580,
            size: 'stretch',
            minWidth: 280,
            maxWidth: 540,
            minHeight: 400,
            maxHeight: 720,
            maxShadowOpacity: 0.5,
            showCover: true,
            mobileScrollSupport: false,
            usePortrait: isMobile,
            startPage: 0
          });

          pageFlip.loadFromHTML(document.querySelectorAll('#st-flipbook .page'));

          // Listen to page flip and render next pages on-the-fly
          pageFlip.on('flip', (e) => {
            if (curPageSpan) {
              curPageSpan.textContent = e.data + 1;
            }
            renderAdjacentPages(e.data);
          });

          if (prevBtn) prevBtn.addEventListener('click', () => pageFlip.flipPrev());
          if (nextBtn) nextBtn.addEventListener('click', () => pageFlip.flipNext());
          
          if (fsBtn && wrapper) {
            fsBtn.addEventListener('click', () => {
              if (!document.fullscreenElement) {
                wrapper.requestFullscreen().catch(err => console.log(err));
              } else {
                document.exitFullscreen();
              }
            });
          }

          // Initial pre-load of first chunk
          renderAdjacentPages(0);

        } catch (err) {
          console.error('Error loading PDF document:', err);
          if (spinner) {
            spinner.innerHTML = '<p class="text-xs text-red-400">Gagal memuat PDF. Silakan gunakan tombol unduh untuk melihat dokumen.</p>';
          }
        }
      };

      // Trigger PDF load gracefully
      setTimeout(initPdfFlipbook, 250);
    });
  </script>

</body>
</html>