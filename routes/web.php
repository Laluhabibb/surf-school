<?php

use Illuminate\Support\Facades\Route;
use App\Models\SurfPackage;
use App\Models\Gallery;
use App\Models\ContactSetting;
use App\Models\Review;
use App\Models\AboutSetting;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $packages = SurfPackage::where('is_active', true)
        ->latest()
        ->take(3)
        ->get();

    $galleries = Gallery::where('is_active', true)
        ->latest()
        ->take(6)
        ->get();

    $reviews = Review::where('is_active', true)
        ->latest()
        ->take(3)
        ->get();

    $contact = ContactSetting::first();

    return view('home', compact(
        'packages',
        'galleries',
        'reviews',
        'contact'
    ));
});

/*
|--------------------------------------------------------------------------
| Packages
|--------------------------------------------------------------------------
*/

Route::get('/packages', function () {

    $packages = SurfPackage::where('is_active', true)
        ->latest()
        ->get();

    return view('packages', compact('packages'));
});

Route::get('/packages/{slug}', function ($slug) {

    $package = SurfPackage::where('slug', $slug)
        ->firstOrFail();

    $relatedPackages = SurfPackage::where('id', '!=', $package->id)
        ->where('is_active', true)
        ->limit(3)
        ->get();

    return view('package-detail', compact(
        'package',
        'relatedPackages'
    ));
});

/*
|--------------------------------------------------------------------------
| Gallery
|--------------------------------------------------------------------------
*/

Route::get('/gallery', function () {

    $galleries = Gallery::where('is_active', true)
        ->latest()
        ->get();

    return view('gallery', compact('galleries'));
});

/*
|--------------------------------------------------------------------------
| Reviews
|--------------------------------------------------------------------------
*/

Route::get('/reviews', function () {

    $reviews = Review::where('is_active', true)
        ->latest()
        ->get();

    return view('reviews', compact('reviews'));
});

/*
|--------------------------------------------------------------------------
| About
|--------------------------------------------------------------------------
*/

Route::get('/about', function () {

    $about = AboutSetting::first();
    $contact = ContactSetting::first();

    return view('about', compact('about', 'contact'));
});

/*
|--------------------------------------------------------------------------
| Contact
|--------------------------------------------------------------------------
*/

Route::get('/contact', function () {

    $contact = ContactSetting::first();

    return view('contact', compact('contact'));
});