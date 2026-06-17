@extends('layouts.app')

@section('content')
@php
    $wa = '';

    if (!empty($contact?->whatsapp)) {
        $wa = preg_replace('/\D/', '', $contact->whatsapp);
    }
@endphp

<!-- HERO -->
<section class="relative overflow-hidden max-w-6xl mx-auto px-4 pt-10 pb-14">

    <div class="absolute -top-24 -left-24 w-80 h-80 bg-blue-500/20 blur-3xl rounded-full"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-cyan-400/20 blur-3xl rounded-full"></div>

    <div class="grid md:grid-cols-2 gap-12 md:gap-14 items-center relative">

        <!-- LEFT -->
        <div data-aos="fade-right">

            <p class="inline-flex items-center gap-2 text-[10px] md:text-xs tracking-[0.25em] uppercase text-blue-600 font-semibold bg-blue-50 px-4 py-2 rounded-full">
                🌊 Supar Surf School • Lombok
            </p>

            <h1 class="mt-6 text-3xl md:text-5xl lg:text-6xl font-extrabold leading-tight text-gray-900">
                Surf Lessons for
                <span class="block bg-gradient-to-r from-blue-600 via-cyan-500 to-sky-500 bg-clip-text text-transparent">
                    Beginners & Families
                </span>
                <span class="text-gray-900">at Tanjung Aan Beach</span>
            </h1>

            <p class="mt-5 text-gray-600 text-base md:text-lg leading-relaxed max-w-lg">
                Learn surfing with certified local instructors in safe ocean conditions.
                Perfect for beginners, families, and ocean lovers.
            </p>

            <div class="mt-8 flex flex-col sm:flex-row gap-4">

                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact?->whatsapp ?? '') }}"
                   class="flex items-center justify-center gap-2 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-6 py-3.5 rounded-full font-semibold shadow-lg hover:shadow-xl transition hover:-translate-y-1">

                    <i class="fab fa-whatsapp"></i>
                    Chat & Book
                </a>

                <a href="/packages"
                   class="flex items-center justify-center border border-blue-500 text-blue-600 px-6 py-3.5 rounded-full font-semibold hover:bg-blue-50 transition hover:-translate-y-1">

                    View Packages
                </a>

            </div>

        </div>

        <!-- RIGHT -->
        <div data-aos="fade-left" class="relative">

            <div class="rounded-3xl overflow-hidden shadow-2xl group">

                <img src="https://images.unsplash.com/photo-1502680390469-be75c86b636f"
                     class="w-full h-[320px] sm:h-[400px] md:h-[480px] object-cover group-hover:scale-105 transition duration-700"
                     alt="Surfing">

            </div>

            <div class="absolute -bottom-5 -left-5 bg-white/80 backdrop-blur-xl shadow-xl rounded-2xl px-4 py-2 md:px-5 md:py-3">

                <p class="text-xs md:text-sm font-bold text-blue-600">🏄 Beginner Friendly</p>
                <p class="text-[10px] md:text-xs text-gray-600">Safe • Fun • Professional</p>

            </div>

        </div>

    </div>
</section>

<!-- WHY -->
<section class="max-w-6xl mx-auto px-4 py-16 md:py-20">

    <div class="text-center mb-10 md:mb-12" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-extrabold">Why Choose Us</h2>
        <p class="text-gray-500 mt-2">Real ocean experience in Lombok</p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">

        @foreach([
            ['🏄','Professional Coaches','Experienced local instructors'],
            ['🌊','Best Surf Spots','Perfect waves at Tanjung Aan'],
            ['🛟','Safe Learning','Beginner & kids friendly'],
            ['⭐','Top Rated','Loved by travelers']
        ] as $item)

        <div data-aos="zoom-in"
             class="bg-white/70 backdrop-blur border rounded-2xl p-4 md:p-6 hover:shadow-xl transition hover:-translate-y-2">

            <div class="text-2xl md:text-3xl">{{ $item[0] }}</div>
            <h3 class="font-bold mt-2 md:mt-3 text-sm md:text-base">{{ $item[1] }}</h3>
            <p class="text-gray-500 text-xs md:text-sm mt-1">{{ $item[2] }}</p>

        </div>

        @endforeach

    </div>
</section>

<!-- PACKAGES -->
<section class="max-w-6xl mx-auto px-4 py-16 md:py-20">

    <div class="flex justify-between items-end mb-8 md:mb-10" data-aos="fade-up">

        <div>
            <h2 class="text-3xl md:text-4xl font-bold">Featured Packages</h2>
            <p class="text-gray-500 mt-2 text-sm md:text-base">Best surf experiences</p>
        </div>

        <a href="/packages" class="hidden md:block text-blue-600 font-medium">
            View All →
        </a>

    </div>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach($packages as $package)

        <div data-aos="fade-up"
             class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition hover:-translate-y-2">

            <img src="{{ asset('storage/'.$package->image) }}"
                 class="h-52 md:h-56 w-full object-cover group-hover:scale-110 transition duration-700">

            <div class="p-5">

                <h3 class="font-bold text-lg group-hover:text-blue-600">
                    {{ $package->name }}
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    {{ $package->location ?? 'Tanjung Aan Beach' }}
                </p>

                <div class="flex justify-between items-center mt-4">
                    <span class="text-blue-600 font-bold text-sm md:text-base">
                        Rp {{ number_format($package->price, 0, ',', '.') }}
                    </span>

                    <a href="/packages/{{ $package->slug }}"
                       class="bg-blue-600 text-white px-3 md:px-4 py-2 rounded-lg text-xs md:text-sm hover:bg-blue-700 transition">
                        Details
                    </a>
                </div>

            </div>

        </div>

        @endforeach

    </div>
</section>

<!-- GALLERY -->
<section class="max-w-6xl mx-auto px-4 py-16 md:py-20">

    <div class="flex justify-between mb-6 md:mb-8" data-aos="fade-up">
        <h2 class="text-2xl md:text-3xl font-bold">Gallery</h2>
        <a href="/gallery" class="text-blue-600 text-sm md:text-base">View All →</a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-4">

        @foreach($galleries->take(9) as $gallery)

        <div data-aos="zoom-in"
             class="overflow-hidden rounded-xl md:rounded-2xl group">

            <img src="{{ asset('storage/'.$gallery->image) }}"
                 class="w-full h-28 sm:h-36 md:h-56 object-cover group-hover:scale-110 transition duration-700">

        </div>

        @endforeach

    </div>
</section>

<!-- REVIEWS -->
<section class="max-w-6xl mx-auto px-4 py-16 md:py-20">

    <div class="text-center mb-10" data-aos="fade-up">
        <h2 class="text-3xl font-bold">What Customers Say</h2>
    </div>

    <div class="grid md:grid-cols-3 gap-6">

        @foreach($reviews as $review)

        <div data-aos="zoom-in"
             class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

            <div class="flex justify-center mb-3">
                @if($review->image)
                    <img src="{{ asset('storage/'.$review->image) }}"
                         class="w-16 h-16 md:w-20 md:h-20 rounded-full object-cover border-4 border-blue-100">
                @else
                    <div class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-gray-200 flex items-center justify-center">
                        👤
                    </div>
                @endif
            </div>

            <h4 class="text-center font-bold">{{ $review->name }}</h4>

            <div class="text-yellow-400 text-center text-sm mb-2">
                {!! str_repeat('★', $review->rating) !!}
            </div>

            <p class="text-center italic text-gray-600 text-sm md:text-base">
                "{{ $review->comment }}"
            </p>

        </div>

        @endforeach

    </div>
</section>

<!-- CTA -->
<section class="max-w-6xl mx-auto px-4 py-16 md:py-20">

    <div data-aos="zoom-in"
         class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-cyan-500 to-sky-500 text-white text-center p-10 md:p-14">

        <div class="absolute -top-20 -left-20 w-72 h-72 bg-white/10 blur-3xl rounded-full"></div>
        <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-white/10 blur-3xl rounded-full"></div>

        <div class="relative z-10">

            <h2 class="text-3xl md:text-5xl font-extrabold mb-4">
                Ready to Ride the Waves?
            </h2>

            <p class="text-white/80 max-w-xl mx-auto text-sm md:text-lg mb-8">
                Join surf lessons in Lombok with local instructors.
            </p>

            <a href="https://wa.me/{{ $wa }}"
               class="inline-flex items-center gap-2 bg-white text-blue-600 px-7 md:px-8 py-3.5 md:py-4 rounded-full font-bold hover:scale-105 transition">
                <i class="fab fa-whatsapp text-green-500"></i>
                JOIN US
            </a>

        </div>

    </div>

</section>

<!-- LOCATION -->
<section class="max-w-6xl mx-auto px-4 py-16 md:py-20">

    <div class="text-center mb-8" data-aos="fade-up">
        <h2 class="text-3xl font-bold">Find Us</h2>
        <p class="text-gray-500 mt-2 text-sm md:text-base">{{ $contact?->address }}</p>
    </div>

    <div class="rounded-3xl overflow-hidden shadow-lg" data-aos="fade-up">

        {!! str_replace(
            ['width="600"', 'height="450"'],
            ['width="100%"', 'height="420"'],
            $contact?->google_maps
        ) !!}

    </div>

</section>

@endsection