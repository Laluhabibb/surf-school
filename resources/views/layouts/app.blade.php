<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>
        @yield('title', 'Supar Surf School Lombok | Surf Lessons at Tanjung Aan Beach')
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description"
        content="Supar Surf School Lombok offers beginner, family and private surf lessons at Tanjung Aan Beach, Central Lombok, lombok tengah, Pantai indah lombok.">

    <meta name="keywords" content="surf school lombok, surf lesson lombok, tanjung aan surf school, surfing lombok">

    <meta name="author" content="Supar Surf School">
    <meta name="robots" content="index, follow">

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="/favicon.ico">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/favicon.ico">

    <!-- OPEN GRAPH -->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Supar Surf School Lombok">
    <meta property="og:title" content="Supar Surf School Lombok">
    <meta property="og:description"
        content="Learn surfing with professional local instructors at Tanjung Aan Beach, Lombok. Perfect for beginners, families, and ocean lovers.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:image" content="{{ asset('images/og-image.jpeg') }}">

    <!-- TWITTER / X -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Supar Surf School Lombok">
    <meta name="twitter:description"
        content="Learn surfing with professional local instructors at Tanjung Aan Beach, Lombok.">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpeg') }}">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- FONT (NEW ESTHETIC) -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .marquee {
            overflow: hidden;
            white-space: nowrap;
        }

        .marquee-content {

            display: inline-block;

            min-width: 200%;

            animation: marquee 25s linear infinite;

            font-size: clamp(20px, 2vw, 32px);

            font-weight: 800;

            letter-spacing: .08em;

            text-transform: uppercase;

            text-align: center;

            background: linear-gradient(90deg,
                    #38bdf8,
                    #ffffff,
                    #38bdf8);

            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        @keyframes marquee {

            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }
        }
    </style>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Supar Surf School",
      "url": "https://suparsurfschool.com",
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.9",
        "reviewCount": "128"
      }
    }
    </script>

</head>

<body class="bg-gray-50 text-gray-800">

    @php
        $current = request()->path();
    @endphp

    <!-- NAVBAR -->
    <header class="fixed top-0 left-0 w-full z-50 bg-white/70 backdrop-blur-xl border-b border-gray-100">

        <div class="max-w-6xl mx-auto my-2 px-4">

            <div class="flex items-center justify-between h-16">

                <!-- LOGO -->
                <a href="/" class="flex items-center gap-3 group">

                    <div
                        class="relative w-11 h-11 rounded-3xl overflow-hidden bg-white/50 backdrop-blur shadow-lg ring-1 ring-white/20 transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">

                        <img src="{{ asset('images/logo.png') }}" alt="Supar Surf School"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="leading-none">

                        <span class="block text-[17px] font-semibold tracking-tight text-slate-900">
                            Supar Surf School
                        </span>

                        <span class="block mt-1 text-[10px] uppercase tracking-[0.25em] text-slate-500">
                            Lombok • Indonesia
                        </span>

                    </div>

                </a>

                <!-- MENU -->
                <nav class="hidden md:flex items-center space-x-8 text-m font-medium tracking-wide">

                    @php
                        function nav($path, $current)
                        {
                            $active = $path === $current;

                            return $active
                                ? 'text-gray-900 font-semibold relative after:absolute after:-bottom-1 after:left-0 after:w-full after:h-[2px] after:bg-gradient-to-r after:from-blue-500 after:to-cyan-400'
                                : 'text-gray-500 hover:text-gray-900 relative after:absolute after:-bottom-1 after:left-0 after:w-0 hover:after:w-full after:h-[2px] after:bg-gray-300 transition-all';
                        }
                    @endphp

                    <a href="/" class="{{ nav('', $current) }}">Home</a>
                    <a href="/packages" class="{{ nav('packages', $current) }}">Packages</a>
                    <a href="/gallery" class="{{ nav('gallery', $current) }}">Gallery</a>
                    <a href="/reviews" class="{{ nav('reviews', $current) }}">Reviews</a>
                    <a href="/about" class="{{ nav('about', $current) }}">About</a>
                    <a href="/contact" class="{{ nav('contact', $current) }}">Contact</a>

                </nav>

                <!-- CTA -->
                <!-- CTA + SOCIAL ICON -->
                <div class="hidden md:flex items-center gap-3">

                    <!-- INSTAGRAM ICON -->
                    @if ($globalContact?->instagram)
                        <a href="https://instagram.com/{{ ltrim($globalContact->instagram, '@/') }}" target="_blank"
                            class="w-9 h-9 flex items-center justify-center rounded-full bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 text-white shadow-md hover:scale-110 transition">

                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif

                    <!-- BOOK NOW -->
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $globalContact?->whatsapp ?? '') }}"
                        target="_blank"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-sm px-6 py-2.5 rounded-full shadow-md hover:shadow-xl hover:scale-105 transition font-medium">

                        <i class="fab fa-whatsapp"></i>
                        Book Now
                    </a>

                </div>

                <!-- MOBILE -->
                <button id="menuBtn" class="md:hidden text-2xl">
                    ☰
                </button>

            </div>

        </div>

        <!-- MOBILE MENU -->
        <div id="mobileMenu" class="hidden md:hidden border-t bg-white">

            <div class="px-4 py-4 space-y-3 text-sm font-medium">

                <a href="/"
                    class="block {{ $current == '' ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">Home</a>
                <a href="/packages"
                    class="block {{ $current == 'packages' ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">Packages</a>
                <a href="/gallery"
                    class="block {{ $current == 'gallery' ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">Gallery</a>
                <a href="/reviews"
                    class="block {{ $current == 'reviews' ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">Reviews</a>
                <a href="/about"
                    class="block {{ $current == 'about' ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">About</a>
                <a href="/contact"
                    class="block {{ $current == 'contact' ? 'text-blue-600 font-semibold' : 'text-gray-600' }}">Contact</a>

            </div>

        </div>

    </header>

    <!-- SPACER -->
    <div class="h-16"></div>

    <!-- HERO SLOT -->
    @hasSection('hero')
        @yield('hero')
    @endif

    <!-- CONTENT -->
    <main class="max-w-6xl mx-auto px-4 py-10">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-white mt-3">

        <div class="max-w-6xl mx-auto px-4 py-14 grid md:grid-cols-3 gap-10">

            <!-- BRAND -->
            <div>
                <h3 class="text-xl font-bold mb-3">🏄 Supar Surf School</h3>
                <p class="text-slate-400 leading-relaxed">
                    Surf lessons for beginners and families at Tanjung Aan Beach, Lombok.
                </p>

                <div class="flex gap-3 mt-5">

                    @if ($globalContact?->instagram)
                        <a href="https://instagram.com/{{ ltrim($globalContact->instagram, '@/') }}" target="_blank"
                            class="w-9 h-9 flex items-center justify-center rounded-full bg-white/10 hover:bg-pink-500 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                    @endif

                    @if ($globalContact?->tiktok)
                        <a href="https://www.tiktok.com/@{{ ltrim($globalContact - > tiktok, '@/') }}" target="_blank"
                            class="w-9 h-9 flex items-center justify-center rounded-full bg-white/10 hover:bg-black transition">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    @endif

                    @if ($globalContact?->facebook)
                        <a href="https://facebook.com/{{ $globalContact->facebook }}" target="_blank"
                            class="w-9 h-9 flex items-center justify-center rounded-full bg-white/10 hover:bg-blue-600 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    @endif

                </div>
            </div>

            <!-- LINKS -->
            <div>
                <h4 class="font-semibold mb-4">Quick Links</h4>

                <ul class="space-y-1 text-slate-400">
                    <li><a href="/" class="hover:text-white">Home</a></li>
                    <li><a href="/packages" class="hover:text-white">Packages</a></li>
                    <li><a href="/gallery" class="hover:text-white">Gallery</a></li>
                    <li><a href="/reviews" class="hover:text-white">Reviews</a></li>
                    <li><a href="/about" class="hover:text-white">About</a></li>
                    <li><a href="/contact" class="hover:text-white">Contact</a></li>
                </ul>
            </div>

            <!-- CONTACT -->
            <div>
                <h4 class="font-semibold mb-4">Contact</h4>

                <div class="text-slate-400 space-y-2">

                    <p>📍 Tanjung Aan Beach, Lombok</p>

                    @if ($globalContact?->phone)
                        <p>📞 <a href="tel:{{ $globalContact->phone }}" class="hover:text-white">
                                {{ $globalContact->phone }}
                            </a></p>
                    @endif

                    @if ($globalContact?->email)
                        <p>✉️ <a href="mailto:{{ $globalContact->email }}" class="hover:text-white">
                                {{ $globalContact->email }}
                            </a></p>
                    @endif

                </div>
            </div>

        </div>

        <div class="border-t border-slate-800 py-5 text-center text-sm text-slate-500">
            © {{ date('Y') }} Supar Surf School Lombok. All rights reserved.
        </div>

    </footer>

    <!-- FLOATING WHATSAPP -->
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $globalContact?->whatsapp ?? '') }}" target="_blank"
        class="hidden md:flex fixed bottom-6 right-6 bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white w-14 h-14 rounded-full items-center justify-center shadow-xl text-2xl transition hover:scale-110"><i
            class="fab fa-whatsapp"></i>
    </a>

    <!-- SCRIPT -->
    <script>
        const btn = document.getElementById('menuBtn');
        const menu = document.getElementById('mobileMenu');

        btn?.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        document.querySelectorAll('#mobileMenu a').forEach(a => {
            a.addEventListener('click', () => menu.classList.add('hidden'));
        });
    </script>

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

</body>

</html>
