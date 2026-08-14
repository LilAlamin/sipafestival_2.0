<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gallery - Solo International Performing Arts (SIPA)</title>
  
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

  <!-- MAIN GALLERY ARCHIVE (Unified with 2026 Stage Theme) -->
  <main class="relative min-h-screen bg-[#0b0c10] bg-cover bg-center bg-fixed overflow-hidden pt-28 sm:pt-36 pb-24" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
    <!-- Left Theatrical Ornate Curtain Border Overlay (Fixed Screen Edge) -->
    <div class="fixed inset-y-0 left-0 w-[140px] sm:w-[190px] lg:w-[230px] pointer-events-none z-10 mix-blend-soft-light opacity-80 -scale-x-100">
      <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Right Theatrical Ornate Curtain Border Overlay (Fixed Screen Edge) -->
    <div class="fixed inset-y-0 right-0 w-[140px] sm:w-[190px] lg:w-[230px] pointer-events-none z-10 mix-blend-soft-light opacity-80">
      <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
    </div>

    <!-- Top & Bottom Soft Gradient Shadows -->
    <div class="fixed inset-x-0 top-0 h-24 bg-gradient-to-b from-[#0b0c10]/90 to-transparent pointer-events-none z-10"></div>
    <div class="fixed inset-x-0 bottom-0 h-28 bg-gradient-to-t from-[#0b0c10]/90 to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1240px] mx-auto px-4 sm:px-8 lg:px-12 relative z-20">
      
      <!-- Section Header -->
      <div class="max-w-2xl mx-auto text-center mb-12 sm:mb-16 gallery-header">
        <div class="flex flex-wrap items-center justify-center gap-x-3 gap-y-1 mb-3">
          <h1 class="text-3xl sm:text-4xl lg:text-[42px] font-cabinet font-medium text-white tracking-tight leading-tight">
            Visual
          </h1>
          <span class="text-4xl sm:text-5xl lg:text-[50px] font-script italic text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
            Flashback
          </span>
        </div>
        <p class="font-cabinet text-gray-300 text-sm sm:text-base lg:text-[18px] font-normal leading-relaxed">
          Kilas balik visual dan dokumentasi pertunjukan megah Solo International Performing Arts dari tahun ke tahun.
        </p>
      </div>

      <!-- Gallery Grid of Years (3 Columns on Desktop, 2 on Tablet, 1 on Mobile) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 gallery-grid">
        
        @php
          $yearThemes = [
            2025 => 'Maskot & Suasana 2025',
            2024 => 'Pamedan Mangkunegaran',
            2023 => 'Benteng Vastenburg',
            2022 => 'Art & Cultural Revival',
            2021 => 'Virtual & Hybrid Edition',
            2020 => 'Digital Resilience Solo',
            2019 => '11th Annual Fest',
            2018 => 'Decade of Performing Arts',
            2017 => 'Nusantara & Global Waves',
            2016 => 'Vastenburg Spectacular',
            2015 => 'Melodies of The World',
            2014 => 'International Heritage',
            2013 => 'Historical Fort Edition',
            2012 => 'Royal Pamedan Legacy',
            2011 => 'Cultural Harmony',
            2010 => 'The Global Stage',
            2009 => 'Inaugural SIPA Festival',
          ];
        @endphp

        @for ($year = 2025; $year >= 2009; $year--)
          <a href="/gallery/{{ $year }}" class="group relative rounded-[24px] overflow-hidden bg-[#18161c] h-[320px] sm:h-[360px] shadow-2xl border border-white/15 transition-all duration-500 hover:-translate-y-2 hover:border-[#f19500]/60 hover:shadow-[0_20px_40px_rgba(0,0,0,0.9)] flex flex-col justify-between p-6">
            
            <!-- Maskot Background Image with Zoom & Dark Gradient -->
            <img src="{{ asset('images/maskot/' . $year . '.webp') }}" alt="SIPA {{ $year }}" class="absolute inset-0 w-full h-full object-cover object-center group-hover:scale-108 transition-transform duration-700 brightness-95 group-hover:brightness-105">
            <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/40 to-black/20 group-hover:via-black/30 transition-colors duration-500 pointer-events-none"></div>

            <!-- Top Pill Badge -->
            <div class="relative z-10 flex items-center justify-between">
              <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/50 backdrop-blur-md border border-white/20 text-[11px] font-bold text-white tracking-widest uppercase">
                <span class="w-1.5 h-1.5 rounded-full bg-[#f19500]"></span>
                SIPA {{ $year }}
              </span>
              <div class="w-8 h-8 rounded-full bg-white/10 group-hover:bg-[#f19500] border border-white/20 group-hover:border-[#f19500] flex items-center justify-center text-white transition-all duration-300">
                <i class="fa-solid fa-arrow-right text-xs -rotate-45 group-hover:rotate-0 transition-transform duration-300"></i>
              </div>
            </div>

            <!-- Bottom Content Lockup -->
            <div class="relative z-10 mt-auto">
              <span class="text-xs text-gray-300 font-medium block mb-1">
                {{ $yearThemes[$year] ?? 'Dokumentasi Festival' }}
              </span>
              <h2 class="font-cabinet font-extrabold text-3xl sm:text-4xl text-white tracking-tight leading-none mb-3 drop-shadow-[0_2px_10px_rgba(0,0,0,0.8)]">
                {{ $year }}
              </h2>
              <span class="inline-flex items-center gap-2 text-xs font-semibold text-white/90 group-hover:text-[#f19500] transition-colors">
                <span>Lihat Dokumentasi</span>
                <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
              </span>
            </div>
          </a>
        @endfor

      </div>

    </div>
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
    // Ensure browser starts at top on reload
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

        if (typeof ScrollTrigger !== 'undefined') {
          lenis.on('scroll', ScrollTrigger.update);
          gsap.ticker.add((time) => {
            lenis.raf(time * 1000);
          });
          gsap.ticker.lagSmoothing(0);
        } else {
          function raf(time) {
            lenis.raf(time);
            requestAnimationFrame(raf);
          }
          requestAnimationFrame(raf);
        }
      }

      // 2. Safe Fail-Safe GSAP Animations
      if (typeof gsap !== 'undefined') {
        if (typeof ScrollTrigger !== 'undefined') {
          gsap.registerPlugin(ScrollTrigger);
        }

        // Header Reveal
        gsap.fromTo('.gallery-header', 
          { opacity: 0, y: 20 },
          { opacity: 1, y: 0, duration: 0.7, ease: 'power2.out' }
        );

        // Fail-Safe Gallery Grid Stagger Reveal
        const grid = document.querySelector('.gallery-grid');
        if (grid) {
          gsap.fromTo(grid.children, 
            { opacity: 0, y: 30 },
            { 
              opacity: 1, 
              y: 0, 
              duration: 0.65, 
              stagger: 0.05, 
              ease: 'power2.out',
              scrollTrigger: {
                trigger: grid,
                start: 'top 92%',
                toggleActions: 'play none none none'
              }
            }
          );
        }

        window.addEventListener('load', () => {
          if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.refresh();
          }
        });
      }
    });
  </script>

</body>
</html>