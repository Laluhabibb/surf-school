<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurfPackage extends Model
{
    protected $fillable = [
    'name',
    'slug',
    'price',
    'duration',
    'description',
    'image',
    'is_active',
];
}
