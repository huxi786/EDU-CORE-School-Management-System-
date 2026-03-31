<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Engine - EduCore</title>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f1f5f9; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 10px; }
        
        /* Premium Background Pattern */
        .bg-grid {
            background-image: linear-gradient(to right, #e2e8f0 1px, transparent 1px), linear-gradient(to bottom, #e2e8f0 1px, transparent 1px);
            background-size: 24px 24px;
        }
        
        /* Dark Mode Finance Board */
        .finance-board {
            background: radial-gradient(circle at top right, #1e293b, #0f172a);
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.1), 0 20px 25px -5px rgba(0,0,0,0.3);
        }
        
        /* Glowing Input Focus */
        .glow-input:focus-within {
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2), inset 0 0 0 1px rgba(59, 130, 246, 0.5);
            border-color: transparent;
        }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col relative">

    <div class="absolute inset-0 bg-grid z-[-1] opacity-50"></div>

    <header class="h-20 bg-white/80 backdrop-blur-md border-b border-slate-200 flex items-center justify-between px-8 sticky top-0 z-50">
        <div class="flex items-center gap-5">
            <a href="{{ route('dashboard') }}" class="p-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 rounded-xl transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            </a>
            <div>
                <h1 class="text-2xl font-black text-slate-900 tracking-tight flex items-center">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500 text-white flex items-center justify-center mr-3 shadow-lg shadow-emerald-500/30">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    Financial Command Center
                </h1>
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-widest mt-0.5 ml-11">Real-time Revenue & Payroll Algorithms</p>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
            <span class="relative flex h-3 w-3">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500"></span>
            </span>
            <span class="text-xs font-bold text-slate-600">Engine Online</span>
        </div>
    </header>

    <main class="flex-1 max-w-[1500px] w-full mx-auto p-6 lg:p-8">

        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-500 rounded-2xl flex items-center text-white shadow-lg shadow-emerald-500/20 animate-[slideIn_0.3s_ease-out]">
                <svg class="w-6 h-6 mr-3 text-emerald-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="font-bold text-sm">{{ session('success') }}</p>
            </div>
        @endif

        @php
            // Server-side Calculation for Payroll KPI
            $totalPayroll = 0;
            foreach($data['teachers'] as $t) {
                if($t->salaryStructure) {
                    $totalPayroll += $t->salaryStructure->base_salary + ($t->salaryStructure->per_subject_rate * $t->allocations_count);
                }
            }
            $configuredClasses = $data['classes']->filter(fn($c) => $c->feeStructure)->count();
        @endphp

        <div class="finance-board rounded-[2rem] p-8 mb-8 relative overflow-hidden text-white flex flex-col lg:flex-row gap-8 lg:gap-12 items-center justify-between">
            <svg class="absolute bottom-0 right-0 w-2/3 h-full opacity-10 pointer-events-none" preserveAspectRatio="none" viewBox="0 0 100 100"><path d="M0 100 C 20 80, 40 90, 60 40 S 80 20, 100 0 L 100 100 Z" fill="currentColor"/></svg>

            <div class="flex-1 z-10 w-full">
                <div class="flex items-center text-emerald-400 mb-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6"></path></svg>
                    <span class="text-xs font-bold uppercase tracking-widest">Projected Monthly Outflow (Payroll)</span>
                </div>
                <h2 class="text-5xl lg:text-6xl font-black tracking-tighter mb-2">Rs. {{ number_format($totalPayroll, 0) }}</h2>
                <p class="text-sm font-medium text-slate-400">Total automated salary calculation for {{ $data['teachers']->count() }} teaching staff.</p>
            </div>

            <div class="hidden lg:block w-px h-24 bg-gradient-to-b from-transparent via-slate-600 to-transparent z-10"></div>

            <div class="flex-1 z-10 w-full">
                <div class="flex items-center text-blue-400 mb-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m3-4h1m-1 4h1m-5 8h5"></path></svg>
                    <span class="text-xs font-bold uppercase tracking-widest">Revenue Streams Configured</span>
                </div>
                <div class="flex items-baseline gap-3 mb-2">
                    <h2 class="text-5xl font-black tracking-tighter">{{ $configuredClasses }}</h2>
                    <span class="text-2xl font-bold text-slate-500">/ {{ $data['classes']->count() }}</span>
                </div>
                <div class="w-full max-w-xs bg-slate-800 h-1.5 rounded-full overflow-hidden">
                    <div class="bg-blue-500 h-full rounded-full" style="width: {{ $data['classes']->count() > 0 ? ($configuredClasses / $data['classes']->count()) * 100 : 0 }}%"></div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 flex flex-col h-[700px] overflow-hidden">
                <div class="p-6 lg:p-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div>
                        <h3 class="text-xl font-black text-slate-800">Class Fee Structures</h3>
                        <p class="text-xs font-semibold text-slate-500 mt-1">Define the monthly revenue expectation per student.</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    </div>
                </div>
                
                <div class="flex-1 overflow-y-auto p-4 lg:p-6 space-y-4">
                    @foreach($data['classes'] as $class)
                        <div class="group bg-white border-2 border-slate-100 hover:border-blue-200 rounded-2xl p-4 transition-all hover:shadow-md">
                            <form action="{{ route('admin.financials.fee.update') }}" method="POST" class="flex flex-col sm:flex-row sm:items-center gap-4">
                                @csrf
                                <input type="hidden" name="school_class_id" value="{{ $class->id }}">
                                
                                <div class="flex-1">
                                    <h4 class="font-extrabold text-slate-800 text-lg">{{ $class->name }} {!! $class->section ? '<span class="text-slate-400 font-medium text-sm ml-1">&bull; Sec '.$class->section.'</span>' : '' !!}</h4>
                                    <div class="mt-1 flex items-center gap-2">
                                        @if($class->feeStructure)
                                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider">Fee Active</span>
                                        @else
                                            <span class="w-2 h-2 rounded-full bg-rose-400"></span>
                                            <span class="text-[10px] font-bold text-rose-500 uppercase tracking-wider">Configuration Pending</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <div class="glow-input bg-slate-50 rounded-xl flex items-center px-4 border border-slate-200 transition-all w-40">
                                        <span class="text-slate-400 font-bold text-sm">Rs.</span>
                                        <input type="number" name="monthly_fee" value="{{ $class->feeStructure->monthly_fee ?? '' }}" placeholder="0" required class="w-full bg-transparent border-none focus:ring-0 text-right font-black text-slate-800 py-3 text-lg placeholder-slate-300">
                                    </div>
                                    <button type="submit" class="h-[52px] px-6 bg-slate-900 hover:bg-blue-600 text-white font-bold rounded-xl transition-colors shadow-md">
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-200 flex flex-col h-[700px] overflow-hidden">
                <div class="p-6 lg:p-8 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <div>
                        <h3 class="text-xl font-black text-slate-800">Dynamic Payroll Editor</h3>
                        <p class="text-xs font-semibold text-slate-500 mt-1">Formula: Base Pay + (Per Subject Rate × Subjects)</p>
                    </div>
                    <div class="w-12 h-12 bg-amber-50 rounded-full flex items-center justify-center text-amber-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
                
                <div class="flex-1 overflow-y-auto p-4 lg:p-6 space-y-4">
                    @foreach($data['teachers'] as $teacher)
                        @php
                            $base = $teacher->salaryStructure->base_salary ?? '';
                            $rate = $teacher->salaryStructure->per_subject_rate ?? '';
                            $subjects = $teacher->allocations_count;
                            $calculatedTotal = ($base ?: 0) + (($rate ?: 0) * $subjects);
                        @endphp
                        
                        <div class="group bg-white border-2 border-slate-100 hover:border-amber-200 rounded-2xl p-5 transition-all hover:shadow-md relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-amber-50 rounded-bl-full -z-10 opacity-50 group-hover:scale-110 transition-transform"></div>
                            
                            <form action="{{ route('admin.financials.salary.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">
                                
                                <div class="flex justify-between items-start mb-5">
                                    <div class="flex items-center">
                                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-slate-800 to-slate-600 text-white font-black text-xl flex items-center justify-center mr-4 shadow-sm border-2 border-white">
                                            {{ substr($teacher->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <h4 class="font-extrabold text-slate-800 text-lg leading-none">{{ $teacher->name }}</h4>
                                            <div class="flex items-center mt-1.5">
                                                <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest bg-slate-100 px-2 py-0.5 rounded mr-2">Teacher #{{ $teacher->id }}</span>
                                                <span class="text-[10px] font-black text-amber-600 uppercase tracking-widest bg-amber-100 px-2 py-0.5 rounded" id="subjects_{{ $teacher->id }}" data-count="{{ $subjects }}">Subjects: {{ $subjects }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-0.5">Calculated Payout</p>
                                        <p class="text-2xl font-black text-emerald-600" id="total_{{ $teacher->id }}">Rs. {{ number_format($calculatedTotal, 0) }}</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="flex-1 glow-input bg-slate-50 rounded-xl flex items-center px-4 border border-slate-200 transition-all">
                                        <div class="flex flex-col py-2 w-full">
                                            <label class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Base Salary</label>
                                            <div class="flex items-center">
                                                <span class="text-slate-400 font-bold text-sm mr-1">Rs.</span>
                                                <input type="number" id="base_{{ $teacher->id }}" name="base_salary" value="{{ $base }}" placeholder="0" required class="w-full bg-transparent border-none focus:ring-0 font-black text-slate-800 text-base p-0 placeholder-slate-300" oninput="calculateSalary({{ $teacher->id }})">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center text-slate-300 font-bold text-xl">+</div>
                                    
                                    <div class="flex-1 glow-input bg-slate-50 rounded-xl flex items-center px-4 border border-slate-200 transition-all">
                                        <div class="flex flex-col py-2 w-full">
                                            <label class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Per Subject Rate</label>
                                            <div class="flex items-center">
                                                <span class="text-slate-400 font-bold text-sm mr-1">Rs.</span>
                                                <input type="number" id="rate_{{ $teacher->id }}" name="per_subject_rate" value="{{ $rate }}" placeholder="0" required class="w-full bg-transparent border-none focus:ring-0 font-black text-slate-800 text-base p-0 placeholder-slate-300" oninput="calculateSalary({{ $teacher->id }})">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="h-[56px] px-6 bg-emerald-500 hover:bg-emerald-600 text-white font-bold rounded-xl transition-colors shadow-md shadow-emerald-500/20 flex items-center">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </main>

    <script>
        function calculateSalary(teacherId) {
            // Get inputs
            const baseInput = document.getElementById('base_' + teacherId).value;
            const rateInput = document.getElementById('rate_' + teacherId).value;
            const subjectsCount = parseInt(document.getElementById('subjects_' + teacherId).getAttribute('data-count'));
            const totalDisplay = document.getElementById('total_' + teacherId);

            // Convert to numbers (default to 0 if empty)
            const base = parseFloat(baseInput) || 0;
            const rate = parseFloat(rateInput) || 0;

            // Apply Enterprise Formula
            const total = base + (rate * subjectsCount);

            // Format with commas and update UI instantly
            totalDisplay.innerHTML = 'Rs. ' + total.toLocaleString('en-US');
            
            // Add a quick pulse effect to show it updated
            totalDisplay.classList.add('scale-110', 'text-emerald-500');
            setTimeout(() => {
                totalDisplay.classList.remove('scale-110', 'text-emerald-500');
            }, 200);
        }
    </script>
</body>
</html>