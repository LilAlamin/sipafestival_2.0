<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIPA Festival 2026 - Solo International Performing Arts</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

  <!-- Tailwind CSS & FontAwesome -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://api.fontshare.com/v2/css?f[]=cabinet-grotesk@800,500,700,400&display=swap" rel="stylesheet">

  <!-- Lenis & GSAP Animation Libraries -->
  <link rel="stylesheet" href="https://unpkg.com/lenis@1.1.18/dist/lenis.css">
  <script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

  <style>
    @font-face {
      font-family: 'Font_SIPA26';
      src: url("{{ asset('assets/Font_SIPA26/CormorantGaramond-Bold.ttf') }}") format('truetype');
      font-weight: bold;
      font-style: normal;
    }

    @font-face {
      font-family: 'Font_SIPA26-Italic';
      src: url("{{ asset('assets/Font_SIPA26/CormorantGaramond-Italic.ttf') }}") format('truetype');
      font-weight: normal;
      font-style: italic;
    }

    html.lenis, html.lenis body {
      height: auto;
    }

    .lenis.lenis-smooth {
      scroll-behavior: auto !important;
    }

    .lenis.lenis-smooth [data-lenis-prevent] {
      overscroll-behavior: contain;
    }

    .lenis.lenis-stopped {
      overflow: hidden;
    }

    body {
      font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
      background-color: #0b0c10;
      color: #ffffff;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .font-sipa-bold {
      font-family: 'Font_SIPA26', Georgia, serif;
    }

    .font-sipa-italic {
      font-family: 'Font_SIPA26-Italic', Georgia, serif;
    }

    .font-cabinet {
      font-family: 'Cabinet Grotesk', -apple-system, sans-serif !important;
    }

    /* Fixed Background Stage Layer with bg_fix.png */
    .bg-layer {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-image: url("{{ asset('images/bg_fix.png') }}");
      background-size: cover;
      background-position: center top;
      background-repeat: no-repeat;
      z-index: -2;
    }

    .hero-title-glow {
      text-shadow: 0 0 30px rgba(255, 255, 255, 0.4), 0 4px 20px rgba(0, 0, 0, 0.95);
    }
  </style>
</head>
<body class="relative">

  <!-- GSAP Animated Splash Screen Overlay (Matching logo_putih.png theme) -->
  <div id="splash-screen" class="fixed inset-0 z-[9999] bg-[#0b0c10] flex flex-col justify-center items-center px-4 overflow-hidden select-none">
    
    <!-- Background Ambient Red/White Glow -->
    <div class="absolute w-[300px] sm:w-[520px] h-[300px] sm:h-[520px] bg-[#e63946]/15 rounded-full blur-[120px] pointer-events-none"></div>

    <!-- Splash Content Lockup -->
    <div class="relative z-10 text-center flex flex-col items-center">
      <img id="splash-logo" 
           src="{{ asset('images/logo_putih.png') }}" 
           alt="SIPA Festival 2026 - Solo International Performing Arts" 
           class="w-[260px] sm:w-[420px] lg:w-[500px] h-auto object-contain drop-shadow-[0_0_40px_rgba(255,255,255,0.7)] opacity-0 scale-90 transform-gpu">
      
      <!-- Subtitle Tagline -->
      <span id="splash-tagline" class="text-gray-300/90 text-xs sm:text-sm font-bold tracking-[0.25em] uppercase font-cabinet mt-4 sm:mt-6 opacity-0">
        Kinetic Kinship : Beyond Boundaries
      </span>

      <!-- Glowing Thin Progress Bar Track -->
      <div id="splash-progress-track" class="w-[180px] sm:w-[260px] h-[3px] bg-white/10 rounded-full mt-6 overflow-hidden relative opacity-0">
        <div id="splash-progress-bar" class="h-full w-0 bg-gradient-to-r from-[#e63946] via-white to-[#e63946] rounded-full shadow-[0_0_15px_rgba(255,255,255,0.9)]"></div>
      </div>
    </div>

  </div>

  <!-- Stage Frame Background Layer (bg_fix.png) -->
  <div class="bg-layer"></div>

  <!-- Navbar Component 2026 -->
  <x-navbar2026 />

  <!-- SECTION 1: HERO SECTION OVERLAY (Desktop Figma Match + Requested Mobile Sequence) -->
  <section id="hero" class="relative min-h-screen flex flex-col justify-between pt-20 sm:pt-24 lg:pt-28 pb-4 overflow-hidden">
    
    <!-- Gondrong Gunarto Portrait (Desktop Only Absolute Bleed) -->
    <div class="hidden lg:flex absolute right-0 bottom-0 z-10 pointer-events-none items-end justify-end h-full">
      <img src="{{ asset('images/maskot/gondrong_gunarto.webp') }}"
           alt="Gondrong Gunarto - Solo International Performing Arts 2026 Ambassador"
           class="w-auto max-w-none h-[88vh] object-contain object-right-bottom drop-shadow-[0_25px_60px_rgba(0,0,0,0.95)]">
    </div>

    <!-- Main Hero Container -->
    <div class="max-w-[1440px] mx-auto px-4 sm:px-10 lg:px-16 w-full my-auto z-20 grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6 lg:gap-8 items-center">
      
      <!-- Left Column / Mobile Sequence Container -->
      <div class="lg:col-span-7 flex flex-col items-center lg:items-start justify-center space-y-3 sm:space-y-5 text-center lg:text-left py-0">
        
        <!-- 1. Logo Putih Artwork (Top) -->
        <div class="w-full flex justify-center lg:justify-start -ml-0 sm:-ml-8 lg:-ml-28 -mt-0 sm:-mt-6 lg:-mt-24">
          <img src="{{ asset('images/logo_putih.png') }}"
               alt="Solo International Performing Arts — Kinetic Kinship : Beyond Boundaries"
               class="w-full max-w-[310px] sm:max-w-[500px] lg:max-w-[660px] h-auto object-contain drop-shadow-[0_0_35px_rgba(255,255,255,0.45)]">
        </div>

        <!-- 2. Gondrong Gunarto Mascot Image (Mobile Only: Under Logo, Above Text) -->
        <div class="block lg:hidden w-full my-1 flex justify-center items-center">
          <img src="{{ asset('images/maskot/gondrong_gunarto.webp') }}"
               alt="Gondrong Gunarto Ambassador"
               class="h-[36vh] sm:h-[48vh] w-auto object-contain mx-auto drop-shadow-[0_15px_45px_rgba(0,0,0,0.95)]">
        </div>

        <!-- 3. Description Paragraph (Exact Figma Node 4082:9121 Match - Adjusted Offset) -->
        <p class="text-white font-medium text-sm sm:text-base leading-[1.35] sm:leading-[1.2] max-w-[580px] lg:max-w-[640px] text-center mx-auto lg:mx-0 lg:-ml-16 mt-3 sm:mt-6 lg:mt-8 px-2 sm:px-0 tracking-normal">
          Where movement connects us, and differences become a force for creation,<br class="hidden sm:inline">
          together through the universal language of performance.
        </p>

      </div>

      <!-- Right Column Spacer (Desktop Only) -->
      <div class="hidden lg:block lg:col-span-5"></div>

    </div>

    <!-- 4. Sponsor Logos Strip (Bottom) -->
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-10 lg:px-16 z-20 pt-2 pb-4 sm:pb-8 flex justify-center items-center">
      <img src="{{ asset('images/sponsor/sponsor_strip_hero.png') }}"
           alt="SIPA 2026 Official Sponsors & Media Partners"
           class="h-8 sm:h-12 lg:h-16 w-auto max-w-full object-contain opacity-95 hover:opacity-100 transition-opacity">
    </div>
  </section>

  <!-- SECTION: MEET OUR AMBASSADOR (100% Figma Node 4116:321 Pixel-Perfect Match) -->
  <section id="ambassador" class="relative py-20 lg:py-28 bg-[#0a120e] bg-cover bg-center z-10 border-t border-white/10" style="background-image: url('{{ asset('images/ambassador/ambassador_bg.jpg') }}');">
    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-0"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-0"></div>

    <div class="max-w-[1440px] mx-auto px-6 sm:px-10 lg:px-16 text-center relative z-10">
      
      <!-- Section Header Lockup -->
      <div class="max-w-3xl mx-auto space-y-2 mb-12 sm:mb-16">
        <span class="text-base sm:text-lg font-normal tracking-wide text-gray-200 font-cabinet block">Meet our Ambassador</span>
        <h2 class="text-4xl sm:text-5xl lg:text-6xl font-sipa-bold font-bold text-white tracking-tight">“Gondrong” Gunarto</h2>
      </div>

      <!-- 3-Photo Showcase Cards Layout (Pixel-Perfect Figma Match) -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 items-center max-w-[1100px] mx-auto mb-12 sm:mb-16">
        
        <!-- Left Photo Card: Vespa & Kecapi (Figma Node 4085-9303) -->
        <div class="relative rounded-[22px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.8)] h-[400px] sm:h-[460px] border border-white/10 group transition-transform duration-500 hover:scale-[1.02]">
          <img src="{{ asset('images/ambassador/card1.png') }}" 
               alt="Gondrong Gunarto with Vespa and Kecapi" 
               class="w-full h-full object-cover">
        </div>

        <!-- Center Photo Card (Taller & Spotlight Highlighted): Djembe Drum (Figma Node 4085-9301) -->
        <div class="relative rounded-[22px] overflow-hidden shadow-[0_25px_60px_rgba(0,0,0,0.9)] h-[450px] sm:h-[530px] border border-white/15 group transition-transform duration-500 hover:scale-[1.02]">
          <img src="{{ asset('images/ambassador/card2.png') }}" 
               alt="Gondrong Gunarto Spotlight Djembe" 
               class="w-full h-full object-cover">
        </div>

        <!-- Right Photo Card: Vespa & Drum (Figma Node 4085-9302) -->
        <div class="relative rounded-[22px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.8)] h-[400px] sm:h-[460px] border border-white/10 group transition-transform duration-500 hover:scale-[1.02]">
          <img src="{{ asset('images/ambassador/card3.png') }}" 
               alt="Gondrong Gunarto Vespa Performance" 
               class="w-full h-full object-cover">
        </div>

      </div>

      <!-- Description Paragraph (Centered below cards - Exact Figma Text) -->
      <div class="max-w-[860px] mx-auto text-center px-4">
        <p class="text-gray-200/90 text-sm sm:text-base lg:text-[16.5px] font-normal leading-[1.75] tracking-wide">
          Rooted in the rich heritage of Javanese gamelan while boldly exploring cultural boundaries, his distinctive artistic instinct continues to create powerful and inspiring works for today's generation. As SIPA's ambassador, his role extends beyond representing the festival. His presence embodies SIPA's spirit of inclusive collaboration, artistic courage, and boundless creativity.
        </p>
      </div>

    </div>
  </section>

  <!-- SECTION: FESTIVAL HIGHLIGHTS FULL-BLEED GRID SECTION -->
  <section id="festival-showcase" class="relative w-full bg-[#0b0c10] z-10 border-t border-b border-white/10 overflow-hidden">
    
    <!-- Floating Logo Lockup Overlay (Melayang Paling Atas di Tengah Section Grid) -->
    <div class="absolute top-6 sm:top-10 lg:top-14 left-1/2 -translate-x-1/2 z-30 w-full max-w-[340px] sm:max-w-[500px] lg:max-w-[620px] px-4 text-center pointer-events-none">
      <img src="{{ asset('images/logo_putih.png') }}" alt="Solo International Performing Arts — Kinetic Kinship : Beyond Boundaries" class="w-full h-auto object-contain mx-auto drop-shadow-[0_0_40px_rgba(255,255,255,0.9)]" loading="eager" decoding="async">
    </div>

    <!-- Floating Sponsor Logos Overlay (Melayang di Atas Foto Baris Bawah Grid) -->
    <div class="absolute bottom-4 sm:bottom-8 lg:bottom-10 left-1/2 -translate-x-1/2 z-30 w-full max-w-[1280px] px-4 text-center pointer-events-none flex justify-center items-center">
      <img src="{{ asset('images/sponsor/sponsor_strip_hero.png') }}"
           alt="Official Sponsors & Partners - SIPA Festival 2026"
           class="h-10 sm:h-14 lg:h-18 w-auto max-w-full object-contain mx-auto opacity-95 drop-shadow-[0_6px_25px_rgba(0,0,0,0.95)]" loading="eager" decoding="async">
    </div>

    <!-- 3x3 Full-Width Edge-to-Edge Grid (Lebar Penuh Tanpa Padding Samping) -->
    <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-0 bg-black">
      
      <!-- Row 1, Item 1 (g1.jpg): Traditional Wayang Performance -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g1.jpg') }}" alt="Wayang Performance - SIPA Festival" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40 opacity-70 group-hover:opacity-30 transition-opacity"></div>
      </div>

      <!-- Row 1, Item 2 (g2.jpg): SIPA Main Stage -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g2.jpg') }}" alt="SIPA Main Stage" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/60 opacity-80 group-hover:opacity-40 transition-opacity"></div>
      </div>

      <!-- Row 1, Item 3 (g3.jpg): Contemporary Solo Performance -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g3.jpg') }}" alt="Contemporary Dance Performance" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40 opacity-70 group-hover:opacity-30 transition-opacity"></div>
      </div>

      <!-- Row 2, Item 4 (g4.jpg): Mask Dancer Reog Performance -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g4.jpg') }}" alt="Mask Dance Performance" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40 opacity-70 group-hover:opacity-30 transition-opacity"></div>
      </div>

      <!-- Row 2, Item 5 (g5.jpg): Vocal Soloist Red Spotlight -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g5.jpg') }}" alt="Vocal Performance" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40 opacity-70 group-hover:opacity-30 transition-opacity"></div>
      </div>

      <!-- Row 2, Item 6 (g6.jpg): Group Acrobat Performance -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g6.jpg') }}" alt="Group Acrobat Performance" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40 opacity-70 group-hover:opacity-30 transition-opacity"></div>
      </div>

      <!-- Row 3, Item 7 (g7.jpg): Traditional Dancer Ornate Costume -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g7.jpg') }}" alt="Traditional Dancer Costume" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40 opacity-80 group-hover:opacity-50 transition-opacity"></div>
      </div>

      <!-- Row 3, Item 8 (g8.jpg): Stage Fireworks Finale -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g8.jpg') }}" alt="Stage Fireworks Finale" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40 opacity-80 group-hover:opacity-50 transition-opacity"></div>
      </div>

      <!-- Row 3, Item 9 (g9.jpg): Warrior Dancer Stage Green Lights -->
      <div class="group relative overflow-hidden h-[260px] sm:h-[320px] lg:h-[380px] bg-black transform-gpu">
        <img src="{{ asset('images/gallery/grid/g9.jpg') }}" alt="Warrior Stage Performance" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="eager" decoding="async">
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-black/40 opacity-80 group-hover:opacity-50 transition-opacity"></div>
      </div>

    </div>

  </section>

  <!-- SECTION 5: LATEST NEWS & ARTICLES (Figma Artikel Pilihan Arunika Match) -->
  <section id="news" class="relative py-20 lg:py-24 bg-[#0b0c10]/95 z-10 border-t border-white/10">
    <div class="max-w-[1280px] mx-auto px-6 sm:px-10 lg:px-12">
      
      <!-- Section Header Lockup (Exact Figma Match) -->
      <div class="max-w-3xl mb-10 sm:mb-12">
        <h2 class="text-3xl sm:text-4xl lg:text-[40px] font-bold text-white tracking-tight mb-3">Artikel Pilihan Arunika</h2>
        <p class="text-gray-300/90 text-sm sm:text-base font-normal leading-relaxed max-w-2xl">
          Kumpulan bacaan ringan tentang manfaat aromaterapi, rahasia di balik wewangian, hingga cara sederhana menciptakan suasana nyaman di rumah.
        </p>
      </div>

      <!-- Articles Asymmetric Grid Layout (1 Large Card Left + 2 Stacked Horizontal Cards Right) -->
      @if(isset($news) && count($news) >= 3)
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
          
          <!-- Left Column: Featured Big Article Card (Item 1) -->
          @php $firstNews = $news[0]; @endphp
          <div class="lg:col-span-6">
            <a href="{{ route('news.HomeView', $firstNews->slug) }}" class="group bg-white rounded-[28px] p-4 sm:p-5 flex flex-col justify-between h-full shadow-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
              <div class="w-full h-[220px] sm:h-[260px] lg:h-[270px] rounded-2xl overflow-hidden mb-4 sm:mb-5 shrink-0">
                <img src="{{ asset('images/news/'.$firstNews->image_path) }}" alt="{{ $firstNews->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              </div>
              <div class="flex-1 flex flex-col justify-between px-1">
                <div>
                  <h3 class="text-[#1f2937] font-bold text-lg sm:text-xl md:text-2xl leading-snug tracking-tight mb-2 group-hover:text-[#5c7c33] transition-colors line-clamp-2">{{ $firstNews->title }}</h3>
                  <p class="text-[#9ca3af] text-xs sm:text-sm font-normal mb-3 block">{{ \Carbon\Carbon::parse($firstNews->sent_at ?? now())->format('j F Y') }}</p>
                  <p class="text-[#4b5563] text-xs sm:text-sm font-normal leading-relaxed line-clamp-3 mb-4 sm:mb-6">{!! strip_tags($firstNews->description) !!}</p>
                </div>
                <div class="text-right mt-auto">
                  <span class="text-[#5c7c33] group-hover:text-[#4d7c0f] text-xs sm:text-sm font-semibold inline-block transition-colors">
                    Baca Selengkapnya
                  </span>
                </div>
              </div>
            </a>
          </div>

          <!-- Right Column: 2 Stacked Horizontal Cards (Items 2 & 3) -->
          <div class="lg:col-span-6 flex flex-col gap-6 justify-between">
            @foreach($news->skip(1)->take(2) as $item)
            <a href="{{ route('news.HomeView', $item->slug) }}" class="group bg-white rounded-[28px] p-4 sm:p-5 flex flex-col sm:flex-row items-stretch gap-4 sm:gap-5 shadow-xl flex-1 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
              <div class="w-full sm:w-[180px] lg:w-[200px] h-[160px] sm:h-auto rounded-2xl overflow-hidden shrink-0">
                <img src="{{ asset('images/news/'.$item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              </div>
              <div class="flex-1 flex flex-col justify-between py-1 px-1">
                <div>
                  <h4 class="text-[#1f2937] font-bold text-base sm:text-lg leading-snug tracking-tight mb-1.5 line-clamp-2 group-hover:text-[#5c7c33] transition-colors">{{ $item->title }}</h4>
                  <p class="text-[#9ca3af] text-xs sm:text-sm font-normal mb-2 block">{{ \Carbon\Carbon::parse($item->sent_at ?? now())->format('j F Y') }}</p>
                  <p class="text-[#4b5563] text-xs sm:text-sm font-normal leading-relaxed line-clamp-2 mb-3">{!! strip_tags($item->description) !!}</p>
                </div>
                <div class="text-right mt-auto">
                  <span class="text-[#5c7c33] group-hover:text-[#4d7c0f] text-xs sm:text-sm font-semibold inline-block transition-colors">
                    Baca Selengkapnya
                  </span>
                </div>
              </div>
            </a>
            @endforeach
          </div>

        </div>
      @else
        <!-- Fallback 3 Article Layout (Exact Match with Figma Design) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
          
          <!-- Left Column: Featured Big Article Card -->
          <div class="lg:col-span-6">
            <a href="/news" class="group bg-white rounded-[28px] p-4 sm:p-5 flex flex-col justify-between h-full shadow-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
              <div class="w-full h-[220px] sm:h-[260px] lg:h-[270px] rounded-2xl overflow-hidden mb-4 sm:mb-5 shrink-0">
                <img src="{{ asset('images/news/art1.png') }}" alt="Mengapa Aromaterapi Lebih Dari Sekadar Wewangian?" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              </div>
              <div class="flex-1 flex flex-col justify-between px-1">
                <div>
                  <h3 class="text-[#1f2937] font-bold text-lg sm:text-xl md:text-2xl leading-snug tracking-tight mb-2 group-hover:text-[#5c7c33] transition-colors">Mengapa Aromaterapi Lebih Dari Sekadar Wewangian?</h3>
                  <p class="text-[#9ca3af] text-xs sm:text-sm font-normal mb-3 block">5 Mei 2025</p>
                  <p class="text-[#4b5563] text-xs sm:text-sm font-normal leading-relaxed line-clamp-3 mb-4 sm:mb-6">
                    Di balik harum lavender dan kayu cendana, ada ketenangan yang meresap ke dalam dada. Artikel ini membahas bagaimana aroma-aroma alami dapat menjadi teman sunyi dalam hari-hari...
                  </p>
                </div>
                <div class="text-right mt-auto">
                  <span class="text-[#5c7c33] group-hover:text-[#4d7c0f] text-xs sm:text-sm font-semibold inline-block transition-colors">
                    Baca Selengkapnya
                  </span>
                </div>
              </div>
            </a>
          </div>

          <!-- Right Column: 2 Stacked Horizontal Cards -->
          <div class="lg:col-span-6 flex flex-col gap-6 justify-between">
            
            <!-- Top Right Horizontal Card -->
            <a href="/news" class="group bg-white rounded-[28px] p-4 sm:p-5 flex flex-col sm:flex-row items-stretch gap-4 sm:gap-5 shadow-xl flex-1 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
              <div class="w-full sm:w-[180px] lg:w-[200px] h-[160px] sm:h-auto rounded-2xl overflow-hidden shrink-0">
                <img src="{{ asset('images/news/art2.png') }}" alt="Menciptakan Ruang Kerja yang Tenang dengan Aroma Alami" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              </div>
              <div class="flex-1 flex flex-col justify-between py-1 px-1">
                <div>
                  <h4 class="text-[#1f2937] font-bold text-base sm:text-lg leading-snug tracking-tight mb-1.5 line-clamp-2 group-hover:text-[#5c7c33] transition-colors">Menciptakan Ruang Kerja yang Tenang dengan Aroma Alami</h4>
                  <p class="text-[#9ca3af] text-xs sm:text-sm font-normal mb-2 block">5 Mei 2025</p>
                  <p class="text-[#4b5563] text-xs sm:text-sm font-normal leading-relaxed line-clamp-2 mb-3">
                    Stres pekerjaan sering kali membuat pikiran riuh. Dengan sentuhan wangi citru...
                  </p>
                </div>
                <div class="text-right mt-auto">
                  <span class="text-[#5c7c33] group-hover:text-[#4d7c0f] text-xs sm:text-sm font-semibold inline-block transition-colors">
                    Baca Selengkapnya
                  </span>
                </div>
              </div>
            </a>

            <!-- Bottom Right Horizontal Card -->
            <a href="/news" class="group bg-white rounded-[28px] p-4 sm:p-5 flex flex-col sm:flex-row items-stretch gap-4 sm:gap-5 shadow-xl flex-1 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
              <div class="w-full sm:w-[180px] lg:w-[200px] h-[160px] sm:h-auto rounded-2xl overflow-hidden shrink-0">
                <img src="{{ asset('images/news/art3.png') }}" alt="Menciptakan Ruang Kerja yang Tenang dengan Aroma Alami" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              </div>
              <div class="flex-1 flex flex-col justify-between py-1 px-1">
                <div>
                  <h4 class="text-[#1f2937] font-bold text-base sm:text-lg leading-snug tracking-tight mb-1.5 line-clamp-2 group-hover:text-[#5c7c33] transition-colors">Menciptakan Ruang Kerja yang Tenang dengan Aroma Alami</h4>
                  <p class="text-[#9ca3af] text-xs sm:text-sm font-normal mb-2 block">5 Mei 2025</p>
                  <p class="text-[#4b5563] text-xs sm:text-sm font-normal leading-relaxed line-clamp-2 mb-3">
                    Stres pekerjaan sering kali membuat pikiran riuh. Dengan sentuhan wangi citru...
                  </p>
                </div>
                <div class="text-right mt-auto">
                  <span class="text-[#5c7c33] group-hover:text-[#4d7c0f] text-xs sm:text-sm font-semibold inline-block transition-colors">
                    Baca Selengkapnya
                  </span>
                </div>
              </div>
            </a>

          </div>

        </div>
      @endif

    </div>
  </section>

  <!-- SECTION 4: LINE UP & PERFORMING DELEGATES (Figma Node 4119:359 Performer Section Match - 60fps Optimized) -->
  <section id="lineup" class="relative py-24 bg-[#0b0c10] bg-cover bg-center z-10 border-t border-white/10 overflow-hidden" style="background-image: url('{{ asset('images/performer_bg.jpg') }}');">
    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-0"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-0"></div>

    <div class="max-w-[1280px] mx-auto px-6 sm:px-10 lg:px-12 relative z-10">
      
      <!-- Section Header -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-12 sm:mb-14 gap-4">
        <div>
          <span class="text-xs font-bold tracking-widest text-[#e63946] uppercase font-cabinet block mb-1">PERFORMERS & DELEGATES</span>
          <h2 class="text-3xl sm:text-5xl font-sipa-bold font-bold text-white">Line Up Seniman 2026</h2>
        </div>
        <a href="/lineup" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-300 hover:text-white transition-colors shrink-0">
          <span>Lihat Seluruh Line Up</span>
          <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
      </div>

      <!-- 4 Tall Vertical Performer Cards Grid (Exact Figma Node 4119:359 Specs) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-7 items-center max-w-[1200px] mx-auto">
        
        <!-- Card 1: Khambatta Dance Company -->
        <div class="relative rounded-[24px] sm:rounded-[28px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.85)] h-[480px] sm:h-[540px] lg:h-[570px] border border-white/15 group transition-all duration-500 hover:-translate-y-2 hover:border-white/40 hover:shadow-[0_25px_60px_rgba(0,0,0,0.95)] flex flex-col justify-between transform-gpu">
          <img src="{{ asset('images/delegates/Khambatta Dance Company.jpg') }}" 
               alt="Khambatta Dance Company" 
               class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 z-0"
               loading="eager" 
               decoding="async">
          <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
          
          <span class="relative z-20 self-end m-4 bg-black/60 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider border border-white/20 font-cabinet">
            USA
          </span>
          
          <div class="relative z-20 p-6 sm:p-7 space-y-1.5 mt-auto">
            <span class="text-xs text-gray-300 font-cabinet uppercase tracking-widest block font-medium">Contemporary Dance</span>
            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#e63946] transition-colors leading-snug font-sipa-bold">Khambatta Dance Company</h3>
          </div>
        </div>

        <!-- Card 2: Rentak Gading Etnic Bengkulu -->
        <div class="relative rounded-[24px] sm:rounded-[28px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.85)] h-[480px] sm:h-[540px] lg:h-[570px] border border-white/15 group transition-all duration-500 hover:-translate-y-2 hover:border-white/40 hover:shadow-[0_25px_60px_rgba(0,0,0,0.95)] flex flex-col justify-between transform-gpu">
          <img src="{{ asset('images/delegates/Rentak Gading Etcnic Bengkulu.jpg') }}" 
               alt="Rentak Gading Etnic" 
               class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 z-0"
               loading="eager" 
               decoding="async">
          <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
          
          <span class="relative z-20 self-end m-4 bg-black/60 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider border border-white/20 font-cabinet">
            INDONESIA
          </span>
          
          <div class="relative z-20 p-6 sm:p-7 space-y-1.5 mt-auto">
            <span class="text-xs text-gray-300 font-cabinet uppercase tracking-widest block font-medium">Ethnic Music & Percussion</span>
            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#e63946] transition-colors leading-snug font-sipa-bold">Rentak Gading Etnic</h3>
          </div>
        </div>

        <!-- Card 3: Colectivo Glovo -->
        <div class="relative rounded-[24px] sm:rounded-[28px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.85)] h-[480px] sm:h-[540px] lg:h-[570px] border border-white/15 group transition-all duration-500 hover:-translate-y-2 hover:border-white/40 hover:shadow-[0_25px_60px_rgba(0,0,0,0.95)] flex flex-col justify-between transform-gpu">
          <img src="{{ asset('images/delegates/Colectivo Glovo.jpg') }}" 
               alt="Colectivo Glovo" 
               class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 z-0"
               loading="eager" 
               decoding="async">
          <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
          
          <span class="relative z-20 self-end m-4 bg-black/60 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider border border-white/20 font-cabinet">
            SPAIN
          </span>
          
          <div class="relative z-20 p-6 sm:p-7 space-y-1.5 mt-auto">
            <span class="text-xs text-gray-300 font-cabinet uppercase tracking-widest block font-medium">Physical Theater</span>
            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#e63946] transition-colors leading-snug font-sipa-bold">Colectivo Glovo</h3>
          </div>
        </div>

        <!-- Card 4: POD Dance Project -->
        <div class="relative rounded-[24px] sm:rounded-[28px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.85)] h-[480px] sm:h-[540px] lg:h-[570px] border border-white/15 group transition-all duration-500 hover:-translate-y-2 hover:border-white/40 hover:shadow-[0_25px_60px_rgba(0,0,0,0.95)] flex flex-col justify-between transform-gpu">
          <img src="{{ asset('images/delegates/POD Dance.jpg') }}" 
               alt="POD Dance Project" 
               class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 z-0"
               loading="eager" 
               decoding="async">
          <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
          
          <span class="relative z-20 self-end m-4 bg-black/60 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider border border-white/20 font-cabinet">
            SOUTH KOREA
          </span>
          
          <div class="relative z-20 p-6 sm:p-7 space-y-1.5 mt-auto">
            <span class="text-xs text-gray-300 font-cabinet uppercase tracking-widest block font-medium">Modern Performing Arts</span>
            <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#e63946] transition-colors leading-snug font-sipa-bold">POD Dance Project</h3>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- SECTION: BEYOND THE STAGE / INSTAGRAM SHOWCASE (Figma Node 4081:6597 Match) -->
  <section id="instagram-showcase" class="relative py-20 lg:py-24 bg-[#0a120e] bg-cover bg-center z-10 border-t border-white/10 overflow-hidden" style="background-image: url('{{ asset('images/ambassador/ambassador_bg.jpg') }}');">
    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-0"></div>
    <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-0"></div>

    <div class="max-w-[1280px] mx-auto px-6 sm:px-10 lg:px-12 relative z-10">
      
      <!-- Section Header Lockup (Exact Figma Match) -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 sm:mb-12 gap-4">
        <h2 class="text-3xl sm:text-4xl lg:text-[40px] font-bold text-white tracking-tight leading-tight">
          Beyond the Stage, There’s a Story
        </h2>
        <p class="text-gray-300/90 text-sm sm:text-base font-normal leading-relaxed max-w-md">
          Discover the moments, and connections that bring people together through movement, culture, and performance.
        </p>
      </div>

      <!-- 3 Instagram Post Cards Grid (Exact Figma Node 4081:6597 Specs) -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 max-w-[1200px] mx-auto mb-8 sm:mb-10">
        
        <!-- Instagram Card 1 -->
        <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[24px] sm:rounded-[28px] p-4 sm:p-5 shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:shadow-white/10 flex flex-col justify-between">
          <div>
            <!-- IG Header Bar -->
            <div class="flex items-center justify-between mb-3 px-1">
              <div class="flex items-center gap-3">
                <img src="{{ asset('images/instagram/ig_avatar.png') }}" alt="sipafestival" class="w-9 h-9 rounded-full object-cover shadow-sm">
                <span class="font-bold text-[#171717] text-sm sm:text-base">sipafestival</span>
              </div>
              <button type="button" class="text-gray-500 hover:text-black transition-colors px-1">
                <i class="fa-solid fa-ellipsis-vertical text-base"></i>
              </button>
            </div>

            <!-- IG Post Media Image -->
            <div class="w-full aspect-[4/5] overflow-hidden rounded-2xl bg-gray-100 my-2 shadow-inner">
              <img src="{{ asset('images/instagram/post1.jpg') }}" alt="SIPA 2026 Kinetic Kinship" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="eager" decoding="async">
            </div>
          </div>

          <!-- IG Footer Controls & Caption -->
          <div class="pt-3 px-1 space-y-2">
            <div class="flex items-center justify-between text-[#171717]">
              <div class="flex items-center gap-4">
                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer transition-colors"></i>
                <i class="fa-regular fa-comment text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
                <i class="fa-regular fa-paper-plane text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
              </div>
              <div class="flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-[#171717]"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
              </div>
              <i class="fa-regular fa-bookmark text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
            </div>
            
            <p class="text-xs text-[#737373] font-medium pt-1">10.328 views</p>
            
            <p class="text-xs sm:text-sm text-[#171717] leading-relaxed line-clamp-3">
              <span class="font-bold">sipafestival</span> Hi, Sobat Budaya!✨ SIPA once again opens a space where boundless works come together, bringing diverse forms of expression into a meaningful celebration of the arts.
            </p>
          </div>
        </div>

        <!-- Instagram Card 2 -->
        <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[24px] sm:rounded-[28px] p-4 sm:p-5 shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:shadow-white/10 flex flex-col justify-between">
          <div>
            <!-- IG Header Bar -->
            <div class="flex items-center justify-between mb-3 px-1">
              <div class="flex items-center gap-3">
                <img src="{{ asset('images/instagram/ig_avatar.png') }}" alt="sipafestival" class="w-9 h-9 rounded-full object-cover shadow-sm">
                <span class="font-bold text-[#171717] text-sm sm:text-base">sipafestival</span>
              </div>
              <button type="button" class="text-gray-500 hover:text-black transition-colors px-1">
                <i class="fa-solid fa-ellipsis-vertical text-base"></i>
              </button>
            </div>

            <!-- IG Post Media Image -->
            <div class="w-full aspect-[4/5] overflow-hidden rounded-2xl bg-gray-100 my-2 shadow-inner">
              <img src="{{ asset('images/instagram/post2.jpg') }}" alt="Meet The Official Ambassador of SIPA 2026" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="eager" decoding="async">
            </div>
          </div>

          <!-- IG Footer Controls & Caption -->
          <div class="pt-3 px-1 space-y-2">
            <div class="flex items-center justify-between text-[#171717]">
              <div class="flex items-center gap-4">
                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer transition-colors"></i>
                <i class="fa-regular fa-comment text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
                <i class="fa-regular fa-paper-plane text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
              </div>
              <div class="flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-[#171717]"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
              </div>
              <i class="fa-regular fa-bookmark text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
            </div>
            
            <p class="text-xs text-[#737373] font-medium pt-1">10.328 views</p>
            
            <p class="text-xs sm:text-sm text-[#171717] leading-relaxed line-clamp-3">
              <span class="font-bold">sipafestival</span> Hi, Sobat Budaya! Welcome our official Ambassador SIPA 2026 <a href="https://www.instagram.com/gondrong_gunarto/" target="_blank" class="font-semibold text-blue-600 hover:underline">@gondrong_gunarto</a>, a visionary maestro on a mission to transcend boundaries!
            </p>
          </div>
        </div>

        <!-- Instagram Card 3 -->
        <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[24px] sm:rounded-[28px] p-4 sm:p-5 shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:shadow-white/10 flex flex-col justify-between">
          <div>
            <!-- IG Header Bar -->
            <div class="flex items-center justify-between mb-3 px-1">
              <div class="flex items-center gap-3">
                <img src="{{ asset('images/instagram/ig_avatar.png') }}" alt="sipafestival" class="w-9 h-9 rounded-full object-cover shadow-sm">
                <span class="font-bold text-[#171717] text-sm sm:text-base">sipafestival</span>
              </div>
              <button type="button" class="text-gray-500 hover:text-black transition-colors px-1">
                <i class="fa-solid fa-ellipsis-vertical text-base"></i>
              </button>
            </div>

            <!-- IG Post Media Image -->
            <div class="w-full aspect-[4/5] overflow-hidden rounded-2xl bg-gray-100 my-2 shadow-inner">
              <img src="{{ asset('images/instagram/post3.jpg') }}" alt="Guess The Ambassador" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500" loading="eager" decoding="async">
            </div>
          </div>

          <!-- IG Footer Controls & Caption -->
          <div class="pt-3 px-1 space-y-2">
            <div class="flex items-center justify-between text-[#171717]">
              <div class="flex items-center gap-4">
                <i class="fa-regular fa-heart text-xl hover:text-red-500 cursor-pointer transition-colors"></i>
                <i class="fa-regular fa-comment text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
                <i class="fa-regular fa-paper-plane text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
              </div>
              <div class="flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                <span class="w-1.5 h-1.5 rounded-full bg-[#171717]"></span>
              </div>
              <i class="fa-regular fa-bookmark text-xl hover:text-gray-600 cursor-pointer transition-colors"></i>
            </div>
            
            <p class="text-xs text-[#737373] font-medium pt-1">10.328 views</p>
            
            <p class="text-xs sm:text-sm text-[#171717] leading-relaxed line-clamp-3">
              <span class="font-bold">sipafestival</span> Halo Sobat Budaya! Sorotan utama siap diarahkan. Dia yang memadukan karawitan dan musik kontemporer kelas dunia ke panggung SIPA 2026!
            </p>
          </div>
        </div>

      </div>

      <!-- Right Bottom Link: Jelajah Instagram SIPA -->
      <div class="flex justify-end">
        <a href="https://www.instagram.com/sipafestival/" target="_blank" class="inline-flex items-center gap-2 text-sm sm:text-base font-bold text-gray-200 hover:text-white transition-colors group">
          <span>Jelajah Instagram SIPA</span>
          <i class="fa-solid fa-chevron-right text-xs group-hover:translate-x-1 transition-transform"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- Footer Component -->
  <footer class="border-t border-white/10 bg-[#0b0c10]/95 backdrop-blur-md py-12 text-center text-xs text-gray-400 relative z-10">
    <div class="max-w-[1440px] mx-auto px-6 space-y-6">
      <div class="flex justify-center items-center">
        <img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Logo" class="h-10 w-auto brightness-0 invert">
      </div>
      <p class="max-w-md mx-auto text-gray-400">Solo International Performing Arts 2026 • Kinetic Kinship : Beyond Boundaries</p>
      <p>&copy; {{ date('Y') }} SIPA Festival. All Rights Reserved.</p>
    </div>
  <!-- GSAP & Lenis Smooth Scroll Setup Script -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // 1. Initialize Lenis Smooth Scroll
      const lenis = new Lenis({
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
        smoothTouch: false,
      });

      // Pause scroll while splash screen is active
      lenis.stop();

      // Synchronize Lenis scroll with GSAP ScrollTrigger
      lenis.on('scroll', ScrollTrigger.update);
      gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
      });
      gsap.ticker.lagSmoothing(0);

      // 2. Register GSAP Plugins
      gsap.registerPlugin(ScrollTrigger);

      // 3. Play Hero Animation Function
      const playHeroAnimation = () => {
        const heroTl = gsap.timeline();
        heroTl.from('#hero h1', {
          opacity: 0,
          y: 40,
          duration: 1,
          ease: 'power3.out'
        })
        .from('#hero p', {
          opacity: 0,
          y: 25,
          duration: 0.8,
          ease: 'power3.out'
        }, '-=0.5')
        .from('#hero .flex.gap-4', {
          opacity: 0,
          y: 20,
          duration: 0.8,
          ease: 'power3.out'
        }, '-=0.4');
      };

      // 4. GSAP Animated Splash Screen Timeline
      const splashTl = gsap.timeline({
        onComplete: () => {
          const splashEl = document.getElementById('splash-screen');
          if (splashEl) splashEl.style.display = 'none';
          lenis.start();
          ScrollTrigger.refresh();
          playHeroAnimation();
        }
      });

      splashTl
        .to('#splash-logo', {
          opacity: 1,
          scale: 1,
          duration: 0.85,
          ease: 'power3.out'
        })
        .to('#splash-tagline', {
          opacity: 1,
          duration: 0.5,
          ease: 'power2.out'
        }, '-=0.35')
        .to('#splash-progress-track', {
          opacity: 1,
          duration: 0.35,
          ease: 'power2.out'
        }, '-=0.25')
        .to('#splash-progress-bar', {
          width: '100%',
          duration: 1.0,
          ease: 'power2.inOut'
        })
        .to('#splash-logo, #splash-tagline, #splash-progress-track', {
          opacity: 0,
          y: -25,
          duration: 0.45,
          ease: 'power2.in'
        })
        .to('#splash-screen', {
          yPercent: -100,
          duration: 0.8,
          ease: 'power4.inOut'
        });

      // 5. Helper function for safe ScrollTrigger reveals (Prevents element hiding bugs)
      const animateSection = (selector, startPos = 'top 88%') => {
        const elements = document.querySelectorAll(selector);
        if (elements.length === 0) return;

        gsap.fromTo(elements, 
          { opacity: 0, y: 45, scale: 0.97 },
          { 
            opacity: 1, 
            y: 0, 
            scale: 1,
            duration: 0.9, 
            stagger: 0.15, 
            ease: 'power3.out',
            scrollTrigger: {
              trigger: elements[0].closest('section') || elements[0],
              start: startPos,
              toggleActions: 'play none none none',
              once: true
            }
          }
        );
      };

      // Apply safe reveals to all sections
      animateSection('#ambassador .grid > div');
      animateSection('#festival-showcase .grid > div');
      animateSection('#news .grid > div');
      animateSection('#lineup .grid > div');
      animateSection('#instagram-showcase .grid > div');

      // Recalculate layout heights once all images & assets finish loading
      window.addEventListener('load', () => {
        ScrollTrigger.refresh();
      });
    });
  </script>

</body>
</html>
