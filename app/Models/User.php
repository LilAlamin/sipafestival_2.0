<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * List of all configurable features for permission assignment.
     */
    public const AVAILABLE_PERMISSIONS = [
        'dashboard' => [
            'label' => 'Dashboard & Ringkasan',
            'desc' => 'Melihat statistik grafik, ringkasan data, dan unduh laporan PDF/Excel',
            'icon' => 'bi-speedometer2',
            'category' => 'Utama',
        ],
        'home_settings' => [
            'label' => 'Pengaturan Beranda',
            'desc' => 'Mengubah judul, tanggal festival, tagline hero, dan deskripsi beranda',
            'icon' => 'bi-sliders',
            'category' => 'Konten Web',
        ],
        'history_ebook' => [
            'label' => 'E-Book History & PDF',
            'desc' => 'Mengunggah dan mengelola file PDF buku sejarah SIPA Flipbook',
            'icon' => 'bi-journal-bookmark-fill',
            'category' => 'Konten Web',
        ],
        'performers' => [
            'label' => 'Line Up & Delegasi',
            'desc' => 'Menambah, mengedit, dan menghapus penampil nasional & internasional',
            'icon' => 'bi-people-fill',
            'category' => 'Konten Web',
        ],
        'news' => [
            'label' => 'Berita & Artikel',
            'desc' => 'Menulis, mengedit, mempublikasikan, dan menghapus artikel berita',
            'icon' => 'bi-newspaper',
            'category' => 'Publikasi',
        ],
        'gallery' => [
            'label' => 'Galeri Visual & Maskot',
            'desc' => 'Mengelola arsip foto tahunan, maskot, tema, dan aftermovie YouTube',
            'icon' => 'bi-images',
            'category' => 'Publikasi',
        ],
        'feedback' => [
            'label' => 'Feedback & Aduan',
            'desc' => 'Membaca dan membalas email keluhan/pertanyaan publik',
            'icon' => 'bi-chat-left-text-fill',
            'category' => 'Layanan',
        ],
        'users' => [
            'label' => 'Kelola User & Hak Akses',
            'desc' => 'Menambah dan mengatur akun admin lain beserta batasan fiturnya',
            'icon' => 'bi-shield-lock-fill',
            'category' => 'Sistem',
        ],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'title',
        'permissions',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'permissions' => 'array',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Check if user is Super Administrator.
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === 'superadmin';
    }

    /**
     * Check if user has specific feature permission.
     */
    public function hasPermission(string $feature): bool
    {
        if (! $this->is_active) {
            return false;
        }

        // Superadmin has unrestricted permission to all features
        if ($this->isSuperAdmin()) {
            return true;
        }

        $perms = is_array($this->permissions) ? $this->permissions : json_decode($this->permissions, true);

        return is_array($perms) && in_array($feature, $perms);
    }

    /**
     * Get the default landing route based on user's assigned permissions.
     */
    public function getDefaultRedirectRoute(): string
    {
        if ($this->hasPermission('dashboard')) {
            return route('admin.dashboard');
        }
        if ($this->hasPermission('news')) {
            return route('news.showNews');
        }
        if ($this->hasPermission('gallery')) {
            return route('admin.gallery.index');
        }
        if ($this->hasPermission('performers')) {
            return route('admin.performers.index');
        }
        if ($this->hasPermission('feedback')) {
            return route('admin.dashboard.showComplaint');
        }
        if ($this->hasPermission('home_settings')) {
            return route('admin.homeSettings');
        }
        if ($this->hasPermission('history_ebook')) {
            return route('admin.historyEbook');
        }
        if ($this->hasPermission('users')) {
            return route('admin.users.index');
        }

        return route('admin.dashboard');
    }
}
