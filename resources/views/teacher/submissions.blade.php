<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ url()->previous() }}"
                class="p-2 bg-white rounded-xl border border-slate-200 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 transition-colors shadow-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
            </a>
            <div>
                <h2 class="font-black text-2xl text-slate-800 leading-tight">Student Submissions</h2>
                <p class="text-slate-500 font-medium text-sm mt-1">Assignment: <span
                        class="text-indigo-600 font-bold">{{ $assignment->title }}</span></p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Total Received</p>
                        <p class="text-3xl font-black text-slate-800">{{ $assignment->submissions->count() }}</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm flex items-center gap-4">
                    <div class="w-14 h-14 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">Deadline</p>
                        <p class="text-lg font-black text-slate-800">{{ $assignment->due_date->format('d M Y') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-black text-lg text-slate-800">Submitted Files</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="bg-slate-50 text-slate-500 text-xs uppercase tracking-widest border-b border-slate-100">
                                <th class="p-4 font-bold">Student Name</th>
                                <th class="p-4 font-bold">Submitted At</th>
                                <th class="p-4 font-bold">Status</th>
                                <th class="p-4 font-bold text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            {{-- Ab hum Submissions par loop nahi chala rahe, hum PURI CLASS par loop chala rahe hain --}}
                            @foreach ($assignment->schoolClass->enrollments as $enrollment)
                                @php
                                    $student = $enrollment->student;

                                    // Magic Line: Check karo ke is bache ne assignment submit ki hai ya nahi?
                                    $submission = $assignment->submissions->where('student_id', $student->id)->first();
                                @endphp

                                <tr class="hover:bg-slate-50/50 transition-colors">

                                    <td class="p-4">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 font-black flex items-center justify-center text-sm shadow-inner">
                                                {{ substr($student->name ?? 'S', 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-slate-800">
                                                    {{ $student->name ?? 'Unknown Student' }}</p>
                                                <p class="text-xs text-slate-500">Roll No:
                                                    {{ $enrollment->roll_number }}</p>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-4">
                                        @if ($submission)
                                            <p class="font-medium text-slate-700 text-sm">
                                                {{ $submission->created_at->format('d M Y') }}</p>
                                            <p class="text-xs text-slate-400">
                                                {{ $submission->created_at->format('h:i A') }}</p>
                                        @else
                                            <span class="text-slate-400 text-sm italic">No data</span>
                                        @endif
                                    </td>

                                    <td class="p-4">
                                        @if ($submission)
                                            @if ($submission->created_at->gt($assignment->due_date))
                                                <span
                                                    class="bg-rose-100 text-rose-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-1">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Late
                                                </span>
                                            @else
                                                <span
                                                    class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-1">
                                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> On
                                                    Time
                                                </span>
                                            @endif
                                        @else
                                            <span
                                                class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest inline-flex items-center gap-1">
                                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Pending
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-4 text-right">
                                        @if ($submission)
                                            {{-- Agar submit ki hai toh Download Button dikhao --}}
                                            <a href="{{ route('teacher.submissions.download', $submission->id) }}"
                                                class="inline-flex items-center justify-center gap-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white font-bold px-4 py-2 rounded-xl text-xs uppercase tracking-widest transition-colors border border-blue-100 hover:border-blue-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                    </path>
                                                </svg>
                                                Download File
                                            </a>
                                        @else
                                            {{-- Agar nahi ki toh disabled button dikhao --}}
                                            <button disabled
                                                class="inline-flex items-center justify-center gap-2 bg-slate-50 text-slate-400 font-bold px-4 py-2 rounded-xl text-xs uppercase tracking-widest border border-slate-100 cursor-not-allowed">
                                                Waiting...
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
