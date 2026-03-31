<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Pending - EDUcore</title>
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .hero-pattern { background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 20px 20px; }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col relative hero-pattern">

    <nav class="bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('images/educore-logo.png') }}" alt="Logo" class="w-10 h-10 object-contain drop-shadow-md">
                    <span class="text-xl font-black text-slate-900 tracking-tight">EDU<span class="text-amber-500">core</span></span>
                </div>
                <div class="flex items-center gap-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-sm font-bold text-slate-500 hover:text-rose-600 transition-colors">Sign Out</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-1 max-w-3xl mx-auto w-full px-4 py-16 flex flex-col items-center justify-center">
        
        @if(session('success'))
            <div class="mb-8 w-full p-4 bg-emerald-500 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-500/20">
                <svg class="w-6 h-6 mr-3 text-emerald-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="font-bold">{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/50 border border-slate-100 p-8 md:p-12 w-full text-center relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-amber-50 rounded-full blur-3xl"></div>
            
            <div class="relative z-10">
                <div class="w-24 h-24 bg-amber-50 rounded-full flex items-center justify-center mx-auto mb-6 border-8 border-white shadow-sm relative">
                    <div class="absolute inset-0 border-4 border-amber-200 border-t-amber-500 rounded-full animate-spin"></div>
                    <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>

                <span class="inline-block px-4 py-1.5 bg-amber-100 text-amber-700 text-xs font-black uppercase tracking-widest rounded-full mb-4 border border-amber-200">Under Review</span>
                
                <h1 class="text-3xl font-black text-slate-900 mb-4">Application Submitted!</h1>
                
                <p class="text-base text-slate-500 max-w-lg mx-auto mb-8 font-medium leading-relaxed">
                    Thank you, {{ Auth::user()->name }}. Your official admission form has been securely transmitted to the administration. We are currently reviewing your profile for academic enrollment.
                </p>

                <div class="bg-slate-50 rounded-2xl p-6 text-left max-w-md mx-auto border border-slate-200">
                    <h3 class="text-sm font-black text-slate-800 uppercase tracking-widest mb-4">Next Steps:</h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg></div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-800">Profile Created</h4>
                                <p class="text-[10px] text-slate-500 font-medium">Your data is secured in our system.</p>
                            </div>
                        </div>
                        <div class="flex items-start relative">
                            <div class="absolute top-[-15px] left-[11px] w-[2px] h-4 bg-slate-200"></div>
                            <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0"><span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span></div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-800">Admin Approval & Class Allocation</h4>
                                <p class="text-[10px] text-slate-500 font-medium">Pending assignment of Roll No. and Section.</p>
                            </div>
                        </div>
                        <div class="flex items-start relative">
                            <div class="absolute top-[-15px] left-[11px] w-[2px] h-4 bg-slate-200"></div>
                            <div class="w-6 h-6 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center mr-3 mt-0.5 flex-shrink-0"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg></div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-400">Unlock Student Portal</h4>
                                <p class="text-[10px] text-slate-400 font-medium">Access timetable, attendance, and grades.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <p class="text-xs font-bold text-slate-400">Please check back later or wait for an email notification.</p>
                </div>
            </div>
        </div>

    </main>
</body>
</html>