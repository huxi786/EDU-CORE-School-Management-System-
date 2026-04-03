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
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen relative overflow-hidden">
        
        @if(session('success'))
            <div x-data="{ show: true }" 
                 x-show="show" 
                 x-init="setTimeout(() => show = false, 4000)"
                 x-transition:enter="transform ease-out duration-300 transition"
                 x-transition:enter-start="translate-y-[-100%] opacity-0"
                 x-transition:enter-end="translate-y-0 opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed top-20 right-5 z-[9999] max-w-sm w-full bg-white shadow-2xl rounded-2xl pointer-events-auto overflow-hidden border border-emerald-100">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center">
                                <svg class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-base font-black text-slate-900">Successfully Submitted!</p>
                            <p class="mt-1 text-sm text-slate-500 font-medium">{{ session('success') }}</p>
                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button @click="show = false" class="bg-white rounded-md inline-flex text-slate-400 hover:text-slate-500 focus:outline-none">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="h-1 w-full bg-slate-100 overflow-hidden">
                    <div class="h-full bg-emerald-500 w-full" style="animation: shrink 4s linear forwards;"></div>
                </div>
                <style>
                    @keyframes shrink { from { width: 100%; } to { width: 0%; } }
                </style>
            </div>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 relative z-10">   
            
            <div class="mb-8 mt-4 bg-white p-6 rounded-3xl shadow-sm border border-slate-100 flex justify-between items-center">
                <div>
                    <h3 class="font-black text-xl text-slate-800">Pending Tasks</h3>
                    <p class="text-sm font-medium text-slate-500">You have <span class="text-blue-600 font-bold">{{ count($assignments) }}</span> assignments to complete.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($assignments as $assignment)
                    @php
                        $isOverdue = \Carbon\Carbon::now()->gt($assignment->due_date);
                    @endphp

                    <div x-data="{ openModal: false, fileName: '' }" class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden flex flex-col hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 group relative">
                        
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

                            <div class="grid grid-cols-2 gap-4">
                                <div class="bg-slate-50 p-3 rounded-xl border border-slate-100">
                                    <span class="text-[10px] font-black text-slate-400 uppercase block mb-1">Total Marks</span>
                                    <span class="font-black text-indigo-600 text-lg">{{ $assignment->total_marks }}</span>
                                </div>
                                <div class="bg-rose-50 p-3 rounded-xl border border-rose-100">
                                    <span class="text-[10px] font-black text-rose-400 uppercase block mb-1">Due Date</span>
                                    <span class="font-bold text-rose-600 text-sm">{{ $assignment->due_date->format('d M, Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-slate-100 bg-slate-50">
                            @if($isOverdue)
                                <div class="w-full bg-rose-100 border border-rose-200 text-rose-600 font-black py-3.5 rounded-xl shadow-inner flex items-center justify-center gap-2 uppercase tracking-widest text-xs cursor-not-allowed">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                                    Time Expired
                                </div>
                            @else
                                <button type="button" @click="openModal = true" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-3.5 rounded-xl shadow-lg shadow-blue-600/30 transition-all active:scale-95 flex items-center justify-center gap-2 uppercase tracking-widest text-xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                                    Upload Assignment
                                </button>
                            @endif
                        </div>

                        @if(!$isOverdue)
                        <div x-cloak x-show="openModal" style="display: none;" class="fixed inset-0 z-[999] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                                <div x-show="openModal" x-transition.opacity class="fixed inset-0 bg-slate-900/80 backdrop-blur-sm" @click="openModal = false" aria-hidden="true"></div>
                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                                <div x-show="openModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-8 scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" class="inline-block relative bg-white rounded-[2rem] shadow-2xl w-full max-w-md p-8 text-left overflow-hidden transform transition-all sm:my-8 sm:align-middle z-20"> 
                                    <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                    <h3 class="text-2xl font-black text-blue-950 mb-1">Upload Your Work</h3>
                                    <p class="text-slate-500 font-medium mb-8 text-sm">Uploading for: <strong class="text-slate-700">{{ $assignment->title }}</strong></p>

                                    <form action="{{ route('student.assignments.submit', $assignment->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-8">
                                            <div class="relative border-2 border-dashed border-slate-300 rounded-2xl p-6 text-center hover:border-blue-500 hover:bg-blue-50/50 transition-colors group" :class="{'border-blue-500 bg-blue-50/50': fileName !== ''}">
                                                <input type="file" name="submission_file" required accept=".pdf,.doc,.docx,.jpg,.png,.zip" @change="fileName = $event.target.files[0].name" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                                <div class="text-slate-500 group-hover:text-blue-600 transition-colors" :class="{'text-blue-600': fileName !== ''}">
                                                    <svg class="w-8 h-8 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                                    <p class="font-bold text-sm" x-text="fileName === '' ? 'Click to browse or drag file here' : fileName"></p>
                                                    <p class="text-[10px] uppercase tracking-widest mt-1 opacity-70">Max size: 10MB</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex gap-3">
                                            <button type="button" @click="openModal = false" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold py-3.5 rounded-xl transition-colors">Cancel</button>
                                            <button type="submit" class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-blue-600/30 transition-all active:scale-95">Submit File</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                @empty
                    <div class="col-span-full py-24 text-center bg-white rounded-[2rem] border border-slate-200 shadow-sm">
                        <div class="w-24 h-24 mx-auto bg-emerald-50 rounded-full flex items-center justify-center mb-4">
                            <svg class="w-10 h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-black text-slate-800 mb-2">No Pending Assignments!</h3>
                        <p class="text-slate-500 font-medium">You are all caught up. Enjoy your free time!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>