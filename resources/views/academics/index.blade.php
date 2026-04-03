<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academics Hub | EDUcore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #050505; color: #fff; overflow-x: hidden; }

        /* Subtle Grid Background */
        .bg-grid {
            background-image: 
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), 
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        /* Animated Glowing Orbs */
        .orb { position: absolute; border-radius: 50%; filter: blur(120px); opacity: 0.3; pointer-events: none; z-index: 0; }
        .orb-1 { width: 500px; height: 500px; background: #4f46e5; top: -10%; left: -10%; animation: float 10s ease-in-out infinite alternate; }
        .orb-2 { width: 400px; height: 400px; background: #0ea5e9; bottom: -10%; right: -5%; animation: float 12s ease-in-out infinite alternate-reverse; }

        @keyframes float {
            0% { transform: translateY(0px) scale(1); }
            100% { transform: translateY(30px) scale(1.1); }
        }

        /* Glassmorphism Cards */
        .module-card {
            background: rgba(20, 20, 20, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            z-index: 10;
        }
        
        .module-card::before {
            content: ''; position: absolute; inset: 0;
            background: linear-gradient(180deg, rgba(255,255,255,0.03) 0%, transparent 100%);
            opacity: 0; transition: opacity 0.3s;
        }

        .module-card:hover {
            transform: translateY(-8px);
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 20px 40px -10px rgba(99, 102, 241, 0.15);
        }
        
        .module-card:hover::before { opacity: 1; }

        .icon-wrapper {
            background: linear-gradient(135deg, rgba(99,102,241,0.1), rgba(99,102,241,0.02));
            border: 1px solid rgba(99,102,241,0.2);
            transition: transform 0.3s ease;
        }
        
        .module-card:hover .icon-wrapper { transform: scale(1.1) rotate(5deg); }

        /* Initial Page Load Animation */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-in { animation: fadeUp 0.6s ease forwards; opacity: 0; }
    </style>
</head>
<body class="bg-grid min-h-screen relative">

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <header class="border-b border-white/5 bg-black/50 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="iconify text-indigo-500" data-icon="lucide:graduation-cap" data-width="32"></span>
                <span class="text-xl font-bold tracking-tight">EDUcore</span>
            </div>
            <a href="{{ url('/') }}" class="text-sm font-medium text-gray-400 hover:text-white transition-colors">
                Back to Home
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-16 relative z-10">
        
        <div class="text-center max-w-3xl mx-auto mb-20 animate-in" style="animation-delay: 0.1s;">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 font-semibold text-xs tracking-widest uppercase mb-6">
                <span class="iconify" data-icon="lucide:book-open"></span> Core Modules
            </div>
            <h1 class="text-5xl md:text-6xl font-black mb-6 tracking-tight">
                Academics <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">Hub</span>
            </h1>
            <p class="text-gray-400 text-lg leading-relaxed font-light">
                Manage your classes, syllabus, routines, and examinations from a single, unified control center. Everything you need to excel, right at your fingertips.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <a href="#" class="module-card p-8 rounded-3xl animate-in group" style="animation-delay: 0.2s;">
                <div class="icon-wrapper w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <span class="iconify text-indigo-400" data-icon="lucide:users" data-width="24"></span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Classes & Sections</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed mb-6">Manage student batches, assign class teachers, and organize classroom structures efficiently.</p>
                <div class="flex items-center text-indigo-400 text-sm font-medium group-hover:translate-x-2 transition-transform">
                    Explore Module <span class="iconify ml-1" data-icon="lucide:arrow-right"></span>
                </div>
            </a>

            <a href="#" class="module-card p-8 rounded-3xl animate-in group" style="animation-delay: 0.3s;">
                <div class="icon-wrapper w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <span class="iconify text-cyan-400" data-icon="lucide:book-marked" data-width="24"></span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Subjects & Syllabus</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed mb-6">Define course curriculums, assign subject teachers, and track syllabus completion progress.</p>
                <div class="flex items-center text-cyan-400 text-sm font-medium group-hover:translate-x-2 transition-transform">
                    Explore Module <span class="iconify ml-1" data-icon="lucide:arrow-right"></span>
                </div>
            </a>

            <a href="#" class="module-card p-8 rounded-3xl animate-in group" style="animation-delay: 0.4s;">
                <div class="icon-wrapper w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <span class="iconify text-emerald-400" data-icon="lucide:calendar-clock" data-width="24"></span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Class Routine</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed mb-6">Generate and manage weekly timetables. Avoid period clashes and optimize teacher schedules.</p>
                <div class="flex items-center text-emerald-400 text-sm font-medium group-hover:translate-x-2 transition-transform">
                    Explore Module <span class="iconify ml-1" data-icon="lucide:arrow-right"></span>
                </div>
            </a>

            <a href="#" class="module-card p-8 rounded-3xl animate-in group" style="animation-delay: 0.5s;">
                <div class="icon-wrapper w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <span class="iconify text-rose-400" data-icon="lucide:file-signature" data-width="24"></span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Examinations</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed mb-6">Schedule mid-terms and finals, generate admit cards, and publish examination results.</p>
                <div class="flex items-center text-rose-400 text-sm font-medium group-hover:translate-x-2 transition-transform">
                    Explore Module <span class="iconify ml-1" data-icon="lucide:arrow-right"></span>
                </div>
            </a>

            <a href="#" class="module-card p-8 rounded-3xl animate-in group" style="animation-delay: 0.6s;">
                <div class="icon-wrapper w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <span class="iconify text-amber-400" data-icon="lucide:folder-down" data-width="24"></span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Study Materials</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed mb-6">Upload and share notes, past papers, and digital resources securely with enrolled students.</p>
                <div class="flex items-center text-amber-400 text-sm font-medium group-hover:translate-x-2 transition-transform">
                    Explore Module <span class="iconify ml-1" data-icon="lucide:arrow-right"></span>
                </div>
            </a>

            <a href="#" class="module-card p-8 rounded-3xl animate-in group" style="animation-delay: 0.7s;">
                <div class="icon-wrapper w-14 h-14 rounded-2xl flex items-center justify-center mb-6">
                    <span class="iconify text-purple-400" data-icon="lucide:calendar-days" data-width="24"></span>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">Academic Calendar</h3>
                <p class="text-gray-400 text-sm font-light leading-relaxed mb-6">Keep track of holidays, school events, sports days, and important academic milestones.</p>
                <div class="flex items-center text-purple-400 text-sm font-medium group-hover:translate-x-2 transition-transform">
                    Explore Module <span class="iconify ml-1" data-icon="lucide:arrow-right"></span>
                </div>
            </a>

        </div>
    </main>

</body>
</html>