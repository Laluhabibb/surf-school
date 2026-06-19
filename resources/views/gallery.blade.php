@extends('layouts.app')

@section('content')
    <section class="bg-gradient-to-b from-sky-50 via-white to-white py-6 md:py-4">

        <div class="max-w-6xl mx-auto px-3 md:px-2">

            <!-- HEADER -->
            <div class="text-center mb-12 md:mb-16">


                <h1 class="text-3xl md:text-6xl font-black text-gray-900 mb-4">
                    Surf Gallery
                </h1>

                <p class="max-w-2xl mx-auto text-sm md:text-lg text-gray-600 leading-relaxed">
                    Explore unforgettable moments from our surf lessons, family adventures,
                    and beautiful days at Tanjung Aan Beach.
                </p>

            </div>

            <!-- MASONRY GALLERY -->
            <div class="columns-2 md:columns-3 gap-3 md:gap-6 space-y-3 md:space-y-6">

                @foreach ($galleries as $gallery)
                    <div
                        class="gallery-item break-inside-avoid overflow-hidden rounded-2xl md:rounded-[30px]
                   bg-white shadow-md md:shadow-lg hover:shadow-xl md:hover:shadow-2xl
                   transition duration-500 group opacity-0 translate-y-6 md:translate-y-10">

                        <!-- IMAGE -->
                        <div class="overflow-hidden">

                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}"
                                class="w-full object-cover
                           h-40 sm:h-44 md:h-auto
                           group-hover:scale-105 transition duration-700">

                        </div>

                        <!-- CONTENT -->
                        <div class="p-3 md:p-5">

                            @if ($gallery->title)
                                <h3 class="font-bold text-base md:text-xl text-gray-900 mb-1 md:mb-2">
                                    {{ $gallery->title }}
                                </h3>
                            @endif

                            @if ($gallery->description)
                                <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                                    {{ Str::limit($gallery->description, 80) }}
                                </p>
                            @endif

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

    </section>

    <!-- ANIMATION SCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const items = document.querySelectorAll(".gallery-item");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.classList.add("opacity-100", "translate-y-0");
                            entry.target.classList.remove("opacity-0", "translate-y-6",
                                "md:translate-y-10");
                        }, index * 60);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            items.forEach(item => observer.observe(item));
        });
    </script>
@endsection
