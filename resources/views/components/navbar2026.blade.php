<!-- Cabinet Grotesk Font Definition -->
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
    src: url('https://cdn.fontshare.com/wf/ZX6AQLSFYVDPN2URWO2MQFGTYYOHIS64/TPYPKOYWFQVNJHLLRXD4KFYX4LUOUW4Z/6QH2ALVTTK7IRVO5MYOQQ3OZNXW5SSS3.woff2') format('woff2');
    font-weight: 800;
    font-display: swap;
    font-style: normal;
  }

  /* Google Translate Silent Integration */
  .goog-te-banner-frame.skiptranslate,
  .goog-te-gadget,
  #goog-gt-tt,
  .goog-te-balloon-frame,
  .goog-tooltip,
  .goog-tooltip:hover {
    display: none !important;
  }
  body {
    top: 0px !important;
  }
  .goog-text-highlight {
    background-color: transparent !important;
    box-shadow: none !important;
  }
  .skiptranslate:not(.nav-lang-item) {
    display: none !important;
  }
</style>

<!-- Hidden Google Translate Element Container -->
<div id="google_translate_element" style="display:none !important; visibility:hidden !important; position:absolute; left:-9999px;"></div>

@php
  $activeLocale = 'en'; // Default is EN
  if (request()->query('lang') === 'id' || (isset($_COOKIE['googtrans']) && (str_ends_with($_COOKIE['googtrans'], '/id') || str_contains($_COOKIE['googtrans'], '/en/id'))) || session('locale') === 'id') {
    if (request()->query('lang') !== 'en') {
      $activeLocale = 'id';
    }
  }
  if (request()->query('lang') === 'en') {
    $activeLocale = 'en';
  }
@endphp

<!-- Navbar SIPA 2026 (Matching Figma Design - Protected from Google Translate) -->
<nav class="nav-cabinet-font notranslate fixed top-0 left-0 right-0 z-50 bg-[#111217] border-b border-white/5 py-4 transition-all duration-300" translate="no">
  <div class="max-w-[1400px] mx-auto px-6 lg:px-12 flex items-center justify-between notranslate" translate="no">
    
    <!-- Logo Left -->
    <a href="/" class="flex items-center notranslate" translate="no">
      <img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Festival 2026" class="h-10 w-auto object-contain brightness-0 invert notranslate" translate="no">
    </a>

    <!-- Navigation Links Right -->
    <div class="hidden md:flex items-center space-x-10">
      
      <!-- Home -->
      <a href="/" class="text-base tracking-wide transition-all duration-200 py-1 border-b-2 {{ request()->is('/') || request()->is('home2026') || request()->is('2026') ? 'border-white text-white font-medium' : 'border-transparent text-gray-300 hover:text-white' }}">
        Home
      </a>

      <!-- About Us Dropdown -->
      <div class="relative group" data-dropdown>
        <button type="button" class="text-base tracking-wide flex items-center gap-1.5 transition-all duration-200 py-1 border-b-2 {{ request()->is('aboutus*') ? 'border-white text-white font-medium' : 'border-transparent text-gray-300 hover:text-white' }} cursor-pointer" data-dropdown-button>
          <span>About Us</span>
          <svg class="w-3.5 h-3.5 text-gray-400 group-hover:text-white transition-transform duration-300 shrink-0 dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        
        <div data-dropdown-menu class="absolute right-0 mt-3 w-52 rounded-xl bg-[#181920] border border-white/10 shadow-2xl py-2 transition-all duration-200 origin-top-right opacity-0 scale-95 pointer-events-none z-50 backdrop-blur-md">
          <a href="/aboutus/director" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-300 hover:text-white hover:bg-white/5 transition-colors {{ request()->is('aboutus/director') ? 'text-white font-semibold bg-white/5' : '' }}">
            <span>Director Profile</span>
            <i class="fa-solid fa-chevron-right text-[10px] text-gray-500"></i>
          </a>
          <a href="/aboutus/history" class="flex items-center justify-between px-4 py-2.5 text-sm text-gray-300 hover:text-white hover:bg-white/5 transition-colors {{ request()->is('aboutus/history') ? 'text-white font-semibold bg-white/5' : '' }}">
            <span>History of SIPA</span>
            <i class="fa-solid fa-chevron-right text-[10px] text-gray-500"></i>
          </a>
        </div>
      </div>

      <!-- Line Up -->
      <a href="/lineup" class="text-base tracking-wide transition-all duration-200 py-1 border-b-2 {{ request()->is('lineup') ? 'border-white text-white font-medium' : 'border-transparent text-gray-300 hover:text-white' }}">
        Line Up
      </a>

      <!-- Gallery -->
      <div class="relative group" data-dropdown>
        <button type="button" class="text-base tracking-wide flex items-center gap-1.5 transition-all duration-200 py-1 border-b-2 {{ request()->is('gallery*') ? 'border-white text-white font-medium' : 'border-transparent text-gray-300 hover:text-white' }} cursor-pointer" data-dropdown-button>
          <span>Gallery</span>
          <svg class="w-3.5 h-3.5 text-gray-400 group-hover:text-white transition-transform duration-300 shrink-0 dropdown-arrow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        
        <div data-dropdown-menu class="absolute right-0 mt-3 w-48 rounded-xl bg-[#181920] border border-white/10 shadow-2xl py-2 transition-all duration-200 origin-top-right opacity-0 scale-95 pointer-events-none max-h-64 overflow-y-auto z-50 backdrop-blur-md">
          <a href="/gallery" class="block px-4 py-2 text-sm text-white font-medium hover:bg-white/5 transition-colors">
            All Galleries
          </a>
          @for ($year = 2025; $year >= 2009; $year--)
            <a href="/gallery/{{ $year }}" class="block px-4 py-2 text-sm text-gray-300 hover:text-white hover:bg-white/5 transition-colors">
              SIPA {{ $year }}
            </a>
          @endfor
        </div>
      </div>

      <!-- Language Selector Pill Button (Default EN, Switch to ID) -->
      <div class="relative notranslate" translate="no" data-dropdown>
        <button type="button" class="notranslate flex items-center gap-2 bg-white/10 hover:bg-white/15 border border-white/15 px-3.5 py-1.5 rounded-full text-xs font-bold text-white tracking-wider transition-all duration-200 hover:border-white/30 cursor-pointer shadow-sm" data-dropdown-button translate="no">
          @if ($activeLocale === 'id')
            <!-- Indonesia Flag SVG -->
            <svg class="w-4 h-3 rounded-[2px] object-cover shrink-0 shadow-sm" viewBox="0 0 640 480">
              <g fill-rule="evenodd" stroke-width="1pt">
                <path fill="#e63946" d="M0 0h640v240H0z"/>
                <path fill="#ffffff" d="M0 240h640v240H0z"/>
              </g>
            </svg>
            <span class="notranslate" translate="no">ID</span>
          @else
            <!-- UK Flag SVG (Default EN) -->
            <svg class="w-4 h-3 rounded-[2px] object-cover shrink-0 shadow-sm" viewBox="0 0 640 480">
              <path fill="#012169" d="M0 0h640v480H0z"/>
              <path fill="#fff" d="m75 0 245 180L565 0h75v55L395 240l245 185v55h-75L320 295 75 480H0v-55l245-185L0 55V0h75z"/>
              <path fill="#C8102E" d="m400 240 240 180v30L360 240h40zM240 240 0 60V30l280 210h-40zm0 0L0 420v30l280-210h-40zm160 0 240-180V30L360 240h40z"/>
              <path fill="#fff" d="M240 0v480h160V0H240zM0 160v160h640V160H0z"/>
              <path fill="#C8102E" d="M267 0v480h106V0H267zM0 187v106h640V187H0z"/>
            </svg>
            <span class="notranslate" translate="no">EN</span>
          @endif
          <svg class="w-2.5 h-2.5 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        
        <div data-dropdown-menu class="notranslate absolute right-0 mt-2.5 w-44 rounded-xl bg-[#181920] border border-white/15 shadow-2xl py-1.5 transition-all duration-200 origin-top-right opacity-0 scale-95 pointer-events-none z-50 backdrop-blur-md" translate="no">
          <!-- English Option (Default) -->
          <button type="button" onclick="sipaSwitchLanguage('en')" class="notranslate w-full flex items-center justify-between px-3.5 py-2.5 text-xs font-semibold {{ $activeLocale === 'en' ? 'text-white bg-white/10' : 'text-gray-300 hover:text-white hover:bg-white/5' }} transition-colors cursor-pointer text-left" translate="no">
            <span class="flex items-center gap-2.5 notranslate" translate="no">
              <svg class="w-4 h-3 rounded-[2px] object-cover shrink-0 shadow-sm" viewBox="0 0 640 480">
                <path fill="#012169" d="M0 0h640v480H0z"/>
                <path fill="#fff" d="m75 0 245 180L565 0h75v55L395 240l245 185v55h-75L320 295 75 480H0v-55l245-185L0 55V0h75z"/>
                <path fill="#C8102E" d="m400 240 240 180v30L360 240h40zM240 240 0 60V30l280 210h-40zm0 0L0 420v30l280-210h-40zm160 0 240-180V30L360 240h40z"/>
                <path fill="#fff" d="M240 0v480h160V0H240zM0 160v160h640V160H0z"/>
                <path fill="#C8102E" d="M267 0v480h106V0H267zM0 187v106h640V187H0z"/>
              </svg>
              <span>English (Default)</span>
            </span>
            @if ($activeLocale === 'en')
              <svg class="w-3 h-3 text-[#2ecc71] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
              </svg>
            @endif
          </button>

          <!-- Bahasa Indonesia Option -->
          <button type="button" onclick="sipaSwitchLanguage('id')" class="notranslate w-full flex items-center justify-between px-3.5 py-2.5 text-xs font-semibold {{ $activeLocale === 'id' ? 'text-white bg-white/10' : 'text-gray-300 hover:text-white hover:bg-white/5' }} transition-colors cursor-pointer text-left" translate="no">
            <span class="flex items-center gap-2.5 notranslate" translate="no">
              <svg class="w-4 h-3 rounded-[2px] object-cover shrink-0 shadow-sm" viewBox="0 0 640 480">
                <g fill-rule="evenodd" stroke-width="1pt">
                  <path fill="#e63946" d="M0 0h640v240H0z"/>
                  <path fill="#ffffff" d="M0 240h640v240H0z"/>
                </g>
              </svg>
              <span>Bahasa Indonesia</span>
            </span>
            @if ($activeLocale === 'id')
              <svg class="w-3 h-3 text-[#e63946] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
              </svg>
            @endif
          </button>
        </div>
      </div>

    </div>

    <!-- Mobile Hamburger Toggle & Quick Lang Pill -->
    <div class="md:hidden flex items-center gap-3 notranslate" translate="no">
      <!-- Quick Language Toggle for Mobile -->
      <button type="button" onclick="sipaSwitchLanguage('{{ $activeLocale === 'en' ? 'id' : 'en' }}')" class="notranslate flex items-center gap-1.5 bg-white/10 border border-white/15 px-3 py-1 rounded-full text-xs font-bold text-white cursor-pointer" translate="no">
        @if ($activeLocale === 'id')
          <svg class="w-3.5 h-2.5 rounded-[1.5px] object-cover shrink-0" viewBox="0 0 640 480">
            <g fill-rule="evenodd" stroke-width="1pt">
              <path fill="#e63946" d="M0 0h640v240H0z"/>
              <path fill="#ffffff" d="M0 240h640v240H0z"/>
            </g>
          </svg>
          <span class="notranslate" translate="no">ID</span>
        @else
          <svg class="w-3.5 h-2.5 rounded-[1.5px] object-cover shrink-0" viewBox="0 0 640 480">
            <path fill="#012169" d="M0 0h640v480H0z"/>
            <path fill="#fff" d="m75 0 245 180L565 0h75v55L395 240l245 185v55h-75L320 295 75 480H0v-55l245-185L0 55V0h75z"/>
            <path fill="#C8102E" d="m400 240 240 180v30L360 240h40zM240 240 0 60V30l280 210h-40zm0 0L0 420v30l280-210h-40zm160 0 240-180V30L360 240h40z"/>
            <path fill="#fff" d="M240 0v480h160V0H240zM0 160v160h640V160H0z"/>
            <path fill="#C8102E" d="M267 0v480h106V0H267zM0 187v106h640V187H0z"/>
          </svg>
          <span class="notranslate" translate="no">EN</span>
        @endif
      </button>

      <button id="sipa-menu-toggle" type="button" class="p-2 text-gray-300 hover:text-white focus:outline-none">
        <svg id="sipa-menu-icon-bars" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg id="sipa-menu-icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>

  </div>

  <!-- Mobile Dropdown Menu -->
  <div id="sipa-mobile-menu" class="hidden md:hidden bg-[#111217] border-b border-white/10 px-6 pt-3 pb-6">
    <div class="flex flex-col space-y-3">
      <a href="/" class="py-2 text-base {{ request()->is('/') || request()->is('home2026') || request()->is('2026') ? 'text-white border-b border-white w-fit font-medium' : 'text-gray-300' }}">
        Home
      </a>

      <div class="space-y-1">
        <button type="button" class="sipa-mobile-acc-toggle w-full flex items-center justify-between py-2 text-base text-gray-300">
          <span>About Us</span>
          <svg class="w-4 h-4 transition-transform duration-200 acc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="hidden pl-4 space-y-2 acc-content pt-1">
          <a href="/aboutus/director" class="block py-1 text-sm text-gray-400 hover:text-white">Director Profile</a>
          <a href="/aboutus/history" class="block py-1 text-sm text-gray-400 hover:text-white">History of SIPA</a>
        </div>
      </div>

      <a href="/lineup" class="py-2 text-base {{ request()->is('lineup') ? 'text-white border-b border-white w-fit font-medium' : 'text-gray-300' }}">
        Line Up
      </a>

      <div class="space-y-1">
        <button type="button" class="sipa-mobile-acc-toggle w-full flex items-center justify-between py-2 text-base text-gray-300">
          <span>Gallery</span>
          <svg class="w-4 h-4 transition-transform duration-200 acc-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="hidden pl-4 space-y-2 max-h-48 overflow-y-auto acc-content pt-1">
          <a href="/gallery" class="block py-1 text-sm text-white font-medium">All Galleries</a>
          @for ($year = 2025; $year >= 2009; $year--)
            <a href="/gallery/{{ $year }}" class="block py-1 text-sm text-gray-400 hover:text-white">SIPA {{ $year }}</a>
          @endfor
        </div>
      </div>

      <!-- Language Selector inside Mobile Drawer -->
      <div class="pt-3 border-t border-white/10 flex items-center justify-between notranslate" translate="no">
        <span class="text-sm text-gray-400 notranslate" translate="no">Language / Bahasa</span>
        <div class="flex items-center gap-2 notranslate" translate="no">
          <button type="button" onclick="sipaSwitchLanguage('en')" class="notranslate flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $activeLocale === 'en' ? 'bg-white text-black' : 'bg-white/10 text-gray-300' }}" translate="no">
            <svg class="w-3.5 h-2.5 rounded-[1.5px] object-cover shrink-0" viewBox="0 0 640 480">
              <path fill="#012169" d="M0 0h640v480H0z"/>
              <path fill="#fff" d="m75 0 245 180L565 0h75v55L395 240l245 185v55h-75L320 295 75 480H0v-55l245-185L0 55V0h75z"/>
              <path fill="#C8102E" d="m400 240 240 180v30L360 240h40zM240 240 0 60V30l280 210h-40zm0 0L0 420v30l280-210h-40zm160 0 240-180V30L360 240h40z"/>
              <path fill="#fff" d="M240 0v480h160V0H240zM0 160v160h640V160H0z"/>
              <path fill="#C8102E" d="M267 0v480h106V0H267zM0 187v106h640V187H0z"/>
            </svg>
            <span class="notranslate" translate="no">EN</span>
          </button>
          <button type="button" onclick="sipaSwitchLanguage('id')" class="notranslate flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold {{ $activeLocale === 'id' ? 'bg-white text-black' : 'bg-white/10 text-gray-300' }}" translate="no">
            <svg class="w-3.5 h-2.5 rounded-[1.5px] object-cover shrink-0" viewBox="0 0 640 480">
              <g fill-rule="evenodd" stroke-width="1pt">
                <path fill="#e63946" d="M0 0h640v240H0z"/>
                <path fill="#ffffff" d="M0 240h640v240H0z"/>
              </g>
            </svg>
            <span class="notranslate" translate="no">ID</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- Google Translate Integration Script & Switcher Function -->
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en',
      includedLanguages: 'en,id',
      autoDisplay: false,
      layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
  }

  function sipaSwitchLanguage(lang) {
    const hostname = window.location.hostname;
    
    if (lang === 'id') {
      document.cookie = "googtrans=/en/id; path=/;";
      document.cookie = "googtrans=/en/id; domain=" + hostname + "; path=/;";
      if (hostname !== 'localhost' && hostname !== '127.0.0.1') {
        document.cookie = "googtrans=/en/id; domain=." + hostname + "; path=/;";
      }
      localStorage.setItem('sipa_lang', 'id');
    } else {
      document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
      document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=" + hostname + "; path=/;";
      if (hostname !== 'localhost' && hostname !== '127.0.0.1') {
        document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=." + hostname + "; path=/;";
      }
      document.cookie = "googtrans=/en/en; path=/;";
      localStorage.setItem('sipa_lang', 'en');
    }

    // Sync Laravel backend session route in background
    fetch('/lang/' + lang).catch(() => {});

    // Trigger select element if already loaded
    const selectElem = document.querySelector('.goog-te-combo');
    if (selectElem) {
      selectElem.value = lang;
      selectElem.dispatchEvent(new Event('change'));
    }

    // Remove any lang parameter from URL to keep clean URL structure
    const url = new URL(window.location.href);
    url.searchParams.delete('lang');
    window.location.href = url.pathname + (url.search ? url.search : '') + url.hash;
  }

  // Clean URL on initial load if ?lang= parameter is present
  (function() {
    const url = new URL(window.location.href);
    if (url.searchParams.has('lang')) {
      url.searchParams.delete('lang');
      window.history.replaceState({}, document.title, url.pathname + (url.search ? url.search : '') + url.hash);
    }
  })();
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const toggleBtn = document.getElementById('sipa-menu-toggle');
  const mobileMenu = document.getElementById('sipa-mobile-menu');
  const iconBars = document.getElementById('sipa-menu-icon-bars');
  const iconClose = document.getElementById('sipa-menu-icon-close');

  if (toggleBtn && mobileMenu) {
    toggleBtn.addEventListener('click', function() {
      const isHidden = mobileMenu.classList.contains('hidden');
      if (isHidden) {
        mobileMenu.classList.remove('hidden');
        iconBars.classList.add('hidden');
        iconClose.classList.remove('hidden');
      } else {
        mobileMenu.classList.add('hidden');
        iconBars.classList.remove('hidden');
        iconClose.classList.add('hidden');
      }
    });
  }

  const dropdowns = document.querySelectorAll('[data-dropdown]');
  function closeAllDropdowns() {
    dropdowns.forEach(dd => {
      const menu = dd.querySelector('[data-dropdown-menu]');
      const arrow = dd.querySelector('.dropdown-arrow');
      if (menu) {
        menu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
      }
      if (arrow) {
        arrow.classList.remove('rotate-180');
      }
    });
  }

  dropdowns.forEach(dd => {
    const btn = dd.querySelector('[data-dropdown-button]');
    const menu = dd.querySelector('[data-dropdown-menu]');
    const arrow = dd.querySelector('.dropdown-arrow');

    if (btn && menu) {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const isClosed = menu.classList.contains('opacity-0');
        closeAllDropdowns();
        if (isClosed) {
          menu.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
          if (arrow) arrow.classList.add('rotate-180');
        }
      });
    }
  });

  window.addEventListener('click', closeAllDropdowns);

  const accToggles = document.querySelectorAll('.sipa-mobile-acc-toggle');
  accToggles.forEach(acc => {
    acc.addEventListener('click', function() {
      const content = this.nextElementSibling;
      const icon = this.querySelector('.acc-icon');
      if (content) content.classList.toggle('hidden');
      if (icon) icon.classList.toggle('rotate-180');
    });
  });
});
</script>
