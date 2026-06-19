@extends('layouts.app')

@section('content')

    @if ($about)
        <!-- ABOUT US -->
        <section class="relative overflow-hidden bg-gradient-to-b from-blue-50 via-white to-white">

            <div class="max-w-7xl mx-auto px-2 py-16 md:py-24">

                <div class="grid lg:grid-cols-2 gap-10 md:gap-20 items-center">

                    <!-- IMAGE -->
                    <div class="relative" data-aos="fade-right">

                        <div class="absolute -top-4 -right-4 w-full h-full bg-blue-100 rounded-3xl md:rounded-[40px]"></div>

                        @if ($about->image)
                            <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}"
                                class="relative w-full h-[320px] sm:h-[420px] md:h-[600px]
                               object-cover rounded-3xl md:rounded-[40px]
                               shadow-xl md:shadow-2xl hover:scale-[1.02] transition duration-700">
                        @endif

                    </div>

                    <!-- CONTENT -->
                    <div data-aos="fade-left">

                        <!-- BADGE -->
                        <span
                            class="inline-flex items-center px-4 py-2 rounded-full bg-blue-100 text-blue-600 text-xs md:text-sm font-semibold mb-5 md:mb-6">
                            🌊 Surf School • Tanjung Aan, Lombok
                        </span>

                        @if ($about->subtitle)
                            <p
                                class="uppercase tracking-[0.2em] md:tracking-[0.3em] text-xs md:text-sm font-semibold text-blue-600 mb-3 md:mb-4">
                                {{ $about->subtitle }}
                            </p>
                        @endif

                        <!-- TITLE -->
                        <h1
                            class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6 md:mb-8">
                            {{ $about->title }}
                        </h1>

                        <!-- DESCRIPTION -->
                        <div class="text-base md:text-lg text-gray-600 leading-relaxed md:leading-8 mb-8 md:mb-10">
                            {!! $about->description !!}
                        </div>

                        <!-- FEATURES -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4 mb-8 md:mb-10">

                            <div class="flex items-center gap-3 text-gray-700 text-sm md:text-base">
                                <span class="text-green-500">✓</span>
                                <span>Professional Local Instructors</span>
                            </div>

                            <div class="flex items-center gap-3 text-gray-700 text-sm md:text-base">
                                <span class="text-green-500">✓</span>
                                <span>Beginner Friendly Lessons</span>
                            </div>

                            <div class="flex items-center gap-3 text-gray-700 text-sm md:text-base">
                                <span class="text-green-500">✓</span>
                                <span>Family Surf Experience</span>
                            </div>

                            <div class="flex items-center gap-3 text-gray-700 text-sm md:text-base">
                                <span class="text-green-500">✓</span>
                                <span>Safe Learning Environment</span>
                            </div>

                        </div>

                        <!-- STATS -->
                        <div class="grid grid-cols-3 gap-4 md:gap-6 mb-8 md:mb-10 text-center">

                            <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition">
                                <h3 class="text-xl md:text-3xl font-bold text-gray-900">100+</h3>
                                <p class="text-gray-500 text-xs md:text-sm">Happy Students</p>
                            </div>

                            <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition">
                                <h3 class="text-xl md:text-3xl font-bold text-gray-900">2</h3>
                                <p class="text-gray-500 text-xs md:text-sm">Surf Packages</p>
                            </div>

                            <div class="bg-white rounded-xl shadow-sm p-4 hover:shadow-md transition">
                                <h3 class="text-xl md:text-3xl font-bold text-gray-900">100%</h3>
                                <p class="text-gray-500 text-xs md:text-sm">Fun Experience</p>
                            </div>

                        </div>

                        <!-- BUTTON -->
                        <div class="flex flex-col sm:flex-row gap-4">

                            <a href="{{ url('/packages') }}"
                                class="text-center px-7 md:px-8 py-3.5 md:py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition hover:-translate-y-1 shadow-md">

                                Explore Packages
                            </a>

                            <a href="{{ url('/contact') }}"
                                class="text-center px-7 md:px-8 py-3.5 md:py-4 border border-gray-300 hover:border-blue-600 hover:text-blue-600 font-semibold rounded-xl transition hover:-translate-y-1">

                                Contact Us
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- LOCATION -->
        @if ($contact?->google_maps)
            <section class="max-w-7xl mx-auto mt-12 px-4 pb-20 md:pb-24">

                <div
                    class="bg-white rounded-2xl md:rounded-[35px] overflow-hidden shadow-xl md:shadow-2xl border border-gray-100">

                    <!-- HEADER -->
                    {{-- <div class="p-6 md:p-10" data-aos="fade-up">

            <p class="uppercase tracking-[0.2em] md:tracking-[0.25em] text-xs md:text-sm text-blue-600 font-semibold mb-2 md:mb-3">
                Our Location
            </p>

            <h3 class="text-lg md:text-2xl font-bold text-gray-900 leading-snug">
                {{ $contact->address }}
            </h3>

        </div> --}}

                    <!-- MAP -->
                    <div class="w-full overflow-hidden" data-aos="zoom-in">

                        {!! str_replace(
                            ['width="600"', 'height="600"'],
                            ['width="100%"', 'height="550" md="550"'],
                            $contact->google_maps,
                        ) !!}

                    </div>

                </div>

            </section>
        @endif
    @endif

@endsection
