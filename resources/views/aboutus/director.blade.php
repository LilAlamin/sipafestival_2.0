<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Director Profile - Solo International Performing Arts (SIPA)</title>
  
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('images/sipalogo.png') }}">

  <!-- Google Fonts & Tailwind Preconnect -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Cormorant+Garamond:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
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
    .font-serif-cormorant {
      font-family: 'Cormorant Garamond', serif !important;
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

  <!-- MAIN DIRECTOR PROFILE SECTION (Pixel-Perfect Figma Node 4152:13940 Match) -->
  <main class="relative min-h-screen bg-[#0b0c10] bg-cover bg-center overflow-hidden flex items-center justify-center pt-24 pb-16 sm:py-28 lg:py-32" style="background-image: url('{{ asset('images/pattern/theme_bg.webp') }}');">
    
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
    <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-[#0b0c10] to-transparent pointer-events-none z-10"></div>

    <div class="max-w-[1320px] mx-auto px-6 sm:px-10 lg:px-16 relative z-20 w-full">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
        
        <!-- Left Column: Director Bio & Header Content (Matching Figma Node 4152:17762) -->
        <div class="lg:col-span-6 xl:col-span-6 flex flex-col justify-center director-text-content">
          
          <!-- Header Lockup -->
          <div class="mb-6 sm:mb-8">
            <div class="flex flex-wrap items-center justify-start gap-x-3 gap-y-1">
              <span class="font-script italic text-3xl sm:text-4xl lg:text-[44px] text-white drop-shadow-[0_0_20px_rgba(255,255,255,0.4)] leading-tight">
                Director
              </span>
              <span class="font-cabinet font-medium text-2xl sm:text-3xl lg:text-[36px] text-white tracking-tight leading-tight">
                of Solo International
              </span>
            </div>
            <h1 class="font-cabinet font-medium text-2xl sm:text-3xl lg:text-[36px] text-white tracking-tight leading-tight mt-1">
              Performing Arts (SIPA)
            </h1>
          </div>

          <!-- Description Paragraphs -->
          <div class="space-y-4 text-gray-200/90 font-cabinet font-normal text-base sm:text-lg lg:text-[18px] leading-[1.65] text-justify">
            <p>
              Dr. R.Ay. Irawati Kusumorasri, M.Sn. is the Director of Solo International Performing Arts (SIPA), born in Solo, Central Java, Indonesia, in December 1963. SIPA is an international festival held in the city of Solo, bringing together a rich diversity of performing arts from Indonesia and around the world, including dance, music, and theater.
            </p>
            <p>
              Since its first edition in 2009, SIPA has grown into one of Solo’s most distinguished festivals. Under Irawati’s leadership, SIPA has continued to flourish and earn national recognition, including being named among the Top 30 Events in the Wonderful Event Calendar by the Ministry of Tourism and Creative Economy of the Republic of Indonesia (Kemenparekraf) in 2019, as well as receiving first prize at the Anugerah Bangga Buatan Indonesia (ABBI) in 2020.
            </p>
          </div>

        </div>

        <!-- Right Column: Director High-Resolution Stage Portrait with Name Lockup (Matching Figma Node 4152:14963) -->
        <div class="lg:col-span-6 xl:col-span-6 flex flex-col items-center lg:items-end justify-center director-image-content relative">
          <div class="relative w-full max-w-[560px] lg:max-w-[580px] rounded-[24px] sm:rounded-[32px] overflow-hidden shadow-2xl border border-white/15 group bg-black/40">
            
            <!-- Portrait Image -->
            <img src="{{ asset('images/bundaira/bunda_ira_figma.webp') }}" 
                 alt="Dr. R.Ay. Irawati Kusumorasri, M.Sn. - Director of SIPA" 
                 class="w-full h-auto object-cover max-h-[620px] sm:max-h-[700px] transition-transform duration-700 group-hover:scale-105"
                 loading="eager"
                 decoding="async">

            <!-- Deep Ambient Bottom Gradient Overlay for Flawless Text Contrast -->
            <div class="absolute inset-x-0 bottom-0 h-44 sm:h-52 bg-gradient-to-t from-black/95 via-black/60 to-transparent pointer-events-none z-10"></div>

            <!-- Overlay Caption at Bottom Right of Portrait (Exact Figma Lockup) -->
            <div class="absolute inset-x-0 bottom-0 p-5 sm:p-7 z-20 flex flex-col items-end justify-end text-right pointer-events-none">
              <span class="font-cabinet font-medium text-xs sm:text-sm lg:text-[14px] text-gray-200 tracking-wide block mb-1 drop-shadow-[0_2px_8px_rgba(0,0,0,0.9)]">
                Solo International Performing Arts 2024
              </span>
              <h2 class="font-serif-cormorant font-bold text-xl sm:text-2xl lg:text-[28px] xl:text-[32px] text-white tracking-normal leading-snug drop-shadow-[0_4px_25px_rgba(0,0,0,1)] max-w-full text-right">
                Dr. R.Ay. Irawati Kusumorasri, M.Sn.
              </h2>
            </div>

          </div>
        </div>

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

      // 2. GSAP Entrance Animation
      if (typeof gsap !== 'undefined') {
        gsap.from('.director-text-content > *', {
          opacity: 0,
          x: -40,
          duration: 0.9,
          stagger: 0.15,
          ease: 'power3.out'
        });

        gsap.from('.director-image-content', {
          opacity: 0,
          x: 40,
          scale: 0.95,
          duration: 1.1,
          ease: 'power3.out'
        });
      }
    });
  </script>

</body>
</html>