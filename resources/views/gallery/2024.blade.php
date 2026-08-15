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
    <!-- 2. ABOUT [YEAR] & AFTER MOVIE (Figma Node 4152:12763)     -->
    <!-- ========================================================= -->
    <section class="relative w-full min-h-[900px] bg-cover bg-center overflow-hidden py-16 sm:py-20" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
      
      <!-- Left Theatrical Curtains (Node 4152:12765) -->
      <div class="absolute inset-y-0 left-0 w-[200px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
        <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Right Theatrical Curtains (Node 4152:12766) -->
      <div class="absolute inset-y-0 right-0 w-[200px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
        <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Top Vector Shadow (Node 4152:12768) -->
      <div class="absolute top-0 inset-x-0 h-[337px] pointer-events-none z-10 -scale-y-100">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Bottom Vector Shadow (Node 4152:12767) -->
      <div class="absolute bottom-0 inset-x-0 h-[337px] pointer-events-none z-10">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Content Container (1040px width strictly matching Figma) -->
      <div class="max-w-[1040px] mx-auto px-4 sm:px-6 lg:px-0 relative z-20 space-y-16">
        
        <!-- About Year Lockup (Node 4152:12769) -->
        <div class="max-w-[778px] space-y-4">
          
          <!-- Title Row: SIPA Festival 2024 (Node 4152:12770) -->
          <div class="flex flex-wrap items-center gap-x-3 gap-y-1">
            <span class="text-[32px] sm:text-[36px] font-cabinet font-medium text-white tracking-tight leading-[1.2]">
              SIPA
            </span>
            <span class="text-[36px] sm:text-[40px] font-script italic text-white leading-[1.2] drop-shadow-[0_0_15px_rgba(255,255,255,0.4)]">
              Festival
            </span>
            <span class="text-[32px] sm:text-[36px] font-cabinet font-medium text-white tracking-tight leading-[1.2]">
              2024
            </span>
          </div>

          <!-- Description Paragraph (Node 4152:12774: text-[20px] leading-[1.2]) -->
          <p class="font-cabinet font-medium text-base sm:text-[20px] text-white leading-[1.2] text-left">
            @lang('messages.gallery_2024')
          </p>
        </div>

        <!-- Aftermovie Video Lockup (Node 4152:12775) -->
        <div class="w-full flex flex-col items-center gap-5">
          
          <!-- Header: After Movie SIPA Festival 2024 (Node 4152:12776) -->
          <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 text-white">
            <span class="text-[36px] sm:text-[40px] font-script italic leading-[1.2] drop-shadow-[0_0_15px_rgba(255,255,255,0.4)]">
              After Movie
            </span>
            <span class="text-[32px] sm:text-[36px] font-cabinet font-medium leading-[1.2]">
              SIPA Festival 2024
            </span>
          </div>

          <!-- Video Player Box (Node 4152:12779: rounded-[20px] h-[400px]) -->
          <div class="w-full h-[320px] sm:h-[400px] rounded-[20px] overflow-hidden bg-black/60 shadow-[0_20px_50px_rgba(0,0,0,0.8)] border border-white/10 relative">
            <iframe class="w-full h-full" src="https://www.youtube.com/embed/eOg3baFV5q8" title="After Movie SIPA Festival 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

        </div>

      </div>

    </section>


    <!-- ========================================================= -->
    <!-- 3. PHOTO DOCUMENTATION (Exact 100% Figma Node 4152:12780) -->
    <!-- ========================================================= -->
    @php
      $photos2024 = ['a.webp', 'b.webp', 'c.webp', 'd.webp', 'e.webp', 'f.webp'];
    @endphp

    <section class="relative w-full h-[580px] sm:h-[640px] overflow-hidden bg-black z-20">
      
      <!-- 3x2 Seamless Full-Width Photo Grid (Exact Node 4152:12781) -->
      <div class="grid grid-cols-3 grid-rows-2 w-full h-full">
        @foreach ($photos2024 as $index => $photo)
          <div class="relative w-full h-full overflow-hidden group">
            <img src="{{ asset('images/gallery/2024/' . $photo) }}" alt="SIPA 2024 Documentation {{ $index + 1 }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 brightness-90 group-hover:brightness-105">
          </div>
        @endforeach
      </div>

      <!-- Top Vignette Shadow (Node 4152:12789: h-[347px] -scale-y-100) -->
      <div class="absolute top-0 inset-x-0 h-[280px] sm:h-[347px] pointer-events-none z-10 -scale-y-100 opacity-90">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Bottom Vignette Shadow (Node 4152:12788: h-[208px]) -->
      <div class="absolute bottom-0 inset-x-0 h-[160px] sm:h-[208px] pointer-events-none z-10 opacity-90">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Floating Centered Title Lockup (Node 4152:12790: top-[51px]) -->
      <div class="absolute top-6 sm:top-[51px] left-1/2 -translate-x-1/2 text-white z-20 whitespace-nowrap flex flex-wrap items-center justify-center gap-3 sm:gap-4 drop-shadow-[0_4px_20px_rgba(0,0,0,0.9)] pointer-events-none">
        <span class="font-cabinet font-medium text-2xl sm:text-[36px] tracking-tight leading-[1.2]">
          SIPA Festival 2024
        </span>
        <span class="font-script italic text-3xl sm:text-[40px] leading-[1.2] drop-shadow-[0_0_20px_rgba(255,255,255,0.7)]">
          Documentation
        </span>
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