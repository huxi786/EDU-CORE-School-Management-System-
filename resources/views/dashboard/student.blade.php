<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Student Portal - EDUcore</title>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900&display=swap"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
        }

        .card-glow {
            transition: all 0.3s ease;
        }

        .card-glow:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="text-slate-800 antialiased">

    <div class="min-h-screen flex flex-col" x-data="{ showLogoutModal: false }">

        <header class="bg-white/80 backdrop-blur-md border-b border-slate-200 h-20 flex items-center justify-between px-8 sticky top-0 z-40">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-900 rounded-xl flex items-center justify-center text-amber-400 shadow-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    </svg>
                </div>
                <span class="text-xl font-black text-blue-950 tracking-tight">EDU<span
                        class="text-amber-500">core</span></span>
            </div>

            <div class="flex items-center gap-6">
                <a href="{{ url('/') }}" class="flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-blue-600 uppercase tracking-widest transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Home
                </a>

                <div class="w-px h-5 bg-slate-200"></div>

                <button type="button" @click="showLogoutModal = true"
                    class="text-xs font-bold text-slate-500 hover:text-rose-600 uppercase tracking-widest transition-colors">
                    Logout
                </button>
            </div>
        </header>

        <main class="p-6 md:p-10 max-w-7xl mx-auto w-full relative z-10">

            <div class="mb-10">
                <h1 class="text-3xl font-black text-blue-950">Assalam-o-Alaikum, {{ $user->name }}! 👋</h1>
                <p class="text-slate-500 font-medium">Welcome back to your academic portal. Here is what's happening
                    today.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                <div class="lg:col-span-1">
                    <div
                        class="bg-gradient-to-br from-blue-950 to-indigo-900 rounded-[2.5rem] p-8 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>

                        <div class="flex flex-col items-center text-center relative z-10">
                            <div
                                class="w-24 h-24 rounded-3xl bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center text-4xl font-black mb-4 shadow-xl">
                                {{ substr($user->name, 0, 1) }}
                            </div>
                            <h2 class="text-xl font-black leading-tight">{{ $user->name }}</h2>
                            <p class="text-blue-300 text-xs font-bold uppercase tracking-widest mt-1">Enrolled Student
                            </p>

                            <div class="w-full mt-8 space-y-4 text-left">
                                <div class="bg-white/10 p-4 rounded-2xl border border-white/5">
                                    <p class="text-[10px] text-blue-300 font-black uppercase tracking-widest">Class &
                                        Section</p>
                                    <p class="text-sm font-bold">{{ $enrollment->schoolClass->name }} -
                                        {{ $enrollment->schoolClass->section }}</p>
                                </div>
                                <div class="bg-white/10 p-4 rounded-2xl border border-white/5">
                                    <p class="text-[10px] text-blue-300 font-black uppercase tracking-widest">Roll
                                        Number</p>
                                    <p class="text-sm font-black tracking-widest">{{ $enrollment->roll_number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-3 space-y-8">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm card-glow">
                            <div
                                class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Attendance</p>
                            <h3 class="text-2xl font-black text-slate-800">92% <span
                                    class="text-xs font-bold text-emerald-500 ml-1">Excellent</span></h3>
                        </div>

                        <a href="{{ route('student.assignments') }}"
                            class="relative bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group overflow-hidden block">

                            <div
                                class="absolute top-0 right-0 w-32 h-32 bg-indigo-50 rounded-full blur-2xl -translate-y-10 translate-x-10 group-hover:bg-indigo-100 transition-colors duration-500">
                            </div>

                            <div class="relative z-10 flex items-start justify-between">
                                <div>
                                    <div
                                        class="w-14 h-14 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center shadow-inner mb-4 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                            </path>
                                        </svg>
                                    </div>
                                    <h3 class="text-slate-500 font-bold text-sm uppercase tracking-widest mb-1">Pending
                                        Tasks</h3>

                                    <div class="flex items-baseline gap-2">
                                        <span
                                            class="text-4xl font-black text-slate-800">{{ $pendingAssignmentsCount ?? 0 }}</span>
                                        @if (($pendingAssignmentsCount ?? 0) > 0)
                                            <span
                                                class="text-xs font-bold text-rose-500 bg-rose-50 px-2 py-1 rounded-md animate-pulse">Action
                                                Required</span>
                                        @else
                                            <span
                                                class="text-xs font-bold text-emerald-500 bg-emerald-50 px-2 py-1 rounded-md">All
                                                Clear</span>
                                        @endif
                                    </div>
                                </div>

                                <div
                                    class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-indigo-600 group-hover:text-white transition-colors duration-300">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </div>
                            </div>
                        </a>

                        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm card-glow">
                            <div
                                class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Fee Status</p>
                            <h3 class="text-2xl font-black text-slate-800">Paid <span
                                    class="text-xs font-bold text-slate-400 ml-1">March 2026</span></h3>
                        </div>

                        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm card-glow">
                            <div
                                class="w-12 h-12 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Subjects</p>
                            <h3 class="text-2xl font-black text-slate-800">8 <span
                                    class="text-xs font-bold text-slate-400 ml-1">Enrolled</span></h3>
                        </div>
                    </div>

                    <div class="bg-white rounded-[2.5rem] p-8 border border-slate-200 shadow-sm">
                        <h3 class="text-xl font-black text-blue-950 mb-6 flex items-center">
                            <span class="w-2 h-8 bg-amber-500 rounded-full mr-3"></span>
                            Latest Announcements
                        </h3>
                        <div class="space-y-6">
                            <div
                                class="flex gap-4 p-4 rounded-2xl bg-slate-50 border border-slate-100 transition-colors hover:bg-white">
                                <div
                                    class="text-center bg-white px-3 py-2 rounded-xl border border-slate-200 h-max shadow-sm">
                                    <p class="text-[10px] font-black text-slate-400 uppercase">Mar</p>
                                    <p class="text-lg font-black text-blue-900 leading-none">28</p>
                                </div>
                                <div>
                                    <h4 class="text-sm font-black text-slate-800 tracking-tight">Parent-Teacher Meeting
                                        (PTM)</h4>
                                    <p class="text-xs text-slate-500 mt-1">Scheduled for upcoming Saturday at 09:00 AM
                                        in the main auditorium.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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