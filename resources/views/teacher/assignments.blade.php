<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center py-2">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center shadow-sm border border-indigo-200">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="font-black text-3xl text-blue-950 leading-tight">Class Assignments</h2>
                    <p class="text-slate-500 font-medium mt-1">Create and manage assignments for your classes.</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen relative overflow-hidden" x-data="{ isCreateModalOpen: false }">

        <div class="absolute inset-0 opacity-40 pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-100 rounded-full blur-3xl -translate-y-48 translate-x-48"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 rounded-full blur-3xl translate-y-48 -translate-x-48"></div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">

            <div class="mb-10 flex justify-between items-center">
                <h3 class="text-xl font-black text-slate-800">Recent Assignments</h3>
                <button @click="isCreateModalOpen = true" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-indigo-600/30 transition-all active:scale-95 flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Create New Assignment
                </button>
            </div>

            @if (session('success'))
                <div class="mb-8 bg-emerald-100 border border-emerald-200 text-emerald-700 px-6 py-4 rounded-2xl flex items-center gap-3 font-bold shadow-sm">
                    <div class="w-8 h-8 bg-emerald-500 text-white rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 bg-rose-100 border border-rose-200 text-rose-700 px-6 py-4 rounded-2xl font-bold shadow-sm">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <span>Please fix the following errors:</span>
                    </div>
                    <ul class="list-disc pl-8 text-sm font-medium">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($assignments as $assignment)
                    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group">
                        <div class="bg-gradient-to-r from-slate-900 to-slate-800 p-6 text-white relative">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-white/5 rounded-full -translate-y-10 translate-x-10 group-hover:scale-125 transition-transform duration-500 pointer-events-none"></div>

                            <div class="relative z-10">
                                <span class="bg-indigo-500 text-white text-[10px] font-black uppercase tracking-widest px-2.5 py-1 rounded-md mb-3 inline-block shadow-sm">
                                    {{ $assignment->schoolClass->name }}
                                </span>
                                <h3 class="text-2xl font-black text-white group-hover:text-indigo-300 transition-colors line-clamp-1">
                                    {{ $assignment->title }}</h3>
                            </div>
                        </div>

                        <div class="p-6 flex-1 bg-white">
                            <p class="text-slate-500 text-sm font-medium line-clamp-3 mb-6">
                                {{ $assignment->description ?: 'No description provided.' }}
                            </p>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                                    <span class="text-[10px] font-black text-slate-400 uppercase block mb-1">Total Marks</span>
                                    <span class="font-bold text-slate-800 text-lg">{{ $assignment->total_marks }}</span>
                                </div>
                                <div class="bg-rose-50 p-3 rounded-xl border border-rose-100">
                                    <span class="text-[10px] font-black text-rose-400 uppercase block mb-1">Due Date</span>
                                    <span class="font-bold text-rose-600 text-sm">{{ $assignment->due_date->format('d M, Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex gap-3 p-6 pt-0">
                            <a href="{{ route('teacher.assignments.submissions', $assignment->id) }}" class="flex-1 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-bold py-2.5 rounded-xl transition-colors flex items-center justify-center gap-2 text-sm uppercase tracking-widest border border-indigo-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                View Submissions
                                <span class="bg-indigo-600 text-white px-2 py-0.5 rounded-full text-[10px] ml-1">{{ $assignment->submissions->count() ?? 0 }}</span>
                            </a>

                            <form action="{{ route('teacher.assignments.destroy', $assignment->id) }}" method="POST" class="inline-block" onsubmit="return confirm('WARNING: Are you sure you want to delete this assignment? All student submissions related to this will also be lost. This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold p-2.5 rounded-xl transition-colors border border-rose-200" title="Delete Assignment">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-24 text-center bg-white rounded-[2rem] border border-slate-200 shadow-sm">
                        <div class="w-24 h-24 mx-auto bg-indigo-50 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-indigo-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-black text-slate-800 mb-2">No Assignments Yet</h3>
                        <p class="text-slate-500 font-medium">Click the "Create New Assignment" button to get started.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div x-show="isCreateModalOpen" style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center p-4">
            <div x-show="isCreateModalOpen" x-transition.opacity @click="isCreateModalOpen = false" class="absolute inset-0 bg-slate-900/60 backdrop-blur-md"></div>

            <div x-show="isCreateModalOpen" x-transition:enter="ease-out duration-300 scale-95" class="relative bg-white rounded-[2rem] shadow-2xl w-full max-w-2xl overflow-hidden z-20">
                <div class="bg-indigo-600 p-6 text-white flex justify-between items-center">
                    <h3 class="text-2xl font-black">Create Assignment</h3>
                    <button @click="isCreateModalOpen = false" class="w-8 h-8 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>

                <form action="{{ route('teacher.assignments.store') }}" method="POST" class="p-8">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Assign To Class</label>
                            <select name="school_class_id" required class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 font-bold font-sm">
                                <option value="">Select a Class...</option>
                                @foreach ($myClasses as $cls)
                                    <option value="{{ $cls->id }}">{{ $cls->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Due Date</label>
                            <input type="datetime-local" name="due_date" required class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 font-bold font-sm">
                        </div>

                        <div class="col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Assignment Title</label>
                            <input type="text" name="title" required placeholder="e.g. Chapter 4 Math Quiz" class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 font-bold font-sm">
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Total Marks</label>
                            <input type="number" name="total_marks" required value="10" min="1" class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 font-bold font-sm">
                        </div>

                        <div class="col-span-2">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-widest mb-2">Instructions (Optional)</label>
                            <textarea name="description" rows="3" placeholder="Write instructions for the students..." class="w-full bg-slate-50 border border-slate-200 text-slate-800 rounded-xl py-3 px-4 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 font-medium font-sm"></textarea>
                        </div>
                    </div>

                    <div class="flex gap-3 pt-4 border-t border-slate-100">
                        <button type="button" @click="isCreateModalOpen = false" class="flex-1 px-6 py-4 bg-slate-100 hover:bg-slate-200 text-slate-600 font-black rounded-2xl transition-all">Cancel</button>
                        <button type="submit" class="flex-1 px-6 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-black rounded-2xl shadow-lg shadow-indigo-600/30 transition-all active:scale-95">Publish Assignment</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>