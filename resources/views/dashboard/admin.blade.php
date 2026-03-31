<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduCore - Super Admin Portal</title>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Custom Scrollbar for a premium feel */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-hidden flex h-screen">

    <aside class="w-72 bg-blue-950 text-white flex-col shadow-2xl z-20 hidden md:flex">
        <div class="h-20 flex items-center px-8 border-b border-blue-900/50">
            <div
                class="w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/20 mr-3">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                    </path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-extrabold tracking-tight text-white">Edu<span
                        class="text-amber-400">Core</span></h1>
                <p class="text-[10px] text-blue-300 uppercase tracking-widest font-semibold">Enterprise ERP</p>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
            <p class="px-4 text-xs font-bold text-blue-400/60 uppercase tracking-wider mb-2 mt-4">Main Menu</p>

            <a href="#"
                class="flex items-center px-4 py-3 bg-blue-900/50 text-amber-400 rounded-xl group border border-blue-800/50 shadow-inner transition-all">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                <span class="font-semibold text-sm">Dashboard Overview</span>
            </a>

            <a href="{{ route('admin.academic.index') }}"
                class="flex items-center px-4 py-3 text-blue-200 hover:bg-blue-900/30 hover:text-white rounded-xl transition-all group">
                <svg class="w-5 h-5 mr-3 text-blue-400 group-hover:text-amber-400 transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                <span class="font-medium text-sm">Academic Setup</span>
            </a>

            <a href="{{ route('admin.allocations.index') }}"
                class="flex items-center px-4 py-3 text-blue-200 hover:bg-blue-900/30 hover:text-white rounded-xl transition-all group">
                <svg class="w-5 h-5 mr-3 text-blue-400 group-hover:text-amber-400 transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                    </path>
                </svg>
                <span class="font-medium text-sm">Resource Allocation</span>
            </a>

            <a href="#"
                class="flex items-center justify-between px-4 py-3 text-blue-200 hover:bg-blue-900/30 hover:text-white rounded-xl transition-all group">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-blue-400 group-hover:text-amber-400 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                    <span class="font-medium text-sm">User Management</span>
                </div>
                @if ($stats['pending_list']->count() > 0)
                    <span
                        class="bg-amber-500 text-blue-950 text-[10px] font-extrabold px-2 py-0.5 rounded-full">{{ $stats['pending_list']->count() }}</span>
                @endif
            </a>

            <a href="{{ route('admin.enrollments.index') }}"
                class="flex items-center px-4 py-3 text-blue-200 hover:bg-blue-900/30 hover:text-white rounded-xl transition-all group">
                <svg class="w-5 h-5 mr-3 text-blue-400 group-hover:text-amber-400 transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                </svg>
                <span class="font-medium text-sm">Admissions Desk</span>
            </a>

            <a href="{{ route('admin.financials.index') }}"
                class="flex items-center justify-between px-4 py-3 text-blue-200 hover:bg-blue-900/30 hover:text-white rounded-xl transition-all group">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3 text-blue-400 group-hover:text-amber-400 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z">
                        </path>
                    </svg>
                    <span class="font-medium text-sm">Financial Engine</span>
                </div>
                <span
                    class="bg-amber-500 text-slate-900 text-[10px] font-extrabold px-2 py-0.5 rounded shadow-sm">LIVE</span>
            </a>
        </nav>

        <div class="p-4 border-t border-blue-900/50">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full flex items-center px-4 py-3 text-rose-400 hover:bg-rose-500/10 rounded-xl transition-all group">
                    <svg class="w-5 h-5 mr-3 group-hover:-translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <span class="font-semibold text-sm">Secure Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <div class="flex-1 flex flex-col min-w-0 bg-slate-50/50 relative">

        <header
            class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-10">
            <div class="max-w-md w-full relative hidden lg:block">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="text" placeholder="Search students, teachers, or transactions (Press '/')"
                    class="block w-full pl-10 pr-3 py-2.5 border border-slate-200 rounded-xl leading-5 bg-slate-50 text-slate-900 placeholder-slate-400 focus:outline-none focus:bg-white focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all sm:text-sm">
            </div>

            <div class="flex items-center space-x-6 ml-auto">
                <button
                    class="relative p-2 text-slate-400 hover:text-blue-600 transition-colors rounded-full hover:bg-blue-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                        </path>
                    </svg>
                    @if ($stats['pending_list']->count() > 0)
                        <span
                            class="absolute top-1.5 right-1.5 block h-2.5 w-2.5 rounded-full bg-rose-500 ring-2 ring-white animate-pulse"></span>
                    @endif
                </button>

                <div class="h-8 w-px bg-slate-200 hidden sm:block"></div>

                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-bold text-slate-700 leading-none">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-blue-600 font-semibold mt-1">Super Admin</p>
                    </div>
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-blue-400 text-white flex items-center justify-center font-bold text-lg shadow-md border-2 border-white">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-6 lg:p-10">

            <div class="flex flex-col md:flex-row md:items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Organization Overview</h2>
                    <p class="text-slate-500 font-medium mt-1">Real-time metrics and operational insights for EduCore.
                    </p>
                </div>
                <div class="mt-4 md:mt-0 flex gap-3">
                    <button
                        class="px-4 py-2 bg-white border border-slate-200 text-slate-700 text-sm font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-2 text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        Export Report
                    </button>
                    <a href="{{ route('admin.academic.index') }}"
                        class="px-4 py-2 bg-blue-600 text-white text-sm font-bold rounded-xl shadow-md shadow-blue-500/30 hover:bg-blue-700 transition-colors flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Manage Classes
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -z-10 transition-transform group-hover:scale-110">
                    </div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-blue-500/10 text-blue-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center text-emerald-600 text-sm font-bold bg-emerald-50 px-2.5 py-1 rounded-full">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            12%
                        </span>
                    </div>
                    <h3 class="text-3xl font-extrabold text-slate-800">{{ $stats['active_students'] }}</h3>
                    <p class="text-sm font-semibold text-slate-500 mt-1">Total Active Students</p>
                    <div
                        class="mt-4 pt-4 border-t border-slate-100 flex items-center text-xs font-semibold text-amber-600">
                        <span class="w-2 h-2 rounded-full bg-amber-500 mr-2 animate-pulse"></span>
                        {{ $stats['pending_students'] }} Registrations Pending
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-indigo-50 rounded-bl-full -z-10 transition-transform group-hover:scale-110">
                    </div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-indigo-500/10 text-indigo-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                        <span
                            class="flex items-center text-emerald-600 text-sm font-bold bg-emerald-50 px-2.5 py-1 rounded-full">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                            </svg>
                            4.2%
                        </span>
                    </div>
                    <h3 class="text-3xl font-extrabold text-slate-800">{{ $stats['active_teachers'] }}</h3>
                    <p class="text-sm font-semibold text-slate-500 mt-1">Total Active Teachers</p>
                    <div
                        class="mt-4 pt-4 border-t border-slate-100 flex items-center text-xs font-semibold text-amber-600">
                        <span class="w-2 h-2 rounded-full bg-amber-500 mr-2 animate-pulse"></span>
                        {{ $stats['pending_teachers'] }} Approvals Pending
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-emerald-500/10 text-emerald-600 rounded-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-extrabold text-slate-300">Rs. --</h3>
                    <p class="text-sm font-semibold text-slate-400 mt-1">Expected Fee Revenue</p>
                    <div class="mt-4 pt-4 border-t border-slate-100">
                        <div class="w-full bg-slate-100 rounded-full h-1.5">
                            <div class="bg-emerald-400 h-1.5 rounded-full" style="width: 0%"></div>
                        </div>
                        <p class="text-[10px] text-slate-400 font-bold uppercase mt-2 text-right tracking-wider">Setup
                            Required</p>
                    </div>
                </div>

                <div
                    class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl p-6 shadow-lg shadow-slate-900/20 text-white relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-white opacity-5 rounded-full blur-2xl"></div>
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-white/10 text-amber-400 rounded-xl border border-white/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-3xl font-extrabold text-white">Rs. --</h3>
                    <p class="text-sm font-medium text-slate-400 mt-1">Dynamic Payroll Estimate</p>
                    <div
                        class="mt-4 pt-4 border-t border-slate-700/50 flex items-center justify-between text-xs font-semibold text-slate-300">
                        <span>Base + Subject Rate</span>
                        <a href="#"
                            class="text-amber-400 hover:text-amber-300 underline underline-offset-2">Configure</a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">

                <div class="lg:col-span-2 bg-white border border-slate-200 rounded-2xl shadow-sm flex flex-col">
                    <div
                        class="px-6 py-5 border-b border-slate-100 flex items-center justify-between bg-slate-50/50 rounded-t-2xl">
                        <div>
                            <h3 class="text-lg font-extrabold text-slate-800">Priority Approvals Queue</h3>
                            <p class="text-xs font-semibold text-slate-500 mt-0.5">Users waiting for administrative
                                clearance.</p>
                        </div>
                        <span
                            class="bg-rose-100 text-rose-700 text-xs font-extrabold px-3 py-1 rounded-full border border-rose-200 shadow-sm">{{ $stats['pending_list']->count() }}
                            Action Required</span>
                    </div>

                    <div class="overflow-x-auto flex-1 p-0">
                        @if ($stats['pending_list']->count() > 0)
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr
                                        class="bg-white border-b border-slate-100 text-[10px] uppercase tracking-wider text-slate-400 font-bold">
                                        <th class="px-6 py-4">Applicant Detail</th>
                                        <th class="px-6 py-4">Requested Role</th>
                                        <th class="px-6 py-4">Applied Date</th>
                                        <th class="px-6 py-4 text-right">Decision</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @foreach ($stats['pending_list'] as $pendingUser)
                                        <tr class="hover:bg-slate-50/80 transition-colors group">
                                            <td class="px-6 py-4">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <div
                                                            class="h-10 w-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-bold text-sm border-2 border-white shadow-sm">
                                                            {{ substr($pendingUser->name, 0, 1) }}
                                                        </div>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-bold text-slate-900">
                                                            {{ $pendingUser->name }}</div>
                                                        <div class="text-xs text-slate-500">{{ $pendingUser->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4">
                                                @php $roleName = $pendingUser->roles->first()->name ?? 'Student'; @endphp
                                                @if ($roleName == 'Teacher')
                                                    <span
                                                        class="px-2.5 py-1 inline-flex text-[10px] leading-4 font-extrabold rounded-md bg-indigo-50 text-indigo-700 border border-indigo-100">Teaching
                                                        Staff</span>
                                                @else
                                                    <span
                                                        class="px-2.5 py-1 inline-flex text-[10px] leading-4 font-extrabold rounded-md bg-blue-50 text-blue-700 border border-blue-100">Student</span>
                                                @endif
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-xs font-semibold text-slate-600">
                                                    {{ $pendingUser->created_at->format('d M, Y') }}</div>
                                                <div class="text-[10px] text-slate-400">
                                                    {{ $pendingUser->created_at->diffForHumans() }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <div
                                                    class="flex justify-end gap-2 opacity-100 lg:opacity-0 group-hover:opacity-100 transition-opacity">
                                                    <form
                                                        action="{{ route('admin.students.approve', $pendingUser->id) }}"
                                                        method="POST">
                                                        @csrf @method('PATCH')
                                                        <button type="submit"
                                                            class="p-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-500 hover:text-white rounded-lg transition-colors shadow-sm tooltip"
                                                            title="Approve">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('admin.students.reject', $pendingUser->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to reject and delete this application?');">
                                                        @csrf @method('DELETE')
                                                        <button type="submit"
                                                            class="p-2 bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white rounded-lg transition-colors shadow-sm"
                                                            title="Reject">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex flex-col items-center justify-center py-16 text-center">
                                <div
                                    class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-emerald-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-lg font-bold text-slate-800">Inbox Zero!</h4>
                                <p class="text-sm text-slate-500 max-w-sm mt-1">All applications have been processed.
                                    You're up to date.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl shadow-sm flex flex-col">
                    <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="text-base font-extrabold text-slate-800">System Activity</h3>
                        <button class="text-slate-400 hover:text-blue-600"><svg class="w-5 h-5" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z">
                                </path>
                            </svg></button>
                    </div>

                    <div class="p-6 flex-1">
                        <div class="relative pl-4 border-l-2 border-slate-100 space-y-8">

                            <div class="relative">
                                <span
                                    class="absolute -left-[25px] top-1 h-3 w-3 rounded-full bg-blue-500 ring-4 ring-white"></span>
                                <p class="text-xs font-bold text-slate-800">System Setup Initiated</p>
                                <p class="text-xs text-slate-500 mt-1">Super Admin logged into the portal.</p>
                                <p class="text-[10px] font-bold text-slate-400 mt-1">Just now</p>
                            </div>

                            <div class="relative">
                                <span
                                    class="absolute -left-[25px] top-1 h-3 w-3 rounded-full bg-emerald-500 ring-4 ring-white"></span>
                                <p class="text-xs font-bold text-slate-800">Classes & Subjects Database Ready</p>
                                <p class="text-xs text-slate-500 mt-1">Academic repository is fully functional.</p>
                                <p class="text-[10px] font-bold text-slate-400 mt-1">2 hours ago</p>
                            </div>

                            <div class="relative">
                                <span
                                    class="absolute -left-[25px] top-1 h-3 w-3 rounded-full bg-slate-300 ring-4 ring-white"></span>
                                <p class="text-xs font-bold text-slate-400">Waiting for Financial Setup</p>
                                <p
                                    class="text-xs text-slate-400 border border-dashed border-slate-200 p-2 rounded bg-slate-50 mt-2">
                                    Next step: Fee Structures</p>
                            </div>

                        </div>
                    </div>
                    <div class="p-4 border-t border-slate-100 bg-slate-50 rounded-b-2xl text-center">
                        <a href="#"
                            class="text-sm font-bold text-blue-600 hover:text-blue-800 transition-colors">View All
                            Activity &rarr;</a>
                    </div>
                </div>

            </div>

        </main>
    </div>

</body>

</html>
