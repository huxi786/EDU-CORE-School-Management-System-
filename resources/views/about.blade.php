<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - EDUcore</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-nav { 
            background: rgba(255, 255, 255, 0.85); 
            backdrop-filter: blur(20px); 
            border-bottom: 1px solid rgba(226,232,240,0.5); 
        }
        .float-anim { animation: float 6s ease-in-out infinite; }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-800">

    <nav class="glass-nav fixed w-full z-50 h-20 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full">
            <div class="flex justify-between items-center h-full">
                <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-blue-900 rounded-xl flex items-center justify-center text-amber-400 shadow-lg group-hover:scale-105 transition-transform">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"></path></svg>
                    </div>
                    <span class="text-2xl font-black text-blue-950">EDU<span class="text-amber-500">core</span></span>
                </a>

                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ url('/') }}" class="text-sm font-bold text-slate-500 hover:text-blue-700 transition-colors">Home</a>
                    <a href="{{ route('about') }}" class="text-sm font-black text-blue-700 bg-blue-50 px-4 py-2 rounded-lg">About Us</a>
                    <a href="{{ route('contact') }}" class="text-sm font-bold text-slate-500 hover:text-blue-700 transition-colors">Contact</a>
                </div>

                <div>
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-5 py-2.5 bg-blue-900 text-white hover:bg-blue-800 font-bold rounded-xl transition-all shadow-lg shadow-blue-900/30">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2.5 bg-blue-600 text-white hover:bg-blue-700 font-bold rounded-xl transition-all shadow-lg shadow-blue-600/30">Portal Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="relative bg-gradient-to-br from-blue-950 via-indigo-950 to-blue-900 pt-32 pb-40 overflow-hidden">
        <div class="absolute top-0 right-1/4 w-[500px] h-[500px] bg-amber-500/10 rounded-full blur-[100px] pointer-events-none float-anim"></div>
        <div class="absolute bottom-0 left-1/4 w-[400px] h-[400px] bg-blue-500/20 rounded-full blur-[120px] pointer-events-none float-anim" style="animation-delay: 2s;"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 mt-10">
            <span class="inline-block py-1.5 px-4 rounded-full bg-white/10 border border-white/20 text-amber-400 text-xs font-black tracking-widest uppercase mb-6 backdrop-blur-md">
                Our Story
            </span>
            <h1 class="text-5xl md:text-7xl font-black text-white mb-6 tracking-tight">
                Empowering the Future of <br />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-orange-500">Digital Education</span>
            </h1>
            <p class="text-blue-200 text-lg md:text-xl font-medium max-w-2xl mx-auto leading-relaxed">
                EDUcore isn't just a management system; it's a bridge connecting ambitious students, dedicated teachers, and visionary administrators.
            </p>
        </div>

        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg class="relative block w-full h-16 md:h-24" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V95.8C59.71,118.08,130.83,121.32,198.71,115.63C242.47,111.9,283.47,88.45,321.39,56.44Z" class="fill-slate-50"></path>
            </svg>
        </div>
    </div>

    <div class="bg-slate-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <div>
                    <h2 class="text-3xl md:text-4xl font-black text-blue-950 mb-6 leading-tight">
                        We believe technology should <span class="text-indigo-600">simplify</span> learning, not complicate it.
                    </h2>
                    <p class="text-slate-600 text-lg leading-relaxed mb-6 font-medium">
                        Founded in 2026, EDUcore was built from a simple observation: Schools were spending too much time on administrative paperwork and not enough time on actual student growth.
                    </p>
                    <p class="text-slate-600 text-lg leading-relaxed mb-8 font-medium">
                        Our platform is designed to automate the boring stuff—like attendance, fee tracking, and assignment collection—so that educators can focus on what truly matters: teaching.
                    </p>

                    <ul class="space-y-4">
                        <li class="flex items-center gap-4 bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
                            <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center font-bold">✓</div>
                            <span class="font-bold text-slate-700">Paperless Administration</span>
                        </li>
                        <li class="flex items-center gap-4 bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
                            <div class="w-10 h-10 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center font-bold">✓</div>
                            <span class="font-bold text-slate-700">Real-time Analytics & Tracking</span>
                        </li>
                        <li class="flex items-center gap-4 bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
                            <div class="w-10 h-10 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center font-bold">✓</div>
                            <span class="font-bold text-slate-700">Secure & Scalable Infrastructure</span>
                        </li>
                    </ul>
                </div>

                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-indigo-500 rounded-[3rem] transform rotate-3 opacity-10"></div>
                    
                    <div class="grid grid-cols-2 gap-6 relative z-10">
                        <div class="bg-white p-8 rounded-[2rem] shadow-xl border border-slate-100 transform transition duration-500 hover:-translate-y-2">
                            <h3 class="text-5xl font-black text-blue-600 mb-2">10K+</h3>
                            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Active Students</p>
                        </div>
                        
                        <div class="bg-indigo-600 p-8 rounded-[2rem] shadow-xl shadow-indigo-600/30 transform transition duration-500 hover:-translate-y-2 translate-y-8">
                            <h3 class="text-5xl font-black text-white mb-2">50+</h3>
                            <p class="text-xs font-black text-indigo-200 uppercase tracking-widest">Partner Schools</p>
                        </div>
                        
                        <div class="bg-amber-500 p-8 rounded-[2rem] shadow-xl shadow-amber-500/30 transform transition duration-500 hover:-translate-y-2 -translate-y-4">
                            <h3 class="text-5xl font-black text-white mb-2">1M+</h3>
                            <p class="text-xs font-black text-amber-100 uppercase tracking-widest">Assignments Done</p>
                        </div>

                        <div class="bg-white p-8 rounded-[2rem] shadow-xl border border-slate-100 transform transition duration-500 hover:-translate-y-2 translate-y-4">
                            <h3 class="text-5xl font-black text-emerald-500 mb-2">99%</h3>
                            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Server Uptime</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="bg-blue-950 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
            <h2 class="text-3xl md:text-5xl font-black text-white mb-6">Ready to upgrade your school?</h2>
            <p class="text-blue-200 text-lg mb-10 font-medium">Join thousands of students and teachers already experiencing the future of education management.</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('register') }}" class="bg-amber-500 hover:bg-amber-600 text-white font-black py-4 px-8 rounded-2xl shadow-xl shadow-amber-500/20 transition-all active:scale-95 uppercase tracking-widest text-sm">
                    Get Started Free
                </a>
                <a href="{{ route('contact') }}" class="bg-white/10 hover:bg-white/20 text-white font-black py-4 px-8 rounded-2xl border border-white/20 backdrop-blur-md transition-all active:scale-95 uppercase tracking-widest text-sm">
                    Contact Sales
                </a>
            </div>
        </div>
    </div>

    <footer class="bg-slate-900 border-t border-slate-800 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-slate-500 font-medium text-sm">© {{ date('Y') }} EDUcore Management System. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>