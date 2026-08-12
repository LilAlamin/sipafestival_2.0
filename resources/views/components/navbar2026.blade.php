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

  .nav-cabinet-font, .nav-cabinet-font * {
    font-family: 'Cabinet Grotesk', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
  }
</style>

<!-- Navbar SIPA 2026 (Matching Figma Design) -->
<nav class="nav-cabinet-font fixed top-0 left-0 right-0 z-50 bg-[#111217] border-b border-white/5 py-4 transition-all duration-300">
  <div class="max-w-[1400px] mx-auto px-6 lg:px-12 flex items-center justify-between">
    
    <!-- Logo Left -->
    <a href="/home2026" class="flex items-center">
      <img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Festival 2026" class="h-10 w-auto object-contain brightness-0 invert">
    </a>

    <!-- Navigation Links Right -->
    <div class="hidden md:flex items-center space-x-10">
      
      <!-- Home -->
      <a href="/home2026" class="text-base tracking-wide transition-all duration-200 py-1 border-b-2 {{ request()->is('home2026') || request()->is('2026') || request()->is('/') ? 'border-white text-white font-medium' : 'border-transparent text-gray-300 hover:text-white' }}">
        Home
      </a>

      <!-- About Us Dropdown -->
      <div class="relative" data-dropdown>
        <button type="button" class="text-base tracking-wide flex items-center gap-1.5 transition-all duration-200 py-1 border-b-2 {{ request()->is('aboutus*') ? 'border-white text-white font-medium' : 'border-transparent text-gray-300 hover:text-white' }}" data-dropdown-button>
          <span>About Us</span>
        </button>
        
        <div data-dropdown-menu class="absolute right-0 mt-3 w-52 rounded-lg bg-[#181920] border border-white/10 shadow-2xl py-2 transition-all duration-200 origin-top-right opacity-0 scale-95 pointer-events-none">
          <a href="/aboutus/director" class="block px-4 py-2.5 text-sm text-gray-300 hover:text-white hover:bg-white/5 transition-colors">
            Director Profile
          </a>
          <a href="/aboutus/history" class="block px-4 py-2.5 text-sm text-gray-300 hover:text-white hover:bg-white/5 transition-colors">
            History of SIPA
          </a>
        </div>
      </div>

      <!-- Line Up -->
      <a href="/lineup" class="text-base tracking-wide transition-all duration-200 py-1 border-b-2 {{ request()->is('lineup') ? 'border-white text-white font-medium' : 'border-transparent text-gray-300 hover:text-white' }}">
        Line Up
      </a>

      <!-- Gallery -->
      <div class="relative" data-dropdown>
        <button type="button" class="text-base tracking-wide flex items-center gap-1.5 transition-all duration-200 py-1 border-b-2 {{ request()->is('gallery*') ? 'border-white text-white font-medium' : 'border-transparent text-gray-300 hover:text-white' }}" data-dropdown-button>
          <span>Gallery</span>
        </button>
        
        <div data-dropdown-menu class="absolute right-0 mt-3 w-48 rounded-lg bg-[#181920] border border-white/10 shadow-2xl py-2 transition-all duration-200 origin-top-right opacity-0 scale-95 pointer-events-none max-h-64 overflow-y-auto">
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

      <!-- Language Selector Pill Button (Figma Styled ID / EN Dropdown) -->
      <div class="relative" data-dropdown>
        <button type="button" class="flex items-center gap-2 bg-white/10 hover:bg-white/15 border border-white/15 px-3.5 py-1.5 rounded-full text-xs font-bold text-white tracking-wider transition-all duration-200 hover:border-white/30 cursor-pointer shadow-sm" data-dropdown-button>
          <i class="fa-solid fa-globe text-xs text-gray-300"></i>
          <span>ID</span>
          <i class="fa-solid fa-chevron-down text-[9px] text-gray-400"></i>
        </button>
        
        <div data-dropdown-menu class="absolute right-0 mt-2.5 w-36 rounded-xl bg-[#181920] border border-white/15 shadow-2xl py-1.5 transition-all duration-200 origin-top-right opacity-0 scale-95 pointer-events-none z-50">
          <a href="?lang=id" class="flex items-center justify-between px-3.5 py-2 text-xs font-semibold text-white bg-white/5 transition-colors">
            <span class="flex items-center gap-2">
              <span class="text-sm">🇮🇩</span> ID (Bahasa)
            </span>
            <i class="fa-solid fa-check text-[10px] text-[#e63946]"></i>
          </a>
          <a href="?lang=en" class="flex items-center justify-between px-3.5 py-2 text-xs font-semibold text-gray-300 hover:text-white hover:bg-white/5 transition-colors">
            <span class="flex items-center gap-2">
              <span class="text-sm">🇬🇧</span> EN (English)
            </span>
          </a>
        </div>
      </div>

    </div>

    <!-- Mobile Hamburger Toggle & Quick Lang Pill -->
    <div class="md:hidden flex items-center gap-3">
      <!-- Quick Language Pill for Mobile -->
      <a href="?lang=en" class="flex items-center gap-1.5 bg-white/10 border border-white/15 px-3 py-1 rounded-full text-xs font-bold text-white">
        <i class="fa-solid fa-globe text-[11px] text-gray-300"></i>
        <span>ID</span>
      </a>

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
      <a href="/home2026" class="py-2 text-base {{ request()->is('home2026') || request()->is('2026') ? 'text-white border-b border-white w-fit font-medium' : 'text-gray-300' }}">
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
      <div class="pt-3 border-t border-white/10 flex items-center justify-between">
        <span class="text-sm text-gray-400">Language / Bahasa</span>
        <div class="flex items-center gap-2">
          <a href="?lang=id" class="px-3 py-1 rounded-full text-xs font-bold bg-white text-black">ID</a>
          <a href="?lang=en" class="px-3 py-1 rounded-full text-xs font-bold bg-white/10 text-gray-300 hover:text-white">EN</a>
        </div>
      </div>
    </div>
  </div>
</nav>

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
      if (menu) {
        menu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
      }
    });
  }

  dropdowns.forEach(dd => {
    const btn = dd.querySelector('[data-dropdown-button]');
    const menu = dd.querySelector('[data-dropdown-menu]');

    if (btn && menu) {
      btn.addEventListener('click', function(e) {
        e.stopPropagation();
        const isClosed = menu.classList.contains('opacity-0');
        closeAllDropdowns();
        if (isClosed) {
          menu.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
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
