<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Engine - EduCore</title>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        .glass-header { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col">

    <header class="h-20 glass-header border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-50 shadow-sm">
        <div class="flex items-center gap-4">
            <a href="{{ route('dashboard') }}" class="p-2.5 bg-slate-100 hover:bg-blue-50 text-slate-500 hover:text-blue-700 rounded-xl transition-all group">
                <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h1 class="text-2xl font-extrabold text-blue-950 tracking-tight flex items-center">
                    <svg class="w-6 h-6 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Academic Engine
                </h1>
                <p class="text-xs font-semibold text-slate-500 mt-0.5 uppercase tracking-wider">Configure Classes & Subjects</p>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="hidden sm:block text-right">
                <p class="text-sm font-bold text-slate-700">{{ Auth::user()->name ?? 'Super Admin' }}</p>
                <p class="text-[10px] text-emerald-600 font-extrabold tracking-widest uppercase">System Online</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-blue-900 text-white flex items-center justify-center font-bold shadow-lg shadow-blue-900/20">
                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-7xl w-full mx-auto p-6 lg:p-10">

        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-50 border border-emerald-200 rounded-2xl flex items-center text-emerald-800 shadow-sm animate-pulse">
                <div class="p-2 bg-emerald-100 rounded-lg mr-4"><svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg></div>
                <p class="font-bold text-sm">{{ session('success') }}</p>
            </div>
        @endif
        @if(session('error'))
            <div class="mb-8 p-4 bg-rose-50 border border-rose-200 rounded-2xl flex items-center text-rose-800 shadow-sm">
                <div class="p-2 bg-rose-100 rounded-lg mr-4"><svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></div>
                <p class="font-bold text-sm">{{ session('error') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <div class="flex flex-col gap-6">
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 flex items-center justify-between relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-32 h-32 bg-blue-50 rounded-full blur-2xl"></div>
                    <div class="relative z-10">
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Total Classes</p>
                        <h2 class="text-4xl font-black text-blue-950">{{ $classes->count() }} <span class="text-lg font-medium text-slate-400">active</span></h2>
                    </div>
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center relative z-10 transform rotate-3 shadow-inner">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 8h5"></path></svg>
                    </div>
                </div>

                <form action="{{ route('admin.class.store') }}" method="POST" class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200">
                    @csrf
                    <h3 class="text-lg font-extrabold text-slate-800 mb-6 flex items-center">
                        <span class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mr-3 text-sm">+</span> 
                        Register New Class
                    </h3>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Class Name <span class="text-rose-500">*</span></label>
                            <input type="text" name="name" required placeholder="e.g. High School Year 1" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-800 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Section <span class="text-slate-400 font-normal lowercase">(Optional)</span></label>
                            <input type="text" name="section" placeholder="e.g. A, Blue, Science" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-800 focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                        </div>
                        <button type="submit" class="w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-0.5">
                            Create Class Structure
                        </button>
                    </div>
                </form>

                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden flex flex-col h-[500px]">
                    <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="text-sm font-extrabold text-slate-800 uppercase tracking-wider">Class Database</h3>
                    </div>
                    <div class="overflow-y-auto flex-1 p-2">
                        @forelse($classes as $class)
                            <div class="group flex items-center justify-between p-4 hover:bg-slate-50 rounded-2xl transition-all border border-transparent hover:border-slate-100 mb-1">
                                <div class="flex flex-col">
                                    <span class="font-bold text-slate-800">{{ $class->name }}</span>
                                    @if($class->section)
                                        <span class="text-[10px] font-extrabold text-blue-600 uppercase tracking-widest mt-1">Section: {{ $class->section }}</span>
                                    @else
                                        <span class="text-[10px] font-medium text-slate-400 mt-1">No Section</span>
                                    @endif
                                </div>
                                <form action="{{ route('admin.class.destroy', $class->id) }}" method="POST" onsubmit="return confirm('Deleting this class might affect enrolled students. Continue?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-400 hover:bg-rose-50 hover:text-rose-600 hover:border-rose-200 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="h-full flex flex-col items-center justify-center text-slate-400 p-6 text-center">
                                <svg class="w-12 h-12 mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                <p class="text-sm font-bold text-slate-500">No classes registered yet.</p>
                                <p class="text-xs mt-1">Add your first class above.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-6">
                <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-200 flex items-center justify-between relative overflow-hidden">
                    <div class="absolute -right-6 -top-6 w-32 h-32 bg-amber-50 rounded-full blur-2xl"></div>
                    <div class="relative z-10">
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Total Subjects</p>
                        <h2 class="text-4xl font-black text-amber-600">{{ $subjects->count() }} <span class="text-lg font-medium text-slate-400">active</span></h2>
                    </div>
                    <div class="w-16 h-16 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center relative z-10 transform -rotate-3 shadow-inner">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                </div>

                <form action="{{ route('admin.subject.store') }}" method="POST" class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-slate-200">
                    @csrf
                    <h3 class="text-lg font-extrabold text-slate-800 mb-6 flex items-center">
                        <span class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center mr-3 text-sm">+</span> 
                        Register New Subject
                    </h3>
                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Subject Name <span class="text-rose-500">*</span></label>
                            <input type="text" name="name" required placeholder="e.g. Advanced Physics" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-semibold text-slate-800 focus:bg-white focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-600 uppercase tracking-wide mb-2">Subject Code <span class="text-rose-500">*</span></label>
                            <input type="text" name="code" required placeholder="e.g. PHY-202" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm font-bold text-slate-800 uppercase focus:bg-white focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all">
                            <p class="text-[10px] text-slate-400 mt-1.5 font-semibold">Must be unique across the entire school.</p>
                        </div>
                        <button type="submit" class="w-full py-3.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-bold rounded-xl shadow-lg shadow-amber-500/30 transition-all transform hover:-translate-y-0.5">
                            Register Subject
                        </button>
                    </div>
                </form>

                <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden flex flex-col h-[500px]">
                    <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="text-sm font-extrabold text-slate-800 uppercase tracking-wider">Subject Database</h3>
                    </div>
                    <div class="overflow-y-auto flex-1 p-2">
                        @forelse($subjects as $subject)
                            <div class="group flex items-center justify-between p-4 hover:bg-slate-50 rounded-2xl transition-all border border-transparent hover:border-slate-100 mb-1">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-xs border border-amber-100 mr-4">
                                        {{ substr($subject->name, 0, 2) }}
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="font-bold text-slate-800">{{ $subject->name }}</span>
                                        <span class="text-[10px] font-mono font-bold text-slate-500 bg-slate-200 px-1.5 py-0.5 rounded mt-1 w-max">{{ $subject->code }}</span>
                                    </div>
                                </div>
                                <form action="{{ route('admin.subject.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Deleting this subject removes it from all teachers and students. Continue?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-slate-400 hover:bg-rose-50 hover:text-rose-600 hover:border-rose-200 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 shadow-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @empty
                            <div class="h-full flex flex-col items-center justify-center text-slate-400 p-6 text-center">
                                <svg class="w-12 h-12 mb-3 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <p class="text-sm font-bold text-slate-500">No subjects registered yet.</p>
                                <p class="text-xs mt-1">Add your first subject above.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </main>

</body>
</html>