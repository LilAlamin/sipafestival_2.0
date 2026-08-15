<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Performer extends Model
{
    use HasFactory;

    protected $table = 'performers';

    protected $fillable = [
        'name',
        'country',
        'country_badge',
        'category',
        'type',
        'image_path',
        'is_featured_home',
        'order',
        'description',
    ];

    protected $casts = [
        'is_featured_home' => 'boolean',
        'order' => 'integer',
    ];
}
