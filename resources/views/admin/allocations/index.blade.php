<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocation Matrix - EduCore</title>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f0fdfa; /* Soft teal background */
            position: relative;
        }
        /* Animated Background Mesh */
        .bg-mesh {
            position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; z-index: -1;
            background: radial-gradient(at 0% 0%, hsla(253,16%,7%,1) 0, transparent 50%), 
                        radial-gradient(at 50% 0%, hsla(225,39%,30%,1) 0, transparent 50%), 
                        radial-gradient(at 100% 0%, hsla(339,49%,30%,1) 0, transparent 50%);
            opacity: 0.03; filter: blur(100px); animation: pulseMesh 15s infinite alternate;
        }
        @keyframes pulseMesh { 0% { transform: scale(1); } 100% { transform: scale(1.1); } }
        
        /* Premium Scrollbar */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; border: 2px solid #f8fafc; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        .glass-panel { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.5); }
        
        /* Custom Select */
        select { 
            appearance: none; 
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%2364748b' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e"); 
            background-position: right 1rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; 
        }
        
        /* Card Hover Magic */
        .allocation-card { transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        .allocation-card:hover { transform: translateY(-8px) scale(1.02); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); border-color: #818cf8; }
        .delete-btn-overlay { opacity: 0; transform: translateY(10px); transition: all 0.3s ease; }
        .allocation-card:hover .delete-btn-overlay { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col overflow-x-hidden">
    
    <div class="bg-mesh"></div>

    <header class="h-24 glass-panel flex items-center justify-between px-8 sticky top-0 z-50 shadow-sm">
        <div class="flex items-center gap-6">
            <a href="{{ route('dashboard') }}" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-500 hover:text-indigo-600 hover:shadow-lg hover:shadow-indigo-500/20 transition-all group border border-slate-100">
                <svg class="w-6 h-6 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h1 class="text-3xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-indigo-950 to-indigo-600 tracking-tight flex items-center">
                    Allocation Engine <span class="ml-3 px-2 py-0.5 rounded-md bg-indigo-100 text-indigo-700 text-xs font-bold uppercase tracking-widest border border-indigo-200">v2.0</span>
                </h1>
                <p class="text-sm font-medium text-slate-500 mt-1">Intelligently map your teaching resources across the campus.</p>
            </div>
        </div>
    </header>

    <main class="flex-1 max-w-[1400px] w-full mx-auto p-6 lg:p-10">

        @if(session('success'))
            <div class="mb-8 p-4 bg-white/80 backdrop-blur-sm border-l-4 border-emerald-500 rounded-r-2xl flex items-center text-slate-800 shadow-md transform animate-[slideIn_0.5s_ease-out]">
                <div class="p-2 bg-emerald-100 rounded-xl mr-4"><svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg></div>
                <div>
                    <h3 class="font-extrabold text-emerald-900">Success!</h3>
                    <p class="font-medium text-sm text-slate-600">{{ session('success') }}</p>
                </div>
            </div>
        @endif
        
        @if($errors->any())
            <div class="mb-8 p-4 bg-white/80 backdrop-blur-sm border-l-4 border-rose-500 rounded-r-2xl flex items-start text-slate-800 shadow-md">
                <div class="p-2 bg-rose-100 rounded-xl mr-4 mt-0.5"><svg class="w-6 h-6 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg></div>
                <div>
                    <h3 class="font-extrabold text-rose-900">Conflict Detected</h3>
                    <ul class="text-sm font-medium mt-1 text-slate-600">
                        @foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="flex flex-col xl:flex-row gap-10">

            <div class="xl:w-[400px] flex-shrink-0">
                <div class="glass-panel rounded-[2rem] p-8 shadow-xl shadow-indigo-100/50 sticky top-32">
                    
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-extrabold text-slate-800">New Bridge</h2>
                        <div class="w-10 h-10 bg-gradient-to-tr from-indigo-500 to-purple-500 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-500/30 text-white animate-pulse">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        </div>
                    </div>

                    <form action="{{ route('admin.allocations.store') }}" method="POST" class="relative">
                        @csrf
                        <div class="absolute left-[15px] top-[40px] bottom-[100px] w-0.5 bg-indigo-100 -z-10"></div>

                        <div class="relative mb-8 group">
                            <div class="absolute left-0 top-3 w-8 h-8 rounded-full bg-white border-4 border-indigo-100 flex items-center justify-center group-hover:border-indigo-400 transition-colors">
                                <span class="w-2.5 h-2.5 rounded-full bg-indigo-600"></span>
                            </div>
                            <div class="ml-12">
                                <label class="block text-xs font-extrabold text-indigo-900 uppercase tracking-widest mb-2">1. Select Teacher</label>
                                <select name="teacher_id" required class="w-full bg-white/80 border-2 border-transparent hover:border-indigo-100 rounded-2xl px-5 py-4 text-sm font-bold text-slate-700 shadow-sm focus:bg-white focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all outline-none">
                                    <option value="" disabled selected>Search & select staff...</option>
                                    @foreach($formData['teachers'] as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="relative mb-8 group">
                            <div class="absolute left-0 top-3 w-8 h-8 rounded-full bg-white border-4 border-amber-100 flex items-center justify-center group-hover:border-amber-400 transition-colors">
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            </div>
                            <div class="ml-12">
                                <label class="block text-xs font-extrabold text-amber-900 uppercase tracking-widest mb-2">2. Target Class</label>
                                <select name="school_class_id" required class="w-full bg-white/80 border-2 border-transparent hover:border-amber-100 rounded-2xl px-5 py-4 text-sm font-bold text-slate-700 shadow-sm focus:bg-white focus:ring-4 focus:ring-amber-500/20 focus:border-amber-500 transition-all outline-none">
                                    <option value="" disabled selected>Select class & section...</option>
                                    @foreach($formData['classes'] as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }} {{ $class->section ? '- '.$class->section : '' }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="relative mb-10 group">
                            <div class="absolute left-0 top-3 w-8 h-8 rounded-full bg-white border-4 border-emerald-100 flex items-center justify-center group-hover:border-emerald-400 transition-colors">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            </div>
                            <div class="ml-12">
                                <label class="block text-xs font-extrabold text-emerald-900 uppercase tracking-widest mb-2">3. Assign Subject</label>
                                <select name="subject_id" required class="w-full bg-white/80 border-2 border-transparent hover:border-emerald-100 rounded-2xl px-5 py-4 text-sm font-bold text-slate-700 shadow-sm focus:bg-white focus:ring-4 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all outline-none">
                                    <option value="" disabled selected>Select curriculum subject...</option>
                                    @foreach($formData['subjects'] as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }} ({{ $subject->code }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-5 bg-gradient-to-r from-indigo-600 to-indigo-800 hover:from-indigo-500 hover:to-indigo-700 text-white text-base font-extrabold rounded-2xl shadow-xl shadow-indigo-600/30 transition-all transform hover:-translate-y-1 focus:ring-4 focus:ring-indigo-500/50 flex items-center justify-center group">
                            <span class="mr-2">Execute Allocation</span>
                            <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="flex-1">
                
                <div class="flex items-end justify-between mb-8 px-2">
                    <div>
                        <h2 class="text-2xl font-extrabold text-slate-800">Active Matrix</h2>
                        <p class="text-sm font-medium text-slate-500 mt-1">Live overview of your {{ $allocations->count() }} teaching assignments.</p>
                    </div>
                    <div class="hidden sm:flex items-center bg-white px-4 py-2 rounded-xl shadow-sm border border-slate-100">
                        <span class="w-3 h-3 rounded-full bg-emerald-500 animate-pulse mr-2"></span>
                        <span class="text-xs font-bold text-slate-700">System Synced</span>
                    </div>
                </div>

                @if($allocations->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 2xl:grid-cols-3 gap-6">
                        @foreach($allocations as $allocation)
                        <div class="allocation-card relative bg-white rounded-[1.5rem] p-6 border border-slate-100 shadow-sm overflow-hidden group">
                            
                            <div class="delete-btn-overlay absolute top-4 right-4 z-20">
                                <form action="{{ route('admin.allocations.destroy', $allocation->id) }}" method="POST" onsubmit="return confirm('Disconnect this teacher from this class?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-10 h-10 bg-rose-500 text-white rounded-xl flex items-center justify-center hover:bg-rose-600 shadow-lg shadow-rose-500/30 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>

                            <div class="flex items-center mb-6 relative z-10">
                                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-100 to-purple-100 border border-white shadow-inner flex items-center justify-center text-indigo-700 font-extrabold text-xl mr-4">
                                    {{ substr($allocation->teacher->name, 0, 1) }}
                                </div>
                                <div>
                                    <h3 class="text-base font-extrabold text-slate-800 leading-tight">{{ $allocation->teacher->name }}</h3>
                                    <span class="text-[10px] font-bold text-indigo-500 bg-indigo-50 px-2 py-0.5 rounded-md mt-1 inline-block uppercase tracking-wider">Teacher ID: {{ $allocation->teacher->id }}</span>
                                </div>
                            </div>

                            <div class="w-full h-px bg-gradient-to-r from-slate-100 via-slate-200 to-transparent mb-5"></div>

                            <div class="space-y-4 relative z-10">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center mr-3 text-amber-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 8h5"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Target Class</p>
                                        <p class="text-sm font-extrabold text-slate-700">{{ $allocation->schoolClass->name }} {!! $allocation->schoolClass->section ? '<span class="text-amber-500 font-black">&bull;</span> ' . $allocation->schoolClass->section : '' !!}</p>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center mr-3 text-emerald-500">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Curriculum</p>
                                        <div class="flex items-center gap-2">
                                            <p class="text-sm font-extrabold text-slate-700">{{ $allocation->subject->name }}</p>
                                            <span class="text-[9px] font-black text-emerald-600 bg-emerald-100 px-1.5 py-0.5 rounded uppercase">{{ $allocation->subject->code }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <svg class="absolute -bottom-6 -right-6 w-32 h-32 text-slate-50 transform -rotate-12 transition-transform group-hover:rotate-0" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="glass-panel rounded-[2rem] h-[500px] flex flex-col items-center justify-center text-center p-10 border-dashed border-2 border-indigo-200">
                        <div class="relative w-32 h-32 mb-8">
                            <div class="absolute inset-0 border-4 border-indigo-100 rounded-full animate-[spin_4s_linear_infinite]"></div>
                            <div class="absolute inset-2 border-4 border-amber-100 rounded-full animate-[spin_3s_linear_infinite_reverse]"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <svg class="w-12 h-12 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-extrabold text-slate-700">The Matrix is Empty</h3>
                        <p class="text-sm font-medium text-slate-500 max-w-md mt-3 leading-relaxed">System is waiting for your input. Use the Command Center on the left to start bridging teachers to their respective classes and subjects.</p>
                    </div>
                @endif
                
            </div>
        </div>
    </main>

</body>
</html>