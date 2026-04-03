<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>EDUcore - Portal</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc; /* slate-50 */
        }

        /* Glass Navigation */
        .glass-nav {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(226, 232, 240, 0.5); /* slate-200/50 */
        }

        /* Active Link Indicator */
        .nav-link-active {
            position: relative;
            color: #1e40af !important; /* blue-800 */
        }
        .nav-link-active::after {
            content: '';
            position: absolute;
            bottom: -20px;
            left: 0;
            width: 100%;
            height: 3px;
            background: #f59e0b; /* amber-500 */
            border-radius: 99px;
        }
    </style>
</head>
<body class="antialiased text-slate-800 selection:bg-blue-100">
    
    <div class="min-h-screen" x-data="{ showLogoutModal: false }">
        
        <nav class="glass-nav fixed w-full z-40 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-950 to-blue-800 rounded-xl flex items-center justify-center shadow-lg text-amber-400 group-hover:scale-105 group-hover:rotate-3 transition-all">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                        </div>
                        <span class="text-2xl font-black tracking-tight text-blue-950">
                            EDU<span class="text-amber-500">core</span>
                        </span>
                    </a>

                    <div class="hidden md:flex items-center space-x-2">
                        
                        <a href="{{ url('/') }}" 
                           class="flex items-center gap-1.5 px-4 py-2 text-sm font-bold text-slate-500 hover:text-blue-700 hover:bg-blue-50 rounded-lg transition-colors border border-transparent hover:border-blue-100 mr-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                            Back to Home
                        </a>
                        
                        <div class="w-px h-6 bg-slate-200 mx-1"></div> <a href="{{ route('dashboard') }}" 
                           class="px-4 py-2 text-sm font-bold rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'nav-link-active' : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50' }}">
                            Dashboard
                        </a>
                        
                        @if(Auth::user() && Auth::user()->hasRole('Teacher'))
                            <a href="{{ route('teacher.students') }}" 
                               class="px-4 py-2 text-sm font-bold rounded-lg transition-colors {{ request()->routeIs('teacher.students') ? 'nav-link-active' : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50' }}">
                                My Students
                            </a>
                            <a href="{{ route('teacher.assignments') }}" 
                               class="px-4 py-2 text-sm font-bold rounded-lg transition-colors {{ request()->routeIs('teacher.assignments') ? 'nav-link-active' : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50' }}">
                                Assignments
                            </a>
                        @endif

                        @if(Auth::user() && Auth::user()->hasRole('Student'))
                            <a href="{{ route('student.assignments') }}" 
                               class="px-4 py-2 text-sm font-bold rounded-lg transition-colors {{ request()->routeIs('student.assignments') ? 'nav-link-active' : 'text-slate-600 hover:text-blue-700 hover:bg-blue-50' }}">
                                My Assignments
                            </a>
                        @endif

                    </div>

                    <div class="hidden md:flex items-center">
                        @if(Auth::user())
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center gap-3 bg-slate-100 px-4 py-2 rounded-full hover:bg-slate-200 transition-colors">
                                <div class="w-8 h-8 rounded-full bg-blue-700 text-amber-400 font-black flex items-center justify-center shadow-inner">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-bold text-blue-950">{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 text-slate-500" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            
                            <div x-show="open" @click.away="open = false" x-transition class="absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50" style="display: none;">
                                <a href="{{ route('profile.edit') }}" class="block px-5 py-2.5 text-sm font-semibold text-slate-700 hover:bg-blue-50 hover:text-blue-700">My Profile</a>
                                
                                <button type="button" @click="showLogoutModal = true; open = false" class="w-full text-left block px-5 py-2.5 text-sm font-semibold text-rose-600 hover:bg-rose-50">
                                    Log Out
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </nav>

        @if (isset($header))
            <header class="pt-28 bg-white border-b border-slate-100">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <main class="relative z-10">
            {{ $slot }}
        </main>

        <div x-show="showLogoutModal" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6">
            <div x-show="showLogoutModal" x-transition.opacity @click="showLogoutModal = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>
            
            <div x-show="showLogoutModal" x-transition:enter="ease-out duration-300 scale-95" class="relative bg-white rounded-[2rem] shadow-2xl w-full max-w-sm overflow-hidden z-10 p-8 text-center border border-white/20">
                
                <div class="w-20 h-20 bg-rose-50 border border-rose-100 text-rose-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-inner">
                    <svg class="w-10 h-10 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                </div>
                
                <h3 class="text-2xl font-black text-slate-800 mb-2">Leaving so soon?</h3>
                <p class="text-slate-500 font-medium mb-8">Are you sure you want to log out of your account?</p>
                
                <div class="flex gap-3">
                    <button @click="showLogoutModal = false" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold py-3.5 rounded-xl transition-all active:scale-95">
                        Cancel
                    </button>
                    <form method="POST" action="{{ route('logout') }}" class="flex-1">
                        @csrf
                        <button type="submit" class="w-full bg-rose-600 hover:bg-rose-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-rose-600/30 transition-all active:scale-95 flex justify-center items-center gap-2">
                            Yes, Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>