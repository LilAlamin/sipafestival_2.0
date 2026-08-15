@php
  $currentRoute = request()->path();
  $user = Auth::user();
  
  // Active states calculations
  $isHomepage = $currentRoute === 'admin/dashboard';
  $isHomeSettings = str_starts_with($currentRoute, 'admin/dashboard/home-settings');
  $isHistoryEbook = str_starts_with($currentRoute, 'admin/dashboard/history-ebook');
  $isPerformers = str_starts_with($currentRoute, 'admin/dashboard/performers');
  $isNews = str_starts_with($currentRoute, 'admin/dashboard/news') && !str_contains($currentRoute, 'makeNews');
  $isAddNews = $currentRoute === 'admin/dashboard/news/makeNews';
  $isGallery = str_starts_with($currentRoute, 'admin/dashboard/gallery');
  $isUsers = str_starts_with($currentRoute, 'admin/dashboard/users');
  
  $isComplaints = $currentRoute === 'admin/dashboard/complaints';
  $isUnread = $currentRoute === 'admin/dashboard/unread';
  $isRead = $currentRoute === 'admin/dashboard/read';
  
  // Feedback is active if we are on any complaint/feedback page
  $isFeedbackActive = $isComplaints || $isUnread || $isRead || preg_match('#^admin/dashboard/\d+/reply$#', $currentRoute);
@endphp

<!-- Sidebar Container -->
<div class="flex flex-col w-[252px] bg-[#212529] h-screen sticky top-0 py-5 px-0 items-center shrink-0 border-r border-[#343A40] select-none font-['Plus_Jakarta_Sans',_sans-serif] overflow-y-auto gap-5 scrollbar-thin">
  
  <!-- Brand Logo -->
  <div class="w-[204px] flex justify-start items-center py-2 px-1 shrink-0">
    <a href="/" class="hover:opacity-90 transition-opacity">
      <img src="/images/sipalogo.png" alt="SIPA Logo" class="h-14 w-auto object-contain brightness-0 invert" />
    </a>
  </div>

  <!-- Divider -->
  <div class="w-full h-0 border-t border-[#343A40] shrink-0"></div>

  <!-- Quick Action Buttons -->
  <div class="w-[204px] flex flex-col gap-3 shrink-0">
    <!-- Add News Action Button -->
    @if($user && $user->hasPermission('news'))
    <a href="/admin/dashboard/news/makeNews" 
       class="w-full p-3 rounded-lg bg-[#495057] hover:bg-[#495057]/90 text-white flex items-center gap-3 transition-all relative overflow-hidden shadow-[11px_15px_5px_0px_rgba(0,0,0,0),7px_9px_5px_0px_rgba(0,0,0,0.01),4px_5px_4px_0px_rgba(0,0,0,0.03),2px_2px_3px_0px_rgba(0,0,0,0.05),0px_1px_2px_0px_rgba(0,0,0,0.05)] {{ $isAddNews ? 'ring-2 ring-[#C36100]' : '' }}">
      
      <!-- Decorative circle -->
      <div class="absolute -left-1.5 -bottom-1.5 w-6 h-6 rounded-full bg-[#C36100] opacity-90"></div>
      
      <div class="w-5 h-5 flex items-center justify-center text-white/90 z-10">
        <i class="bi bi-plus-lg text-lg"></i>
      </div>
      <span class="text-sm font-semibold tracking-wide z-10">Add News</span>
    </a>
    @endif

    <!-- Search Input Wrapper -->
    <div class="w-full p-3 rounded-lg bg-[#212529] border border-[#343A40] flex items-center gap-3 text-white focus-within:border-gray-500 transition-colors">
      <div class="w-5 h-5 flex items-center justify-center text-white/70">
        <i class="bi bi-search text-sm"></i>
      </div>
      <form action="/admin/dashboard/" method="GET" class="w-full m-0 p-0 flex">
        <input type="text" name="search" placeholder="Search..." 
               class="bg-transparent text-sm w-full focus:outline-none text-white placeholder-gray-500 font-medium" />
      </form>
    </div>
  </div>

  <!-- Divider -->
  <div class="w-full h-0 border-t border-[#343A40] shrink-0"></div>

  <!-- SECTION 1: SUPERADMIN MENU (PLACED ABOVE MAIN FEATURES) -->
  @if($user && ($user->isSuperAdmin() || $user->hasPermission('users')))
  <div class="w-full flex flex-col shrink-0 space-y-0.5">
    
    <!-- Superadmin Section Header -->
    <div class="w-full px-6 pb-2 flex justify-start items-center">
      <span class="text-amber-400/90 text-xs font-bold uppercase tracking-wider flex items-center gap-1.5">
        <i class="bi bi-shield-lock-fill text-[11px] text-amber-400"></i>
        Superadmin Menu
      </span>
    </div>

    <!-- Superadmin Menu Dropdown -->
    <details class="w-full group" {{ $isUsers ? 'open' : '' }}>
      <summary class="w-full h-11 px-6 flex items-center justify-between cursor-pointer list-none transition-all relative text-[#F8F9FA]/80 hover:text-white hover:bg-[#343A40]/30 select-none [&::-webkit-details-marker]:hidden {{ $isUsers ? 'bg-[#343A40] text-[#F8F9FA]' : '' }}">
        <div class="flex items-center gap-3">
          <div class="w-5 h-5 flex items-center justify-center text-amber-400">
            <i class="bi bi-person-gear text-base"></i>
          </div>
          <span class="text-sm font-medium">Kelola User & Akses</span>
        </div>

        <!-- Chevron Arrow -->
        <div class="w-4 h-4 flex items-center justify-center text-[#F8F9FA]/50 group-open:rotate-180 transition-transform duration-200 mr-1">
          <i class="bi bi-chevron-down text-xs"></i>
        </div>

        @if($isUsers)
          <div class="absolute right-0 top-0 w-[5px] h-11 bg-[#F8F9FA] rounded-l-[4px]"></div>
        @endif
      </summary>

      <!-- Sub-menu for Superadmin Features -->
      <div class="w-full flex flex-col bg-[#1a1d20]/40 border-b border-[#343A40]/30 py-1 transition-all">
        <a href="{{ route('admin.users.index') }}" 
           class="pl-14 pr-6 py-2 text-xs font-semibold tracking-wide transition-colors flex items-center gap-1.5
                  {{ $isUsers && !request()->routeIs('admin.users.create') ? 'text-[#F8F9FA]' : 'text-gray-400 hover:text-white' }}">
          <i class="bi bi-people-fill mr-1.5 opacity-70"></i> Daftar User
        </a>
        <a href="{{ route('admin.users.create') }}" 
           class="pl-14 pr-6 py-2 text-xs font-semibold tracking-wide transition-colors flex items-center gap-1.5
                  {{ request()->routeIs('admin.users.create') ? 'text-[#F8F9FA]' : 'text-gray-400 hover:text-white' }}">
          <i class="bi bi-person-plus-fill mr-1.5 opacity-70"></i> Tambah User Baru
        </a>
      </div>
    </details>

  </div>

  <!-- Divider -->
  <div class="w-full h-0 border-t border-[#343A40] shrink-0"></div>
  @endif

  <!-- SECTION 2: MAIN FEATURES -->
  <div class="w-full flex flex-col shrink-0 space-y-0.5">
    
    <!-- Main Features Header -->
    <div class="w-full px-6 pb-2 flex justify-start items-center">
      <span class="text-[#F8F9FA]/50 text-xs font-bold uppercase tracking-wider">Main Features</span>
    </div>

    <!-- Homepage / Dashboard -->
    @if($user && $user->hasPermission('dashboard'))
    <a href="{{ route('admin.dashboard') }}" 
       class="w-full h-11 px-6 flex items-center justify-between transition-all relative group 
              {{ $isHomepage ? 'bg-[#343A40] text-[#F8F9FA]' : 'text-[#F8F9FA]/80 hover:text-white hover:bg-[#343A40]/30' }}">
      <div class="flex items-center gap-3">
        <div class="w-5 h-5 flex items-center justify-center">
          <i class="bi bi-house-door text-base"></i>
        </div>
        <span class="text-sm font-medium">Homepage</span>
      </div>
      
      @if($isHomepage)
        <div class="absolute right-0 top-0 w-[5px] h-11 bg-[#F8F9FA] rounded-l-[4px]"></div>
      @endif
    </a>
    @endif

    <!-- Pengaturan Beranda -->
    @if($user && $user->hasPermission('home_settings'))
    <a href="{{ route('admin.homeSettings') }}" 
       class="w-full h-11 px-6 flex items-center justify-between transition-all relative group 
              {{ $isHomeSettings ? 'bg-[#343A40] text-[#F8F9FA]' : 'text-[#F8F9FA]/80 hover:text-white hover:bg-[#343A40]/30' }}">
      <div class="flex items-center gap-3">
        <div class="w-5 h-5 flex items-center justify-center">
          <i class="bi bi-sliders text-base"></i>
        </div>
        <span class="text-sm font-medium">Pengaturan Beranda</span>
      </div>
      
      @if($isHomeSettings)
        <div class="absolute right-0 top-0 w-[5px] h-11 bg-[#F8F9FA] rounded-l-[4px]"></div>
      @endif
    </a>
    @endif

    <!-- E-Book History PDF -->
    @if($user && $user->hasPermission('history_ebook'))
    <a href="{{ route('admin.historyEbook') }}" 
       class="w-full h-11 px-6 flex items-center justify-between transition-all relative group 
              {{ $isHistoryEbook ? 'bg-[#343A40] text-[#F8F9FA]' : 'text-[#F8F9FA]/80 hover:text-white hover:bg-[#343A40]/30' }}">
      <div class="flex items-center gap-3">
        <div class="w-5 h-5 flex items-center justify-center">
          <i class="bi bi-file-earmark-pdf text-base"></i>
        </div>
        <span class="text-sm font-medium">E-Book History</span>
      </div>
      
      @if($isHistoryEbook)
        <div class="absolute right-0 top-0 w-[5px] h-11 bg-[#F8F9FA] rounded-l-[4px]"></div>
      @endif
    </a>
    @endif

    <!-- Line Up & Performers -->
    @if($user && $user->hasPermission('performers'))
    <a href="{{ route('admin.performers.index') }}" 
       class="w-full h-11 px-6 flex items-center justify-between transition-all relative group 
              {{ $isPerformers ? 'bg-[#343A40] text-[#F8F9FA]' : 'text-[#F8F9FA]/80 hover:text-white hover:bg-[#343A40]/30' }}">
      <div class="flex items-center gap-3">
        <div class="w-5 h-5 flex items-center justify-center">
          <i class="bi bi-people text-base"></i>
        </div>
        <span class="text-sm font-medium">Line Up & Performers</span>
      </div>
      
      @if($isPerformers)
        <div class="absolute right-0 top-0 w-[5px] h-11 bg-[#F8F9FA] rounded-l-[4px]"></div>
      @endif
    </a>
    @endif

    <!-- News -->
    @if($user && $user->hasPermission('news'))
    <a href="{{ route('news.showNews') }}" 
       class="w-full h-11 px-6 flex items-center justify-between transition-all relative group 
              {{ $isNews ? 'bg-[#343A40] text-[#F8F9FA]' : 'text-[#F8F9FA]/80 hover:text-white hover:bg-[#343A40]/30' }}">
      <div class="flex items-center gap-3">
        <div class="w-5 h-5 flex items-center justify-center">
          <i class="bi bi-newspaper text-base"></i>
        </div>
        <span class="text-sm font-medium">News</span>
      </div>
      
      @if($isNews)
        <div class="absolute right-0 top-0 w-[5px] h-11 bg-[#F8F9FA] rounded-l-[4px]"></div>
      @endif
    </a>
    @endif

    <!-- Galery -->
    @if($user && $user->hasPermission('gallery'))
    <a href="{{ route('admin.gallery.index') }}" 
       class="w-full h-11 px-6 flex items-center justify-between transition-all relative group 
              {{ $isGallery ? 'bg-[#343A40] text-[#F8F9FA]' : 'text-[#F8F9FA]/80 hover:text-white hover:bg-[#343A40]/30' }}">
      <div class="flex items-center gap-3">
        <div class="w-5 h-5 flex items-center justify-center">
          <i class="bi bi-images text-base"></i>
        </div>
        <span class="text-sm font-medium">Galery</span>
      </div>
      
      @if($isGallery)
        <div class="absolute right-0 top-0 w-[5px] h-11 bg-[#F8F9FA] rounded-l-[4px]"></div>
      @endif
    </a>
    @endif

    <!-- Feedback & Suggestion -->
    @if($user && $user->hasPermission('feedback'))
    <details class="w-full group" {{ $isFeedbackActive ? 'open' : '' }}>
      <summary class="w-full h-11 px-6 flex items-center justify-between cursor-pointer list-none transition-all relative text-[#F8F9FA]/80 hover:text-white hover:bg-[#343A40]/30 select-none [&::-webkit-details-marker]:hidden {{ $isFeedbackActive ? 'bg-[#343A40] text-[#F8F9FA]' : '' }}">
        <div class="flex items-center gap-3">
          <div class="w-5 h-5 flex items-center justify-center">
            <i class="bi bi-chat-left-text text-base"></i>
          </div>
          <span class="text-sm font-medium">Feedback & Suggestion</span>
        </div>

        <!-- Chevron Arrow -->
        <div class="w-4 h-4 flex items-center justify-center text-[#F8F9FA]/50 group-open:rotate-180 transition-transform duration-200 mr-1">
          <i class="bi bi-chevron-down text-xs"></i>
        </div>

        @if($isFeedbackActive)
          <div class="absolute right-0 top-0 w-[5px] h-11 bg-[#F8F9FA] rounded-l-[4px]"></div>
        @endif
      </summary>

      <!-- Sub-menu for Complaint Categories -->
      <div class="w-full flex flex-col bg-[#1a1d20]/40 border-b border-[#343A40]/30 py-1 transition-all">
        <a href="/admin/dashboard/complaints" 
           class="pl-14 pr-6 py-2 text-xs font-semibold tracking-wide transition-colors 
                  {{ $isComplaints ? 'text-[#F8F9FA]' : 'text-gray-400 hover:text-white' }}">
          <i class="bi bi-collection-fill mr-1.5 opacity-70"></i> Seluruh Aduan
        </a>
        <a href="/admin/dashboard/unread" 
           class="pl-14 pr-6 py-2 text-xs font-semibold tracking-wide transition-colors 
                  {{ $isUnread ? 'text-[#F8F9FA]' : 'text-gray-400 hover:text-white' }}">
          <i class="bi bi-envelope-exclamation-fill mr-1.5 opacity-70"></i> Belum Dibalas
        </a>
        <a href="/admin/dashboard/read" 
           class="pl-14 pr-6 py-2 text-xs font-semibold tracking-wide transition-colors 
                  {{ $isRead ? 'text-[#F8F9FA]' : 'text-gray-400 hover:text-white' }}">
          <i class="bi bi-envelope-check-fill mr-1.5 opacity-70"></i> Sudah Dibalas
        </a>
      </div>
    </details>
    @endif

  </div>

  <!-- Divider -->
  <div class="w-full h-0 border-t border-[#343A40] shrink-0"></div>

  <!-- Profile Footer Card -->
  <div class="w-[204px] p-2.5 rounded-lg bg-[#212529] border border-[#343A40] flex items-center justify-between gap-2 shadow-inner shrink-0 mb-6">
    <div class="flex items-center gap-2.5 overflow-hidden">
      <!-- Dynamic Avatar -->
      <img class="w-8 h-8 rounded-full border border-[#495057] object-cover shrink-0" 
           src="https://ui-avatars.com/api/?name={{ urlencode($user->name ?? 'Admin') }}&color=F8F9FA&background=495057&bold=true" 
           alt="{{ $user->name ?? 'Admin' }}" />
      
      <!-- User Names & Role -->
      <div class="flex flex-col justify-center overflow-hidden min-w-0">
        <span class="text-[#F8F9FA] text-xs font-semibold truncate tracking-wide leading-tight" title="{{ $user->name ?? 'Admin' }}">
          {{ $user->name ?? 'Admin' }}
        </span>
        <span class="text-[#F8F9FA]/50 text-[10px] truncate leading-tight mt-0.5" title="{{ $user->title ?? 'Administrator' }}">
          {{ $user->title ?: ($user->isSuperAdmin() ? 'Super Administrator' : ($user->role === 'admin' ? 'Administrator' : 'Staff Operator')) }}
        </span>
      </div>
    </div>

    <!-- Logout Form / Red Button -->
    <form action="{{ route('logout') }}" method="POST" class="m-0 p-0 shrink-0">
      @csrf
      <button type="submit" 
              class="w-8 h-8 rounded-md flex items-center justify-center text-[#E51616] hover:bg-[#E51616]/10 hover:text-red-400 transition-all focus:outline-none cursor-pointer" 
              title="Log Out">
        <i class="bi bi-box-arrow-right text-lg"></i>
      </button>
    </form>
  </div>

</div>