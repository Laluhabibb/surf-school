@extends('layouts.app')

@section('content')

    <section class="relative md:pb-20 pt-5 bg-gradient-to-b from-sky-50 via-white to-blue-50">

        <div class="max-w-6xl mx-auto px-4">

            <!-- HEADER -->
            <div class="text-center mb-10 md:mb-16" data-aos="fade-up">

                <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-gray-900 mb-4">
                    Customer Reviews
                </h1>

                <p class="max-w-2xl mx-auto text-gray-600 text-sm md:text-lg leading-relaxed">
                    What our students say about their surf experience in Tanjung Aan Beach, Lombok.
                </p>

            </div>

            <!-- GRID -->
            @if ($reviews->count())
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                    @foreach ($reviews as $index => $review)
                        <div data-aos="zoom-in-up" style="animation-delay: {{ $index * 100 }}ms"
                            class="group bg-white/80 backdrop-blur-md rounded-3xl shadow-md hover:shadow-2xl
                   p-5 md:p-6 text-center transition-all duration-500 hover:-translate-y-2">

                            <!-- AVATAR -->
                            @if ($review->image)
                                <div class="flex justify-center mb-4">
                                    <img src="{{ asset('storage/' . $review->image) }}"
                                        class="w-16 h-16 md:w-20 md:h-20 rounded-full object-cover
                               border-4 border-blue-100 shadow-md group-hover:scale-105 transition">
                                </div>
                            @else
                                <div
                                    class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 rounded-full
                            bg-gradient-to-br from-blue-100 to-cyan-100
                            flex items-center justify-center text-blue-600 font-bold text-lg md:text-xl">
                                    {{ strtoupper(substr($review->name, 0, 1)) }}
                                </div>
                            @endif

                            <!-- NAME -->
                            <h3 class="font-semibold text-base md:text-lg text-gray-900">
                                {{ $review->name }}
                            </h3>

                            <!-- RATING -->
                            <div class="flex justify-center mt-2 mb-3 text-base md:text-lg">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}">
                                        ★
                                    </span>
                                @endfor
                            </div>

                            <!-- COMMENT -->
                            <p class="text-gray-600 italic text-sm md:text-base leading-relaxed">
                                “{{ $review->comment }}”
                            </p>

                        </div>
                    @endforeach

                </div>
            @else
                <div class="text-center text-gray-500 mt-10">
                    Belum ada review yang tersedia.
                </div>
            @endif

        </div>

    </section>

@endsection
