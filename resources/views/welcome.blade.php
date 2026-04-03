<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDUcore - Empowering Education</title>

    <link rel="icon" type="image/png" href="{{ asset('images/educore-logo.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            overflow-x: hidden;
        }

        /* Glass Navigation */
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .glass-nav.scrolled {
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .hero-gradient {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.97), rgba(30, 41, 59, 0.85), rgba(15, 23, 42, 0.7));
        }

        /* ===== KEYFRAME ANIMATIONS ===== */

        /* Floating Animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-8px) rotate(1deg);
            }

            50% {
                transform: translateY(-15px) rotate(0deg);
            }

            75% {
                transform: translateY(-8px) rotate(-1deg);
            }
        }

        @keyframes float-slow {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes float-reverse {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(15px);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-slow {
            animation: float-slow 8s ease-in-out infinite;
        }

        .animate-float-reverse {
            animation: float-reverse 7s ease-in-out infinite;
        }

        /* Glow Pulse */
        @keyframes glow-pulse {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(245, 158, 11, 0.4);
            }

            50% {
                box-shadow: 0 0 40px rgba(245, 158, 11, 0.6), 0 0 60px rgba(245, 158, 11, 0.3);
            }
        }

        .animate-glow {
            animation: glow-pulse 3s ease-in-out infinite;
        }

        /* Shimmer Effect */
        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            background-size: 200% 100%;
            animation: shimmer 3s infinite;
        }

        /* Scale Pulse */
        @keyframes scale-pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .animate-scale-pulse {
            animation: scale-pulse 4s ease-in-out infinite;
        }

        /* Rotate Slow */
        @keyframes rotate-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-rotate-slow {
            animation: rotate-slow 20s linear infinite;
        }

        /* Gradient Flow */
        @keyframes gradient-flow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient-flow 5s ease infinite;
        }

        /* Typing Cursor */
        @keyframes blink {

            0%,
            50% {
                opacity: 1;
            }

            51%,
            100% {
                opacity: 0;
            }
        }

        .cursor-blink::after {
            content: '|';
            animation: blink 1s infinite;
        }

        /* Slide Up Fade */
        @keyframes slide-up-fade {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-slide-up {
            animation: slide-up-fade 0.8s ease-out forwards;
        }

        /* Bounce Subtle */
        @keyframes bounce-subtle {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }

        /* Counter Animation */
        @keyframes count-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card Hover Lift */
        .hover-lift {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        /* Magnetic Button Effect */
        .magnetic-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .magnetic-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .magnetic-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        /* Glowing Border */
        .glow-border {
            position: relative;
        }

        .glow-border::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(45deg, #3b82f6, #f59e0b, #3b82f6);
            border-radius: inherit;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
            background-size: 200% 200%;
            animation: gradient-flow 3s ease infinite;
        }

        .glow-border:hover::before {
            opacity: 1;
        }

        /* Particle Background */
        .particles-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(245, 158, 11, 0.5);
            border-radius: 50%;
            animation: float-particle 15s infinite;
        }

        @keyframes float-particle {

            0%,
            100% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }

        /* Text Reveal Animation */
        .text-reveal {
            overflow: hidden;
        }

        .text-reveal span {
            display: inline-block;
            transform: translateY(100%);
            animation: text-reveal 0.8s ease forwards;
        }

        @keyframes text-reveal {
            to {
                transform: translateY(0);
            }
        }

        /* Stagger Animation Delays */
        .stagger-1 {
            animation-delay: 0.1s;
        }

        .stagger-2 {
            animation-delay: 0.2s;
        }

        .stagger-3 {
            animation-delay: 0.3s;
        }

        .stagger-4 {
            animation-delay: 0.4s;
        }

        .stagger-5 {
            animation-delay: 0.5s;
        }

        /* Scroll Progress Bar */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #f59e0b);
            z-index: 9999;
            transition: width 0.1s ease;
        }

        /* Image Zoom on Hover */
        .img-zoom-container {
            overflow: hidden;
        }

        .img-zoom {
            transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .img-zoom-container:hover .img-zoom {
            transform: scale(1.1);
        }

        /* 3D Card Effect */
        .card-3d {
            transform-style: preserve-3d;
            perspective: 1000px;
        }

        .card-3d:hover {
            transform: rotateY(5deg) rotateX(5deg);
        }

        /* Neon Text */
        .neon-text {
            text-shadow:
                0 0 5px currentColor,
                0 0 10px currentColor,
                0 0 20px currentColor,
                0 0 40px currentColor;
        }

        /* Animated Background Shapes */
        .bg-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
        }

        .shape-1 {
            width: 400px;
            height: 400px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            top: -100px;
            right: -100px;
            animation: float-slow 15s ease-in-out infinite;
        }

        .shape-2 {
            width: 300px;
            height: 300px;
            background: linear-gradient(45deg, #f59e0b, #ef4444);
            bottom: -50px;
            left: -50px;
            animation: float-reverse 12s ease-in-out infinite;
        }

        .shape-3 {
            width: 200px;
            height: 200px;
            background: linear-gradient(45deg, #10b981, #3b82f6);
            top: 50%;
            left: 50%;
            animation: float 10s ease-in-out infinite;
        }

        /* Ripple Effect */
        .ripple {
            position: relative;
            overflow: hidden;
        }

        .ripple::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1) translate(-50%, -50%);
            transform-origin: 50% 50%;
        }

        .ripple:active::after {
            animation: ripple-effect 0.6s ease-out;
        }

        @keyframes ripple-effect {
            0% {
                transform: scale(0) translate(-50%, -50%);
                opacity: 1;
            }

            100% {
                transform: scale(100) translate(-50%, -50%);
                opacity: 0;
            }
        }

        /* Smooth Scroll Indicator */
        @keyframes scroll-indicator {
            0% {
                transform: translateY(0);
                opacity: 1;
            }

            50% {
                transform: translateY(10px);
                opacity: 0.5;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .scroll-indicator {
            animation: scroll-indicator 2s ease-in-out infinite;
        }

        /* Notification Badge Bounce */
        @keyframes badge-bounce {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }
        }

        .badge-bounce {
            animation: badge-bounce 2s ease-in-out infinite;
        }

        /* Loading Skeleton */
        @keyframes skeleton-loading {
            0% {
                background-position: -200px 0;
            }

            100% {
                background-position: calc(200px + 100%) 0;
            }
        }

        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200px 100%;
            animation: skeleton-loading 1.5s infinite;
        }

        /* Custom Selection */
        ::selection {
            background: rgba(59, 130, 246, 0.3);
            color: #1e3a8a;
        }

        /* Smooth Image Loading */
        .img-loading {
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .img-loading.loaded {
            opacity: 1;
        }

        /* Parallax Layer */
        .parallax-layer {
            will-change: transform;
            transition: transform 0.1s ease-out;
        }
    </style>
</head>

<body class="antialiased text-slate-800 selection:bg-blue-200 selection:text-blue-900">

    <div class="scroll-progress" id="scrollProgress"></div>

    <div class="particles-bg" id="particles"></div>

    <nav class="glass-nav fixed w-full z-50 shadow-sm" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3 group cursor-pointer">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-blue-900 to-blue-700 rounded-xl flex items-center justify-center shadow-lg shadow-blue-900/20 text-amber-400 transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                            </path>
                        </svg>
                    </div>
                    <span
                        class="text-2xl font-black tracking-tight text-blue-950 group-hover:text-blue-800 transition-colors">
                        EDU<span class="text-amber-500">core</span>
                    </span>
                </div>

                <div class="hidden md:flex items-center space-x-1">
                    <a href="#"
                        class="relative px-4 py-2 text-sm font-bold text-blue-700 rounded-lg overflow-hidden group">
                        <span class="relative z-10">Home</span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 rounded-full transform scale-x-100 transition-transform"></span>
                    </a>
                    <a href="{{ route('academics.index') }}"
                        class="relative px-4 py-2 text-sm font-bold text-slate-500 hover:text-blue-600 rounded-lg overflow-hidden group transition-colors">
                        <span class="relative z-10">Academics</span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
                    </a>
                    <a href="#"
                        class="relative px-4 py-2 text-sm font-bold text-slate-500 hover:text-blue-600 rounded-lg overflow-hidden group transition-colors">
                        <span class="relative z-10">Admissions</span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
                    </a>
                    <a href="#"
                        class="relative px-4 py-2 text-sm font-bold text-slate-500 hover:text-blue-600 rounded-lg overflow-hidden group transition-colors">
                        <span class="relative z-10">Campus Life</span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
                    </a>
                    <a href="{{ route('contact') }}"
                        class="relative px-4 py-2 text-sm font-bold text-slate-500 hover:text-blue-600 rounded-lg overflow-hidden group transition-colors">
                        <span class="relative z-10">Contact</span>
                        <span
                            class="absolute bottom-0 left-0 w-full h-0.5 bg-blue-600 rounded-full transform scale-x-0 group-hover:scale-x-100 transition-transform"></span>
                    </a>
                </div>

                <div class="flex items-center">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="magnetic-btn ripple px-7 py-2.5 bg-gradient-to-r from-blue-950 to-blue-900 hover:from-blue-900 hover:to-blue-800 text-amber-400 text-sm font-bold rounded-full shadow-lg shadow-blue-900/30 transition-all transform hover:-translate-y-1 hover:shadow-blue-900/50 border border-blue-800 flex items-center gap-2 animate-glow">
                                Portal Dashboard
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="magnetic-btn ripple px-7 py-2.5 bg-gradient-to-r from-blue-950 to-blue-900 hover:from-blue-900 hover:to-blue-800 text-amber-400 text-sm font-bold rounded-full shadow-lg shadow-blue-900/30 transition-all transform hover:-translate-y-1 hover:shadow-blue-900/50 border border-blue-800">
                                Secure Login
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="relative pt-20 min-h-[600px] lg:h-[750px] flex items-center overflow-hidden">
        <div class="bg-shapes">
            <div class="shape shape-1 blur-3xl"></div>
            <div class="shape shape-2 blur-3xl"></div>
            <div class="shape shape-3 blur-3xl"></div>
        </div>

        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/home.jpg') }}" alt="School Campus"
                class="w-full h-full object-cover animate-scale-pulse" />
            <div class="absolute inset-0 hero-gradient"></div>
            <div
                class="absolute inset-0 bg-gradient-to-t from-slate-900/50 via-transparent to-transparent animate-gradient opacity-50">
            </div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full mt-10">
            <div class="max-w-3xl">
                <span
                    class="inline-flex items-center py-1.5 px-4 rounded-full bg-amber-500/20 text-amber-400 text-xs font-black uppercase tracking-widest mb-6 border border-amber-500/30 backdrop-blur-md animate-float"
                    data-aos="fade-down" data-aos-duration="800">
                    <span class="relative flex h-2 w-2 mr-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-amber-500"></span>
                    </span>
                    Admissions Open 2026
                </span>

                <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-white leading-[1.1] mb-6 drop-shadow-2xl"
                    data-aos="fade-up" data-aos-duration="1000">
                    <span class="inline-block animate-slide-up">Empowering Minds.</span><br>
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 via-amber-400 to-amber-500 animate-gradient"
                        data-aos="fade-up" data-aos-delay="200">
                        Shaping Futures.
                    </span>
                </h1>

                <p class="text-lg md:text-xl text-slate-300 font-medium mb-10 max-w-2xl leading-relaxed"
                    data-aos="fade-up" data-aos-delay="400">
                    Welcome to <span class="text-amber-400 font-bold">EDUcore</span>. Experience a seamless, modern, and
                    highly efficient educational environment managed by our state-of-the-art Enterprise System.
                </p>

                <div class="flex flex-wrap gap-4" data-aos="fade-up" data-aos-delay="600">
                    @guest
                        <a href="{{ route('login') }}"
                            class="magnetic-btn ripple group inline-flex items-center px-8 py-4 bg-gradient-to-r from-amber-500 to-amber-400 hover:from-amber-400 hover:to-amber-300 text-blue-950 text-base font-black rounded-xl shadow-[0_0_30px_rgba(245,158,11,0.5)] transition-all transform hover:-translate-y-2 hover:shadow-[0_0_50px_rgba(245,158,11,0.7)]">
                            Apply For Admission
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    @endguest
                    <a href="#programs"
                        class="magnetic-btn ripple group inline-flex items-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-md text-base font-black rounded-xl transition-all transform hover:-translate-y-2 hover:border-white/50">
                        <svg class="w-5 h-5 mr-2 transform group-hover:scale-110 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                            </path>
                        </svg>
                        Explore Campus
                    </a>
                </div>

                <div class="flex gap-6 mt-12" data-aos="fade-up" data-aos-delay="800">
                    <div class="flex items-center gap-2 text-white/70">
                        <div
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center animate-float-slow">
                            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold">1,200+ Students</span>
                    </div>
                    <div class="flex items-center gap-2 text-white/70">
                        <div
                            class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center animate-float-reverse">
                            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold">100% Success</span>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex flex-col items-center opacity-70 scroll-indicator">
            <span class="text-white text-[10px] uppercase tracking-widest font-bold mb-2">Scroll to explore</span>
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
                </path>
            </svg>
        </div>
    </div>

    <div class="relative -mt-16 z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-aos="fade-up"
        data-aos-duration="800">
        <div
            class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl shadow-slate-200/50 p-8 grid grid-cols-2 md:grid-cols-4 gap-8 divide-x divide-slate-100 border border-slate-100/50">
            <div class="text-center px-4 group cursor-pointer hover-lift" data-aos="zoom-in" data-aos-delay="0">
                <div
                    class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-blue-50 flex items-center justify-center group-hover:bg-blue-600 group-hover:scale-110 transition-all">
                    <svg class="w-7 h-7 text-blue-600 group-hover:text-white transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-4xl font-black text-blue-600 mb-1 counter" data-target="1200">0<span
                        class="text-amber-500">+</span></h3>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Enrolled Students</p>
            </div>
            <div class="text-center px-4 group cursor-pointer hover-lift" data-aos="zoom-in" data-aos-delay="100">
                <div
                    class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-amber-50 flex items-center justify-center group-hover:bg-amber-500 group-hover:scale-110 transition-all">
                    <svg class="w-7 h-7 text-amber-500 group-hover:text-white transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 0h4m-4 0a4 4 0 01-4 4h4m0 0h4">
                        </path>
                    </svg>
                </div>
                <h3 class="text-4xl font-black text-blue-600 mb-1 counter" data-target="85">0<span
                        class="text-amber-500">+</span></h3>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Expert Faculty</p>
            </div>
            <div class="text-center px-4 group cursor-pointer hover-lift" data-aos="zoom-in" data-aos-delay="200">
                <div
                    class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-emerald-50 flex items-center justify-center group-hover:bg-emerald-500 group-hover:scale-110 transition-all">
                    <svg class="w-7 h-7 text-emerald-500 group-hover:text-white transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-4xl font-black text-blue-600 mb-1">100<span class="text-amber-500">%</span></h3>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Success Rate</p>
            </div>
            <div class="text-center px-4 group cursor-pointer hover-lift" data-aos="zoom-in" data-aos-delay="300">
                <div
                    class="w-14 h-14 mx-auto mb-3 rounded-2xl bg-purple-50 flex items-center justify-center group-hover:bg-purple-500 group-hover:scale-110 transition-all">
                    <svg class="w-7 h-7 text-purple-500 group-hover:text-white transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <h3 class="text-4xl font-black text-blue-600 mb-1 counter" data-target="20">0<span
                        class="text-amber-500">+</span></h3>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Facilities</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">

            <div class="lg:col-span-2 space-y-20">

                <section>
                    <div class="mb-10" data-aos="fade-right">
                        <span
                            class="inline-block px-4 py-1.5 bg-amber-100 text-amber-600 font-bold tracking-widest uppercase text-xs rounded-full mb-3">The
                            EDUcore Difference</span>
                        <h2 class="text-3xl lg:text-4xl font-black text-blue-950 mt-2">Why Choose Our Campus?</h2>
                        <p class="text-slate-500 mt-3 max-w-xl">Discover what makes us the leading educational
                            institution in the region.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="glow-border group bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover-lift overflow-hidden relative"
                            data-aos="fade-up" data-aos-delay="0">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl flex items-center justify-center text-blue-600 mb-6 group-hover:from-blue-600 group-hover:to-blue-500 group-hover:text-white transition-all duration-300 transform group-hover:scale-110 group-hover:rotate-6">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 group-hover:text-blue-600 transition-colors">
                                    Modern Curriculum</h3>
                                <p class="text-slate-500 font-medium leading-relaxed">Our syllabus is constantly
                                    updated to meet international standards and future challenges.</p>
                            </div>
                        </div>

                        <div class="glow-border group bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover-lift overflow-hidden relative"
                            data-aos="fade-up" data-aos-delay="100">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-amber-100 to-amber-50 rounded-2xl flex items-center justify-center text-amber-500 mb-6 group-hover:from-amber-500 group-hover:to-amber-400 group-hover:text-white transition-all duration-300 transform group-hover:scale-110 group-hover:-rotate-6">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                        </path>
                                    </svg>
                                </div>
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 group-hover:text-amber-500 transition-colors">
                                    Tech-Driven Learning</h3>
                                <p class="text-slate-500 font-medium leading-relaxed">Fully digital classrooms
                                    integrated directly with our state-of-the-art EDUcore portal.</p>
                            </div>
                        </div>

                        <div class="glow-border group bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover-lift overflow-hidden relative"
                            data-aos="fade-up" data-aos-delay="200">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-2xl flex items-center justify-center text-emerald-500 mb-6 group-hover:from-emerald-500 group-hover:to-emerald-400 group-hover:text-white transition-all duration-300 transform group-hover:scale-110 group-hover:rotate-6">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                        </path>
                                    </svg>
                                </div>
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 group-hover:text-emerald-500 transition-colors">
                                    Top Faculty</h3>
                                <p class="text-slate-500 font-medium leading-relaxed">Learn from the most experienced
                                    educators dedicated to student growth.</p>
                            </div>
                        </div>

                        <div class="glow-border group bg-white p-8 rounded-3xl shadow-sm border border-slate-100 hover-lift overflow-hidden relative"
                            data-aos="fade-up" data-aos-delay="300">
                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-purple-50 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-purple-100 to-purple-50 rounded-2xl flex items-center justify-center text-purple-600 mb-6 group-hover:from-purple-600 group-hover:to-purple-500 group-hover:text-white transition-all duration-300 transform group-hover:scale-110 group-hover:-rotate-6">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01">
                                        </path>
                                    </svg>
                                </div>
                                <h3
                                    class="text-xl font-bold text-slate-800 mb-3 group-hover:text-purple-600 transition-colors">
                                    Secure Environment</h3>
                                <p class="text-slate-500 font-medium leading-relaxed">24/7 monitored campus ensuring
                                    the absolute safety of every student.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="programs" x-data="{ activeModal: null }">
                    <div class="flex justify-between items-end mb-8" data-aos="fade-right">
                        <div>
                            <span
                                class="inline-block px-4 py-1.5 bg-blue-100 text-blue-600 font-bold tracking-widest uppercase text-xs rounded-full mb-3">Academics</span>
                            <h2 class="text-3xl lg:text-4xl font-black text-blue-950 mt-2">Our Programs</h2>
                        </div>
                        <a href="#"
                            class="hidden sm:flex items-center gap-2 text-blue-600 font-bold hover:text-blue-700 transition-colors group">
                            View All
                            <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3">
                                </path>
                            </svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <div class="relative h-72 rounded-[2rem] overflow-hidden group shadow-xl hover-lift"
                            data-aos="fade-up" data-aos-delay="0">
                            <div class="img-zoom-container absolute inset-0">
                                <img src="{{ asset('images/primaryschool.jpg') }}"
                                    class="w-full h-full object-cover img-zoom" alt="Primary School">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-blue-950 via-blue-950/50 to-transparent flex flex-col justify-end p-8">
                                <div
                                    class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <span
                                        class="inline-block bg-gradient-to-r from-amber-500 to-amber-400 text-blue-950 text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full mb-3 shadow-lg">Grades
                                        1 to 5</span>
                                    <h3 class="text-2xl font-bold text-white mb-2">Elementary School</h3>
                                    <p
                                        class="text-blue-100 text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                        Building strong foundations for lifelong learning and creativity.</p>

                                    <button @click="activeModal = 'elementary'"
                                        class="inline-flex items-center gap-2 mt-4 text-amber-400 font-bold text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200 hover:text-amber-300">
                                        Learn More
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div
                                class="absolute top-4 right-4 w-12 h-12 border-2 border-white/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>

                        <div class="relative h-72 rounded-[2rem] overflow-hidden group shadow-xl hover-lift"
                            data-aos="fade-up" data-aos-delay="100">
                            <div class="img-zoom-container absolute inset-0">
                                <img src="{{ asset('images/highschool.jpg') }}"
                                    class="w-full h-full object-cover img-zoom" alt="High School">
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-blue-950 via-blue-950/50 to-transparent flex flex-col justify-end p-8">
                                <div
                                    class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                                    <span
                                        class="inline-block bg-gradient-to-r from-emerald-500 to-emerald-400 text-white text-[10px] font-black uppercase tracking-widest px-4 py-1.5 rounded-full mb-3 shadow-lg">Grades
                                        6 to 10</span>
                                    <h3 class="text-2xl font-bold text-white mb-2">High School</h3>
                                    <p
                                        class="text-blue-100 text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                        Advanced curriculum focusing on sciences, arts, and real-world skills.</p>

                                    <button @click="activeModal = 'highschool'"
                                        class="inline-flex items-center gap-2 mt-4 text-emerald-400 font-bold text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200 hover:text-emerald-300">
                                        Learn More
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div
                                class="absolute top-4 right-4 w-12 h-12 border-2 border-white/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>
                        </div>
                    </div>

                    <div x-show="activeModal !== null" style="display: none;"
                        class="fixed inset-0 z-[100] flex items-center justify-center p-4">

                        <div x-show="activeModal !== null" x-transition.opacity.duration.300ms
                            @click="activeModal = null" class="absolute inset-0 bg-slate-900/70 backdrop-blur-sm">
                        </div>

                        <div class="z-20 w-full max-w-2xl relative">

                            <div x-show="activeModal === 'elementary'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                x-transition:leave-end="opacity-0 translate-y-8 scale-95"
                                class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">

                                <div class="h-32 bg-gradient-to-r from-blue-900 to-indigo-800 relative p-8">
                                    <button @click="activeModal = null"
                                        class="absolute top-5 right-5 w-10 h-10 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M6 18L18 6M6 6l12 12">
                                            </path>
                                        </svg>
                                    </button>
                                    <div
                                        class="absolute -bottom-10 left-10 w-20 h-20 bg-white rounded-3xl p-3 shadow-xl">
                                        <div
                                            class="w-full h-full bg-blue-100 rounded-2xl flex items-center justify-center text-blue-600">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-16 p-10 overflow-y-auto">
                                    <span
                                        class="text-xs font-black text-blue-500 uppercase tracking-widest mb-1 block">Academics
                                        • Grades 1-5</span>
                                    <h3 class="text-3xl font-black text-blue-950 mb-4 tracking-tight">Elementary School
                                        Program</h3>

                                    <p class="text-slate-600 leading-relaxed mb-6 font-medium">
                                        Our Elementary School program is designed to build a strong foundation for young
                                        learners. We focus on core subjects while fostering creativity, critical
                                        thinking, and social skills in a supportive environment.
                                    </p>

                                    <h4 class="font-bold text-slate-800 text-sm uppercase tracking-widest mb-4">Key
                                        Learning Areas</h4>
                                    <div class="grid grid-cols-2 gap-4 mb-8">
                                        <div
                                            class="bg-blue-50 border border-blue-100 p-4 rounded-xl flex items-center gap-3">
                                            <span
                                                class="w-8 h-8 rounded-lg bg-white text-blue-600 flex items-center justify-center font-black">1</span>
                                            <span class="text-sm font-bold text-blue-900">Numeracy & Logic</span>
                                        </div>
                                        <div
                                            class="bg-blue-50 border border-blue-100 p-4 rounded-xl flex items-center gap-3">
                                            <span
                                                class="w-8 h-8 rounded-lg bg-white text-blue-600 flex items-center justify-center font-black">2</span>
                                            <span class="text-sm font-bold text-blue-900">Literacy & Language</span>
                                        </div>
                                        <div
                                            class="bg-blue-50 border border-blue-100 p-4 rounded-xl flex items-center gap-3">
                                            <span
                                                class="w-8 h-8 rounded-lg bg-white text-blue-600 flex items-center justify-center font-black">3</span>
                                            <span class="text-sm font-bold text-blue-900">Basic Sciences</span>
                                        </div>
                                        <div
                                            class="bg-blue-50 border border-blue-100 p-4 rounded-xl flex items-center gap-3">
                                            <span
                                                class="w-8 h-8 rounded-lg bg-white text-blue-600 flex items-center justify-center font-black">4</span>
                                            <span class="text-sm font-bold text-blue-900">Creative Arts</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('register') }}"
                                        class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-black py-4 rounded-2xl shadow-lg transition-all active:scale-95 uppercase tracking-widest text-sm">Apply
                                        for Admission</a>
                                </div>
                            </div>

                            <div x-show="activeModal === 'highschool'"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                x-transition:leave-end="opacity-0 translate-y-8 scale-95"
                                class="bg-white rounded-[2.5rem] shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">

                                <div class="h-32 bg-gradient-to-r from-emerald-600 to-teal-500 relative p-8">
                                    <button @click="activeModal = null"
                                        class="absolute top-5 right-5 w-10 h-10 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-xl flex items-center justify-center text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                d="M6 18L18 6M6 6l12 12">
                                            </path>
                                        </svg>
                                    </button>
                                    <div
                                        class="absolute -bottom-10 left-10 w-20 h-20 bg-white rounded-3xl p-3 shadow-xl">
                                        <div
                                            class="w-full h-full bg-emerald-100 rounded-2xl flex items-center justify-center text-emerald-600">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="pt-16 p-10 overflow-y-auto">
                                    <span
                                        class="text-xs font-black text-emerald-600 uppercase tracking-widest mb-1 block">Academics
                                        • Grades 6-10</span>
                                    <h3 class="text-3xl font-black text-blue-950 mb-4 tracking-tight">High School
                                        Program</h3>

                                    <p class="text-slate-600 leading-relaxed mb-6 font-medium">
                                        Our High School curriculum prepares students for higher education and future
                                        careers. We offer an advanced program that balances academic rigor with
                                        practical skills in sciences, arts, and technology.
                                    </p>

                                    <h4 class="font-bold text-slate-800 text-sm uppercase tracking-widest mb-4">Focus
                                        Areas</h4>
                                    <div class="grid grid-cols-1 gap-3 mb-8">
                                        <div
                                            class="bg-emerald-50 border border-emerald-100 p-4 rounded-xl flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-emerald-500 text-white flex items-center justify-center">
                                                🔬</div>
                                            <span class="text-sm font-bold text-emerald-950">Advanced STEM Curriculum
                                                (Physics, Chemistry, Biology, IT)</span>
                                        </div>
                                        <div
                                            class="bg-emerald-50 border border-emerald-100 p-4 rounded-xl flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-emerald-500 text-white flex items-center justify-center">
                                                🎨</div>
                                            <span class="text-sm font-bold text-emerald-950">Humanities, Arts &
                                                Languages</span>
                                        </div>
                                        <div
                                            class="bg-emerald-50 border border-emerald-100 p-4 rounded-xl flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-lg bg-emerald-500 text-white flex items-center justify-center">
                                                🤝</div>
                                            <span class="text-sm font-bold text-emerald-950">Leadership, Ethics &
                                                Real-world Skills</span>
                                        </div>
                                    </div>

                                    <a href="{{ route('register') }}"
                                        class="block w-full text-center bg-emerald-600 hover:bg-emerald-700 text-white font-black py-4 rounded-2xl shadow-lg transition-all active:scale-95 uppercase tracking-widest text-sm">Register
                                        Now</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

            </div>

            <div class="lg:col-span-1" x-data="{ noticeModal: null }">

                <div class="bg-gradient-to-br from-blue-950 via-blue-900 to-blue-950 rounded-[2rem] p-8 shadow-2xl top-28 relative overflow-hidden"
                    data-aos="fade-left">
                    <div class="absolute inset-0 opacity-5 pointer-events-none">
                        <div
                            class="absolute top-0 left-0 w-40 h-40 border border-white rounded-full animate-rotate-slow">
                        </div>
                        <div class="absolute bottom-0 right-0 w-32 h-32 border border-white rounded-full animate-rotate-slow"
                            style="animation-direction: reverse;"></div>
                    </div>

                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-8 pb-6 border-b border-blue-700/50">
                            <h2 class="text-xl font-black text-white flex items-center gap-2">
                                <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                                Notice Board
                            </h2>
                            <span class="relative flex h-3 w-3 badge-bounce">
                                <span
                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                            </span>
                        </div>

                        <div class="space-y-4">
                            <button @click="noticeModal = 'notice1'"
                                class="w-full text-left group flex bg-blue-800/30 p-4 rounded-2xl hover:bg-blue-700/50 transition-all duration-300 border border-blue-700/30 hover:border-amber-500/50 hover:translate-x-2">
                                <div
                                    class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 ring-2 ring-blue-700/50 group-hover:ring-amber-500/50 transition-all">
                                    <img src="{{ asset('images/lab.jpg') }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        alt="Lab Upgrade">
                                </div>
                                <div class="ml-4 flex flex-col justify-center">
                                    <h4
                                        class="text-sm font-bold text-blue-50 group-hover:text-amber-400 transition-colors leading-snug">
                                        Technology Lab Upgrade Complete</h4>
                                    <p class="text-[10px] font-bold text-slate-400 mt-2 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        July 11, 2026
                                    </p>
                                </div>
                            </button>

                            <button @click="noticeModal = 'notice2'"
                                class="w-full text-left group flex bg-blue-800/30 p-4 rounded-2xl hover:bg-blue-700/50 transition-all duration-300 border border-blue-700/30 hover:border-amber-500/50 hover:translate-x-2">
                                <div
                                    class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 ring-2 ring-blue-700/50 group-hover:ring-amber-500/50 transition-all">
                                    <img src="{{ asset('images/advisory.jpg') }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        alt="Elections">
                                </div>
                                <div class="ml-4 flex flex-col justify-center">
                                    <h4
                                        class="text-sm font-bold text-blue-50 group-hover:text-amber-400 transition-colors leading-snug">
                                        Student Advisory Board Elections</h4>
                                    <p class="text-[10px] font-bold text-slate-400 mt-2 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        May 25, 2026
                                    </p>
                                </div>
                            </button>

                            <button @click="noticeModal = 'notice3'"
                                class="w-full text-left group flex bg-blue-800/30 p-4 rounded-2xl hover:bg-blue-700/50 transition-all duration-300 border border-blue-700/30 hover:border-amber-500/50 hover:translate-x-2">
                                <div
                                    class="w-16 h-16 rounded-xl overflow-hidden flex-shrink-0 ring-2 ring-blue-700/50 group-hover:ring-amber-500/50 transition-all">
                                    <img src="{{ asset('images/sports.jpg') }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        alt="Sports">
                                </div>
                                <div class="ml-4 flex flex-col justify-center">
                                    <h4
                                        class="text-sm font-bold text-blue-50 group-hover:text-amber-400 transition-colors leading-snug">
                                        Annual Sports Gala Schedule</h4>
                                    <p class="text-[10px] font-bold text-slate-400 mt-2 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        March 15, 2026
                                    </p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <div x-show="noticeModal !== null" style="display: none;"
                    class="fixed inset-0 z-[120] flex items-center justify-center p-4">
                    <div x-show="noticeModal !== null" x-transition.opacity.duration.300ms @click="noticeModal = null"
                        class="absolute inset-0 bg-slate-900/80 backdrop-blur-sm cursor-pointer"></div>

                    <div class="z-30 w-full max-w-lg relative text-left" @click.stop>

                        <div x-show="noticeModal === 'notice1'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-8 scale-95"
                            class="bg-white rounded-3xl shadow-2xl overflow-hidden relative">
                            <div class="h-48 relative">
                                <img src="{{ asset('images/lab.jpg') }}" class="w-full h-full object-cover"
                                    alt="Lab">
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-950 to-transparent opacity-80">
                                </div>
                                <button @click="noticeModal = null"
                                    class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/40 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-8">
                                <div class="flex items-center gap-2 mb-4">
                                    <span
                                        class="px-3 py-1 bg-amber-100 text-amber-600 text-[10px] font-black uppercase tracking-widest rounded-full">Campus
                                        Update</span>
                                    <span class="text-slate-400 text-xs font-bold">July 11, 2026</span>
                                </div>
                                <h3 class="text-2xl font-black text-slate-800 mb-4">Technology Lab Upgrade Complete
                                </h3>
                                <p class="text-slate-600 text-sm leading-relaxed mb-6">We are thrilled to announce that
                                    our main computer science laboratory has been fully upgraded with the latest
                                    equipment. The new lab features 50 high-performance workstations, interactive smart
                                    boards, and dedicated servers for programming projects. Students will have full
                                    access starting next Monday.</p>
                            </div>
                        </div>

                        <div x-show="noticeModal === 'notice2'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-8 scale-95"
                            class="bg-white rounded-3xl shadow-2xl overflow-hidden relative">
                            <div class="h-48 relative">
                                <img src="{{ asset('images/advisory.jpg') }}" class="w-full h-full object-cover"
                                    alt="Advisory">
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-950 to-transparent opacity-80">
                                </div>
                                <button @click="noticeModal = null"
                                    class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/40 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-8">
                                <div class="flex items-center gap-2 mb-4">
                                    <span
                                        class="px-3 py-1 bg-blue-100 text-blue-600 text-[10px] font-black uppercase tracking-widest rounded-full">Student
                                        Life</span>
                                    <span class="text-slate-400 text-xs font-bold">May 25, 2026</span>
                                </div>
                                <h3 class="text-2xl font-black text-slate-800 mb-4">Student Advisory Board Elections
                                </h3>
                                <p class="text-slate-600 text-sm leading-relaxed mb-6">Nominations for the upcoming
                                    Student Advisory Board are now open! This is your chance to step up, represent your
                                    peers, and make a real difference on campus. All interested candidates must submit
                                    their application forms to the admin office by Friday. Voting will take place online
                                    via the portal.</p>
                            </div>
                        </div>

                        <div x-show="noticeModal === 'notice3'" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-8 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-8 scale-95"
                            class="bg-white rounded-3xl shadow-2xl overflow-hidden relative">
                            <div class="h-48 relative">
                                <img src="{{ asset('images/sports.jpg') }}" class="w-full h-full object-cover"
                                    alt="Sports">
                                <div class="absolute inset-0 bg-gradient-to-t from-blue-950 to-transparent opacity-80">
                                </div>
                                <button @click="noticeModal = null"
                                    class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white hover:bg-white/40 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-8">
                                <div class="flex items-center gap-2 mb-4">
                                    <span
                                        class="px-3 py-1 bg-emerald-100 text-emerald-600 text-[10px] font-black uppercase tracking-widest rounded-full">Events</span>
                                    <span class="text-slate-400 text-xs font-bold">March 15, 2026</span>
                                </div>
                                <h3 class="text-2xl font-black text-slate-800 mb-4">Annual Sports Gala Schedule</h3>
                                <p class="text-slate-600 text-sm leading-relaxed mb-6">Get ready for the most exciting
                                    event of the year! The Annual Sports Gala kicks off next week. Registration for
                                    track and field, basketball, and football are currently live. Make sure to sign up
                                    with your house captains. Let's show our team spirit and sportsmanship!</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="py-24 relative overflow-hidden" data-aos="zoom-in">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-950 via-blue-900 to-slate-900"></div>
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-72 h-72 bg-amber-500 rounded-full blur-3xl animate-float-slow"></div>
            <div class="absolute bottom-10 right-10 w-72 h-72 bg-blue-500 rounded-full blur-3xl animate-float-reverse">
            </div>
        </div>

        <div class="relative max-w-4xl mx-auto px-4 text-center">
            <span
                class="inline-block px-4 py-1.5 bg-amber-500/20 text-amber-400 font-bold text-xs rounded-full mb-6 animate-float"
                data-aos="fade-down">
                ✨ Limited Spots Available
            </span>
            <h2 class="text-3xl md:text-5xl lg:text-6xl font-black text-white mb-6" data-aos="fade-up">
                Ready to shape your<br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-300 to-amber-500">child's
                    future?</span>
            </h2>
            <p class="text-lg text-slate-300 font-medium mb-10 max-w-2xl mx-auto" data-aos="fade-up"
                data-aos-delay="100">
                Admissions are currently open for the 2026 academic session. Apply online through our secure portal
                today.
            </p>
            <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
                <a href="{{ route('login') }}"
                    class="magnetic-btn ripple group inline-flex items-center px-10 py-5 bg-gradient-to-r from-amber-500 to-amber-400 hover:from-amber-400 hover:to-amber-300 text-blue-950 text-lg font-black rounded-2xl shadow-2xl shadow-amber-500/30 transition-all transform hover:-translate-y-2 hover:shadow-amber-500/50">
                    Start Enrollment Process
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
                <a href="#"
                    class="magnetic-btn ripple inline-flex items-center px-10 py-5 bg-white/10 hover:bg-white/20 text-white border border-white/30 backdrop-blur-md text-lg font-black rounded-2xl transition-all transform hover:-translate-y-2">
                    Contact Admissions
                </a>
            </div>
        </div>
    </div>

    <footer class="bg-[#0b0f19] pt-20 pb-10 border-t border-slate-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500 rounded-full blur-3xl animate-float-slow"></div>
            <div
                class="absolute bottom-0 right-1/4 w-96 h-96 bg-amber-500 rounded-full blur-3xl animate-float-reverse">
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <div class="lg:col-span-1" data-aos="fade-up">
                    <div class="flex items-center gap-2 mb-6">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-900 to-blue-700 rounded-xl flex items-center justify-center shadow-lg text-amber-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                                </path>
                            </svg>
                        </div>
                        <span class="text-2xl font-black tracking-tight text-white">EDU<span
                                class="text-amber-500">core</span></span>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed mb-6">A next-generation School Management System
                        delivering unparalleled academic and administrative excellence.</p>
                    <div class="flex gap-3">
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-slate-800 hover:bg-blue-600 flex items-center justify-center text-slate-400 hover:text-white transition-all transform hover:-translate-y-1 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-slate-800 hover:bg-pink-600 flex items-center justify-center text-slate-400 hover:text-white transition-all transform hover:-translate-y-1 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 rounded-xl bg-slate-800 hover:bg-blue-700 flex items-center justify-center text-slate-400 hover:text-white transition-all transform hover:-translate-y-1 hover:scale-110">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="100">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-sm flex items-center gap-2">
                        <span class="w-8 h-0.5 bg-amber-500"></span>
                        Quick Links
                    </h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-400">
                        <li><a href="{{ route('about') }}"
                                class="hover:text-amber-400 transition-colors flex items-center gap-2 group"><svg
                                    class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>About Us</a></li>
                        <li><a href="#"
                                class="hover:text-amber-400 transition-colors flex items-center gap-2 group"><svg
                                    class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>Academic Calendar</a></li>
                        <li><a href="#"
                                class="hover:text-amber-400 transition-colors flex items-center gap-2 group"><svg
                                    class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>Fee Structure</a></li>
                        <li><a href="#"
                                class="hover:text-amber-400 transition-colors flex items-center gap-2 group"><svg
                                    class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>Careers</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="200">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-sm flex items-center gap-2">
                        <span class="w-8 h-0.5 bg-amber-500"></span>
                        Support Portal
                    </h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-400">
                        <li><a href="#"
                                class="hover:text-amber-400 transition-colors flex items-center gap-2 group"><svg
                                    class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>Parent Guidelines</a></li>
                        <li><a href="#"
                                class="hover:text-amber-400 transition-colors flex items-center gap-2 group"><svg
                                    class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>IT Helpdesk</a></li>
                        <li><a href="#"
                                class="hover:text-amber-400 transition-colors flex items-center gap-2 group"><svg
                                    class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>Student Handbook</a></li>
                        <li><a href="#"
                                class="hover:text-amber-400 transition-colors flex items-center gap-2 group"><svg
                                    class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>Contact Admin</a></li>
                    </ul>
                </div>

                <div data-aos="fade-up" data-aos-delay="300">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-widest text-sm flex items-center gap-2">
                        <span class="w-8 h-0.5 bg-amber-500"></span>
                        Contact Us
                    </h4>
                    <ul class="space-y-4 text-sm font-medium text-slate-400">
                        <li class="flex items-start group hover:text-amber-400 transition-colors">
                            <svg class="w-5 h-5 mr-3 text-amber-500 mt-0.5 flex-shrink-0 group-hover:scale-110 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>123 Education Boulevard, Campus City, PK</span>
                        </li>
                        <li class="flex items-center group hover:text-amber-400 transition-colors">
                            <svg class="w-5 h-5 mr-3 text-amber-500 flex-shrink-0 group-hover:scale-110 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>admissions@educore.edu</span>
                        </li>
                        <li class="flex items-center group hover:text-amber-400 transition-colors">
                            <svg class="w-5 h-5 mr-3 text-amber-500 flex-shrink-0 group-hover:scale-110 transition-transform"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span>+1 (800) 123-4567</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="pt-8 border-t border-slate-800 text-center flex flex-col md:flex-row justify-between items-center">
                <p class="text-slate-500 text-sm font-medium mb-4 md:mb-0">© 2026 EDUcore Systems. Architected by <span
                        class="text-amber-500">Huzaifa</span>.</p>
                <div class="flex items-center gap-4">
                    <a href="#" class="text-slate-500 hover:text-white text-sm transition-colors">Privacy
                        Policy</a>
                    <span class="text-slate-700">|</span>
                    <a href="#" class="text-slate-500 hover:text-white text-sm transition-colors">Terms of
                        Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS Animations
        AOS.init({
            once: true,
            offset: 100,
            duration: 800,
            easing: 'ease-out-cubic'
        });

        // Scroll Progress Bar
        window.addEventListener('scroll', () => {
            const scrollProgress = document.getElementById('scrollProgress');
            const scrollTop = document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const progress = (scrollTop / scrollHeight) * 100;
            scrollProgress.style.width = progress + '%';
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Counter Animation
        const counters = document.querySelectorAll('.counter');
        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += step;
                if (current < target) {
                    counter.innerHTML = Math.floor(current) + '<span class="text-amber-500">+</span>';
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.innerHTML = target + '<span class="text-amber-500">+</span>';
                }
            };
            updateCounter();
        };

        // Intersection Observer for Counter Animation
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        counters.forEach(counter => counterObserver.observe(counter));

        // Floating Particles
        const particlesContainer = document.getElementById('particles');
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 15 + 's';
            particle.style.animationDuration = (15 + Math.random() * 10) + 's';
            particlesContainer.appendChild(particle);
        }

        // Smooth Scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Magnetic Button Effect
        document.querySelectorAll('.magnetic-btn').forEach(btn => {
            btn.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;
                this.style.transform = `translate(${x * 0.1}px, ${y * 0.1}px)`;
            });

            btn.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        });

        // Image Lazy Load with Fade (FIXED CODE HERE)
        document.querySelectorAll('img').forEach(img => {
            img.classList.add('img-loading');

            // Check if the image is already loaded from browser cache
            if (img.complete) {
                img.classList.add('loaded');
            } else {
                img.addEventListener('load', function() {
                    this.classList.add('loaded');
                });
            }
        });
    </script>
</body>

</html>
