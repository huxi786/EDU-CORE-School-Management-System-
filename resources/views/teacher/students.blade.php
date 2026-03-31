<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-2">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-2xl flex items-center justify-center shadow-sm border border-amber-200">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-black text-3xl text-blue-950 leading-tight">
                        {{ __('My Students Directory') }}
                    </h2>
                    <p class="text-slate-500 font-medium mt-1">Manage and view students across your assigned classes.</p>
                </div>
            </div>
            <div class="flex items-center gap-2 text-sm font-bold text-slate-600 bg-white px-4 py-2 rounded-full shadow-sm border border-slate-100">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                </span>
                Active Session: 2026-2027
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen relative overflow-hidden" x-data="{ searchQuery: '' }">
        
        <div class="absolute inset-0 opacity-40 pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-100 rounded-full blur-3xl -translate-y-48 translate-x-48"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-amber-100 rounded-full blur-3xl translate-y-48 -translate-x-48"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">
            
            @if (count($myClasses) > 0)
                <div class="mb-10 max-w-2xl mx-auto">
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-6 h-6 text-slate-400 group-focus-within:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input x-model="searchQuery" type="text"
                            class="block w-full pl-12 pr-4 py-4 bg-white border border-slate-200 rounded-2xl text-slate-800 focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all shadow-sm font-medium text-lg placeholder:text-slate-400"
                            placeholder="Search by name, email, or roll no...">
                        
                        <button x-show="searchQuery.length > 0" @click="searchQuery = ''" x-transition class="absolute inset-y-0 right-0 pr-4 flex items-center text-slate-400 hover:text-rose-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($myClasses as $classData)
                    <div x-data="{
                        page: 1,
                        limit: 6,
                        students: {{ json_encode($classData['students']) }},
                        className: '{{ $classData['class_name'] }}',
                        get filteredStudents() {
                            if (this.searchQuery === '') return this.students;
                            let q = this.searchQuery.toLowerCase();
                            return this.students.filter(s =>
                                s.name.toLowerCase().includes(q) ||
                                s.email.toLowerCase().includes(q) ||
                                s.roll_number.toLowerCase().includes(q)
                            );
                        },
                        get totalPages() { return Math.max(1, Math.ceil(this.filteredStudents.length / this.limit)) },
                        get pagedStudents() {
                            let start = (this.page - 1) * this.limit;
                            return this.filteredStudents.slice(start, start + this.limit);
                        }
                    }" x-init="$watch('searchQuery', value => page = 1)"
                    class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden flex flex-col hover:shadow-2xl transition-all duration-300 group">

                        <div class="bg-gradient-to-r from-blue-950 to-blue-800 p-6 text-white relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -translate-y-20 translate-x-15 group-hover:scale-125 transition-transform duration-500"></div>
                            
                            <div class="flex justify-between items-start relative z-10">
                                <div>
                                    <span class="text-blue-200 text-xs font-bold uppercase tracking-widest mb-1.5 block">Class Section</span>
                                    <h3 class="text-3xl font-black group-hover:text-amber-300 transition-colors" x-text="className"></h3>
                                </div>
                                <div class="flex flex-col items-end gap-2">
                                    <div class="bg-white/10 backdrop-blur-md text-white border border-white/20 font-black text-sm px-4 py-1.5 rounded-full shadow-inner flex items-center gap-1.5">
                                        <div class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></div>
                                        <span x-text="filteredStudents.length"></span> / {{ $classData['total_students'] }}
                                    </div>
                                    <a href="{{ route('teacher.classes.export', $classData['class_id']) }}"
                                        class="text-[11px] font-bold text-blue-200 hover:text-white flex items-center gap-1.5 bg-black/20 hover:bg-black/40 px-3 py-1.5 rounded-lg transition-colors border border-transparent hover:border-white/20 shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                        </svg>
                                        Export Roster
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="p-2 flex-1 bg-white relative">
                            <div x-show="filteredStudents.length === 0" class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center" style="display: none;">
                                <svg class="w-12 h-12 text-slate-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                <p class="text-slate-500 font-bold">No match found</p>
                            </div>

                            <ul class="space-y-1">
                                <template x-for="student in pagedStudents" :key="student.id">
                                    <li @click="$dispatch('open-profile', { student: student, className: className })"
                                        class="p-3 hover:bg-blue-50/50 rounded-xl transition-colors flex items-center justify-between group/item cursor-pointer border border-transparent hover:border-blue-100">
                                        <div class="flex items-center gap-3.5">
                                            <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-blue-100 to-blue-50 text-blue-800 font-black flex items-center justify-center shadow-inner text-lg border border-blue-200 group-hover/item:scale-105 transition-transform" x-text="student.initial"></div>
                                            <div>
                                                <p class="font-bold text-slate-800 text-base group-hover/item:text-blue-800 transition-colors" x-text="student.name"></p>
                                                <p class="text-xs font-medium text-slate-500 flex items-center gap-1">
                                                    <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                    <span x-text="student.email"></span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-xs font-bold text-slate-600 bg-slate-100 px-3 py-1.5 rounded-full border border-slate-200 group-hover/item:bg-white transition-colors" x-text="student.roll_number"></div>
                                    </li>
                                </template>
                            </ul>
                        </div>

                        <div class="bg-slate-50 px-5 py-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                            <button @click="if(page > 1) page--" :class="{ 'opacity-50 cursor-not-allowed': page === 1 }" class="p-2.5 bg-white border border-slate-200 rounded-xl text-slate-600 hover:text-blue-700 transition-all shadow-sm active:scale-95">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"></path></svg>
                            </button>
                            <span class="text-xs font-black text-slate-500 uppercase tracking-widest bg-white px-4 py-2 rounded-full shadow-inner border border-slate-100">
                                Page <span x-text="page" class="text-blue-700"></span> / <span x-text="totalPages"></span>
                            </span>
                            <button @click="if(page < totalPages) page++" :class="{ 'opacity-50 cursor-not-allowed': page === totalPages }" class="p-2.5 bg-white border border-slate-200 rounded-xl text-slate-600 hover:text-blue-700 transition-all shadow-sm active:scale-95">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white rounded-3xl p-16 text-center border border-slate-100 shadow-lg">
                        <h3 class="text-3xl font-black text-blue-950 mb-3">No Students Found</h3>
                        <p class="text-slate-500 font-medium max-w-lg mx-auto">Check back later or contact admin.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div x-data="{ isOpen: false, student: null, className: '' }" 
             @open-profile.window="student = $event.detail.student; className = $event.detail.className; isOpen = true"
             x-show="isOpen" style="display: none;" 
             class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6">
            <div x-show="isOpen" x-transition.opacity @click="isOpen = false" class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm"></div>
            <div x-show="isOpen" x-transition class="relative bg-white rounded-[2rem] shadow-2xl w-full max-w-lg overflow-hidden border border-white/50 z-10">
                <button @click="isOpen = false" class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center bg-black/10 hover:bg-black/20 text-white rounded-full transition-colors z-20">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
                <div class="bg-gradient-to-br from-blue-600 to-indigo-700 h-32 relative"></div>
                <div class="px-8 pb-8 relative">
                    <div class="absolute -top-12 left-8 w-24 h-24 bg-white rounded-2xl p-1.5 shadow-xl">
                        <div class="w-full h-full bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center text-4xl font-black text-white" x-text="student ? student.initial : '?'"></div>
                    </div>
                    <div class="flex justify-end pt-4"><span class="bg-emerald-100 text-emerald-700 font-bold text-xs px-3 py-1.5 rounded-full flex items-center gap-1"><div class="w-2 h-2 rounded-full bg-emerald-500"></div> Active</span></div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-black text-slate-800" x-text="student ? student.name : ''"></h3>
                        <p class="text-blue-600 font-bold text-sm" x-text="student ? student.email : ''"></p>
                    </div>
                    <hr class="my-6 border-slate-100">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100"><span class="text-[10px] font-black text-slate-400 block uppercase">Class</span><span class="font-bold text-slate-800" x-text="className"></span></div>
                        <div class="bg-slate-50 p-4 rounded-2xl border border-slate-100"><span class="text-[10px] font-black text-slate-400 block uppercase">Roll No</span><span class="font-bold text-amber-600" x-text="student ? student.roll_number : ''"></span></div>
                    </div>
                    <button @click="isOpen = false" class="w-full mt-8 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 rounded-xl transition-all">Close Profile</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>