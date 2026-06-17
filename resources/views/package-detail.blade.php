@extends('layouts.app')

@section('content')

@php
    $wa = '6281234567890'; // kalau mau, bisa ganti ke $globalContact->whatsapp juga
    $message = urlencode("Hello, I would like to book " . $package->name);
@endphp

<section class="py-14 md:py-20 bg-gradient-to-b from-sky-50 via-white to-white">

<div class="max-w-7xl mx-auto px-4">

    <div class="grid lg:grid-cols-2 gap-10 md:gap-16 items-center">

        <!-- IMAGE -->
        <div data-aos="fade-right">

            <div class="relative overflow-hidden rounded-3xl md:rounded-[35px] shadow-xl md:shadow-2xl group">

                <img
                    src="{{ asset('storage/' . $package->image) }}"
                    alt="{{ $package->name }}"
                    class="w-full h-[350px] sm:h-[450px] md:h-[650px]
                           object-cover group-hover:scale-105 transition duration-700">

                <!-- PRICE BADGE -->
                <div class="absolute top-5 md:top-8 left-5 md:left-8">

                    <div class="bg-white/90 backdrop-blur rounded-full w-24 h-24 md:w-32 md:h-32 flex flex-col items-center justify-center shadow-lg md:shadow-xl">

                        <span class="text-[10px] md:text-xs uppercase tracking-widest text-gray-500">
                            Starts From
                        </span>

                        <span class="text-sm md:text-xl font-black text-blue-600">
                            Rp {{ number_format($package->price,0,',','.') }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- CONTENT -->
        <div data-aos="fade-left">

            <!-- BADGE -->
            <span class="inline-flex px-4 py-2 rounded-full bg-blue-100 text-blue-600 font-semibold text-xs md:text-sm mb-5">
                🌊 Surf Experience
            </span>

            <!-- TITLE -->
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-3 md:mb-4 leading-tight">
                {{ $package->name }}
            </h1>

            <!-- META -->
            <div class="space-y-1 mb-6 md:mb-8 text-gray-500 text-sm md:text-lg">

                <p>
                    Price:
                    <span class="font-semibold text-gray-900">
                        Rp {{ number_format($package->price,0,',','.') }}/person
                    </span>
                </p>

                <p>
                    Duration:
                    <span class="font-semibold text-gray-900">
                        {{ $package->duration }} hours
                    </span>
                </p>

            </div>

            <!-- DESCRIPTION -->
            <div class="prose prose-sm md:prose-lg max-w-none text-gray-700 mb-8 md:mb-10">
                {!! $package->description !!}
            </div>

            <!-- INCLUDED -->
            <div class="grid grid-cols-2 gap-3 md:gap-4 mb-8 md:mb-10 text-sm md:text-base">

                <div class="flex items-center gap-2 md:gap-3">
                    <span>🏄</span>
                    <span>Surfboard Included</span>
                </div>

                <div class="flex items-center gap-2 md:gap-3">
                    <span>👨‍🏫</span>
                    <span>Professional Instructor</span>
                </div>

                <div class="flex items-center gap-2 md:gap-3">
                    <span>🦺</span>
                    <span>Safety First</span>
                </div>

                <div class="flex items-center gap-2 md:gap-3">
                    <span>📍</span>
                    <span>Tanjung Aan Beach</span>
                </div>

            </div>

            <!-- BUTTONS -->
            <div class="flex flex-col sm:flex-row gap-4">

                <a href="https://wa.me/{{ $wa }}?text={{ $message }}"
                   target="_blank"
                   class="flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white px-7 md:px-8 py-3.5 md:py-4 rounded-full font-semibold transition hover:-translate-y-1 shadow-md">

                    <i class="fab fa-whatsapp"></i>
                    Book via WhatsApp
                </a>

                <a href="{{ url('/packages') }}"
                   class="flex items-center justify-center border border-gray-300 hover:border-blue-600 hover:text-blue-600 px-7 md:px-8 py-3.5 md:py-4 rounded-full font-semibold transition hover:-translate-y-1">

                    Back to Packages
                </a>

            </div>

        </div>

    </div>

</div>

</section>

@endsection