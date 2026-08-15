@extends('admin.layouts.main')

@section('content')

<div class="space-y-6 max-w-4xl mx-auto">

    <!-- Page Header & Back Button -->
    <div class="flex items-center justify-between gap-4">
        <div>
            <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 tracking-tight flex items-center gap-2.5">
                <i class="bi bi-person-plus-fill text-[#4F1C51]"></i>
                Tambah User & Atur Hak Akses
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 font-medium mt-1">
                Buat akun administrator baru dan tentukan batasan fitur apa saja yang diizinkan untuk dikelola.
            </p>
        </div>
        <a href="{{ route('admin.users.index') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 text-xs sm:text-sm font-bold transition-all shadow-sm">
            <i class="bi bi-arrow-left text-xs"></i>
            <span>Kembali</span>
        </a>
    </div>

    <!-- Error Messages Alert -->
    @if ($errors->any())
        <div class="bg-rose-50 border border-rose-200 rounded-2xl p-4 text-rose-800 text-xs">
            <div class="flex items-center gap-2 font-bold mb-1">
                <i class="bi bi-exclamation-triangle-fill text-rose-600"></i>
                <span>Terdapat beberapa kesalahan:</span>
            </div>
            <ul class="list-disc list-inside space-y-0.5 text-rose-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Container Card -->
    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- SECTION 1: ACCOUNT INFORMATION -->
        <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-7 space-y-5">
            <h3 class="text-sm font-extrabold tracking-wider text-[#4F1C51] uppercase flex items-center gap-2 border-b border-gray-100 pb-3">
                <i class="bi bi-person-badge"></i>
                1. Informasi Akun & Identitas
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name') }}" 
                           placeholder="Contoh: Budi Santoso" 
                           required 
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all shadow-xs" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">
                        Alamat Email Login <span class="text-rose-500">*</span>
                    </label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}" 
                           placeholder="admin@sipafestival.com" 
                           required 
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all shadow-xs" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">
                        Password Login <span class="text-rose-500">*</span>
                    </label>
                    <input type="password" 
                           name="password" 
                           id="password" 
                           placeholder="Minimal 6 karakter" 
                           required 
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all shadow-xs" />
                </div>

                <!-- Job Title / Divisi -->
                <div>
                    <label for="title" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">
                        Jabatan / Divisi
                    </label>
                    <input type="text" 
                           name="title" 
                           id="title" 
                           value="{{ old('title', 'Humas & Media') }}" 
                           placeholder="Contoh: Divisi Acara & Line Up, Media, dll." 
                           class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all shadow-xs" />
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="block text-xs font-bold uppercase tracking-wider text-gray-500 mb-2">
                        Tipe Peran (Role) <span class="text-rose-500">*</span>
                    </label>
                    <select name="role" 
                            id="role" 
                            onchange="handleRoleChange(this.value)" 
                            required 
                            class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm font-semibold focus:ring-2 focus:ring-[#4F1C51] focus:border-[#4F1C51] bg-gray-50/50 hover:bg-white transition-all shadow-xs">
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin (Dapat disesuaikan fitur)</option>
                        <option value="staff" {{ old('role') === 'staff' ? 'selected' : '' }}>Staff Operator (Fitur terbatas)</option>
                        <option value="superadmin" {{ old('role') === 'superadmin' ? 'selected' : '' }}>Super Administrator (Akses Penuh)</option>
                    </select>
                </div>

                <!-- Status Aktif -->
                <div class="flex items-center gap-3 pt-6">
                    <input type="hidden" name="is_active" value="0">
                    <input type="checkbox" 
                           name="is_active" 
                           id="is_active" 
                           value="1" 
                           {{ old('is_active', '1') == '1' ? 'checked' : '' }} 
                           class="w-4 h-4 rounded text-[#4F1C51] focus:ring-[#4F1C51] border-gray-300">
                    <label for="is_active" class="text-xs font-bold text-gray-700 select-none cursor-pointer">
                        Akun Aktif (Dapat langsung login ke CMS)
                    </label>
                </div>
            </div>
        </div>

        <!-- SECTION 2: PERMISSIONS MATRIX (BATASAN FITUR) -->
        <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-6 sm:p-7 space-y-5" id="permissions-section">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-b border-gray-100 pb-4">
                <div>
                    <h3 class="text-sm font-extrabold tracking-wider text-[#4F1C51] uppercase flex items-center gap-2">
                        <i class="bi bi-shield-check"></i>
                        2. Batasan Fitur & Hak Akses
                    </h3>
                    <p class="text-xs text-gray-500 font-medium mt-0.5">
                        Centang fitur-fitur yang boleh dibuka dan dikelola oleh user ini di menu samping (sidebar).
                    </p>
                </div>

                <!-- Quick Check Toggles -->
                <div class="flex items-center gap-2" id="toggle-buttons">
                    <button type="button" 
                            onclick="selectAllPermissions(true)" 
                            class="px-3 py-1.5 rounded-lg bg-purple-50 hover:bg-purple-100 text-[#4F1C51] text-xs font-bold transition-all border border-purple-200">
                        Pilih Semua
                    </button>
                    <button type="button" 
                            onclick="selectAllPermissions(false)" 
                            class="px-3 py-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold transition-all border border-gray-200">
                        Kosongkan
                    </button>
                </div>
            </div>

            <!-- Super Admin Notice Banner (hidden by default) -->
            <div id="superadmin-banner" class="hidden p-4 rounded-xl bg-amber-50 border border-amber-200 text-amber-900 text-xs">
                <div class="flex items-center gap-2 font-bold mb-1">
                    <i class="bi bi-award-fill text-amber-600 text-sm"></i>
                    <span>Super Administrator memiliki Akses Penuh tanpa batasan</span>
                </div>
                <p class="text-amber-800 leading-relaxed">
                    User dengan role Super Admin secara otomatis memiliki izin untuk membuka seluruh modul dan fitur di aplikasi SIPA.
                </p>
            </div>

            <!-- Permissions Checkbox Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4" id="permission-grid">
                @foreach ($availablePermissions as $key => $perm)
                    @php
                        $isChecked = in_array($key, old('permissions', ['dashboard', 'news', 'gallery']));
                    @endphp
                    <label class="relative flex items-start gap-3.5 p-4 rounded-2xl border border-gray-200/90 hover:border-[#4F1C51]/40 bg-gray-50/40 hover:bg-purple-50/20 transition-all cursor-pointer group select-none">
                        <input type="checkbox" 
                               name="permissions[]" 
                               value="{{ $key }}" 
                               {{ $isChecked ? 'checked' : '' }} 
                               class="perm-checkbox w-4 h-4 rounded text-[#4F1C51] focus:ring-[#4F1C51] border-gray-300 mt-1 shrink-0">
                        
                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between gap-2 mb-1">
                                <span class="text-xs font-bold text-gray-900 group-hover:text-[#4F1C51] transition-colors flex items-center gap-1.5">
                                    <i class="bi {{ $perm['icon'] }} text-[#4F1C51]"></i>
                                    {{ $perm['label'] }}
                                </span>
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-gray-200/70 text-gray-600">
                                    {{ $perm['category'] }}
                                </span>
                            </div>
                            <p class="text-[11px] text-gray-500 leading-relaxed font-medium">
                                {{ $perm['desc'] }}
                            </p>
                        </div>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Submit Button Card -->
        <div class="bg-white rounded-2xl border border-gray-150 shadow-sm p-4 sm:p-5 flex items-center justify-end gap-3">
            <a href="{{ route('admin.users.index') }}" 
               class="px-5 py-2.5 rounded-xl border border-gray-200 bg-white hover:bg-gray-100 text-gray-700 text-xs sm:text-sm font-bold transition-all">
                Batal
            </a>
            <button type="submit" 
                    class="px-6 py-2.5 rounded-xl bg-[#4F1C51] hover:bg-[#3e1540] text-white text-xs sm:text-sm font-bold transition-all shadow-md">
                Simpan User Baru
            </button>
        </div>

    </form>

</div>

<script>
function selectAllPermissions(checked) {
    document.querySelectorAll('.perm-checkbox').forEach(cb => {
        cb.checked = checked;
    });
}

function handleRoleChange(role) {
    const banner = document.getElementById('superadmin-banner');
    const grid = document.getElementById('permission-grid');
    const toggleBtns = document.getElementById('toggle-buttons');

    if (role === 'superadmin') {
        banner.classList.remove('hidden');
        selectAllPermissions(true);
    } else {
        banner.classList.add('hidden');
    }
}

// Initial check on load
document.addEventListener('DOMContentLoaded', () => {
    handleRoleChange(document.getElementById('role').value);
});
</script>

@endsection
