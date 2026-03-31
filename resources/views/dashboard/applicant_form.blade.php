<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Application - EDUcore</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
        }
        
        /* Premium Dotted Radial Pattern */
        .bg-pattern {
            background-color: #f8fafc;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 24px 24px;
        }

        /* Standard Input Styling */
        .form-input-pro {
            @apply w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-semibold text-blue-950 transition-all duration-300 outline-none shadow-sm;
        }
        .form-input-pro:focus {
            @apply bg-white border-blue-950 shadow-[0_0_0_4px_rgba(23,37,84,0.1)];
            transform: translateY(-1px);
        }

        /* Custom Dropdown Styling & Focus Animations */
        .form-select-pro {
            @apply w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3.5 text-sm font-semibold text-blue-950 transition-all duration-300 outline-none shadow-sm cursor-pointer appearance-none;
            /* Default Chevron Down (Slate) */
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2364748b'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2rem;
        }
        .form-select-pro:focus {
            @apply bg-white border-amber-500 shadow-[0_0_0_4px_rgba(245,158,11,0.15)];
            /* Open State Chevron Up (Golden Amber) */
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23f59e0b'%3e%3cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2.5' d='M5 15l7-7 7 7'/%3e%3c/svg%3e");
            transform: translateY(-1px);
        }

        /* Uniform Labels */
        .label-pro { 
            @apply block text-[11px] font-bold text-slate-500 uppercase tracking-widest mb-2 ml-1; 
        }
        
        /* Floating Card Effect */
        .pro-card { 
            @apply bg-white rounded-2xl shadow-sm border border-slate-200 transition-all duration-300 relative overflow-hidden p-8 md:p-10; 
        }
        .pro-card:hover { 
            @apply shadow-xl shadow-slate-200/60 -translate-y-1; 
        }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex flex-col bg-pattern selection:bg-amber-400 selection:text-blue-950 pb-24">

    <nav class="bg-white/80 backdrop-blur-xl border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-950 to-blue-800 rounded-xl flex items-center justify-center shadow-lg text-amber-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                    </div>
                    <span class="text-2xl font-black tracking-tight text-blue-950">EDU<span class="text-amber-500">core</span></span>
                </div>
                <div class="flex items-center gap-2 bg-slate-100 px-4 py-2 rounded-full border border-slate-200">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
                    </span>
                    <span class="text-[10px] font-bold text-slate-600 tracking-widest uppercase">Application Portal</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 pt-12 w-full">
        
        <header class="text-center mb-12" data-aos="fade-down">
            <h1 class="text-4xl font-black text-blue-950 mb-3 tracking-tight">Official Enrollment Form</h1>
            <p class="text-slate-500 font-medium">Please provide your authentic details for the upcoming academic session.</p>
        </header>

        @if ($errors->any())
            <div class="mb-8 p-5 bg-rose-50 border border-rose-200 rounded-2xl shadow-sm" data-aos="fade-in">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-rose-500 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <div>
                        <h3 class="text-sm font-bold text-rose-800 uppercase tracking-widest mb-2">Action Required</h3>
                        <ul class="text-xs text-rose-600 font-semibold list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('applicant.store') }}" method="POST" class="space-y-8">
            @csrf

            <section class="pro-card group" data-aos="fade-up" data-aos-delay="100">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-blue-600 transition-all duration-300 group-hover:h-2"></div>
                
                <h2 class="text-xl font-black text-blue-950 tracking-tight mb-8 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center font-black text-sm mr-3 border border-blue-100">1</span>
                    Personal Identity
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="label-pro">Applicant Name <span class="text-amber-500 normal-case font-medium ml-1">(Auto-filled)</span></label>
                        <input type="text" value="{{ Auth::user()->name }}" class="form-input-pro bg-slate-100/70 text-slate-500 cursor-not-allowed border-dashed focus:transform-none focus:shadow-sm focus:border-slate-200" readonly>
                    </div>
                    
                    <div>
                        <label class="label-pro">Gender <span class="text-rose-500">*</span></label>
                        <select name="gender" required class="form-select-pro">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div>
                        <label class="label-pro">Date of Birth <span class="text-rose-500">*</span></label>
                        <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required class="form-input-pro">
                    </div>

                    <div class="md:col-span-2">
                        <label class="label-pro">Blood Group</label>
                        <select name="blood_group" class="form-select-pro">
                            <option value="" disabled selected>Select Blood Group (Optional)</option>
                            @foreach(['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $bg)
                                <option value="{{ $bg }}" {{ old('blood_group') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>

            <section class="pro-card group" data-aos="fade-up" data-aos-delay="200">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-amber-500 transition-all duration-300 group-hover:h-2"></div>
                
                <h2 class="text-xl font-black text-blue-950 tracking-tight mb-8 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center font-black text-sm mr-3 border border-amber-100">2</span>
                    Guardian & Contact
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="label-pro">Father / Guardian Full Name <span class="text-rose-500">*</span></label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}" placeholder="e.g. John Doe" required class="form-input-pro">
                    </div>

                    <div>
                        <label class="label-pro">Primary Phone <span class="text-rose-500">*</span></label>
                        <input type="tel" name="phone_number" value="{{ old('phone_number') }}" placeholder="+1 (555) 000-0000" required class="form-input-pro">
                    </div>

                    <div>
                        <label class="label-pro">Emergency Contact</label>
                        <input type="tel" name="emergency_contact" value="{{ old('emergency_contact') }}" placeholder="Alternative Number" class="form-input-pro">
                    </div>

                    <div class="md:col-span-2">
                        <label class="label-pro">Complete Home Address <span class="text-rose-500">*</span></label>
                        <textarea name="home_address" rows="3" placeholder="House/Apartment, Street, City, ZIP Code" required class="form-input-pro resize-none">{{ old('home_address') }}</textarea>
                    </div>
                </div>
            </section>

            <section class="pro-card group" data-aos="fade-up" data-aos-delay="300">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-slate-700 transition-all duration-300 group-hover:h-2"></div>
                
                <h2 class="text-xl font-black text-blue-950 tracking-tight mb-8 flex items-center">
                    <span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-600 flex items-center justify-center font-black text-sm mr-3 border border-slate-200">3</span>
                    Academic History
                </h2>

                <div>
                    <label class="label-pro">Previous School Name</label>
                    <input type="text" name="previous_school" value="{{ old('previous_school') }}" placeholder="Leave blank if applying for the first time" class="form-input-pro">
                </div>
            </section>

            <footer class="pt-8 flex flex-col-reverse sm:flex-row justify-between items-center gap-6" data-aos="zoom-in" data-aos-delay="400">
                <a href="{{ route('dashboard') }}" class="text-sm font-bold text-slate-500 hover:text-slate-800 transition-colors uppercase tracking-wider">
                    Cancel Application
                </a>
                
                <button type="submit" class="w-full sm:w-auto px-10 py-4 bg-gradient-to-r from-blue-950 to-blue-800 hover:from-blue-900 hover:to-blue-700 text-amber-500 text-sm font-black uppercase tracking-widest rounded-xl shadow-lg shadow-blue-900/20 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center group border border-blue-900">
                    Submit Enrollment
                    <svg class="w-5 h-5 ml-3 transform group-hover:translate-x-1.5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </button>
            </footer>
            
        </form>
    </main>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize Animate On Scroll
        AOS.init({ 
            once: true, 
            offset: 50,
            duration: 600,
            easing: 'ease-out-cubic'
        });
    </script>
</body>
</html>