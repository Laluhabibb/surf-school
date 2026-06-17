<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
     protected $fillable = [
        'whatsapp',
        'email',
        'address',
        'google_maps',
        'instagram',
        'facebook',
        'tiktok',
    ];
}
