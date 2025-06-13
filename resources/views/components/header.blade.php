<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sipafestival 2025 (Tailwind Version)</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <style>
    body { font-family: 'Poppins', sans-serif; }
    .nav-link-active { color: #B8141E; }
  </style>
</head>
<body class="bg-gray-100">

<nav class="navbar-custom  bg-white shadow-md fixed top-0 left-0 right-0 z-50 border-b-2 border-b-[#B8141E]">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center py-3">
      
      <a href="/"><img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Logo" class="h-12"></a>

      <div class="hidden md:flex items-center space-x-6">
        <a class="font-bold hover:text-red-500 {{ request()->is('/') ? 'nav-link-active' : '' }}" href="/">HOME</a>
        
        <div class="relative" data-dropdown>
          <button class="font-bold hover:text-red-500 flex items-center" data-dropdown-button>
            ABOUT US <i class="fa-solid fa-chevron-down text-xs ml-2"></i>
          </button>
          <div data-dropdown-menu class="absolute bg-white shadow-lg rounded-md mt-2 py-2 w-48 transition-all duration-200 ease-in-out transform origin-top opacity-0 scale-95 pointer-events-none">
            <a href="/aboutus/director" class="block px-4 py-2 text-sm hover:bg-gray-100">DIRECTOR PROFILE</a>
            <a href="/aboutus/history" class="block px-4 py-2 text-sm hover:bg-gray-100">HISTORY OF SIPA</a>
          </div>
        </div>
        
        <a class="font-bold hover:text-red-500 {{ request()->is('lineup') ? 'nav-link-active' : '' }}" href="/lineup">LINE UP</a>
        <a class="font-bold hover:text-red-500 {{ request()->is('gallery') ? 'nav-link-active' : '' }}" href="/gallery">GALLERY</a>

        <!-- <div class="relative" data-dropdown>
          <button class="font-bold hover:text-red-500 flex items-center" data-dropdown-button>
            GALLERY <i class="fa-solid fa-chevron-down text-xs ml-2"></i>
          </button>
          <div data-dropdown-menu class="absolute bg-white shadow-lg rounded-md mt-2 py-2 w-48 transition-all duration-200 ease-in-out transform origin-top opacity-0 scale-95 pointer-events-none">
            @for ($year = 2024; $year >= 2009; $year--)
              <a href="/gallery/{{ $year }}" class="block px-4 py-2 text-sm hover:bg-gray-100">SIPA {{ $year }}</a>
            @endfor
          </div>
        </div> -->
        
        <a class="lang-switch bg-gray-200 px-3 py-1 rounded-full text-sm font-bold" href="{{ route('lang.switch', app()->getLocale() == 'id' ? 'en' : 'id') }}">
            {{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}
        </a>
      </div>

      <div class="md:hidden"><button id="menu-toggle" class="text-gray-800 focus:outline-none"><i class="fa-solid fa-bars text-2xl" id="menu-icon"></i></button></div>
    </div>

    <div id="mobile-menu" class="md:hidden absolute top-full left-0 w-full bg-white shadow-md pb-4 transition-all duration-300 ease-in-out transform origin-top opacity-0 scale-95 pointer-events-none">
    
        <a href="/" class="block py-3 px-6 text-sm font-bold hover:bg-gray-100 {{ request()->is('/') ? 'nav-link-active' : '' }}">HOME</a>

        <div class="mobile-dropdown">
            <button class="mobile-dropdown-toggle w-full flex justify-between items-center py-3 px-6 text-sm font-bold hover:bg-gray-100">
                <span>ABOUT US</span>
                <i class="fa-solid fa-chevron-down text-xs transition-transform duration-300"></i>
            </button>
            <div class="mobile-submenu overflow-hidden max-h-0 transition-all duration-300 ease-in-out">
                <a href="/aboutus/director" class="block py-3 pl-10 pr-6 text-sm hover:bg-gray-50">DIRECTOR PROFILE</a>
                <a href="/aboutus/history" class="block py-3 pl-10 pr-6 text-sm hover:bg-gray-50">HISTORY OF SIPA</a>
            </div>
        </div>

        <a href="/lineup" class="block py-3 px-6 text-sm font-bold hover:bg-gray-100 {{ request()->is('lineup') ? 'nav-link-active' : '' }}">LINE UP</a>
        <a href="/lineup" class="block py-3 px-6 text-sm font-bold hover:bg-gray-100 {{ request()->is('gallery') ? 'nav-link-active' : '' }}">GALLERY</a>
        
        <a class="block mt-2 mx-4 py-2 px-4 text-sm text-center rounded-lg bg-gray-100 hover:bg-gray-200" href="{{ route('lang.switch', app()->getLocale() == 'id' ? 'en' : 'id') }}">
          {{ app()->getLocale() == 'id' ? 'ID' : 'EN' }}
        </a>
    </div>
  </div>
</nav>

<script>
// GANTI SELURUH ISI TAG SCRIPT DENGAN INI
document.addEventListener('DOMContentLoaded', function() {
    
    // --- LOGIKA UNTUK MENU UTAMA (DESKTOP & HAMBURGER) ---
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');

    if (menuToggle && mobileMenu && menuIcon) {
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('opacity-0');
            mobileMenu.classList.toggle('scale-95');
            mobileMenu.classList.toggle('pointer-events-none');

            const isHidden = mobileMenu.classList.contains('opacity-0');
            if (isHidden) {
                menuIcon.classList.remove('fa-xmark');
                menuIcon.classList.add('fa-bars');
            } else {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-xmark');
            }
        });
    }

    // --- LOGIKA UNTUK DROPDOWN DESKTOP ---
    const dropdowns = document.querySelectorAll('[data-dropdown]');
    
    function closeAllDropdowns() {
        dropdowns.forEach(dropdown => {
            const menu = dropdown.querySelector('[data-dropdown-menu]');
            if (menu) {
                menu.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
            }
        });
    }

    dropdowns.forEach(dropdown => {
        const button = dropdown.querySelector('[data-dropdown-button]');
        const menu = dropdown.querySelector('[data-dropdown-menu]');
        if (button && menu) {
            button.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = menu.classList.contains('opacity-0');
                closeAllDropdowns();
                if (isHidden) {
                    menu.classList.remove('opacity-0', 'scale-95', 'pointer-events-none');
                }
            });
        }
    });

    window.addEventListener('click', () => {
        closeAllDropdowns();
    });
    

    // --- LOGIKA BARU UNTUK DROPDOWN/ACCORDION MOBILE ---
    const mobileDropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');

    mobileDropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            // Dapatkan submenu yang terkait
            const submenu = this.nextElementSibling;
            
            // Toggle class 'open' pada tombol untuk rotasi ikon
            this.classList.toggle('open');
            
            // Cek apakah submenu sedang terbuka atau tertutup
            if (submenu.style.maxHeight) {
                // Jika terbuka (ada maxHeight), tutup
                submenu.style.maxHeight = null;
            } else {
                // Jika tertutup, buka dengan mengatur maxHeight sesuai tinggi kontennya
                submenu.style.maxHeight = submenu.scrollHeight + "px";
            } 
        });
    });

});
</script>

</body>
</html>