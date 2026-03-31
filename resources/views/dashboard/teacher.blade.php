<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educator Portal - EDUcore</title>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #fafafa; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-thumb { background: #d8b4fe; border-radius: 10px; }
        .glass-top { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(12px); border-bottom: 1px solid rgba(243, 244, 246, 0.8); }
        .teacher-gradient { background: linear-gradient(135deg, #4c1d95 0%, #7e22ce 100%); }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex">

    <aside class="w-20 lg:w-72 bg-white border-r border-slate-200 flex-col transition-all z-20 hidden sm:flex">
        <div class="h-20 flex items-center justify-center lg:justify-start lg:px-8 border-b border-slate-100">
            <div class="w-10 h-10 bg-gradient-to-br from-violet-600 to-fuchsia-600 rounded-xl flex items-center justify-center text-white font-bold shadow-md">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
            </div>
            <span class="hidden lg:block text-xl font-black text-slate-900 ml-3 tracking-tight">EDU<span class="text-violet-600">core</span></span>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 flex flex-col gap-2 px-3">
            <p class="hidden lg:block px-4 text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">My Workspace</p>
            
            <a href="#" class="flex items-center px-3 py-3 bg-violet-50 text-violet-700 rounded-xl group border border-violet-100">
                <svg class="w-5 h-5 lg:mr-3 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                <span class="hidden lg:block font-bold text-sm">Overview</span>
            </a>

            <a href="{{ route('teacher.students') }}" class="flex items-center px-3 py-3 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-colors">
                <svg class="w-5 h-5 lg:mr-3 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <span class="hidden lg:block font-bold text-sm">My Students</span>
            </a>

            <a href="{{ route('teacher.assignments') }}" class="flex items-center px-3 py-3 text-slate-500 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-colors">
                <svg class="w-5 h-5 lg:mr-3 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                <span class="hidden lg:block font-bold text-sm">Assignments</span>
            </a>
        </nav>

        <div class="p-4 border-t border-slate-100">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="w-full flex items-center justify-center lg:justify-start px-3 py-3 text-rose-500 hover:bg-rose-50 rounded-xl transition-colors font-bold text-sm">
                    <svg class="w-5 h-5 lg:mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    <span class="hidden lg:block">Sign Out</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 bg-slate-50/50">
        
        <header class="h-20 glass-top flex items-center justify-between px-6 lg:px-10 sticky top-0 z-10">
            <div class="flex items-center">
                <span class="bg-violet-100 text-violet-700 text-xs font-black px-3 py-1 rounded-full uppercase tracking-widest border border-violet-200">Educator Portal</span>
            </div>
            <div class="flex items-center gap-4">
                <button class="w-10 h-10 bg-white border border-slate-200 rounded-full flex items-center justify-center text-slate-400 hover:text-violet-600 hover:border-violet-200 transition-colors shadow-sm relative">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <span class="absolute top-0 right-0 w-2.5 h-2.5 bg-rose-500 border-2 border-white rounded-full"></span>
                </button>
                <div class="flex items-center gap-3 bg-white p-1.5 pr-4 rounded-full border border-slate-200 shadow-sm cursor-pointer hover:border-violet-300 transition-colors">
                    <div class="w-8 h-8 rounded-full bg-violet-600 text-white flex items-center justify-center font-bold text-sm">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span class="text-sm font-bold text-slate-700">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-6 lg:p-10 space-y-8">

            <div class="teacher-gradient rounded-3xl p-8 lg:p-10 text-white shadow-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl translate-x-1/3 -translate-y-1/3"></div>
                <div class="absolute bottom-0 right-32 w-40 h-40 bg-fuchsia-500 opacity-20 rounded-full blur-2xl"></div>
                
                <div class="relative z-10 max-w-2xl">
                    <h1 class="text-3xl lg:text-4xl font-black mb-2">Welcome back, Professor {{ explode(' ', Auth::user()->name)[0] }}! 👋</h1>
                    <p class="text-violet-200 text-sm lg:text-base font-medium mb-8 leading-relaxed">Your teaching workspace is ready. You have {{ $allocations->count() }} classes assigned for this academic session.</p>
                    
                    <div class="flex flex-wrap gap-4">
                        <button class="px-6 py-3 bg-white text-violet-900 font-bold rounded-xl shadow-lg hover:bg-slate-50 transition-colors transform hover:-translate-y-0.5">
                            Mark Attendance
                        </button>
                        <button class="px-6 py-3 bg-violet-800 border border-violet-500 hover:bg-violet-700 text-white font-bold rounded-xl shadow-lg transition-colors transform hover:-translate-y-0.5">
                            Upload Assignment
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center justify-between group hover:border-violet-200 transition-colors">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Assigned Classes</p>
                        <h3 class="text-3xl font-black text-slate-800">{{ $allocations->count() }}</h3>
                    </div>
                    <div class="w-14 h-14 bg-violet-50 text-violet-600 rounded-2xl flex items-center justify-center transform group-hover:rotate-6 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center justify-between group hover:border-fuchsia-200 transition-colors">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Unique Subjects</p>
                        <h3 class="text-3xl font-black text-slate-800">{{ $allocations->unique('subject_id')->count() }}</h3>
                    </div>
                    <div class="w-14 h-14 bg-fuchsia-50 text-fuchsia-600 rounded-2xl flex items-center justify-center transform group-hover:-rotate-6 transition-transform">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex items-center justify-between group hover:border-emerald-200 transition-colors relative overflow-hidden">
                    <div class="absolute right-0 top-0 w-2 h-full bg-emerald-400"></div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Current Payout</p>
                        @if($salaryInfo)
                            <h3 class="text-3xl font-black text-slate-800">Rs. {{ number_format($totalSalary, 0) }}</h3>
                            <p class="text-[10px] text-emerald-600 font-bold mt-1">Calculated successfully</p>
                        @else
                            <h3 class="text-xl font-black text-slate-300">Pending Setup</h3>
                            <p class="text-[10px] text-amber-500 font-bold mt-1">Contact Administration</p>
                        @endif
                    </div>
                    <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-black text-slate-800">My Teaching Schedule</h2>
                    <a href="#" class="text-sm font-bold text-violet-600 hover:text-violet-800">View Time Table &rarr;</a>
                </div>

                @if($allocations->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($allocations as $allocation)
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden hover:shadow-md transition-shadow group">
                            <div class="h-2 bg-gradient-to-r from-violet-400 to-fuchsia-400"></div>
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <span class="px-2.5 py-1 bg-violet-50 text-violet-700 text-[10px] font-black uppercase tracking-widest rounded-md border border-violet-100">
                                        {{ $allocation->subject->code }}
                                    </span>
                                    <button class="text-slate-300 hover:text-violet-600"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path></svg></button>
                                </div>
                                
                                <h3 class="text-xl font-black text-slate-800 mb-1 leading-tight">{{ $allocation->subject->name }}</h3>
                                <div class="flex items-center text-slate-500 mb-6">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 8h5"></path></svg>
                                    <span class="text-sm font-bold">Class: {{ $allocation->schoolClass->name }} {{ $allocation->schoolClass->section ? ' - '.$allocation->schoolClass->section : '' }}</span>
                                </div>

                                <div class="flex gap-2">
                                    <button class="flex-1 py-2 bg-slate-50 hover:bg-violet-50 text-slate-600 hover:text-violet-700 text-xs font-bold rounded-lg border border-slate-200 transition-colors">Students List</button>
                                    <button class="flex-1 py-2 bg-slate-50 hover:bg-violet-50 text-slate-600 hover:text-violet-700 text-xs font-bold rounded-lg border border-slate-200 transition-colors">Add Marks</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="bg-white rounded-3xl p-12 text-center border-2 border-dashed border-slate-200">
                        <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        </div>
                        <h3 class="text-lg font-black text-slate-700">No Classes Assigned</h3>
                        <p class="text-sm font-medium text-slate-500 mt-2">The administration has not assigned any classes to you for this session yet.</p>
                    </div>
                @endif
            </div>

        </div>
    </main>

</body>
</html>