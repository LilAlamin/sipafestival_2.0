<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'year',
        'theme_title',
        'location',
        'description',
        'maskot_image',
        'aftermovie_url',
        'photos',
        'is_published',
        'order',
    ];

    protected $casts = [
        'year' => 'integer',
        'photos' => 'array',
        'is_published' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get properly formatted YouTube embed URL.
     */
    public function getEmbedUrlAttribute()
    {
        if (empty($this->aftermovie_url)) {
            return null;
        }

        $url = trim($this->aftermovie_url);

        if (str_contains($url, 'youtube.com/embed/')) {
            return $url;
        }

        // Match youtu.be/ID
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/'.$matches[1];
        }

        // Match youtube.com/watch?v=ID
        if (preg_match('/(?:v=|v\/|embed\/|watch\?v=|\&v=)([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/'.$matches[1];
        }

        // Match shorts
        if (preg_match('/shorts\/([a-zA-Z0-9_\-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/'.$matches[1];
        }

        return $url;
    }

    /**
     * Get safe maskot image asset url.
     */
    public function getMaskotSrcAttribute()
    {
        if (! empty($this->maskot_image)) {
            if (file_exists(public_path('images/'.$this->maskot_image))) {
                return asset('images/'.$this->maskot_image);
            }
            if (file_exists(public_path($this->maskot_image))) {
                return asset($this->maskot_image);
            }
        }

        // Fallback
        if (file_exists(public_path('images/maskot/'.$this->year.'.webp'))) {
            return asset('images/maskot/'.$this->year.'.webp');
        }

        return asset('images/maskot/2025.webp');
    }
}
