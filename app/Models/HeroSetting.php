<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSetting extends Model
{
    protected $fillable = [
        'subtitle',
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
        'video',
        'use_video',
        'is_active',
    ];

    protected $casts = [
        'use_video' => 'boolean',
        'is_active' => 'boolean',
    ];
}