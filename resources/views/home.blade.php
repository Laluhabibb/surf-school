@extends('layouts.app')

@section('content')
    @php
        $wa = '';

        if (!empty($contact?->whatsapp)) {
            $wa = preg_replace('/\D/', '', $contact->whatsapp);
        }
    @endphp

    <!-- HERO -->
    @php
        $hero = \App\Models\HeroSetting::where('is_active', true)->first();
        $contact = \App\Models\ContactSetting::first();

        $wa = preg_replace('/[^0-9]/', '', $contact?->whatsapp ?? '');
    @endphp

    @if ($hero)
        @section('hero')
            <div class="relative w-screen mb-0 left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] h-screen overflow-hidden">

                {{-- BACKGROUND --}}
                @if ($hero->use_video && $hero->video)
                    <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
                        <source src="{{ asset('storage/' . $hero->video) }}">
                    </video>
                @else
                    <img src="{{ asset('storage/' . $hero->image) }}" class="absolute inset-0 w-full h-full object-cover">
                @endif

                {{-- OVERLAY (soft professional) --}}
                <div class="absolute inset-0 bg-black/2"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/10 to-transparent"></div>

                {{-- CONTENT --}}
                <div class="relative z-10 h-full flex items-center">

                    <div class="max-w-6xl mx-auto w-full px-6">

                        <div class="max-w-2xl space-y-4 md:space-y-5">

                            {{-- BADGE --}}
                            <div
                                class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/10 backdrop-blur text-white text-[10px] md:text-[11px] tracking-[0.25em] uppercase">
                                🌊 {{ $hero->subtitle ?? 'Surf School Lombok' }}
                            </div>

                            {{-- TITLE --}}
                            <h1 class="text-3xl md:text-5xl lg:text-6xl font-semibold text-white leading-tight">
                                {{ $hero->title }}
                            </h1>

                            {{-- SUBTITLE --}}
                            <p
                                class="text-base md:text-2xl font-medium bg-gradient-to-r from-cyan-300 via-sky-200 to-white bg-clip-text text-transparent">
                                Beginners & Families Surf Experience
                            </p>

                            {{-- DESCRIPTION --}}
                            <p class="text-sm md:text-base text-white/80 leading-relaxed max-w-lg">
                                {{ $hero->description }}
                            </p>

                            {{-- BUTTONS --}}
                            <div class="flex flex-col sm:flex-row gap-3 pt-2">

                                @if ($wa)
                                    <a href="https://wa.me/{{ $wa }}"
                                        class="px-6 py-3 rounded-full bg-green-500 text-white font-medium
                           shadow-sm hover:shadow-md transition-all duration-300 ease-out
                           hover:-translate-y-0.5 hover:bg-green-600 active:scale-95
                           flex items-center gap-2 w-fit">

                                        <i class="fab fa-whatsapp"></i>
                                        {{ $hero->button_text ?? 'Chat & Book Now' }}
                                    </a>
                                @endif

                                <a href="{{ url('/packages') }}"
                                    class="px-6 py-3 rounded-full bg-white text-gray-900 font-medium
                       shadow-sm hover:shadow-md transition-all duration-300 ease-out
                       hover:-translate-y-0.5 hover:bg-gray-50 active:scale-95 w-fit">

                                    View Packages
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                {{-- SCROLL INDICATOR (CENTER BOTTOM RESPONSIVE) --}}
                <div
                    class="hidden md:flex absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex-col items-center text-white/60">

                    <span class="animate-bounce mt-4 text-[11px] tracking-[0.25em] uppercase text-center text-gray-800">
                        Scroll to explore
                        <span class="animate-bounce block text-gray-900 text-[10px]">↓↓</span>
                    </span>

                </div>

            </div>
        @endsection
    @endif

    {{-- hero end --}}

    <!-- MOVING TEXT -->
    <div class="relative w-screen left-1/2 right-1/2 -ml-[50vw] -mr-[50vw] overflow-hidden bg-slate-950 -mt-10">

        <div class="py-3">

            <div class="marquee">
                <div class="marquee-content">

                    WELCOME TO SUPAR SURF SCHOOL • BEGINNER FRIENDLY • FAMILY SURF LESSONS • LOCAL CERTIFIED INSTRUCTORS •
                    TANJUNG AAN BEACH • LOMBOK • INDONESIA •

                </div>
            </div>

        </div>

    </div>



    <!-- WHY -->
    <section class="max-w-6xl mx-auto px-4 py-16 md:py-20">

        <div class="text-center mb-10 md:mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-extrabold">Why Choose Us</h2>
            <p class="text-gray-500 mt-2">Real ocean experience in Lombok</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">

            @foreach ([['fas fa-user-tie', 'Professional Coaches', 'Experienced local instructors'], ['fas fa-location-dot', 'Best Surf Spots', 'Perfect waves at Tanjung Aan'], ['fas fa-shield-heart', 'Safe Learning', 'Beginner & kids friendly'], ['fas fa-award', 'Top Rated', 'Loved by travelers']] as $item)
                <div data-aos="zoom-in"
                    class="bg-white/70 backdrop-blur border rounded-2xl p-4 md:p-6 hover:shadow-xl transition hover:-translate-y-2">

                    <div class="text-3xl md:text-4xl text-blue-600">
                        <i class="{{ $item[0] }}"></i>
                    </div>
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

            @foreach ($packages as $package)
                <div data-aos="fade-up"
                    class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition hover:-translate-y-2">

                    <img src="{{ asset('storage/' . $package->image) }}"
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

            @foreach ($galleries->take(9) as $gallery)
                <div data-aos="zoom-in" class="overflow-hidden rounded-xl md:rounded-2xl group">

                    <img src="{{ asset('storage/' . $gallery->image) }}"
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

            @foreach ($reviews as $review)
                <div data-aos="zoom-in" class="bg-white rounded-2xl shadow p-6 hover:shadow-xl transition">

                    <div class="flex justify-center mb-3">
                        @if ($review->image)
                            <img src="{{ asset('storage/' . $review->image) }}"
                                class="w-16 h-16 md:w-20 md:h-20 rounded-full object-cover border-4 border-blue-100">
                        @else
                            <div
                                class="w-16 h-16 md:w-20 md:h-20 rounded-full bg-gray-200 flex items-center justify-center">
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

            {!! str_replace(['width="600"', 'height="450"'], ['width="100%"', 'height="420"'], $contact?->google_maps) !!}

        </div>

    </section>
@endsection
