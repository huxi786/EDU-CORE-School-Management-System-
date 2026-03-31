<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Secure Login - EduCore Portal</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Plus+Jakarta+Sans] text-gray-900 antialiased selection:bg-amber-500 selection:text-white relative min-h-screen">

    <div class="fixed inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070&auto=format&fit=crop" alt="Campus Background" class="w-full h-full object-cover scale-105" />
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 to-slate-900/90 backdrop-blur-sm"></div>
    </div>

    <div class="relative z-10 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
        
        <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row ring-1 ring-white/20">
            
            <div class="hidden md:flex md:w-[45%] bg-blue-900 relative flex-col justify-between p-12 overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
                    <div class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
                    <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-amber-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
                </div>

                <div class="relative z-10">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/20 shadow-xl mb-6 hover:scale-105 transition-transform duration-300">
                        <svg class="w-8 h-8 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        </svg>
                    </div>
                    <h1 class="text-3xl font-bold text-white tracking-tight">EduCore <span class="text-amber-400">Portal</span></h1>
                    <p class="text-blue-100 mt-3 text-sm leading-relaxed border-l-2 border-amber-400 pl-3 opacity-90">Enterprise Management System for Modern Educational Institutes.</p>
                </div>

                <div class="relative z-10 mt-12 bg-black/20 backdrop-blur-sm rounded-xl p-4 border border-white/10">
                    <div class="flex items-center text-blue-50">
                        <svg class="w-5 h-5 text-amber-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span class="text-sm font-medium">Authorized Personnel Only</span>
                    </div>
                </div>
            </div>

            <div class="w-full md:w-[55%] p-8 sm:p-12 lg:p-16 flex flex-col justify-center bg-white relative">
                
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Welcome Back</h2>
                    <p class="text-gray-500 mt-1 text-sm">Please sign in to access your dashboard.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email Address</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input id="email" class="block w-full pl-11 pr-4 py-3.5 text-sm text-gray-900 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all duration-200" type="email" name="email" :value="old('email')" required autofocus placeholder="admin@school.com" />
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-500 text-xs" />
                    </div>

                    <div>
                        <div class="flex items-center justify-between mb-1">
                            <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                            @if (Route::has('password.request'))
                                <a class="text-xs font-semibold text-blue-600 hover:text-blue-800 transition-colors" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            @endif
                        </div>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-600 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </div>
                            
                            <input id="password" class="block w-full pl-11 pr-12 py-3.5 text-sm text-gray-900 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 focus:bg-white transition-all duration-200" type="password" name="password" required placeholder="••••••••" />
                            
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" id="togglePassword" class="p-1 text-gray-400 hover:text-blue-600 focus:outline-none transition-colors">
                                    <svg id="eyeOpen" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eyeClosed" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-500 text-xs" />
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <label class="flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-50 border-gray-300 rounded focus:ring-blue-500 cursor-pointer" name="remember">
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>

                        <button type="submit" class="inline-flex justify-center items-center py-2.5 px-6 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 transition-all duration-200 hover:-translate-y-0.5">
                            Sign In
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </form>

                <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                    <p class="text-sm text-gray-500 mb-4">New to the institution? Apply for admission.</p>
                    <a href="{{ route('register') }}" class="w-full flex justify-center items-center py-3 px-4 border-2 border-amber-500 rounded-xl text-sm font-bold text-amber-600 hover:bg-amber-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 transition-all duration-200 hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        Register as a Student
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                passwordInput.type = 'password';
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        });
    </script>
</body>
</html>