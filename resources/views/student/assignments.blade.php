<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-2">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center shadow-sm border border-emerald-200">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div>
                    <h2 class="font-black text-3xl text-blue-950 leading-tight">My Assignments</h2>
                    <p class="text-slate-500 font-medium mt-1">Stay updated with your homework and tasks.</p>
                </div>
            </div>
            <div class="flex items-center gap-2 text-sm font-bold text-slate-600 bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                </span>
                Academic Year: 2026-2027
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen relative overflow-hidden">
        
        <div class="absolute inset-0 opacity-40 pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-100 rounded-full blur-3xl -translate-y-48 translate-x-48"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 rounded-full blur-3xl translate-y-48 -translate-x-48"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            <div class="mb-8 bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex justify-between items-center">
                <div>
                    <h3 class="font-black text-xl text-slate-800">Pending Tasks</h3>
                    <p class="text-sm font-medium text-slate-500">You have <span class="text-blue-600 font-bold">{{ count($assignments) }}</span> assignments to complete.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($assignments as $assignment)
                    @php
                        // Check if due date has passed
                        $isOverdue = \Carbon\Carbon::now()->gt($assignment->due_date);
                    @endphp

                    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group relative">
                        
                        <div class="bg-gradient-to-r {{ $isOverdue ? 'from-rose-900 to-rose-700' : 'from-emerald-900 to-emerald-700' }} p-6 text-white relative">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-10 translate-x-10 group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>
                            
                            <div class="relative z-10">
                                <span class="bg-white/20 text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-3 inline-flex items-center gap-1 shadow-sm backdrop-blur-md">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    {{ $isOverdue ? 'OVERDUE' : 'PENDING' }}
                                </span>
                                <h3 class="text-2xl font-black text-white line-clamp-2">{{ $assignment->title }}</h3>
                            </div>
                        </div>

                        <div class="p-6 flex-1 bg-white">
                            <div class="flex items-center gap-3 mb-4 pb-4 border-b border-slate-100">
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-700 font-black flex items-center justify-center text-sm shadow-inner">
                                    {{ substr($assignment->teacher->name, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase tracking-widest text-slate-400">Assigned By</p>
                                    <p class="font-bold text-slate-800 text-sm">{{ $assignment->teacher->name }}</p>
                                </div>
                            </div>

                            <p class="text-slate-600 text-sm font-medium line-clamp-3 mb-6 bg-slate-50 p-4 rounded-xl border border-slate-100">
                                {{ $assignment->description ?: 'No additional instructions provided by the teacher.' }}
                            </p>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <span class="text-[10px] font-black text-slate-400 uppercase block mb-1">Subject / Class</span>
                                    <span class="font-bold text-slate-800 text-sm">{{ $assignment->schoolClass->name }}</span>
                                </div>
                                <div>
                                    <span class="text-[10px] font-black text-slate-400 uppercase block mb-1">Total Marks</span>
                                    <span class="font-black text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded text-lg">{{ $assignment->total_marks }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="bg-slate-50 p-4 border-t border-slate-100">
                            <div class="flex justify-between items-center mb-4 px-2">
                                <span class="text-[11px] font-black uppercase tracking-widest text-slate-500">Deadline:</span>
                                <span class="text-sm font-black {{ $isOverdue ? 'text-rose-600' : 'text-emerald-600' }}">
                                    {{ $assignment->due_date->format('d M Y, h:i A') }}
                                </span>
                            </div>
                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-3.5 rounded-xl shadow-lg shadow-blue-600/30 transition-all active:scale-95 flex items-center justify-center gap-2 uppercase tracking-widest text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                Submit Assignment
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center bg-white rounded-[2rem] border border-slate-200 shadow-sm">
                        <div class="w-24 h-24 mx-auto bg-emerald-50 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-slate-800 mb-2">Woohoo! No Pending Assignments</h3>
                        <p class="text-slate-500 font-medium">You are all caught up. Enjoy your free time!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>