<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Gallery & News - Solo International Performing Arts (SIPA)</title>
  
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
    @font-face {
      font-family: 'Cabinet Grotesk';
      src: url('https://cdn.fontshare.com/wf/L35G52JRT6M2XMQV3XWQQGTYL33T5MGA/S3B37T6D6A6P5AABV2U6EQQ4CVI75X74/T564DEXZJ2P6J2W37GHYPQZ5C6MQYJ4L.woff2') format('woff2');
      font-weight: 800;
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

  <!-- MAIN GALLERY CONTAINER -->
  <main class="relative min-h-screen overflow-hidden pt-28 sm:pt-36 pb-32">
    
    <div class="max-w-[1060px] mx-auto px-4 sm:px-6 lg:px-8 relative z-20">
      
      <!-- ========================================================================= -->
      <!-- SECTION 1: LATEST FROM SIPA (Pixel-Perfect Figma Node 6005:522 Match)     -->
      <!-- ========================================================================= -->
      <section id="latest-news" class="mb-20 sm:mb-24">
        
        <!-- Header Lockup -->
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
          // Fallback mock items if database news is empty
          $newsList = isset($news) && $news->count() > 0 
                      ? $news 
                      : \App\Models\News::where('status', 'published')->orderBy('sent_at', 'desc')->get();
          
          $featuredItem = $newsList->first();
          $otherNewsItems = $newsList->skip(1)->take(4);

          // Fallback mock data array if database has fewer items
          $mockNews = [
            [
              'title' => 'Second Briefing for SIPA 2025 Volunteers: Communication Ethics and Insight into Solo Tourism',
              'tag' => 'Latest Digital News',
              'date' => '27 May 2025 - 07:27',
              'desc' => 'Solo, 22 Maret 2025 – The training program for volunteers of the Solo International Performing Arts (SIPA) 2025 continues. Held at the Surakarta City Education Office, the Volunteer Orientation Session 2 was conducted with two competent speakers in their respective fields.',
              'image' => asset('images/news/pembekalan_volunteer_2.JPG'),
              'slug' => 'pembekalan-kedua-volunteer-sipa-2025-etika-komunikasi-dan-wawasan-pariwisata-solo'
            ],
            [
              'title' => 'First Briefing for SIPA 2025 Volunteers: Get to Know the World of Events and Public Speaking',
              'tag' => 'Volunteer Orientation',
              'date' => '25 May 2025 - 09:15',
              'desc' => 'Solo, 15 Maret 2025 – After going through the open recruitment process, prospective volunteers for SIPA 2025 participated in Volunteer Training 1 which was held enthusiastically.',
              'image' => asset('images/news/pembekalan_volunteer_1.JPG'),
              'slug' => 'pembekalan-pertama-volunteer-sipa-2025-kenali-dunia-event-dan-asah-public-speaking'
            ],
            [
              'title' => 'SIPA 2025 Open Recruitment: Youth Empowerment in Global Performing Arts Arena',
              'tag' => 'Recruitment',
              'date' => '10 May 2025 - 14:00',
              'desc' => 'SIPA 2025 opens golden opportunities for energetic youth across Indonesia to collaborate directly with international performing artists and cultural masters.',
              'image' => asset('images/news/oprec_sipa_2025.png'),
              'slug' => 'sipa-2025-buka-kesempatan-relawan-ajak-anak-muda-berkontribusi-di-panggung-internasional'
            ],
            [
              'title' => 'SIPA Ambassador 2026: Gondrong Gunarto on Kinetic Kinship & Sonic Explorations',
              'tag' => 'Official Ambassador',
              'date' => '05 May 2025 - 11:30',
              'desc' => 'Meet our visionary ambassador Gondrong Gunarto, bridging ancestral gamelan traditions with cutting-edge global contemporary soundscapes.',
              'image' => asset('images/instagram/post2.jpg'),
              'slug' => 'sipa-2025-buka-kesempatan-relawan-ajak-anak-muda-berkontribusi-di-panggung-internasional'
            ],
            [
              'title' => 'SIPA Festival Legacy: Decades of Cultural Bridge Between Solo and The World',
              'tag' => 'Festival Heritage',
              'date' => '01 May 2025 - 16:45',
              'desc' => 'From historic heritage venues to majestic contemporary open-air stages, SIPA continues to unite cultures across continents.',
              'image' => asset('images/news/art1.png'),
              'slug' => 'sipa-2025-buka-kesempatan-relawan-ajak-anak-muda-berkontribusi-di-panggung-internasional'
            ],
          ];
        @endphp

        <!-- Content Container: Featured Top Card + 2x2 Grid Below -->
        <div class="space-y-5 sm:space-y-6">
          
          <!-- 1. FEATURED BIG HORIZONTAL CARD (TOP) -->
          @php
            $fTitle = $featuredItem ? $featuredItem->title : $mockNews[0]['title'];
            $fDate  = $featuredItem ? \Carbon\Carbon::parse($featuredItem->sent_at ?? $featuredItem->created_at)->format('d F Y - H:i') : $mockNews[0]['date'];
            $fDesc  = $featuredItem ? strip_tags($featuredItem->description) : $mockNews[0]['desc'];
            $fSlug  = $featuredItem ? route('news.HomeView', $featuredItem->slug) : url('/news/' . $mockNews[0]['slug']);
            $fImg   = ($featuredItem && !empty($featuredItem->image_path) && file_exists(public_path('images/news/' . $featuredItem->image_path)))
                      ? asset('images/news/' . $featuredItem->image_path)
                      : $mockNews[0]['image'];
          @endphp
          
          <a href="{{ $fSlug }}" class="group bg-[#fafafa] rounded-[20px] sm:rounded-[24px] p-4 sm:p-5 border border-[#d4d4d4] flex flex-col md:flex-row items-stretch gap-5 sm:gap-6 shadow-2xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-white/40 block">
            <!-- Left Side Image -->
            <div class="w-full md:w-[395px] h-[210px] sm:h-[220px] rounded-[16px] overflow-hidden shrink-0 bg-gray-100 shadow-inner">
              <img src="{{ $fImg }}" alt="{{ $fTitle }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="eager" decoding="async">
            </div>
            
            <!-- Right Side Text Content -->
            <div class="flex-1 flex flex-col justify-between py-1 px-1">
              <div>
                <span class="text-xs font-cabinet font-medium text-[#737373] tracking-wide block mb-1.5">
                  Latest Digital News
                </span>
                <h2 class="text-base sm:text-lg lg:text-[20px] font-cabinet font-bold text-[#171717] leading-snug tracking-tight group-hover:text-[#406422] transition-colors line-clamp-2 mb-1.5">
                  {{ $fTitle }}
                </h2>
                <p class="text-xs font-cabinet text-[#737373] font-normal mb-2.5">
                  {{ $fDate }}
                </p>
                <p class="text-xs sm:text-[13px] font-cabinet text-[#525252] leading-relaxed line-clamp-3 sm:line-clamp-4">
                  {{ $fDesc }}
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


          <!-- 2. 2x2 GRID OF 4 SMALLER HORIZONTAL CARDS (Exact Figma Frame 2147224166 & 2147224167) -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">
            
            @for ($i = 0; $i < 4; $i++)
              @php
                $itemObj = $otherNewsItems->values()->get($i);
                $mockIdx = ($i + 1) % count($mockNews);
                
                $cTitle = $itemObj ? $itemObj->title : $mockNews[$mockIdx]['title'];
                $cDate  = $itemObj ? \Carbon\Carbon::parse($itemObj->sent_at ?? $itemObj->created_at)->format('d F Y - H:i') : $mockNews[$mockIdx]['date'];
                $cDesc  = $itemObj ? strip_tags($itemObj->description) : $mockNews[$mockIdx]['desc'];
                $cSlug  = $itemObj ? route('news.HomeView', $itemObj->slug) : url('/news/' . $mockNews[$mockIdx]['slug']);
                $cImg   = ($itemObj && !empty($itemObj->image_path) && file_exists(public_path('images/news/' . $itemObj->image_path)))
                          ? asset('images/news/' . $itemObj->image_path)
                          : $mockNews[$mockIdx]['image'];
              @endphp

              <!-- Smaller Horizontal Card Item {{ $i + 1 }} -->
              <a href="{{ $cSlug }}" class="group bg-[#fafafa] rounded-[20px] p-3.5 sm:p-4 border border-[#d4d4d4] flex flex-col sm:flex-row items-stretch gap-4 shadow-xl transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:border-white/40 block">
                <!-- Small Image Left -->
                <div class="w-full sm:w-[135px] lg:w-[145px] h-[130px] sm:h-[112px] rounded-[14px] overflow-hidden shrink-0 bg-gray-100 shadow-inner">
                  <img src="{{ $cImg }}" alt="{{ $cTitle }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy" decoding="async">
                </div>
                
                <!-- Text Content Right -->
                <div class="flex-1 flex flex-col justify-between py-0.5 px-0.5">
                  <div>
                    <h3 class="text-sm sm:text-[15px] font-cabinet font-bold text-[#171717] leading-snug tracking-tight group-hover:text-[#406422] transition-colors line-clamp-1 mb-1">
                      {{ $cTitle }}
                    </h3>
                    <p class="text-[11px] font-cabinet text-[#737373] font-normal mb-1.5">
                      {{ $cDate }}
                    </p>
                    <p class="text-[11px] font-cabinet text-[#525252] leading-relaxed line-clamp-2">
                      {{ $cDesc }}
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
            @endfor

          </div>

        </div>

      </section>



      <!-- ========================================================================= -->
      <!-- SECTION 2: VISUAL FLASHBACK - FESTIVAL ARCHIVE BY YEAR                    -->
      <!-- ========================================================================= -->
      <section id="visual-archive" class="pt-8 border-t border-white/10">
        
        <!-- Section Header -->
        <div class="mb-10 sm:mb-12 text-left">
          <div class="flex items-baseline gap-2 sm:gap-3 flex-wrap mb-2">
            <span class="text-4xl sm:text-5xl lg:text-[52px] font-script italic text-white drop-shadow-[0_0_25px_rgba(255,255,255,0.45)] leading-tight">
              Visual
            </span>
            <h2 class="text-2xl sm:text-3xl lg:text-[36px] font-cabinet font-medium text-white tracking-tight leading-tight">
              Flashback & Archives
            </h2>
          </div>
          <p class="font-cabinet text-gray-300 text-sm sm:text-base lg:text-[17px] font-normal leading-relaxed max-w-2xl">
            Kilas balik visual dan dokumentasi pertunjukan megah Solo International Performing Arts dari tahun ke tahun.
          </p>
        </div>

        <!-- Gallery Grid of Years (3 Columns on Desktop, 2 on Tablet, 1 on Mobile) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-7">
          
          @php
            $galleryList = isset($galleries) && $galleries->count() > 0 
                           ? $galleries 
                           : \App\Models\Gallery::where('is_published', true)->orderBy('year', 'desc')->get();
          @endphp

          @forelse ($galleryList as $item)
            <a href="{{ url('/gallery/' . $item->year) }}" class="group relative rounded-[22px] sm:rounded-[24px] overflow-hidden bg-[#18161c] h-[300px] sm:h-[340px] shadow-2xl border border-white/15 transition-all duration-500 hover:-translate-y-2 hover:border-[#f19500]/60 hover:shadow-[0_20px_40px_rgba(0,0,0,0.9)] flex flex-col justify-between p-5 sm:p-6 block transform-gpu">
              
              <!-- Maskot Background Image with Zoom & Dark Gradient -->
              <img src="{{ $item->maskot_src }}" alt="SIPA {{ $item->year }}" class="absolute inset-0 w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-700 brightness-95 group-hover:brightness-105 pointer-events-none" loading="lazy" decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-black/95 via-black/45 to-black/20 group-hover:via-black/35 transition-colors duration-500 pointer-events-none"></div>

              <!-- Top Pill Badge & Icon -->
              <div class="relative z-10 flex items-center justify-between">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/60 backdrop-blur-md border border-white/20 text-[11px] font-bold text-white tracking-widest uppercase">
                  <span class="w-1.5 h-1.5 rounded-full bg-[#f19500]"></span>
                  SIPA {{ $item->year }}
                </span>
                <div class="w-8 h-8 rounded-full bg-white/10 group-hover:bg-[#f19500] border border-white/20 group-hover:border-[#f19500] flex items-center justify-center text-white transition-all duration-300 shadow-sm">
                  <i class="fa-solid fa-arrow-right text-xs -rotate-45 group-hover:rotate-0 transition-transform duration-300"></i>
                </div>
              </div>

              <!-- Bottom Content Lockup -->
              <div class="relative z-10 mt-auto">
                <span class="text-xs text-gray-300 font-medium block mb-1">
                  {{ $item->location ?: ($item->theme_title ?: 'Dokumentasi Festival') }}
                </span>
                <h3 class="font-cabinet font-extrabold text-2xl sm:text-3xl lg:text-[32px] text-white tracking-tight leading-none mb-3 drop-shadow-[0_2px_10px_rgba(0,0,0,0.8)]">
                  {{ $item->year }}
                </h3>
                <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-white/90 group-hover:text-[#f19500] transition-colors">
                  <span>Lihat Dokumentasi</span>
                  <i class="fa-solid fa-chevron-right text-[10px] group-hover:translate-x-1 transition-transform"></i>
                </span>
              </div>
            </a>
          @empty
            <div class="col-span-full py-16 text-center text-gray-400 bg-white/5 rounded-2xl border border-white/10">
              <i class="fa-solid fa-images text-3xl mb-3 text-gray-500"></i>
              <p class="text-base font-medium">Belum ada data galeri visual yang diterbitkan.</p>
            </div>
          @endforelse

        </div>

      </section>

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

      // 2. Safe GSAP Stagger Animations
      if (typeof gsap !== 'undefined') {
        if (typeof ScrollTrigger !== 'undefined') {
          gsap.registerPlugin(ScrollTrigger);
        }

        // Section reveals
        const revealCards = (selector) => {
          const els = document.querySelectorAll(selector);
          if (els.length === 0) return;

          gsap.fromTo(els, 
            { opacity: 0, y: 35, scale: 0.98 },
            { 
              opacity: 1, 
              y: 0, 
              scale: 1, 
              duration: 0.75, 
              stagger: 0.1, 
              ease: 'power2.out',
              scrollTrigger: {
                trigger: els[0].closest('section') || els[0],
                start: 'top 85%',
                toggleActions: 'play none none none',
                once: true
              }
            }
          );
        };

        revealCards('#latest-news > div > a, #latest-news .grid > a');
        revealCards('#visual-archive .grid > a');
      }
    });
  </script>

</body>
</html>