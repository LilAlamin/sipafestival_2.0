@extends('admin.layouts.main')

@section('content')

<div class="space-y-6">

    <!-- Page Header & Action Bar -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight flex items-center gap-2.5">
                <i class="bi bi-shield-lock-fill text-[#4F1C51]"></i>
                Kelola User & Hak Akses
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 font-medium mt-1">
                Atur akun administrator dan batasi fitur apa saja yang dapat diakses oleh masing-masing user/staf.
            </p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="{{ route('admin.users.create') }}" 
               class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-xs sm:text-sm font-bold transition-all shadow-sm">
                <i class="bi bi-person-plus-fill text-sm"></i>
                <span>Tambah User Baru</span>
            </a>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Metric 1: Total User -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-purple-50 border border-purple-100 flex items-center justify-center text-[#4F1C51] text-xl shrink-0 shadow-xs">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="min-w-0">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Total Akun</span>
                <span class="text-xl sm:text-2xl font-black text-gray-900 tracking-tight">{{ $totalAll }} User</span>
            </div>
        </div>

        <!-- Metric 2: Super Admin -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-amber-50 border border-amber-100 flex items-center justify-center text-amber-600 text-xl shrink-0 shadow-xs">
                <i class="bi bi-award-fill"></i>
            </div>
            <div class="min-w-0">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Super Admin</span>
                <span class="text-xl sm:text-2xl font-black text-amber-800 tracking-tight">{{ $totalSuperAdmin }} Akun</span>
            </div>
        </div>

        <!-- Metric 3: Admin & Staff -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-blue-50 border border-blue-100 flex items-center justify-center text-blue-600 text-xl shrink-0 shadow-xs">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <div class="min-w-0">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Admin & Staff</span>
                <span class="text-xl sm:text-2xl font-black text-blue-800 tracking-tight">{{ $totalAdmin + $totalStaff }} User</span>
            </div>
        </div>

        <!-- Metric 4: User Aktif -->
        <div class="bg-white rounded-2xl p-4 sm:p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 text-xl shrink-0 shadow-xs">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="min-w-0">
                <span class="text-xs font-bold text-gray-400 uppercase tracking-wider block">Status Aktif</span>
                <span class="text-xl sm:text-2xl font-black text-emerald-700 tracking-tight">{{ $totalActive }} Aktif</span>
            </div>
        </div>
    </div>

    <!-- Table Card Container -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        
        <!-- Filter Toolbar -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between p-5 gap-4 border-b border-gray-100 bg-gray-50/40">
            
            <!-- Role Tabs -->
            <div class="flex items-center gap-2 bg-gray-100/80 p-1.5 rounded-xl text-xs font-bold shrink-0">
                <a href="{{ route('admin.users.index') }}" 
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ !request('role') ? 'bg-white text-[#4F1C51] shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                    <span>Semua Role</span>
                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-gray-200 text-gray-700">{{ $totalAll }}</span>
                </a>
                <a href="{{ route('admin.users.index', ['role' => 'superadmin']) }}" 
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request('role') === 'superadmin' ? 'bg-white text-amber-800 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                    <span>Super Admin</span>
                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-amber-100 text-amber-800">{{ $totalSuperAdmin }}</span>
                </a>
                <a href="{{ route('admin.users.index', ['role' => 'admin']) }}" 
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request('role') === 'admin' ? 'bg-white text-blue-800 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                    <span>Admin</span>
                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-blue-100 text-blue-800">{{ $totalAdmin }}</span>
                </a>
                <a href="{{ route('admin.users.index', ['role' => 'staff']) }}" 
                   class="px-3.5 py-2 rounded-lg transition-all flex items-center gap-1.5 {{ request('role') === 'staff' ? 'bg-white text-emerald-800 shadow-sm' : 'text-gray-600 hover:text-gray-900' }}">
                    <span>Staff</span>
                    <span class="px-1.5 py-0.5 rounded-full text-[10px] bg-emerald-100 text-emerald-800">{{ $totalStaff }}</span>
                </a>
            </div>

            <!-- Search Form -->
            <form action="{{ route('admin.users.index') }}" method="GET" class="flex items-center gap-2 w-full sm:w-auto">
                @if(request('role'))
                    <input type="hidden" name="role" value="{{ request('role') }}">
                @endif
                <div class="relative flex items-center w-full sm:w-80">
                    <i class="bi bi-search absolute left-3.5 text-gray-400 text-sm"></i>
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari nama, email, jabatan..." 
                           class="w-full pl-9 pr-8 py-2 bg-white border border-gray-200 rounded-xl text-xs sm:text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:border-[#4F1C51] focus:ring-2 focus:ring-[#4F1C51]/10 transition-all shadow-sm" />
                    @if(request('search'))
                        <a href="{{ route('admin.users.index', request('role') ? ['role' => request('role')] : []) }}" class="absolute right-2.5 text-gray-400 hover:text-gray-600 text-xs font-bold" title="Hapus pencarian">
                            <i class="bi bi-x-circle-fill"></i>
                        </a>
                    @endif
                </div>
                <button type="submit" class="px-3.5 py-2 bg-[#4F1C51] hover:bg-[#3e1540] text-white text-xs font-bold rounded-xl transition-all shadow-sm shrink-0">
                    Cari
                </button>
            </form>

        </div>

        <!-- Table View -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/80 border-b border-gray-100 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                        <th class="px-5 py-3.5 w-12 text-center">No</th>
                        <th class="px-5 py-3.5 w-72">Identitas User</th>
                        <th class="px-5 py-3.5 w-36">Role & Status</th>
                        <th class="px-5 py-3.5 min-w-[320px]">Hak Akses Fitur</th>
                        <th class="px-5 py-3.5 w-32 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($users as $index => $u)
                    @php
                        $isCurrent = ($u->id === auth()->id());
                        $perms = is_array($u->permissions) ? $u->permissions : [];
                    @endphp
                    <tr class="hover:bg-purple-50/20 transition-colors group">
                        
                        <!-- No -->
                        <td class="px-5 py-4 text-center font-bold text-gray-400 text-xs select-none align-top pt-5">
                            {{ $index + 1 }}
                        </td>

                        <!-- Identitas User -->
                        <td class="px-5 py-4 align-top">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $u->role === 'superadmin' ? 'from-amber-100 to-orange-100 text-amber-900 border-amber-200' : 'from-purple-100 to-pink-100 text-[#4F1C51] border-purple-200' }} border font-black text-sm flex items-center justify-center shrink-0 shadow-xs">
                                    {{ strtoupper(substr($u->name, 0, 2)) }}
                                </div>
                                <div class="min-w-0">
                                    <div class="flex items-center gap-2">
                                        <h4 class="text-sm font-bold text-gray-900 truncate">
                                            {{ $u->name }}
                                        </h4>
                                        @if($isCurrent)
                                            <span class="px-2 py-0.5 rounded-md bg-purple-100 text-[#4F1C51] text-[10px] font-extrabold tracking-wide">
                                                Anda
                                            </span>
                                        @endif
                                    </div>
                                    <a href="mailto:{{ $u->email }}" class="text-xs text-gray-500 hover:text-[#4F1C51] font-medium block truncate mt-0.5">
                                        <i class="bi bi-envelope text-[11px] mr-1"></i>{{ $u->email }}
                                    </a>
                                    <span class="text-[11px] text-gray-400 font-semibold block mt-1">
                                        <i class="bi bi-briefcase text-[10px] mr-1"></i>{{ $u->title ?: 'Staff Administrator' }}
                                    </span>
                                </div>
                            </div>
                        </td>

                        <!-- Role & Status -->
                        <td class="px-5 py-4 align-top whitespace-nowrap">
                            <div class="space-y-2">
                                <!-- Role Badge -->
                                <div>
                                    @if($u->role === 'superadmin')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-black bg-gradient-to-r from-amber-50 to-orange-50 text-amber-900 border border-amber-200/80 shadow-xs">
                                            <i class="bi bi-award-fill text-amber-600"></i>
                                            Super Admin
                                        </span>
                                    @elseif($u->role === 'admin')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-bold bg-blue-50 text-blue-800 border border-blue-200 shadow-xs">
                                            <i class="bi bi-shield-check text-blue-600"></i>
                                            Admin
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-bold bg-gray-100 text-gray-700 border border-gray-200 shadow-xs">
                                            <i class="bi bi-person-fill text-gray-500"></i>
                                            Staff
                                        </span>
                                    @endif
                                </div>

                                <!-- Status Badge -->
                                <div>
                                    @if($u->is_active)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                            <span class="w-1.5 h-1.5 mr-1 bg-emerald-500 rounded-full"></span>
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-700 border border-rose-200">
                                            <span class="w-1.5 h-1.5 mr-1 bg-rose-500 rounded-full"></span>
                                            Nonaktif
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <!-- Permissions Badges -->
                        <td class="px-5 py-4 align-top">
                            @if($u->isSuperAdmin())
                                <div class="p-2.5 rounded-xl bg-purple-50/70 border border-purple-200/60 inline-flex items-center gap-2 text-xs font-bold text-[#4F1C51]">
                                    <i class="bi bi-unlock-fill text-sm"></i>
                                    <span>Akses Penuh Seluruh Fitur (Super Administrator)</span>
                                </div>
                            @elseif(count($perms) === 0)
                                <div class="p-2.5 rounded-xl bg-gray-100 border border-gray-200 inline-flex items-center gap-2 text-xs font-bold text-gray-500">
                                    <i class="bi bi-lock-fill"></i>
                                    <span>Belum ada izin fitur yang diberikan</span>
                                </div>
                            @else
                                <div class="flex flex-wrap gap-1.5 max-w-lg">
                                    @foreach($perms as $pKey)
                                        @if(isset($availablePermissions[$pKey]))
                                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-[11px] font-bold bg-gray-50 hover:bg-purple-50 text-gray-700 hover:text-[#4F1C51] border border-gray-200 hover:border-purple-200 transition-colors shadow-2xs">
                                                <i class="bi {{ $availablePermissions[$pKey]['icon'] }} text-xs text-[#4F1C51]"></i>
                                                <span>{{ $availablePermissions[$pKey]['label'] }}</span>
                                            </span>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </td>

                        <!-- Action Buttons -->
                        <td class="px-5 py-4 text-center align-top whitespace-nowrap pt-5">
                            <div class="flex items-center justify-center gap-1.5">
                                <!-- Edit -->
                                <a href="{{ route('admin.users.edit', $u->id) }}" 
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-purple-50 hover:bg-[#4F1C51] text-[#4F1C51] hover:text-white border border-purple-200 text-xs font-bold transition-all shadow-xs"
                                   title="Ubah Hak Akses & Data User">
                                    <i class="bi bi-pencil-square text-xs"></i>
                                    <span>Edit</span>
                                </a>

                                <!-- Delete -->
                                @if(!$isCurrent)
                                    <form action="{{ route('admin.users.destroy', $u->id) }}" 
                                          method="POST" 
                                          class="inline m-0 p-0"
                                          onsubmit="return confirmDelete(event, 'Hapus User {{ $u->name }}?', 'Apakah Anda yakin ingin menghapus akun user ini dari sistem?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="w-8 h-8 rounded-xl bg-rose-50 hover:bg-rose-600 text-rose-600 hover:text-white flex items-center justify-center transition-all shadow-xs cursor-pointer"
                                                title="Hapus User">
                                            <i class="bi bi-trash3-fill text-xs"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-14 text-center">
                            <div class="w-16 h-16 bg-purple-50 text-[#4F1C51] rounded-2xl flex items-center justify-center mx-auto mb-3 text-2xl shadow-xs">
                                <i class="bi bi-people"></i>
                            </div>
                            <h4 class="text-base font-bold text-gray-800">Tidak ada data user ditemukan</h4>
                            <p class="text-xs text-gray-500 mt-1 max-w-sm mx-auto">
                                @if(request('search'))
                                    Tidak ada user yang cocok dengan kata kunci "<strong>{{ request('search') }}</strong>".
                                @else
                                    Belum ada data user terdaftar pada kategori ini.
                                @endif
                            </p>
                            @if(request('search'))
                                <a href="{{ route('admin.users.index') }}" class="inline-block mt-3 px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-xs font-bold rounded-xl transition-all">
                                    Reset Pencarian
                                </a>
                            @endif
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection
