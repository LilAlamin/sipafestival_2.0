@php
  $activeLocale = 'en';
  if (request()->query('lang') === 'id' || (isset($_COOKIE['googtrans']) && (str_ends_with($_COOKIE['googtrans'], '/id') || str_contains($_COOKIE['googtrans'], '/en/id'))) || session('locale') === 'id') {
    if (request()->query('lang') !== 'en') {
      $activeLocale = 'id';
    }
  }
  if (request()->query('lang') === 'en') {
    $activeLocale = 'en';
  }
@endphp
<!DOCTYPE html>
<html lang="{{ $activeLocale }}" class="scroll-smooth">
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
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

    .font-script {
      font-family: 'Alex Brush', 'Brush Script MT', cursive;
    }

    /* Fixed Background Stage Layer with background26.webp */
    .bg-layer {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-image: url("{{ asset('images/background26.webp') }}");
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

  <!-- SECTION 1: HERO SECTION OVERLAY (Pixel-Perfect Figma Match Node 4145:2753) -->
  <section id="hero" class="relative min-h-screen flex flex-col justify-between pt-20 sm:pt-24 lg:pt-28 pb-4 overflow-hidden">
    
    <!-- Left Theatrical Ornate Curtain Border (Figma Node 4145:2755) -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border (Figma Node 4145:2760) -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Instrument String Light Rays behind Gondrong Gunarto (Figma Node 4145:2758) -->
    <div class="hidden lg:block absolute right-0 top-0 h-full w-[650px] xl:w-[850px] pointer-events-none z-0 opacity-45 mix-blend-screen overflow-hidden">
      <img src="{{ asset('images/pattern/hero_gondrong_glow.svg') }}" class="w-full h-full object-cover object-right" alt="">
    </div>

    <!-- Bottom Soft Gradient Shadow for Seamless Section Transition -->
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <!-- Gondrong Gunarto Portrait (Desktop Full Bleed to Right Edge) -->
    <div class="hidden lg:flex absolute right-0 bottom-0 z-10 pointer-events-none items-end justify-end h-full">
      <img src="{{ asset('images/maskot/gondrong_gunarto.webp') }}"
           alt="Gondrong Gunarto - Solo International Performing Arts 2026 Ambassador"
           class="w-auto max-w-none h-[88vh] object-contain object-right-bottom drop-shadow-[0_25px_60px_rgba(0,0,0,0.95)]">
    </div>

    <!-- Ambassador SIPA 2026 Badge Overlay (Desktop Placement Matching Figma Node 4145:3893) -->
    <div class="hidden lg:block absolute right-12 lg:right-28 bottom-28 z-20 text-left pointer-events-none">
      <span class="text-sm lg:text-[15px] font-normal tracking-wide text-gray-200 font-cabinet block">Ambassador SIPA 2026:</span>
      <h4 class="text-3xl lg:text-[38px] font-sipa-bold font-bold text-white tracking-wide hero-title-glow mt-1">Gondrong Gunarto</h4>
    </div>

    <!-- Main Hero Container -->
    <div class="max-w-[1440px] mx-auto px-4 sm:px-10 lg:px-16 w-full my-auto z-20 grid grid-cols-1 lg:grid-cols-12 gap-4 sm:gap-6 lg:gap-8 items-center">
      
      <!-- Left Column Content Lockup (Shifted left on desktop, perfectly centered internally) -->
      <div class="lg:col-span-6 flex flex-col items-center justify-center space-y-3 sm:space-y-4 text-center py-0 lg:-ml-12 xl:-ml-20">
        
        <!-- 1. Logo Putih Artwork (Top) -->
        <div class="w-full flex justify-center -mt-0 sm:-mt-6 lg:-mt-10">
          <img src="{{ asset('images/logo_putih.png') }}"
               alt="Solo International Performing Arts — Kinetic Kinship : Beyond Boundaries"
               class="w-full max-w-[310px] sm:max-w-[480px] lg:max-w-[560px] xl:max-w-[600px] h-auto object-contain drop-shadow-[0_0_35px_rgba(255,255,255,0.45)]">
        </div>

        <!-- 2. Gondrong Gunarto Mascot Image (Mobile Only) -->
        <div class="block lg:hidden w-full my-1 flex justify-center items-center">
          <img src="{{ asset('images/maskot/gondrong_gunarto.webp') }}"
               alt="Gondrong Gunarto Ambassador"
               class="h-[34vh] sm:h-[44vh] w-auto object-contain mx-auto drop-shadow-[0_15px_45px_rgba(0,0,0,0.95)]">
        </div>

        <!-- Mobile Ambassador Badge (Under Mobile Image) -->
        <div class="block lg:hidden text-center my-1">
          <span class="text-xs font-normal text-gray-300 font-cabinet">Ambassador SIPA 2026:</span>
          <h4 class="text-xl font-sipa-bold font-bold text-white hero-title-glow">Gondrong Gunarto</h4>
        </div>

        <!-- Countdown Timer Component (Counting down to 10 September 2026) -->
        <div id="hero-countdown" class="w-full flex justify-center items-center pt-2 sm:pt-3">
          <div class="inline-flex items-center gap-2 sm:gap-3 bg-black/40 backdrop-blur-md border border-white/15 px-3.5 sm:px-5 py-1.5 sm:py-2 rounded-2xl sm:rounded-full shadow-[0_8px_30px_rgba(0,0,0,0.8)]">
            
            <!-- Days -->
            <div class="flex flex-col items-center min-w-[38px] sm:min-w-[46px]">
              <span id="countdown-days" class="text-lg sm:text-2xl lg:text-[26px] font-bold font-cabinet text-white leading-none hero-title-glow">00</span>
              <span class="text-[9px] sm:text-[10px] uppercase font-semibold tracking-wider text-gray-400 mt-0.5 font-cabinet">Hari</span>
            </div>
            
            <span class="text-gray-500 font-bold text-sm sm:text-base mb-2">:</span>

            <!-- Hours -->
            <div class="flex flex-col items-center min-w-[38px] sm:min-w-[46px]">
              <span id="countdown-hours" class="text-lg sm:text-2xl lg:text-[26px] font-bold font-cabinet text-white leading-none hero-title-glow">00</span>
              <span class="text-[9px] sm:text-[10px] uppercase font-semibold tracking-wider text-gray-400 mt-0.5 font-cabinet">Jam</span>
            </div>

            <span class="text-gray-500 font-bold text-sm sm:text-base mb-2">:</span>

            <!-- Minutes -->
            <div class="flex flex-col items-center min-w-[38px] sm:min-w-[46px]">
              <span id="countdown-minutes" class="text-lg sm:text-2xl lg:text-[26px] font-bold font-cabinet text-white leading-none hero-title-glow">00</span>
              <span class="text-[9px] sm:text-[10px] uppercase font-semibold tracking-wider text-gray-400 mt-0.5 font-cabinet">Menit</span>
            </div>

            <span class="text-gray-500 font-bold text-sm sm:text-base mb-2">:</span>

            <!-- Seconds -->
            <div class="flex flex-col items-center min-w-[38px] sm:min-w-[46px]">
              <span id="countdown-seconds" class="text-lg sm:text-2xl lg:text-[26px] font-bold font-cabinet text-[#e63946] leading-none drop-shadow-[0_0_15px_rgba(230,57,70,0.6)]">00</span>
              <span class="text-[9px] sm:text-[10px] uppercase font-semibold tracking-wider text-gray-400 mt-0.5 font-cabinet">Detik</span>
            </div>

          </div>
        </div>

        <!-- 3. Festival Date (Matching Figma Node 4145:3899 - Centered) -->
        <div class="w-full flex justify-center pt-1 sm:pt-2">
          <h3 class="font-sipa-bold text-2xl sm:text-3xl lg:text-[34px] xl:text-[36px] font-bold text-white tracking-wide hero-title-glow text-center">
            10-12 September 2026
          </h3>
        </div>

        <!-- 4. Description Paragraph (Matching Figma Node 4145:3898 - 2 Lines) -->
        <p class="text-white/95 font-normal text-sm sm:text-[15px] lg:text-base leading-[1.45] sm:leading-[1.4] max-w-[620px] sm:max-w-[680px] lg:max-w-[720px] text-center mx-auto px-2 sm:px-4 tracking-normal">
          Where movement connects us, and differences become a force for creation, together<br class="hidden sm:inline">
          through the universal language of performance.
        </p>

      </div>

      <!-- Right Column Spacer (Desktop Only) -->
      <div class="hidden lg:block lg:col-span-6"></div>

    </div>

    <!-- 5. Sponsor Logos Strip (Bottom) (Matching Figma Node 4145:2896) -->
    <div class="w-full max-w-[1440px] mx-auto px-4 sm:px-10 lg:px-16 z-20 pt-2 pb-4 sm:pb-8 flex justify-center items-center">
      <img src="{{ asset('images/sponsor/sponsor_strip_hero.png') }}"
           alt="SIPA 2026 Official Sponsors & Media Partners"
           class="h-8 sm:h-12 lg:h-16 w-auto max-w-full object-contain opacity-95 hover:opacity-100 transition-opacity">
    </div>
  </section>

  <!-- SECTION: TEASER / FESTIVAL VIDEO SECTION (Pixel-Perfect Figma Match Node 4145:1328) -->
  <section id="teaser-video" class="relative py-16 sm:py-24 lg:py-28 bg-[#0b0c10] z-10 overflow-hidden">
    
    <!-- Ambient Background Stage Lighting & Atmospheric Glow -->
    <div class="absolute inset-0 bg-gradient-to-b from-[#0b0c10] via-[#120a10]/50 to-[#0b0c10] pointer-events-none z-0"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] sm:w-[800px] lg:w-[1000px] h-[300px] sm:h-[450px] bg-[#e63946]/10 rounded-full blur-[140px] pointer-events-none z-0"></div>

    <div class="max-w-[1080px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-10 flex flex-col items-center">
      
      <!-- Section Title Lockup (Matching Figma Node 4145:3907) -->
      <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-center mb-8 sm:mb-12">
        <h2 class="text-2xl sm:text-4xl lg:text-[40px] font-cabinet font-medium text-white tracking-tight leading-tight">
          A Festival That Moves
        </h2>
        <span class="text-3xl sm:text-5xl lg:text-[48px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
          Beyond Boundaries
        </span>
      </div>

      <!-- YouTube Video Embed Frame Box (Matching Figma Node 4145:3908 - Dynamic from Admin Settings) -->
      <div class="w-full relative aspect-video rounded-[16px] sm:rounded-[24px] overflow-hidden border border-white/15 shadow-[0_25px_70px_rgba(0,0,0,0.9)] bg-black group">
        <iframe 
          class="w-full h-full object-cover rounded-[16px] sm:rounded-[24px]"
          src="{{ \App\Models\SiteSetting::get('home_teaser_youtube_url', 'https://www.youtube-nocookie.com/embed/zH0uYvN35sM') }}" 
          title="{{ \App\Models\SiteSetting::get('home_teaser_title', 'Solo International Performing Arts 2026 Official Teaser') }}" 
          frameborder="0" 
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
          referrerpolicy="strict-origin-when-cross-origin" 
          allowfullscreen>
        </iframe>
      </div>

      <!-- Description Paragraph (Matching Figma Node 4145:3912) -->
      <div class="max-w-[840px] mx-auto text-center mt-8 sm:mt-10">
        <p class="font-cabinet text-gray-200/90 text-sm sm:text-lg lg:text-[20px] font-normal leading-[1.6] sm:leading-[1.5] tracking-normal">
          Step into a world where music, movement, and culture meet.<br class="hidden sm:inline">
          Experience the spirit of SIPA through the moments that bring us closer together.
        </p>
      </div>

    </div>
  </section>

  <!-- SECTION: THEME LOCKUP SECTION (100% Pixel-Perfect Figma Match Node 4145:3914) -->
  <section id="theme-showcase" class="relative min-h-screen w-full bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden flex flex-col justify-center items-center py-16 sm:py-20" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border (Figma Node 4145:3925) -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border (Figma Node 4145:3926) -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Full-Width Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <!-- Center Content Lockup -->
    <div class="max-w-[1200px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-20 flex flex-col items-center justify-center space-y-8 sm:space-y-12 my-auto">
      
      <!-- Section Title Lockup (Matching Figma Node 4145:4060) -->
      <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-center">
        <h2 class="text-2xl sm:text-4xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
          A Festival That Moves
        </h2>
        <span class="text-3xl sm:text-5xl lg:text-[44px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
          Beyond Boundaries
        </span>
      </div>

      <!-- Main Glowing Theme Artwork Lockup (Matching Figma Node 4145:4059) -->
      <div class="w-full flex justify-center items-center">
        <img src="{{ asset('images/logo_putih.png') }}"
             alt="Solo International Performing Arts — Kinetic Kinship : Beyond Boundaries"
             class="w-full max-w-[320px] sm:max-w-[520px] lg:max-w-[580px] xl:max-w-[620px] h-auto object-contain drop-shadow-[0_0_40px_rgba(255,255,255,0.7)] transform-gpu hover:scale-[1.02] transition-transform duration-500">
      </div>

    </div>
  </section>

  <!-- SECTION: MEET OUR PERFORMERS (Pixel-Perfect Figma Node 4145:4066 Match) -->
  <section id="lineup" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-0"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-0"></div>

    <div class="max-w-[1360px] mx-auto px-4 sm:px-8 lg:px-12 relative z-10">
      
      <!-- Section Title Lockup (Matching Figma Node 4145:4066) -->
      <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-center mb-12 sm:mb-16 notranslate" translate="no">
        @if ($activeLocale === 'id')
          <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-cabinet font-medium text-white tracking-tight leading-tight notranslate" translate="no">
            Temui Para
          </h2>
          <span class="text-4xl sm:text-5xl lg:text-[50px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight notranslate" translate="no">
            Penampil
          </span>
        @else
          <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-cabinet font-medium text-white tracking-tight leading-tight notranslate" translate="no">
            Meet Our
          </h2>
          <span class="text-4xl sm:text-5xl lg:text-[50px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight notranslate" translate="no">
            Performers
          </span>
        @endif
      </div>

      <!-- 4 Tall Rounded Performer Cards in Carousel Slider (Dynamic from Database) -->
      @php
        $homePerformers = \App\Models\Performer::orderByDesc('is_featured_home')->orderBy('order')->get();
        if ($homePerformers->isEmpty()) {
            $homePerformers = collect();
        }
        $performerChunks = $homePerformers->chunk(4);
        $totalPerformerPages = max(1, $performerChunks->count());
      @endphp

      <div class="relative overflow-hidden max-w-[1280px] mx-auto mb-10 sm:mb-12">
        <div id="performers-slider-track" class="flex transition-transform duration-500 ease-out will-change-transform">
          @forelse($performerChunks as $chunkIndex => $chunk)
          <div class="w-full flex-shrink-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6 items-center">
            @foreach($chunk as $p)
            @php
              $pImg = (!empty($p->image_path) && file_exists(public_path('images/' . $p->image_path))) 
                      ? asset('images/' . $p->image_path) 
                      : asset('images/delegates/Khambatta Dance Company.jpg');
            @endphp
            <!-- Performer Card: {{ $p->name }} -->
            <a href="/lineup" class="block relative rounded-[22px] sm:rounded-[26px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.85)] h-[460px] sm:h-[520px] lg:h-[560px] border border-white/15 group transition-all duration-500 hover:-translate-y-2 hover:border-white/40 hover:shadow-[0_25px_60px_rgba(0,0,0,0.95)] flex flex-col justify-between transform-gpu bg-[#181920]">
              <img src="{{ $pImg }}" 
                   alt="{{ $p->name }}" 
                   class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 z-0"
                   loading="eager" 
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/30 to-transparent z-10"></div>
              
              <span class="relative z-20 self-end m-4 bg-black/60 backdrop-blur-md text-white text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider border border-white/20 font-cabinet">
                {{ $p->country_badge ?: strtoupper(substr($p->country, 0, 4)) }}
              </span>
              
              <div class="relative z-20 p-6 sm:p-7 space-y-1 mt-auto">
                <span class="text-xs text-gray-300 font-cabinet uppercase tracking-widest block font-medium">
                  {{ $p->category ?: 'Performing Arts' }}
                </span>
                <h3 class="text-xl sm:text-2xl font-bold text-white group-hover:text-[#e63946] transition-colors leading-snug font-sipa-bold">
                  {{ $p->name }}
                </h3>
              </div>
            </a>
            @endforeach
          </div>
          @empty
          <div class="w-full py-12 text-center text-gray-400">
            <p class="text-sm font-medium">Belum ada data penampil.</p>
          </div>
          @endforelse
        </div>
      </div>

      <!-- Bottom Carousel Controls & See All Link (Matching Figma Node 4145:4066) -->
      <div class="max-w-[1280px] mx-auto flex items-center justify-between relative pt-2">
        
        <!-- Empty Spacer Left to Balance Center Alignment -->
        <div class="w-28 hidden sm:block"></div>

        <!-- Center Controls: Prev/Next Buttons + Indicator Dots -->
        <div class="flex items-center gap-3.5 mx-auto sm:mx-0">
          <button id="performer-prev-btn" type="button" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/80 hover:text-white hover:border-white/50 hover:bg-white/10 transition-all cursor-pointer shadow-sm active:scale-95" aria-label="Previous Performers">
            <i class="fa-solid fa-chevron-left text-xs"></i>
          </button>
          
          <div class="flex items-center gap-1.5 px-1">
            @for($i = 0; $i < $totalPerformerPages; $i++)
            <button type="button" data-performer-dot="{{ $i }}" class="{{ $i === 0 ? 'w-2 h-2 rounded-full bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)]' : 'w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60' }} transition-all cursor-pointer" aria-label="Performer page {{ $i + 1 }}"></button>
            @endfor
          </div>

          <button id="performer-next-btn" type="button" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/80 hover:text-white hover:border-white/50 hover:bg-white/10 transition-all cursor-pointer shadow-sm active:scale-95" aria-label="Next Performers">
            <i class="fa-solid fa-chevron-right text-xs"></i>
          </button>
        </div>

        <!-- Right Side: See All Performers Link -->
        <a href="/lineup" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-medium font-cabinet text-gray-200 hover:text-white hover:underline transition-all group">
          <span>See All Performers</span>
          <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-0.5 transition-transform"></i>
        </a>

      </div>

    </div>
  </section>

  <!-- SECTION: MEET OUR AMBASSADOR (100% Figma Node 4145:4647 Pixel-Perfect Match) -->
  <section id="ambassador" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border (Figma Node 4152:13936) -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/ambassador_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border (Figma Node 4152:13937) -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/ambassador_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1280px] mx-auto px-4 sm:px-8 lg:px-12 text-center relative z-20 flex flex-col items-center">
      
      <!-- Section Header Lockup (Matching Figma Node 4145:4777) -->
      <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-center mb-10 sm:mb-14">
        <h2 class="text-3xl sm:text-4xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
          SIPA 2026
        </h2>
        <span class="text-4xl sm:text-5xl lg:text-[42px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
          Ambassador
        </span>
      </div>

      <!-- 3-Photo Showcase Layout (Matching Figma Nodes 4146:4781, 4146:4782, 4146:4783) -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 items-center justify-center max-w-[1040px] mx-auto mb-10 sm:mb-12">
        
        <!-- Left Photo Card: Vespa & Kecapi (Fix 1 2) -->
        <div class="relative rounded-[20px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.85)] h-[360px] sm:h-[400px] lg:h-[420px] border border-white/15 group transition-all duration-500 hover:-translate-y-2 hover:border-white/40 hover:shadow-[0_25px_60px_rgba(0,0,0,0.95)] transform-gpu">
          <img src="{{ asset('images/ambassador/card1_figma.webp') }}" 
               alt="Gondrong Gunarto with Vespa and Kecapi" 
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 pointer-events-none"
               loading="eager"
               decoding="async">
        </div>

        <!-- Center Photo Card (Taller Spotlight Drum Performance - Fix 3 2) -->
        <div class="relative rounded-[20px] overflow-hidden shadow-[0_25px_60px_rgba(0,0,0,0.95)] h-[410px] sm:h-[460px] lg:h-[480px] border border-white/25 group transition-all duration-500 hover:-translate-y-2 hover:border-white/50 hover:shadow-[0_30px_70px_rgba(0,0,0,1)] transform-gpu">
          <img src="{{ asset('images/ambassador/card2_figma.webp') }}" 
               alt="Gondrong Gunarto Spotlight Djembe" 
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 pointer-events-none"
               loading="eager"
               decoding="async">
        </div>

        <!-- Right Photo Card: Vespa & Drum (Fix 2 2) -->
        <div class="relative rounded-[20px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.85)] h-[360px] sm:h-[400px] lg:h-[420px] border border-white/15 group transition-all duration-500 hover:-translate-y-2 hover:border-white/40 hover:shadow-[0_25px_60px_rgba(0,0,0,0.95)] transform-gpu">
          <img src="{{ asset('images/ambassador/card3_figma.webp') }}" 
               alt="Gondrong Gunarto Vespa Performance" 
               class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 pointer-events-none"
               loading="eager"
               decoding="async">
        </div>

      </div>

      <!-- Description Paragraph (Matching Figma Node 4145:4780) -->
      <div class="max-w-[1040px] mx-auto text-center px-4">
        <p class="font-cabinet text-gray-200/90 text-sm sm:text-base lg:text-[16px] font-normal leading-[1.6] tracking-normal">
          Rooted in the rich heritage of Javanese gamelan while boldly exploring cultural boundaries, his distinctive artistic instinct continues to create powerful and inspiring works for today’s generation. As SIPA’s ambassador, his role extends beyond representing the festival. His presence embodies SIPA’s spirit of inclusive collaboration, artistic courage, and boundless creativity.
        </p>
      </div>

    </div>
  </section>

  <!-- SECTION: SIPA STORY & AMBASSADOR HISTORY (Pixel-Perfect Figma Node 4151:8481 Match) -->
  <section id="history-story" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1280px] mx-auto px-4 sm:px-8 lg:px-12 relative z-20">
      
      <!-- Section Header Lockup (Matching Figma Node 4151:8485) -->
      <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-center mb-10 sm:mb-14">
        <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
          Solo International Performing Arts
        </h2>
        <span class="text-3xl sm:text-4xl lg:text-[42px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
          Story
        </span>
      </div>

      <!-- Maskot Carousel Viewport Slider Wrapper -->
      <div class="overflow-hidden w-full max-w-[1060px] mx-auto mb-8 sm:mb-10">
        <div id="story-slider-track" class="flex transition-transform duration-500 ease-in-out w-full">
          
          <!-- SLIDE 1 (Dot 1): 2025, 2024, 2023 -->
          <div class="w-full shrink-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6 items-center px-1">
            
            <!-- Card: 2025 -->
            <a href="/gallery/2025" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/15 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2025.webp') }}" 
                   alt="SIPA Ambassador Maskot 2025" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2025</h3>
              </div>
            </a>

            <!-- Card: 2024 -->
            <a href="/gallery/2024" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/20 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2024.webp') }}" 
                   alt="SIPA Ambassador Maskot 2024" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2024</h3>
              </div>
            </a>

            <!-- Card: 2023 -->
            <a href="/gallery/2023" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/15 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2023.webp') }}" 
                   alt="SIPA Ambassador Maskot 2023" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2023</h3>
              </div>
            </a>

          </div>

          <!-- SLIDE 2 (Dot 2): 2022, 2021, 2020 -->
          <div class="w-full shrink-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6 items-center px-1">
            
            <!-- Card: 2022 -->
            <a href="/gallery/2022" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/15 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2022.webp') }}" 
                   alt="SIPA Ambassador Maskot 2022" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2022</h3>
              </div>
            </a>

            <!-- Card: 2021 -->
            <a href="/gallery/2021" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/15 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2021.webp') }}" 
                   alt="SIPA Ambassador Maskot 2021" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2021</h3>
              </div>
            </a>

            <!-- Card: 2020 -->
            <a href="/gallery/2020" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/15 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2020.webp') }}" 
                   alt="SIPA Ambassador Maskot 2020" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2020</h3>
              </div>
            </a>

          </div>

          <!-- SLIDE 3 (Dot 3): 2019, 2018, 2017 -->
          <div class="w-full shrink-0 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6 items-center px-1">
            
            <!-- Card: 2019 -->
            <a href="/gallery/2019" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/15 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2019.webp') }}" 
                   alt="SIPA Ambassador Maskot 2019" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2019</h3>
              </div>
            </a>

            <!-- Card: 2018 -->
            <a href="/gallery/2018" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/15 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2018.webp') }}" 
                   alt="SIPA Ambassador Maskot 2018" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2018</h3>
              </div>
            </a>

            <!-- Card: 2017 -->
            <a href="/gallery/2017" class="group relative rounded-[20px] overflow-hidden h-[240px] sm:h-[260px] border border-white/15 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl hover:border-white/40 block transform-gpu bg-[#0a0a0a]">
              <img src="{{ asset('images/maskot/2017.webp') }}" 
                   alt="SIPA Ambassador Maskot 2017" 
                   class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 pointer-events-none"
                   loading="eager"
                   decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/35 to-transparent z-10"></div>
              <div class="absolute bottom-5 left-5 z-20 space-y-0.5">
                <span class="text-xs uppercase tracking-widest text-gray-300 font-cabinet font-medium block">SIPA Festival</span>
                <h3 class="font-cabinet font-bold text-2xl sm:text-[26px] text-white leading-tight group-hover:text-[#e63946] transition-colors">2017</h3>
              </div>
            </a>

          </div>

        </div>
      </div>

      <!-- Bottom Row with Pagination Controls & Discover History Link (Matching Figma Node 4151:8582) -->
      <div class="max-w-[1060px] mx-auto flex items-center justify-between pt-2">
        
        <!-- Left / Center Carousel Controls -->
        <div class="flex items-center gap-3">
          <button id="story-prev-btn" type="button" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/80 hover:text-white hover:border-white/50 hover:bg-white/10 active:scale-95 transition-all cursor-pointer shadow-sm" aria-label="Previous Story">
            <i class="fa-solid fa-chevron-left text-xs"></i>
          </button>
          
          <div class="flex items-center gap-2 px-1">
            <button type="button" data-story-dot="0" class="w-2 h-2 rounded-full bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all cursor-pointer" aria-label="Story slide 1"></button>
            <button type="button" data-story-dot="1" class="w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60 transition-all cursor-pointer" aria-label="Story slide 2"></button>
            <button type="button" data-story-dot="2" class="w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60 transition-all cursor-pointer" aria-label="Story slide 3"></button>
          </div>

          <button id="story-next-btn" type="button" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/80 hover:text-white hover:border-white/50 hover:bg-white/10 active:scale-95 transition-all cursor-pointer shadow-sm" aria-label="Next Story">
            <i class="fa-solid fa-chevron-right text-xs"></i>
          </button>
        </div>

        <!-- Right Side: Discover Full History Link -->
        <a href="/aboutus/history" class="inline-flex items-center gap-1.5 text-base sm:text-[19px] font-cabinet font-medium text-white underline hover:text-gray-200 transition-all group">
          <span>Discover Our Full History</span>
          <i class="fa-solid fa-chevron-right text-xs group-hover:translate-x-0.5 transition-transform"></i>
        </a>

      </div>

    </div>
  </section>

  <!-- SECTION: FESTIVAL HIGHLIGHTS FULL-BLEED GRID SECTION -->
  <section id="festival-showcase" class="relative w-full bg-[#0b0c10] z-10 overflow-hidden">
    
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

  <!-- SECTION 5: LATEST NEWS & ARTICLES (Pixel-Perfect Figma Node 4152:13848 Match) -->
  <section id="news" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1280px] mx-auto px-4 sm:px-8 lg:px-12 relative z-20">
      
      <!-- Section Header Lockup (Matching Figma Node 4152:13853) -->
      <div class="flex flex-wrap items-center justify-start gap-x-3 gap-y-1 mb-8 sm:mb-12">
        <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
          Solo International Performing Arts
        </h2>
        <span class="text-3xl sm:text-4xl lg:text-[42px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
          News
        </span>
      </div>

      <!-- Articles Asymmetric Grid Layout Slider Track -->
      @if(isset($news) && count($news) > 0)
        @php
          $newsChunks = $news->chunk(3);
          $totalNewsPages = max(1, $newsChunks->count());
        @endphp
        <div class="overflow-hidden w-full max-w-[1280px] mx-auto mb-8 sm:mb-10">
          <div id="news-slider-track" class="flex transition-transform duration-500 ease-in-out w-full will-change-transform">
            @foreach($newsChunks as $chunkIndex => $chunk)
              @php
                $firstNews = $chunk->first();
                $otherNews = $chunk->skip(1);
              @endphp
              <div class="w-full shrink-0 px-1">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 lg:gap-6 items-stretch">
                  
                  <!-- Left Column: Featured Big Article Card (Item 1) -->
                  <div class="{{ $otherNews->count() > 0 ? 'lg:col-span-6' : 'lg:col-span-12 max-w-2xl mx-auto w-full' }}">
                    @php
                      $firstImg = (!empty($firstNews->image_path) && file_exists(public_path('images/news/'.$firstNews->image_path))) 
                                  ? asset('images/news/'.$firstNews->image_path) 
                                  : asset('images/news/art1.png');
                    @endphp
                    <a href="{{ route('news.HomeView', $firstNews->slug) }}" class="group bg-[#fafafa] rounded-[20px] p-3.5 sm:p-4 border border-[#d4d4d4] flex flex-col justify-between h-full shadow-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
                      <div class="w-full h-[210px] sm:h-[240px] rounded-[16px] overflow-hidden mb-3.5 shrink-0 bg-gray-100">
                        <img src="{{ $firstImg }}" alt="{{ $firstNews->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="eager" decoding="async">
                      </div>
                      <div class="flex-1 flex flex-col justify-between px-1">
                        <div>
                          <h3 class="text-[#171717] font-cabinet font-medium text-lg sm:text-[20px] leading-snug tracking-tight mb-1.5 group-hover:text-[#406422] transition-colors line-clamp-2">{{ $firstNews->title }}</h3>
                          <p class="text-[#525252] font-cabinet text-xs sm:text-[14px] font-normal mb-2 block">{{ \Carbon\Carbon::parse($firstNews->sent_at ?? $firstNews->created_at ?? now())->format('j F Y') }}</p>
                          <p class="text-[#171717]/90 font-cabinet text-xs sm:text-[14px] font-normal leading-relaxed line-clamp-3 mb-4">{!! strip_tags($firstNews->description) !!}</p>
                        </div>
                        <div class="text-right mt-auto">
                          <span class="text-[#406422] font-cabinet font-semibold group-hover:text-[#2d4718] text-xs sm:text-[14px] underline inline-flex items-center gap-1 transition-colors">
                            <span>Baca Selengkapnya</span>
                            <i class="fa-solid fa-arrow-right text-[11px] group-hover:translate-x-1 transition-transform"></i>
                          </span>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- Right Column: 2 Stacked Horizontal Cards (Items 2 & 3) -->
                  @if($otherNews->count() > 0)
                  <div class="lg:col-span-6 flex flex-col gap-5 justify-between">
                    @foreach($otherNews as $item)
                    @php
                      $itemImg = (!empty($item->image_path) && file_exists(public_path('images/news/'.$item->image_path))) 
                                 ? asset('images/news/'.$item->image_path) 
                                 : asset('images/news/art2.png');
                    @endphp
                    <a href="{{ route('news.HomeView', $item->slug) }}" class="group bg-[#fafafa] rounded-[20px] p-3.5 sm:p-4 border border-[#d4d4d4] flex flex-col sm:flex-row items-stretch gap-4 shadow-xl flex-1 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
                      <div class="w-full sm:w-[160px] lg:w-[175px] h-[150px] sm:h-auto rounded-[16px] overflow-hidden shrink-0 bg-gray-100">
                        <img src="{{ $itemImg }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="eager" decoding="async">
                      </div>
                      <div class="flex-1 flex flex-col justify-between py-1 px-1">
                        <div>
                          <h4 class="text-[#171717] font-cabinet font-medium text-base sm:text-[18px] lg:text-[20px] leading-snug tracking-tight mb-1 line-clamp-2 group-hover:text-[#406422] transition-colors">{{ $item->title }}</h4>
                          <p class="text-[#525252] font-cabinet text-xs sm:text-[14px] font-normal mb-1.5 block">{{ \Carbon\Carbon::parse($item->sent_at ?? $item->created_at ?? now())->format('j F Y') }}</p>
                          <p class="text-[#171717]/90 font-cabinet text-xs sm:text-[14px] font-normal leading-relaxed line-clamp-2 mb-3">{!! strip_tags($item->description) !!}</p>
                        </div>
                        <div class="text-right mt-auto">
                          <span class="text-[#406422] font-cabinet font-semibold group-hover:text-[#2d4718] text-xs sm:text-[14px] underline inline-flex items-center gap-1 transition-colors">
                            <span>Baca Selengkapnya</span>
                            <i class="fa-solid fa-arrow-right text-[11px] group-hover:translate-x-1 transition-transform"></i>
                          </span>
                        </div>
                      </div>
                    </a>
                    @endforeach
                  </div>
                  @endif

                </div>
              </div>
            @endforeach
          </div>
        </div>

        <!-- Bottom Row with Pagination Controls & Discover More Link (Matching Figma Node 4152:13929) -->
        <div class="flex items-center justify-between pt-2">
          
          <!-- Left / Center Carousel Controls -->
          <div class="flex items-center gap-3">
            <button id="news-prev-btn" type="button" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/80 hover:text-white hover:border-white/50 hover:bg-white/10 active:scale-95 transition-all cursor-pointer shadow-sm" aria-label="Previous News">
              <i class="fa-solid fa-chevron-left text-xs"></i>
            </button>
            
            <div class="flex items-center gap-2 px-1">
              @for($i = 0; $i < $totalNewsPages; $i++)
                <button type="button" data-news-dot="{{ $i }}" class="{{ $i === 0 ? 'w-2 h-2 rounded-full bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)]' : 'w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60' }} transition-all cursor-pointer" aria-label="News page {{ $i + 1 }}"></button>
              @endfor
            </div>

            <button id="news-next-btn" type="button" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/80 hover:text-white hover:border-white/50 hover:bg-white/10 active:scale-95 transition-all cursor-pointer shadow-sm" aria-label="Next News">
              <i class="fa-solid fa-chevron-right text-xs"></i>
            </button>
          </div>

          <!-- Right Side: Discover More Link -->
          <a href="{{ route('news.showAllNews') }}" class="inline-flex items-center gap-1.5 text-base sm:text-[19px] font-cabinet font-medium text-white underline hover:text-gray-200 transition-all group">
            <span>Discover More</span>
            <i class="fa-solid fa-chevron-right text-xs group-hover:translate-x-0.5 transition-transform"></i>
          </a>

        </div>
      @else
        <!-- Empty State Fallback -->
        <div class="bg-[#fafafa] rounded-[20px] p-8 border border-[#d4d4d4] text-center shadow-xl mb-8 sm:mb-10 text-gray-500 font-cabinet">
          <i class="fa-solid fa-newspaper text-3xl mb-3 text-gray-400"></i>
          <p class="text-base font-medium">Belum ada berita yang dipublikasikan saat ini.</p>
        </div>
      @endif

    </div>
  </section>



  <!-- SECTION: BEYOND THE STAGE / INSTAGRAM SHOWCASE (100% Figma Node 4146:7261 Match) -->
  <section id="instagram-showcase" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1280px] mx-auto px-4 sm:px-8 lg:px-12 relative z-20">
      
      <!-- Section Header Lockup (Matching Figma Node 4146:7261) -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 sm:mb-12 gap-4">
        <div class="flex flex-wrap items-center justify-start gap-x-3 gap-y-1">
          <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
            Beyond the Stages, There’s a
          </h2>
          <span class="text-3xl sm:text-4xl lg:text-[42px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
            Story
          </span>
        </div>
        <p class="font-cabinet text-gray-300/90 text-sm sm:text-base font-normal leading-relaxed max-w-md">
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

      <!-- Right Bottom Link: Explore Instagram (Matching Figma Node 4146:7261) -->
      <div class="flex justify-end max-w-[1200px] mx-auto pt-2">
        <a href="https://www.instagram.com/sipafestival/" target="_blank" class="inline-flex items-center gap-1.5 text-base sm:text-[19px] font-cabinet font-medium text-white underline hover:text-gray-200 transition-all group">
          <span>Explore Instagram</span>
          <i class="fa-solid fa-chevron-right text-xs group-hover:translate-x-0.5 transition-transform"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- SECTION: TESTIMONIALS (What Our Audience Says - Pixel-Perfect Figma Node 4146:7546 Match) -->
  <section id="testimonials" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1280px] mx-auto px-4 sm:px-8 lg:px-12 relative z-20">
      
      <!-- Section Header Lockup (Matching Figma Node 4146:7550 & 4147:7880) -->
      <div class="flex flex-col items-center text-center max-w-[1040px] mx-auto mb-10 sm:mb-14">
        <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 mb-3">
          <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
            What Our
          </h2>
          <span class="text-3xl sm:text-4xl lg:text-[42px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
            Audience
          </span>
          <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
            Says
          </h2>
        </div>
        <p class="font-cabinet text-gray-300/90 text-sm sm:text-base font-normal leading-relaxed max-w-2xl">
          Explore heartfelt testimonials from attendees who experienced mesmerizing performances and vibrant cultural celebrations.
        </p>
      </div>

      <!-- Testimonials Carousel Viewport Slider Wrapper -->
      <div class="overflow-hidden w-full max-w-[1060px] mx-auto mb-8 sm:mb-10">
        <div id="testimonials-slider-track" class="flex transition-transform duration-500 ease-in-out w-full will-change-transform">
          
          <!-- SLIDE 1 (Dot 1): Angela, Puan, Mangkoenagoro X -->
          <div class="w-full shrink-0 grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6 items-stretch px-1">
            <!-- Testimonial Card 1 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    This is a form of event that I find very enjoyable. There is a cultural exchange within it. For that, we will continue to support the implementation of SIPA in the years to come.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">Angela Tanoesoedibjo (Indonesia)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">Wamenparekraf</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial Card 2 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    SIPA 2023 has successfully taken place over three nights, branding Solo City as a vibrant international cultural hub of performing arts festivals.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">Puan Maharani (Indonesia)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">Ketua DPR RI</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial Card 3 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    SIPA is an art performance event that has been running for years. And SIPA is one of the pride events in the city we love.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">K.G.P.A.A. Mangkoenagoro X (Indonesia)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">Pura Mangkunegaran</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- SLIDE 2 (Dot 2): Sandiaga Uno, Kim Kwan-soo, Gibran Rakabuming -->
          <div class="w-full shrink-0 grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6 items-stretch px-1">
            <!-- Testimonial Card 4 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    SIPA Festival consistently presents the world's best cultural expressions and boosts regional creative economy while elevating Solo onto the global stage.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">Sandiaga S. Uno (Indonesia)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">Menparekraf RI</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial Card 5 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    Even through challenging times, SIPA has consistently remained active and served as a world-class benchmark for international performing arts.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">Kim Kwan-soo (South Korea)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">SIPA Director Korea</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial Card 6 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    SIPA has become the cultural heart and soul of Solo City, creating unforgettable bridges between local heritage and global contemporary arts.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">Gibran Rakabuming (Indonesia)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">Wapres RI / Tokoh Surakarta</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- SLIDE 3 (Dot 3): Eko Supriyanto, Dr. Irawati, Dr. Osuji Chinyere -->
          <div class="w-full shrink-0 grid grid-cols-1 md:grid-cols-3 gap-5 lg:gap-6 items-stretch px-1">
            <!-- Testimonial Card 7 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    SIPA offers an exceptional platform for creators from across continents to exchange artistic energies and collaborate without boundaries.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">Eko Supriyanto (Indonesia)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">Choreographer & Maestro</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial Card 8 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    Through Kinetic Kinship, we continue our lifelong mission of celebrating unity through art, embracing diversity and nurturing the next generation of performers.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">Dr. R.Ay. Irawati (Indonesia)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">Festival Director SIPA</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial Card 9 -->
            <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-3 shadow-xl transition-all duration-300 hover:-translate-y-1.5 hover:shadow-2xl flex flex-col">
              <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-5 sm:p-6 flex flex-col justify-between flex-1">
                <div class="space-y-3 mb-6">
                  <img src="{{ asset('images/pattern/testimonial_quote.svg') }}" class="w-4 h-4" alt="quote">
                  <p class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] leading-snug">
                    Performing at SIPA was a truly magical experience. The passion of the audience and the hospitality of Solo City will forever stay in our hearts.
                  </p>
                </div>
                <div class="space-y-1 pt-2">
                  <h4 class="font-cabinet font-bold text-[#171717] text-sm sm:text-[16px] leading-tight">Dr. Osuji Chinyere (Nigeria)</h4>
                  <p class="font-cabinet font-normal text-[#737373] text-xs sm:text-[13px]">International Performing Artist</p>
                  <div class="flex items-center gap-1 pt-1 text-[#f19500] text-xs">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Bottom Row with Pagination Controls (Matching Figma Node 4146:7558) -->
      <div class="max-w-[1060px] mx-auto flex items-center justify-center pt-2">
        <div class="flex items-center gap-3">
          <button id="testimonials-prev-btn" type="button" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/80 hover:text-white hover:border-white/50 hover:bg-white/10 active:scale-95 transition-all cursor-pointer shadow-sm" aria-label="Previous Testimonials">
            <i class="fa-solid fa-chevron-left text-xs"></i>
          </button>
          
          <div class="flex items-center gap-2 px-1">
            <button type="button" data-testimonials-dot="0" class="w-2 h-2 rounded-full bg-white shadow-[0_0_8px_rgba(255,255,255,0.8)] transition-all cursor-pointer" aria-label="Testimonials slide 1"></button>
            <button type="button" data-testimonials-dot="1" class="w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60 transition-all cursor-pointer" aria-label="Testimonials slide 2"></button>
            <button type="button" data-testimonials-dot="2" class="w-1.5 h-1.5 rounded-full bg-white/35 hover:bg-white/60 transition-all cursor-pointer" aria-label="Testimonials slide 3"></button>
          </div>

          <button id="testimonials-next-btn" type="button" class="w-8 h-8 rounded-lg border border-white/20 flex items-center justify-center text-white/80 hover:text-white hover:border-white/50 hover:bg-white/10 active:scale-95 transition-all cursor-pointer shadow-sm" aria-label="Next Testimonials">
            <i class="fa-solid fa-chevron-right text-xs"></i>
          </button>
        </div>
      </div>

    </div>
  </section>



  <!-- SECTION: QUESTION & ANSWER / FAQ (Pixel-Perfect Figma Node 4148:8017 Match) -->
  <section id="faq" class="relative py-20 sm:py-24 lg:py-28 bg-[#0b0c10] bg-cover bg-center z-10 overflow-hidden" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] left-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border -->
    <div class="absolute -top-[12%] sm:-top-[16%] -bottom-[2%] right-0 w-[160px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows for Seamless Transition -->
    <div class="absolute inset-x-0 top-0 h-28 bg-gradient-to-b from-[#0b0c10] to-transparent pointer-events-none z-10"></div>
    <div class="absolute inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1280px] mx-auto px-4 sm:px-8 lg:px-12 relative z-20">
      
      <!-- Section Header Lockup (Matching Figma Node 4148:8025) -->
      <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-center mb-10 sm:mb-14">
        <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
          Question &
        </h2>
        <span class="text-3xl sm:text-4xl lg:text-[42px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
          Answer
        </span>
      </div>

      <!-- FAQ Content Grid: 5 Accordions Left + Customer Service Box Right -->
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 lg:gap-6 max-w-[1060px] mx-auto items-stretch">
        
        <!-- Left Column: 5 Interactive Accordion Items (lg:col-span-8) -->
        <div class="lg:col-span-8 flex flex-col gap-3 sm:gap-3.5">
          
          <!-- Accordion Item 1 -->
          <div class="faq-item bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-2.5 sm:p-3 shadow-lg transition-all">
            <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-3.5 sm:p-4">
              <button type="button" class="faq-toggle w-full flex items-center justify-between gap-3 text-left cursor-pointer">
                <span class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] lg:text-[20px] leading-snug">
                  Kapan dan di mana SIPA Festival 2026 diselenggarakan?
                </span>
                <i class="faq-icon fa-solid fa-chevron-down text-sm text-[#171717] transition-transform duration-300 shrink-0"></i>
              </button>
              <div class="faq-answer hidden pt-3 mt-3 border-t border-[#d4d4d4]/60">
                <p class="font-cabinet font-normal text-[#171717]/90 text-xs sm:text-[15px] leading-relaxed">
                  SIPA 2026 diselenggarakan pada tanggal 10, 11, dan 12 September 2026 di Pamedan Pura Mangkunegaran, Solo, Jawa Tengah mulai pukul 19.00 WIB.
                </p>
              </div>
            </div>
          </div>

          <!-- Accordion Item 2 -->
          <div class="faq-item bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-2.5 sm:p-3 shadow-lg transition-all">
            <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-3.5 sm:p-4">
              <button type="button" class="faq-toggle w-full flex items-center justify-between gap-3 text-left cursor-pointer">
                <span class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] lg:text-[20px] leading-snug">
                  Apakah tiket masuk ke pertunjukan SIPA Festival gratis?
                </span>
                <i class="faq-icon fa-solid fa-chevron-down text-sm text-[#171717] transition-transform duration-300 shrink-0"></i>
              </button>
              <div class="faq-answer hidden pt-3 mt-3 border-t border-[#d4d4d4]/60">
                <p class="font-cabinet font-normal text-[#171717]/90 text-xs sm:text-[15px] leading-relaxed">
                  Ya! Masuk ke panggung pertunjukan SIPA Festival tidak dipungut biaya tiket (Gratis). Seluruh masyarakat dan wisatawan dapat hadir dan menikmati seni pertunjukan internasional ini.
                </p>
              </div>
            </div>
          </div>

          <!-- Accordion Item 3 -->
          <div class="faq-item bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-2.5 sm:p-3 shadow-lg transition-all">
            <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-3.5 sm:p-4">
              <button type="button" class="faq-toggle w-full flex items-center justify-between gap-3 text-left cursor-pointer">
                <span class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] lg:text-[20px] leading-snug">
                  Siapa saja delegasi seni yang tampil di SIPA 2026?
                </span>
                <i class="faq-icon fa-solid fa-chevron-down text-sm text-[#171717] transition-transform duration-300 shrink-0"></i>
              </button>
              <div class="faq-answer hidden pt-3 mt-3 border-t border-[#d4d4d4]/60">
                <p class="font-cabinet font-normal text-[#171717]/90 text-xs sm:text-[15px] leading-relaxed">
                  SIPA 2026 menghadirkan delegasi seni tari, musik, teater dari nusantara dan mancanegara termasuk Malaysia, Taiwan, Jepang, Korea Selatan, Australia, serta seniman-seniman terbaik Indonesia.
                </p>
              </div>
            </div>
          </div>

          <!-- Accordion Item 4 -->
          <div class="faq-item bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-2.5 sm:p-3 shadow-lg transition-all">
            <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-3.5 sm:p-4">
              <button type="button" class="faq-toggle w-full flex items-center justify-between gap-3 text-left cursor-pointer">
                <span class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] lg:text-[20px] leading-snug">
                  Bagaimana cara mendaftar sebagai Volunteer atau Mitra SIPA?
                </span>
                <i class="faq-icon fa-solid fa-chevron-down text-sm text-[#171717] transition-transform duration-300 shrink-0"></i>
              </button>
              <div class="faq-answer hidden pt-3 mt-3 border-t border-[#d4d4d4]/60">
                <p class="font-cabinet font-normal text-[#171717]/90 text-xs sm:text-[15px] leading-relaxed">
                  Pendaftaran relawan (SIPAfam) dan kolaborasi partnership dibuka secara berkala. Ikuti perkembangan terbarunya di website ini atau melalui Instagram resmi kami @sipafestival.
                </p>
              </div>
            </div>
          </div>

          <!-- Accordion Item 5 -->
          <div class="faq-item bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-2.5 sm:p-3 shadow-lg transition-all">
            <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-3.5 sm:p-4">
              <button type="button" class="faq-toggle w-full flex items-center justify-between gap-3 text-left cursor-pointer">
                <span class="font-cabinet font-medium text-[#171717] text-base sm:text-[18px] lg:text-[20px] leading-snug">
                  Apakah tersedia area UMKM dan merchandise resmi di venue?
                </span>
                <i class="faq-icon fa-solid fa-chevron-down text-sm text-[#171717] transition-transform duration-300 shrink-0"></i>
              </button>
              <div class="faq-answer hidden pt-3 mt-3 border-t border-[#d4d4d4]/60">
                <p class="font-cabinet font-normal text-[#171717]/90 text-xs sm:text-[15px] leading-relaxed">
                  Tentu saja! Di area venue tersedia stan merchandise resmi SIPA 2026 serta SIPA Night Market yang memamerkan aneka kuliner khas dan produk kreatif lokal.
                </p>
              </div>
            </div>
          </div>

        </div>

        <!-- Right Column: Customer Service Card Box (lg:col-span-4) -->
        <div class="lg:col-span-4 flex flex-col">
          <div class="bg-[#fafafa] border border-[#d4d4d4] rounded-[20px] p-2.5 sm:p-3 shadow-xl h-full flex flex-col">
            <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[16px] p-6 sm:p-8 flex flex-col items-center justify-between text-center h-full min-h-[380px]">
              
              <!-- Headset Icon & Text Content -->
              <div class="flex flex-col items-center">
                <img src="{{ asset('images/pattern/customer_service_headset.svg') }}" class="w-16 h-16 sm:w-20 sm:h-20 mb-5" alt="Customer Service">
                <h3 class="font-cabinet font-medium text-[#171717] text-lg sm:text-[20px] lg:text-[22px] leading-snug mb-2">
                  Pertanyaan Belum Terjawab?
                </h3>
                <p class="font-cabinet font-normal text-[#171717]/80 text-xs sm:text-[15px] leading-relaxed max-w-[240px]">
                  Masih ada yang ingin ditanyakan? Kami dengan senang hati membantu.
                </p>
              </div>

              <!-- Customer Service Button (Trigger Pop-up Modal) -->
              <div class="w-full pt-6">
                <button type="button" onclick="openAskModal()" class="w-full bg-[#406422] hover:bg-[#2d4718] text-white font-cabinet font-medium py-3 px-5 rounded-xl shadow-lg transition-all duration-300 text-center text-sm sm:text-base flex items-center justify-center gap-2 group cursor-pointer">
                  <span>Customer Service</span>
                  <i class="fa-solid fa-headset text-sm group-hover:scale-110 transition-transform"></i>
                </button>
              </div>

            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- POP-UP MODAL: Tanya / Customer Service (Matching SIPA FAQ Card Theme) -->
  <div id="askModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-md opacity-0 pointer-events-none transition-all duration-300">
    <div id="askModalContainer" class="relative w-full max-w-lg bg-[#fafafa] border border-[#d4d4d4] rounded-[24px] p-2.5 sm:p-3.5 shadow-[0_25px_60px_rgba(0,0,0,0.7)] transform scale-95 transition-all duration-300 text-left font-cabinet overflow-hidden">
      
      <!-- Inner Dashed Border Container (Matching FAQ Card) -->
      <div class="bg-[#fafafa] border-2 border-dashed border-[#f19500] rounded-[18px] p-6 sm:p-7 flex flex-col">
        
        <!-- Modal Header -->
        <div class="flex items-start justify-between pb-4 border-b border-gray-200/80 relative">
          <div class="flex items-start gap-3">
            <div class="w-11 h-11 rounded-xl bg-[#406422]/10 border border-[#406422]/20 flex items-center justify-center text-[#406422] shrink-0 mt-0.5">
              <i class="fa-solid fa-headset text-lg"></i>
            </div>
            <div>
              <h3 class="text-xl sm:text-2xl font-cabinet font-medium text-[#171717] tracking-tight leading-snug">
                Customer Service SIPA
              </h3>
              <p class="text-xs sm:text-sm font-cabinet font-normal text-[#171717]/80 mt-1">
                Punya pertanyaan seputar tiket, jadwal, delegasi, atau venue? Tuliskan pertanyaan Anda di bawah ini:
              </p>
            </div>
          </div>
          <button type="button" onclick="closeAskModal()" class="w-8 h-8 rounded-full bg-black/5 hover:bg-black/10 text-gray-500 hover:text-black flex items-center justify-center transition-all cursor-pointer shrink-0 ml-2">
            <i class="fa-solid fa-xmark text-base"></i>
          </button>
        </div>

        <!-- Success Alert (Hidden by default) -->
        <div id="askSuccessAlert" class="hidden mt-4 p-4 rounded-xl bg-emerald-50 border border-emerald-300 text-emerald-800 text-sm flex items-center gap-3 shadow-sm">
          <i class="fa-solid fa-circle-check text-xl text-emerald-600 shrink-0"></i>
          <div id="askSuccessMessage" class="font-cabinet font-medium">Pertanyaan Anda berhasil dikirim! Tim SIPA akan segera merespons melalui email.</div>
        </div>

        <!-- Error Alert (Hidden by default) -->
        <div id="askErrorAlert" class="hidden mt-4 p-4 rounded-xl bg-rose-50 border border-rose-300 text-rose-800 text-sm flex items-center gap-3 shadow-sm">
          <i class="fa-solid fa-circle-exclamation text-xl text-rose-600 shrink-0"></i>
          <div id="askErrorMessage" class="font-cabinet font-medium">Terjadi kesalahan. Silakan periksa data Anda.</div>
        </div>

        <!-- Modal Form -->
        <form id="askForm" onsubmit="submitAskForm(event)" class="mt-5 space-y-4">
          @csrf
          
          <div>
            <label for="modal_name" class="block font-cabinet font-medium text-xs text-[#171717] uppercase tracking-wider mb-1.5">
              Nama Lengkap <span class="text-red-500">*</span>
            </label>
            <input type="text" id="modal_name" name="name" required placeholder="Contoh: Budi Santoso"
                   class="w-full px-4 py-2.5 sm:py-3 rounded-xl bg-white border border-[#d4d4d4] text-[#171717] text-sm focus:outline-none focus:border-[#406422] focus:ring-2 focus:ring-[#406422]/20 transition-all placeholder-gray-400 font-cabinet font-normal shadow-sm">
          </div>

          <div>
            <label for="modal_email" class="block font-cabinet font-medium text-xs text-[#171717] uppercase tracking-wider mb-1.5">
              Alamat Email <span class="text-red-500">*</span>
            </label>
            <input type="email" id="modal_email" name="email" required placeholder="emailanda@example.com"
                   class="w-full px-4 py-2.5 sm:py-3 rounded-xl bg-white border border-[#d4d4d4] text-[#171717] text-sm focus:outline-none focus:border-[#406422] focus:ring-2 focus:ring-[#406422]/20 transition-all placeholder-gray-400 font-cabinet font-normal shadow-sm">
          </div>

          <div>
            <label for="modal_subject" class="block font-cabinet font-medium text-xs text-[#171717] uppercase tracking-wider mb-1.5">
              Topik / Subjek <span class="text-red-500">*</span>
            </label>
            <input type="text" id="modal_subject" name="subject" required placeholder="Contoh: Info Tiket & Jadwal Panggung"
                   class="w-full px-4 py-2.5 sm:py-3 rounded-xl bg-white border border-[#d4d4d4] text-[#171717] text-sm focus:outline-none focus:border-[#406422] focus:ring-2 focus:ring-[#406422]/20 transition-all placeholder-gray-400 font-cabinet font-normal shadow-sm">
          </div>

          <div>
            <label for="modal_message" class="block font-cabinet font-medium text-xs text-[#171717] uppercase tracking-wider mb-1.5">
              Pertanyaan / Pesan Anda <span class="text-red-500">*</span>
            </label>
            <textarea id="modal_message" name="message" rows="3" required placeholder="Tuliskan pertanyaan detail Anda di sini..."
                      class="w-full px-4 py-2.5 sm:py-3 rounded-xl bg-white border border-[#d4d4d4] text-[#171717] text-sm focus:outline-none focus:border-[#406422] focus:ring-2 focus:ring-[#406422]/20 transition-all placeholder-gray-400 font-cabinet font-normal shadow-sm resize-none"></textarea>
          </div>

          <div class="pt-2 flex items-center justify-end gap-3">
            <button type="button" onclick="closeAskModal()" class="px-5 py-2.5 rounded-xl border border-[#d4d4d4] text-gray-600 hover:text-black hover:bg-black/5 text-sm font-cabinet font-medium transition-all cursor-pointer">
              Batal
            </button>
            <button type="submit" id="askSubmitBtn" class="px-6 py-2.5 rounded-xl bg-[#406422] hover:bg-[#2d4718] text-white text-sm font-cabinet font-medium shadow-md hover:shadow-lg transition-all flex items-center gap-2 cursor-pointer">
              <span id="askBtnText">Kirim Pertanyaan</span>
              <i id="askBtnIcon" class="fa-solid fa-paper-plane text-xs"></i>
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script>
    function openAskModal() {
      const modal = document.getElementById('askModal');
      const container = document.getElementById('askModalContainer');
      modal.classList.remove('opacity-0', 'pointer-events-none');
      modal.classList.add('opacity-100', 'pointer-events-auto');
      container.classList.remove('scale-95');
      container.classList.add('scale-100');
      document.body.style.overflow = 'hidden';
    }

    function closeAskModal() {
      const modal = document.getElementById('askModal');
      const container = document.getElementById('askModalContainer');
      modal.classList.remove('opacity-100', 'pointer-events-auto');
      modal.classList.add('opacity-0', 'pointer-events-none');
      container.classList.remove('scale-100');
      container.classList.add('scale-95');
      document.body.style.overflow = '';
      document.getElementById('askSuccessAlert')?.classList.add('hidden');
      document.getElementById('askErrorAlert')?.classList.add('hidden');
    }

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeAskModal();
    });
    document.getElementById('askModal')?.addEventListener('click', (e) => {
      if (e.target === e.currentTarget) closeAskModal();
    });

    async function submitAskForm(event) {
      event.preventDefault();
      const form = document.getElementById('askForm');
      const btn = document.getElementById('askSubmitBtn');
      const btnText = document.getElementById('askBtnText');
      const btnIcon = document.getElementById('askBtnIcon');
      const successAlert = document.getElementById('askSuccessAlert');
      const errorAlert = document.getElementById('askErrorAlert');

      btn.disabled = true;
      btnText.textContent = 'Mengirim...';
      btnIcon.className = 'fa-solid fa-spinner fa-spin text-xs';
      successAlert.classList.add('hidden');
      errorAlert.classList.add('hidden');

      const formData = new FormData(form);

      try {
        const response = await fetch("{{ route('data.store') }}", {
          method: 'POST',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          },
          body: formData
        });

        const data = await response.json();

        if (response.ok && data.success) {
          form.reset();
          successAlert.classList.remove('hidden');
          document.getElementById('askSuccessMessage').textContent = data.message;
          setTimeout(() => {
            closeAskModal();
          }, 3000);
        } else {
          errorAlert.classList.remove('hidden');
          document.getElementById('askErrorMessage').textContent = data.message || 'Terjadi kesalahan saat mengirim pertanyaan.';
        }
      } catch (err) {
        errorAlert.classList.remove('hidden');
        document.getElementById('askErrorMessage').textContent = 'Koneksi bermasalah. Silakan coba lagi.';
      } finally {
        btn.disabled = false;
        btnText.textContent = 'Kirim Pertanyaan';
        btnIcon.className = 'fa-solid fa-paper-plane text-xs';
      }
    }
  </script>

  <!-- Footer Component -->
  <footer class="border-t border-white/10 bg-[#0b0c10]/95 backdrop-blur-md py-12 text-center text-xs text-gray-400 relative z-10">
    <div class="max-w-[1440px] mx-auto px-6 space-y-6">
      <div class="flex justify-center items-center">
        <img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Logo" class="h-10 w-auto brightness-0 invert">
      </div>
      <p class="max-w-md mx-auto text-gray-400">Solo International Performing Arts 2026 • Kinetic Kinship : Beyond Boundaries</p>
      <p>&copy; {{ date('Y') }} SIPA Festival. All Rights Reserved.</p>
    </div>
  </footer>
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
        const heroItems = document.querySelectorAll('#hero .lg\\:col-span-6 > div, #hero .lg\\:col-span-6 > p, #hero .lg\\:col-span-6 > h3');
        if (heroItems.length > 0) {
          gsap.from(heroItems, {
            opacity: 0,
            y: 30,
            stagger: 0.12,
            duration: 0.8,
            ease: 'power3.out'
          });
        }
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
      animateSection('#teaser-video > div');
      animateSection('#theme-showcase > div');
      animateSection('#ambassador .grid > div');
      animateSection('#history-story .grid > a');
      animateSection('#festival-showcase .grid > div');
      animateSection('#news .grid > div');
      animateSection('#lineup .grid > div');
      animateSection('#instagram-showcase .grid > div');
      animateSection('#testimonials .grid > div');
      animateSection('#faq .grid > div');

      // 6. Countdown Timer Logic (Target: 10 September 2026 19:00:00 WIB)
      const initCountdown = () => {
        const targetDate = new Date('2026-09-10T19:00:00+07:00').getTime();
        const daysEl = document.getElementById('countdown-days');
        const hoursEl = document.getElementById('countdown-hours');
        const minutesEl = document.getElementById('countdown-minutes');
        const secondsEl = document.getElementById('countdown-seconds');

        if (!daysEl || !hoursEl || !minutesEl || !secondsEl) return;

        const updateCountdown = () => {
          const now = new Date().getTime();
          const distance = targetDate - now;

          if (distance <= 0) {
            daysEl.textContent = '00';
            hoursEl.textContent = '00';
            minutesEl.textContent = '00';
            secondsEl.textContent = '00';
            return;
          }

          const days = Math.floor(distance / (1000 * 60 * 60 * 24));
          const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          const seconds = Math.floor((distance % (1000 * 60)) / 1000);

          daysEl.textContent = String(days).padStart(2, '0');
          hoursEl.textContent = String(hours).padStart(2, '0');
          minutesEl.textContent = String(minutes).padStart(2, '0');
          secondsEl.textContent = String(seconds).padStart(2, '0');
        };

        updateCountdown();
        setInterval(updateCountdown, 1000);
      };

      initCountdown();

      // 7. SIPA Story & Maskot History Carousel Logic (GSAP Cinematic Stagger & Slide Transition)
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
          
          // GSAP smooth slide animation with cubic easing
          gsap.to(track, {
            xPercent: -currentPage * 100,
            duration: 0.75,
            ease: 'power3.out'
          });

          // Soft micro-stagger on the newly visible cards
          const activeSlide = track.children[currentPage];
          if (activeSlide) {
            const cards = activeSlide.querySelectorAll('a');
            gsap.fromTo(cards, 
              { opacity: 0.35, y: 20, scale: 0.96 },
              { opacity: 1, y: 0, scale: 1, duration: 0.55, stagger: 0.08, ease: 'power2.out' }
            );
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

      // 7b. Meet Our Performers Carousel Logic (Smooth Sliding & Page Dots)
      const initPerformerCarousel = () => {
        let currentPage = 0;
        const track = document.getElementById('performers-slider-track');
        const prevBtn = document.getElementById('performer-prev-btn');
        const nextBtn = document.getElementById('performer-next-btn');
        const dots = document.querySelectorAll('[data-performer-dot]');
        const totalPages = dots.length || 1;

        if (!track || !prevBtn || !nextBtn) return;

        const updateSlider = (page) => {
          currentPage = (page + totalPages) % totalPages;

          if (typeof gsap !== 'undefined') {
            gsap.to(track, {
              xPercent: -currentPage * 100,
              duration: 0.65,
              ease: 'power2.out'
            });

            const activeSlide = track.children[currentPage];
            if (activeSlide) {
              const cards = activeSlide.querySelectorAll('a');
              gsap.fromTo(cards,
                { opacity: 0.5, y: 15, scale: 0.98 },
                { opacity: 1, y: 0, scale: 1, duration: 0.45, stagger: 0.05, ease: 'power2.out' }
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

      initPerformerCarousel();

      // 7c. News Carousel Logic (Smooth Sliding & Page Dots)
      const initNewsCarousel = () => {
        let currentPage = 0;
        const track = document.getElementById('news-slider-track');
        const prevBtn = document.getElementById('news-prev-btn');
        const nextBtn = document.getElementById('news-next-btn');
        const dots = document.querySelectorAll('[data-news-dot]');
        const totalPages = dots.length || 1;

        if (!track || !prevBtn || !nextBtn) return;

        const updateSlider = (page) => {
          currentPage = (page + totalPages) % totalPages;

          if (typeof gsap !== 'undefined') {
            gsap.to(track, {
              xPercent: -currentPage * 100,
              duration: 0.65,
              ease: 'power3.out'
            });

            const activeSlide = track.children[currentPage];
            if (activeSlide) {
              const cards = activeSlide.querySelectorAll('a');
              gsap.fromTo(cards,
                { opacity: 0.45, y: 18, scale: 0.98 },
                { opacity: 1, y: 0, scale: 1, duration: 0.5, stagger: 0.08, ease: 'power2.out' }
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

      initNewsCarousel();

      // 7d. Testimonials Carousel Logic (GSAP Cinematic Slide & Dots)
      const initTestimonialsCarousel = () => {
        let currentPage = 0;
        const totalPages = 3;
        const track = document.getElementById('testimonials-slider-track');
        const prevBtn = document.getElementById('testimonials-prev-btn');
        const nextBtn = document.getElementById('testimonials-next-btn');
        const dots = document.querySelectorAll('[data-testimonials-dot]');

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
              const cards = activeSlide.querySelectorAll('.bg-\\[\\#fafafa\\]');
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

      initTestimonialsCarousel();

      // 8. Interactive FAQ Accordion Logic
      const initFaqAccordion = () => {
        const toggles = document.querySelectorAll('.faq-toggle');
        toggles.forEach(toggle => {
          toggle.addEventListener('click', () => {
            const item = toggle.closest('.faq-item');
            const answer = item.querySelector('.faq-answer');
            const icon = toggle.querySelector('.faq-icon');
            const isHidden = answer.classList.contains('hidden');

            // Close other open answers for clean accordion UX
            document.querySelectorAll('.faq-item').forEach(otherItem => {
              if (otherItem !== item) {
                otherItem.querySelector('.faq-answer')?.classList.add('hidden');
                otherItem.querySelector('.faq-icon')?.classList.remove('rotate-180');
              }
            });

            if (isHidden) {
              answer.classList.remove('hidden');
              icon?.classList.add('rotate-180');
            } else {
              answer.classList.add('hidden');
              icon?.classList.remove('rotate-180');
            }

            ScrollTrigger.refresh();
          });
        });
      };

      initFaqAccordion();

      // Recalculate layout heights once all images & assets finish loading
      window.addEventListener('load', () => {
        ScrollTrigger.refresh();
      });
    });
  </script>

</body>
</html>
