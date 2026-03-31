<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admissions Desk - EDUcore</title>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        .bg-pattern { background-image: radial-gradient(#e2e8f0 1px, transparent 1px); background-size: 20px 20px; }
        .glass-panel { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(16px); }
        select { appearance: none; background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e"); background-position: right 1rem center; background-repeat: no-repeat; background-size: 1.5em 1.5em; }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col relative overflow-x-hidden">

    <div class="absolute inset-0 bg-pattern z-[-1] opacity-60"></div>

    <header class="h-20 glass-panel border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-50">
        <div class="flex items-center gap-5">
            <a href="{{ route('dashboard') }}" class="p-2.5 bg-white border border-slate-200 hover:bg-blue-50 text-slate-500 hover:text-blue-600 rounded-xl transition-all shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight flex items-center">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 text-white flex items-center justify-center mr-3 shadow-lg shadow-blue-600/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                    </div>
                    Admissions Command Desk
                </h1>
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mt-0.5 ml-11">Student Enrollment & Roster Management</p>
            </div>
        </div>
        <div class="flex items-center gap-4 text-right">
             <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Academic Year</p>
             <p class="text-sm font-black text-blue-700">{{ date('Y') }} - {{ date('Y')+1 }}</p>
        </div>
    </header>

    <main class="flex-1 max-w-[1500px] w-full mx-auto p-6 lg:p-8">

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500 rounded-2xl flex items-center text-white shadow-lg shadow-emerald-500/20">
                <p class="font-bold text-sm">{{ session('success') }}</p>
            </div>
        @endif
        @if($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border-l-4 border-rose-500 rounded-r-2xl text-slate-800 shadow-sm">
                <h3 class="font-extrabold text-rose-900">Enrollment Conflict</h3>
                <ul class="text-sm font-medium mt-1 text-slate-600">@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-[2rem] p-6 border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Campus Population</p>
                    <h3 class="text-4xl font-black text-blue-900">{{ $data['active_enrollments']->count() }}</h3>
                </div>
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center border border-blue-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] p-6 border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-1">Pending Assignments</p>
                    <h3 class="text-4xl font-black text-amber-600">{{ $data['unenrolled_students']->count() }}</h3>
                </div>
                <div class="w-14 h-14 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center border border-amber-100">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>

            <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-[2rem] p-6 shadow-xl text-white">
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-2">Available Sections</p>
                <div class="flex items-baseline gap-2">
                    <h3 class="text-4xl font-black">{{ $data['classes']->count() }}</h3>
                    <span class="text-sm font-medium text-slate-400">Classes Ready</span>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <div class="xl:col-span-1">
                <div class="bg-white rounded-[2rem] p-8 shadow-sm border border-slate-200 sticky top-28">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-2xl font-black text-slate-800">New Entry</h2>
                        <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                    </div>

                    <form action="{{ route('admin.enrollments.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">1. Select Applicant</label>
                            <select name="student_id" required class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl px-4 py-4 text-sm font-bold text-slate-700 outline-none">
                                <option value="" disabled selected>Search approved students...</option>
                                @foreach($data['unenrolled_students'] as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->email }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">2. Assign to Class</label>
                            <select name="school_class_id" required class="w-full bg-slate-50 border-2 border-slate-100 rounded-2xl px-4 py-4 text-sm font-bold text-slate-700 outline-none">
                                <option value="" disabled selected>Select target class...</option>
                                @foreach($data['classes'] as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }} {{ $class->section ? '- Sec '.$class->section : '' }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100">
                            <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest mb-2">3. Roll Number / ID</label>
                            <input type="text" name="roll_number" placeholder="e.g. 2026-101" required class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-sm font-black text-slate-800 text-center uppercase">
                            <input type="hidden" name="academic_year" value="{{ date('Y') }}-{{ date('Y')+1 }}">
                        </div>

                        <button type="submit" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white font-black rounded-2xl shadow-xl shadow-blue-600/30 transition-all flex items-center justify-center mt-4">
                            Execute Enrollment
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </form>
                </div>
            </div>

            <div class="xl:col-span-2">
                <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 flex flex-col h-full overflow-hidden">
                    <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <h3 class="text-xl font-black text-slate-800">Campus Roster</h3>
                    </div>

                    <div class="flex-1 overflow-x-auto">
                        @if($data['active_enrollments']->count() > 0)
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-white border-b-2 border-slate-100 text-[10px] uppercase tracking-widest text-slate-400 font-black">
                                        <th class="px-8 py-5">Student Identity</th>
                                        <th class="px-8 py-5">Assigned Class</th>
                                        <th class="px-8 py-5">Roll Num</th>
                                        <th class="px-8 py-5 text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-50">
                                    @foreach($data['active_enrollments'] as $enrollment)
                                    <tr class="hover:bg-slate-50/80 transition-colors group">
                                        <td class="px-8 py-4">
                                            <div class="flex items-center">
                                                <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-700 font-black flex items-center justify-center mr-4">
                                                    {{ substr($enrollment->student->name, 0, 1) }}
                                                </div>
                                                <div>
                                                    <h4 class="text-sm font-black text-slate-900">{{ $enrollment->student->name }}</h4>
                                                    <p class="text-[10px] text-slate-500 font-bold uppercase">{{ $enrollment->student->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-4">
                                            <span class="inline-flex px-3 py-1 bg-amber-50 text-amber-700 text-xs font-black rounded-lg border border-amber-100">
                                                {{ $enrollment->schoolClass->name }} {{ $enrollment->schoolClass->section ? '- '.$enrollment->schoolClass->section : '' }}
                                            </span>
                                        </td>
                                        <td class="px-8 py-4 text-sm font-black text-slate-700 font-mono tracking-widest">
                                            {{ $enrollment->roll_number }}
                                        </td>
                                        <td class="px-8 py-4 text-right">
                                            <form action="{{ route('admin.enrollments.destroy', $enrollment->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="p-2.5 bg-rose-50 text-rose-600 hover:bg-rose-500 hover:text-white rounded-xl transition-colors shadow-sm">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="flex flex-col items-center justify-center h-full min-h-[400px] text-center p-10">
                                <h4 class="text-xl font-black text-slate-700 uppercase tracking-widest">Roster is Empty</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>