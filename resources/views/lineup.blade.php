<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Meet the Performers - Line Up SIPA 2026</title>
  
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
      background-color: #18161c;
      color: #ffffff;
      overflow-x: hidden;
    }
  </style>
</head>
<body class="bg-[#18161c] text-white font-cabinet selection:bg-[#406422] selection:text-white">

  <!-- Fixed Top Navbar Component -->
  <x-navbar2026 />

  <!-- MAIN WRAPPER (100% Matching Figma Node 4152:17732) -->
  <main class="w-full bg-[#18161c] relative pt-[90px]">

    <!-- ========================================== -->
    <!-- STAGE SECTION 1: INTERNATIONAL DELEGATE    -->
    <!-- ========================================== -->
    <section id="international-delegates" class="relative w-full min-h-[1124px] bg-cover bg-center overflow-hidden pt-12 pb-24" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
      
      <!-- Left Theatrical Curtains (Node 4152:17800) -->
      <div class="absolute inset-y-0 left-0 w-[200px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
        <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Right Theatrical Curtains (Node 4152:17801) -->
      <div class="absolute inset-y-0 right-0 w-[200px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
        <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Bottom Floor Vector Shadow (Node 4152:17803) -->
      <div class="absolute bottom-0 inset-x-0 h-[337px] pointer-events-none z-10">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Content Container (Width 1040px strictly matching Figma) -->
      <div class="max-w-[1040px] mx-auto px-4 sm:px-6 lg:px-0 relative z-20">
        
        <!-- Header Lockup (Node 4152:17781) -->
        <div class="max-w-[621px] mb-12 sm:mb-14 lineup-header">
          <div class="flex flex-wrap items-center gap-x-4 mb-3">
            <span class="text-[32px] sm:text-[36px] font-cabinet font-medium text-white tracking-tight leading-[1.2]">
              Meet the
            </span>
            <span class="text-[38px] sm:text-[40px] font-script italic text-white leading-[1.2] drop-shadow-[0_0_15px_rgba(255,255,255,0.4)]">
              Performers
            </span>
          </div>
          <p class="font-cabinet text-white/90 text-base sm:text-[20px] font-medium leading-[1.2]">
            From different corners of the world, artists come together on one stage. Sharing their stories, traditions, and visions through performance.
          </p>
        </div>

        @php
          $intlList = isset($internationalPerformers) && $internationalPerformers->count() > 0 
                      ? $internationalPerformers 
                      : \App\Models\Performer::where('type', 'international')->orderBy('order')->get();
          $natList = isset($nationalPerformers) && $nationalPerformers->count() > 0 
                     ? $nationalPerformers 
                     : \App\Models\Performer::where('type', 'national')->orderBy('order')->get();
        @endphp

        <!-- Section Title: International Delegate (Node 4152:17808) -->
        <div class="mb-6">
          <h2 class="text-lg sm:text-[20px] font-cabinet font-medium text-white tracking-tight leading-[1.2]">
            International Delegate
          </h2>
        </div>

        <!-- 8 Cards Grid (2 Rows x 4 Columns = 1040px width, 242px x 380px, gap 24px) (Node 4152:17816) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 delegates-grid">
          @forelse($intlList as $item)
          @php
            $imgSrc = (!empty($item->image_path) && file_exists(public_path('images/' . $item->image_path))) 
                      ? asset('images/' . $item->image_path) 
                      : asset('images/delegates/Khambatta Dance Company.jpg');
          @endphp
          <!-- Performer Card: {{ $item->name }} -->
          <div class="group relative rounded-[20px] overflow-hidden bg-[#1e1c24] h-[380px] shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(0,0,0,0.8)] cursor-pointer">
            <img src="{{ $imgSrc }}" alt="{{ $item->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black/95 via-black/50 to-transparent pointer-events-none"></div>
            <div class="absolute inset-x-0 bottom-0 p-5 z-10 pointer-events-none">
              <span class="font-cabinet text-xs text-[#f19500] font-bold tracking-wider uppercase block mb-1">
                {{ $item->country }}
              </span>
              <h3 class="font-cabinet font-bold text-lg text-white tracking-tight leading-snug">
                {{ $item->name }}
              </h3>
            </div>
          </div>
          @empty
          <div class="col-span-full py-12 text-center text-gray-400">
            <p class="text-sm font-medium">Belum ada delegasi internasional yang ditambahkan.</p>
          </div>
          @endforelse
        </div>
      </div>
    </section>


    <!-- ========================================== -->
    <!-- STAGE SECTION 2: NATIONAL DELEGATE         -->
    <!-- ========================================== -->
    <section id="national-delegates" class="relative w-full min-h-[1124px] bg-cover bg-center overflow-hidden pt-12 pb-24" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
      
      <!-- Left Theatrical Curtains (Node 4152:17805) -->
      <div class="absolute inset-y-0 left-0 w-[200px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
        <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Right Theatrical Curtains (Node 4152:17806) -->
      <div class="absolute inset-y-0 right-0 w-[200px] sm:w-[241px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
        <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Bottom Floor Vector Shadow (Node 4152:17807) -->
      <div class="absolute bottom-0 inset-x-0 h-[337px] pointer-events-none z-10">
        <img src="{{ asset('images/pattern/theme_vector_bottom.svg') }}" class="w-full h-full object-cover" alt="">
      </div>

      <!-- Content Container (Width 1040px strictly matching Figma) -->
      <div class="max-w-[1040px] mx-auto px-4 sm:px-6 lg:px-0 relative z-20">
        
        <!-- Section Title: National Delegate (Node 4152:17828) -->
        <div class="mb-6">
          <h2 class="text-lg sm:text-[20px] font-cabinet font-medium text-white tracking-tight leading-[1.2]">
            National Delegate
          </h2>
        </div>

        <!-- 8 Cards Grid (2 Rows x 4 Columns = 1040px width, 242px x 380px, gap 24px) (Node 4152:17817) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 delegates-grid">
          @forelse($natList as $item)
          @php
            $imgSrc = (!empty($item->image_path) && file_exists(public_path('images/' . $item->image_path))) 
                      ? asset('images/' . $item->image_path) 
                      : asset('images/delegates/Noizekilla.jpg');
          @endphp
          <!-- Performer Card: {{ $item->name }} -->
          <div class="group relative rounded-[20px] overflow-hidden bg-[#1e1c24] h-[380px] shadow-2xl transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_15px_30px_rgba(0,0,0,0.8)] cursor-pointer">
            <img src="{{ $imgSrc }}" alt="{{ $item->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black/95 via-black/50 to-transparent pointer-events-none"></div>
            <div class="absolute inset-x-0 bottom-0 p-5 z-10 pointer-events-none">
              <span class="font-cabinet text-xs text-[#f19500] font-bold tracking-wider uppercase block mb-1">
                {{ $item->country }}
              </span>
              <h3 class="font-cabinet font-bold text-lg text-white tracking-tight leading-snug">
                {{ $item->name }}
              </h3>
            </div>
          </div>
          @empty
          <div class="col-span-full py-12 text-center text-gray-400">
            <p class="text-sm font-medium">Belum ada delegasi nasional yang ditambahkan.</p>
          </div>
          @endforelse
        </div>
      </div>
    </section>

  </main>

  <!-- Footer Component -->
  <footer class="border-t border-white/10 bg-[#18161c] py-10 text-center text-xs text-gray-400 relative z-20">
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
    // Ensure browser always starts at top on reload
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

        // Sync Lenis with GSAP ScrollTrigger
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

      // 2. Safe & Failproof GSAP Animations
      if (typeof gsap !== 'undefined') {
        if (typeof ScrollTrigger !== 'undefined') {
          gsap.registerPlugin(ScrollTrigger);
        }

        // Header Reveal
        gsap.fromTo('.lineup-header', 
          { opacity: 0, y: 20 },
          { opacity: 1, y: 0, duration: 0.7, ease: 'power2.out' }
        );

        // Fail-Safe fromTo for All Delegate Grids
        document.querySelectorAll('.delegates-grid').forEach((grid) => {
          gsap.fromTo(grid.children, 
            { opacity: 0, y: 25 },
            { 
              opacity: 1, 
              y: 0, 
              duration: 0.6, 
              stagger: 0.05, 
              ease: 'power2.out',
              scrollTrigger: {
                trigger: grid,
                start: 'top 92%',
                toggleActions: 'play none none none'
              }
            }
          );
        });

        // Refresh triggers once all assets are loaded
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