<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'K-amu SKL') }} — @yield('title', 'Sumber Kompetensi Literasi')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- AOS - Animate On Scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #C8B6FF;
            --secondary: #A0E7E5;
            --gradient: linear-gradient(135deg, #C8B6FF, #A0E7E5);
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .gradient-bg {
            background: var(--gradient);
        }

        .gradient-text {
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .glass {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .card-hover {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 48px rgba(200, 182, 255, 0.25);
        }

        .glow-hover:hover {
            box-shadow: 0 0 30px rgba(200, 182, 255, 0.5);
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(5deg); }
        }
        @keyframes float-reverse {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(15px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
        .animate-float-reverse { animation: float-reverse 7s ease-in-out infinite; }

        /* Pulse glow */
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(200, 182, 255, 0.3); }
            50% { box-shadow: 0 0 40px rgba(200, 182, 255, 0.6); }
        }
        .animate-pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }

        /* Gradient shift */
        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient-shift 4s ease infinite;
        }

        /* Blob shapes */
        .blob {
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
        }
        .blob-2 {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }

        /* Counter animation */
        .counter-value {
            transition: all 0.5s ease;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }

        /* Image hover zoom */
        .img-hover-zoom {
            overflow: hidden;
        }
        .img-hover-zoom img {
            transition: transform 0.5s ease;
        }
        .img-hover-zoom:hover img {
            transform: scale(1.08);
        }

        /* Stagger children animation delay */
        .stagger-1 { animation-delay: 0.1s; }
        .stagger-2 { animation-delay: 0.2s; }
        .stagger-3 { animation-delay: 0.3s; }
        .stagger-4 { animation-delay: 0.4s; }
        .stagger-5 { animation-delay: 0.5s; }

        /* Line connector for steps */
        .step-connector {
            position: relative;
        }
        .step-connector::after {
            content: '';
            position: absolute;
            top: 50%;
            right: -50%;
            width: 100%;
            height: 2px;
            background: var(--gradient);
            opacity: 0.3;
        }
        .step-connector:last-child::after {
            display: none;
        }

        /* Testimonial card quote */
        .quote-mark::before {
            content: '\201C';
            font-size: 4rem;
            line-height: 1;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            position: absolute;
            top: -10px;
            left: 10px;
            font-family: Georgia, serif;
            opacity: 0.3;
        }

        /* Tool card shimmer */
        .shimmer {
            position: relative;
            overflow: hidden;
        }
        .shimmer::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        .shimmer:hover::after {
            left: 100%;
        }

        @media (max-width: 767px) {
            body {
                background: linear-gradient(180deg, #f8fbff 0%, #f3f6ff 45%, #eef3fb 100%);
                padding-bottom: 6.25rem;
            }

            .mobile-bottom-nav {
                position: fixed;
                left: 0.75rem;
                right: 0.75rem;
                bottom: 0.75rem;
                z-index: 70;
            }

            .mobile-bottom-nav__inner {
                margin: 0 auto;
                max-width: 430px;
                display: grid;
                grid-template-columns: repeat(5, minmax(0, 1fr));
                gap: 0.25rem;
                align-items: end;
                background: rgba(15, 23, 42, 0.9);
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
                border: 1px solid rgba(255, 255, 255, 0.16);
                border-radius: 1.15rem;
                padding: 0.5rem 0.4rem 0.45rem;
                box-shadow: 0 18px 40px rgba(15, 23, 42, 0.35);
            }

            .mobile-bottom-nav__item,
            .mobile-bottom-nav__cta {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 0.2rem;
                font-size: 0.62rem;
                font-weight: 600;
                letter-spacing: 0.01em;
                color: rgba(226, 232, 240, 0.85);
                border-radius: 0.85rem;
                padding: 0.35rem 0.2rem;
                transition: all 0.25s ease;
            }

            .mobile-bottom-nav__item:hover {
                color: #ffffff;
                background: rgba(148, 163, 184, 0.18);
            }

            .mobile-bottom-nav__item.is-active {
                color: #ffffff;
                background: rgba(147, 197, 253, 0.18);
            }

            .mobile-bottom-nav__cta {
                color: #ffffff;
                transform: translateY(-0.75rem);
                padding: 0.5rem 0.25rem 0.45rem;
                background: linear-gradient(135deg, #fb7185, #f59e0b);
                box-shadow: 0 12px 28px rgba(244, 114, 182, 0.38);
            }

            .mobile-bottom-nav__cta:hover {
                opacity: 0.94;
            }

            .mobile-bottom-nav__cta .icon-wrap {
                width: 1.5rem;
                height: 1.5rem;
                border-radius: 9999px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                background: rgba(255, 255, 255, 0.22);
            }
        }
    </style>

    @stack('styles')
</head>
<body class="bg-gray-50 min-h-screen antialiased">

    {{-- Navbar --}}
    @include('layouts.partials.navbar')

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl relative" role="alert">
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4">
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl relative" role="alert">
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Mobile Bottom Menu --}}
    @include('layouts.partials.mobile-footer-menu')

    {{-- Footer --}}
    @include('layouts.partials.footer')

    <script>
        feather.replace();
    </script>

    <!-- AOS Init -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 80,
            disable: window.innerWidth < 768 ? 'phone' : false
        });
    </script>

    @stack('scripts')
</body>
</html>
