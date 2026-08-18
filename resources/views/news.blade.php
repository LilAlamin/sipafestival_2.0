<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>News & Highlights - Solo International Performing Arts (SIPA)</title>
  
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
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
  </style>
</head>
<body class="bg-[#0b0c10] text-[#fafafa] font-cabinet selection:bg-[#406422] selection:text-white bg-cover bg-center bg-fixed min-h-screen" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">

  <!-- Fixed Top Navbar Component -->
  <x-navbar2026 />

  <!-- Fixed Left Theatrical Ornate Curtain Border -->
  <div class="fixed inset-y-0 left-0 w-[160px] sm:w-[220px] lg:w-[260px] pointer-events-none z-10 mix-blend-soft-light opacity-95 -scale-x-100">
    <img src="{{ asset('images/pattern/theme_vector_left.svg') }}" class="w-full h-full object-cover" alt="">
  </div>

  <!-- Fixed Right Theatrical Ornate Curtain Border -->
  <div class="fixed inset-y-0 right-0 w-[160px] sm:w-[220px] lg:w-[260px] pointer-events-none z-10 mix-blend-soft-light opacity-95">
    <img src="{{ asset('images/pattern/theme_vector_right.svg') }}" class="w-full h-full object-cover" alt="">
  </div>

  <!-- Top & Bottom Soft Vignette Gradient Shadows -->
  <div class="fixed inset-x-0 top-0 h-32 bg-gradient-to-b from-[#0b0c10]/95 via-[#0b0c10]/40 to-transparent pointer-events-none z-10"></div>
  <div class="fixed inset-x-0 bottom-0 h-32 bg-gradient-to-t from-[#0b0c10]/95 via-[#0b0c10]/40 to-transparent pointer-events-none z-10"></div>

  <!-- MAIN NEWS CONTAINER -->
  <main class="relative min-h-screen overflow-hidden pt-28 sm:pt-36 pb-32">
    
    <div class="max-w-[1060px] mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
      
      <!-- Section Header Lockup (Figma Node 6005:522 Match) -->
      <div class="mb-8 sm:mb-10 text-left">
        <div class="flex items-baseline gap-2 sm:gap-3 flex-wrap mb-2">
          <span class="text-4xl sm:text-5xl lg:text-[52px] font-script italic text-white drop-shadow-[0_0_25px_rgba(255,255,255,0.45)] leading-tight">
            Latest
          </span>
          <h1 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
            from Solo International Performing Arts
          </h1>
        </div>
        <p class="font-cabinet text-gray-300 text-sm sm:text-base lg:text-[17px] font-normal leading-relaxed max-w-2xl">
          Explore the latest news, stories, and highlights from the world of Solo International Performing Arts.
        </p>
      </div>

      @php
        $newsList = isset($news) && $news->count() > 0 
                    ? $news 
                    : \App\Models\News::where('status', 'published')->orderBy('sent_at', 'desc')->get();
        
        $featuredItem = $newsList->first();
        $otherNewsItems = $newsList->skip(1);
      @endphp

      <!-- Content Container -->
      <div class="space-y-5 sm:space-y-6">
        
        <!-- 1. FEATURED BIG HORIZONTAL CARD (TOP) -->
        @if($featuredItem)
          @php
            $fImg = (!empty($featuredItem->image_path) && file_exists(public_path('images/news/' . $featuredItem->image_path)))
                    ? asset('images/news/' . $featuredItem->image_path)
                    : asset('images/news/pembekalan_volunteer_2.JPG');
          @endphp
          
          <a href="{{ route('news.HomeView', $featuredItem->slug) }}" class="group bg-[#fafafa] rounded-[20px] sm:rounded-[24px] p-4 sm:p-5 border border-[#d4d4d4] flex flex-col md:flex-row items-stretch gap-5 sm:gap-6 shadow-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-white/40 block">
            <!-- Left Side Image -->
            <div class="w-full md:w-[395px] h-[210px] sm:h-[220px] rounded-[16px] overflow-hidden shrink-0 bg-gray-100 shadow-inner">
              <img src="{{ $fImg }}" alt="{{ $featuredItem->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="eager" decoding="async">
            </div>
            
            <!-- Right Side Text Content -->
            <div class="flex-1 flex flex-col justify-between py-1 px-1">
              <div>
                <span class="text-xs font-cabinet font-medium text-[#737373] tracking-wide block mb-1.5">
                  Latest Digital News
                </span>
                <h2 class="text-base sm:text-lg lg:text-[20px] font-cabinet font-bold text-[#171717] leading-snug tracking-tight group-hover:text-[#406422] transition-colors line-clamp-2 mb-1.5">
                  {{ $featuredItem->title }}
                </h2>
                <p class="text-xs font-cabinet text-[#737373] font-normal mb-2.5">
                  {{ \Carbon\Carbon::parse($featuredItem->sent_at ?? $featuredItem->created_at)->format('d F Y - H:i') }}
                </p>
                <p class="text-xs sm:text-[13px] font-cabinet text-[#525252] leading-relaxed line-clamp-3 sm:line-clamp-4">
                  {!! strip_tags($featuredItem->description) !!}
                </p>
              </div>
              
              <div class="text-right mt-auto pt-3">
                <span class="text-xs sm:text-[13px] font-cabinet font-semibold text-[#171717] group-hover:text-[#406422] group-hover:underline inline-flex items-center gap-1.5 transition-colors">
                  <span>Read More</span>
                  <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                </span>
              </div>
            </div>
          </a>
        @endif


        <!-- 2. GRID OF REMAINING CARDS (2 COLUMNS) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
          @forelse ($otherNewsItems as $item)
            @php
              $cImg = (!empty($item->image_path) && file_exists(public_path('images/news/' . $item->image_path)))
                      ? asset('images/news/' . $item->image_path)
                      : asset('images/news/art1.png');
            @endphp

            <a href="{{ route('news.HomeView', $item->slug) }}" class="group bg-[#fafafa] rounded-[20px] p-3.5 sm:p-4 border border-[#d4d4d4] flex flex-col sm:flex-row items-stretch gap-4 shadow-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-white/40 block">
              <!-- Small Image Left -->
              <div class="w-full sm:w-[135px] lg:w-[145px] h-[130px] sm:h-[112px] rounded-[14px] overflow-hidden shrink-0 bg-gray-100 shadow-inner">
                <img src="{{ $cImg }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" decoding="async">
              </div>
              
              <!-- Text Content Right -->
              <div class="flex-1 flex flex-col justify-between py-0.5 px-0.5">
                <div>
                  <h3 class="text-sm sm:text-[15px] font-cabinet font-bold text-[#171717] leading-snug tracking-tight group-hover:text-[#406422] transition-colors line-clamp-1 mb-1">
                    {{ $item->title }}
                  </h3>
                  <p class="text-[11px] font-cabinet text-[#737373] font-normal mb-1.5">
                    {{ \Carbon\Carbon::parse($item->sent_at ?? $item->created_at)->format('d F Y - H:i') }}
                  </p>
                  <p class="text-[11px] font-cabinet text-[#525252] leading-relaxed line-clamp-2">
                    {!! strip_tags($item->description) !!}
                  </p>
                </div>
                
                <div class="text-right mt-auto pt-2">
                  <span class="text-[11px] font-cabinet font-semibold text-[#171717] group-hover:text-[#406422] group-hover:underline inline-flex items-center gap-1 transition-colors">
                    <span>Read More</span>
                    <i class="fa-solid fa-chevron-right text-[9px] group-hover:translate-x-0.5 transition-transform"></i>
                  </span>
                </div>
              </div>
            </a>
          @empty
            @if(!$featuredItem)
              <div class="col-span-full py-16 text-center text-gray-400 bg-white/5 rounded-2xl border border-white/10">
                <i class="fa-solid fa-newspaper text-3xl mb-3 text-gray-500"></i>
                <p class="text-base font-medium">Belum ada berita yang dipublikasikan saat ini.</p>
              </div>
            @endif
          @endforelse
        </div>

      </div>

    </div>
  </main>

  <!-- Footer Component -->
  <footer class="border-t border-white/10 bg-[#0b0c10] py-12 text-center text-xs text-gray-400 relative z-20">
    <div class="max-w-[1240px] mx-auto px-6 space-y-4">
      <div class="flex justify-center items-center">
        <img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Logo" class="h-8 w-auto brightness-0 invert">
      </div>
      <p class="max-w-md mx-auto text-gray-400">Solo International Performing Arts 2026 • Kinetic Kinship : Beyond Boundaries</p>
      <p>&copy; {{ date('Y') }} SIPA Festival. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- GSAP Entrance Animation & Lenis Smooth Scroll -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
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

      if (typeof gsap !== 'undefined') {
        if (typeof ScrollTrigger !== 'undefined') {
          gsap.registerPlugin(ScrollTrigger);
        }

        const cards = document.querySelectorAll('main a.group');
        if (cards.length > 0) {
          gsap.fromTo(cards, 
            { opacity: 0, y: 30, scale: 0.98 },
            { opacity: 1, y: 0, scale: 1, duration: 0.7, stagger: 0.08, ease: 'power2.out' }
          );
        }
      }
    });
  </script>

</body>
</html>