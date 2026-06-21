@extends('layouts.app')

@section('content')
    @php
        $wa = '6287821928126'; // idealnya ambil dari $globalContact
    @endphp

    <section class="relative md:pb-20 pt-5 bg-gradient-to-b from-sky-50 via-white to-blue-50">

        <div class="max-w-6xl mx-auto px-4">

            <!-- HEADER -->
            <div class="text-center mb-2 md:mb-16" data-aos="fade-up">

                <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-4">
                    Surf Packages
                </h1>
                {{-- hahaha --}}
                <p class="max-w-2xl mx-auto text-gray-600 text-sm md:text-lg leading-relaxed">
                    Discover the perfect surfing experience at Tanjung Aan Beach.
                    Learn, explore, and enjoy unforgettable moments in Lombok.
                </p>

            </div>

            <!-- GRID -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                @foreach ($packages as $package)
                    <div data-aos="zoom-in-up"
                        class="group bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl hover:-translate-y-2 transition-all duration-500">

                        <!-- IMAGE -->
                        <div class="relative overflow-hidden">

                            <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}"
                                class="w-full h-56 md:h-72 object-cover group-hover:scale-110 transition duration-700">

                            <!-- PRICE BADGE -->
                            <div class="absolute top-4 left-4">

                                <div class="bg-white/90 backdrop-blur rounded-full px-4 py-2 shadow-md">

                                    <span class="block text-[10px] uppercase tracking-widest text-gray-500">
                                        Starts From
                                    </span>

                                    <span class="font-bold text-blue-600 text-sm md:text-base">
                                        Rp {{ number_format($package->price, 0, ',', '.') }}/person
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- CONTENT -->
                        <div class="p-5 md:p-6">

                            <h2 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">
                                {{ $package->name }}
                            </h2>

                            <p class="text-sm text-blue-500 font-medium mb-3">
                                ⏱ {{ $package->duration }} hours
                            </p>

                            <p class="text-gray-600 text-sm md:text-base leading-relaxed mb-5">
                                {{ Str::limit(strip_tags($package->description), 110) }}
                            </p>

                            <!-- BUTTONS -->
                            <div class="flex flex-col sm:flex-row gap-3">

                                <a href="/packages/{{ $package->slug }}"
                                    class="flex-1 text-center border border-gray-300 py-3 rounded-full font-medium hover:border-blue-600 hover:text-blue-600 transition hover:-translate-y-1">

                                    View Details
                                </a>

                                <a href="https://wa.me/{{ $wa }}?text={{ urlencode('Halo saya ingin booking ' . $package->name) }}"
                                    target="_blank"
                                    class="flex-1 text-center bg-gradient-to-r from-blue-600 to-cyan-500 text-white py-3 rounded-full font-medium hover:from-blue-700 hover:to-cyan-600 transition hover:-translate-y-1 shadow-md">

                                    Book Now
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>
@endsection
