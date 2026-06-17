<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected $fillable = [
        'surf_package_id',
        'name',
        'email',
        'phone',
        'booking_date',
        'people',
        'notes',
    ];

    public function package()
    {
        return $this->belongsTo(SurfPackage::class);
    }
}
