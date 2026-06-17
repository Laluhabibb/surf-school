@extends('layouts.app')

@section('content')

@php
    $wa = preg_replace('/[^0-9]/', '', $contact->whatsapp ?? '');
@endphp

<!-- HEADER -->
<div class="text-center mb-12">

    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">
        Contact Us
    </h1>

    <p class="text-gray-500 mt-2 text-sm md:text-base">
        Get in touch & start your surf journey
    </p>

</div>

<div class="grid md:grid-cols-2 gap-6 md:gap-8">

    <!-- LEFT CARD -->
    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-6 md:p-8 space-y-6">

        <h2 class="text-lg md:text-xl font-bold text-gray-900">
            Get in Touch
        </h2>

        <!-- CONTACT LIST -->
        <div class="space-y-4 text-gray-700 text-sm md:text-base">

            <!-- WHATSAPP -->
            <div class="flex items-center gap-3">
                <i class="fa-brands fa-whatsapp text-green-500 text-lg"></i>
                <span class="font-semibold">WhatsApp:</span>

                <a href="https://wa.me/{{ $wa }}"
                   class="text-green-600 font-bold hover:underline">
                    {{ $contact->whatsapp }}
                </a>
            </div>

            <!-- EMAIL -->
            <div class="flex items-center gap-3">
                <i class="fa-solid fa-envelope text-blue-500 text-lg"></i>
                <span class="font-semibold">Email:</span>
                <span>{{ $contact->email }}</span>
            </div>

            <!-- ADDRESS -->
            <div class="flex items-start gap-3">
                <i class="fa-solid fa-location-dot text-red-500 text-lg mt-1"></i>
                <div>
                    <span class="font-semibold">Address:</span>
                    <p class="text-gray-600">{{ $contact->address }}</p>
                </div>
            </div>

        </div>

        <!-- SOCIAL -->
        <div class="pt-4 border-t space-y-3">

            @if($contact?->instagram)
            <a href="https://instagram.com/{{ ltrim($contact->instagram, '@/') }}"
               target="_blank"
               class="flex items-center gap-3 hover:text-pink-500 transition">
                <i class="fa-brands fa-instagram text-pink-500"></i>
                Instagram
            </a>
            @endif

            @if($contact?->facebook)
            <a href="https://facebook.com/{{ $contact->facebook }}"
               target="_blank"
               class="flex items-center gap-3 hover:text-blue-600 transition">
                <i class="fa-brands fa-facebook text-blue-600"></i>
                Facebook
            </a>
            @endif

            @if($contact?->tiktok)
            <a href="https://www.tiktok.com/@{{ ltrim($contact->tiktok, '@/') }}"
               target="_blank"
               class="flex items-center gap-3 hover:text-black transition">
                <i class="fa-brands fa-tiktok text-black"></i>
                TikTok
            </a>
            @endif

        </div>

        <!-- CTA BUTTON -->
        <a href="https://wa.me/{{ $wa }}"
           class="block text-center bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white py-3 rounded-xl font-semibold transition hover:-translate-y-1 shadow-md">

            Book via WhatsApp
        </a>

    </div>

    <!-- RIGHT MAP -->
    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden">

        <div class="p-5 border-b">
            <h3 class="font-bold text-gray-900 text-lg">
                Our Location
            </h3>
            <p class="text-sm text-gray-500 mt-1">
                Tanjung Aan Beach, Lombok
            </p>
        </div>

        <div class="h-[320px] md:h-[420px] w-full">
            {!! $contact->google_maps !!}
        </div>

    </div>

</div>

@endsection