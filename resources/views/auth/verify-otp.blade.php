<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Security Verification - EduCore Portal</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Plus+Jakarta+Sans] text-gray-900 antialiased selection:bg-amber-500 selection:text-white relative min-h-screen flex items-center justify-center p-4 sm:p-6">

    <div class="fixed inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070&auto=format&fit=crop" alt="Campus Background" class="w-full h-full object-cover scale-105" />
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900/90 to-slate-900/95 backdrop-blur-md"></div>
    </div>

    <div class="relative z-10 w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden ring-1 ring-white/20 transform transition-all">
        
        <div class="bg-blue-900 p-8 text-center relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-32 h-32 bg-blue-800 rounded-full mix-blend-multiply opacity-50"></div>
            <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-amber-500 rounded-full mix-blend-multiply opacity-20"></div>
            
            <div class="relative z-10 inline-flex items-center justify-center w-20 h-20 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 shadow-xl mb-4">
                <svg class="w-10 h-10 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                </svg>
            </div>
            
            <h2 class="text-2xl font-bold text-white tracking-tight">Two-Step Verification</h2>
            <p class="text-blue-100 mt-2 text-sm px-4">To keep your institutional data safe, please complete this security check.</p>
        </div>

        <div class="p-8 sm:p-10 bg-white">
            
            <x-auth-session-status class="mb-6" :status="session('status')" />
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                        </div>
                        <div class="ml-3">
                            <ul class="text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('otp.verify.post') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="otp_code" class="block text-sm font-semibold text-gray-700 text-center mb-3">Enter the 6-digit code</label>
                    <input id="otp_code" type="text" name="otp_code" required autofocus autocomplete="off" maxlength="6"
                           class="block w-full text-center text-3xl tracking-[0.5em] font-extrabold text-blue-900 bg-gray-50 border-2 border-gray-200 rounded-2xl py-4 focus:ring-0 focus:border-blue-500 focus:bg-white transition-all duration-200 shadow-inner" 
                           placeholder="------" />
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full flex justify-center items-center py-4 px-6 border border-transparent rounded-xl shadow-lg text-base font-bold text-white bg-blue-900 hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-900 transition-all duration-300 transform hover:-translate-y-1">
                        Verify Identity
                        <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </button>
                </div>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                <button form="logout-form" type="submit" class="inline-flex items-center text-sm font-semibold text-gray-500 hover:text-red-600 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Cancel and Return to Login
                </button>
            </div>

            <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                @csrf
            </form>
            
        </div>
    </div>

    <script>
        // Only allow numbers in the OTP input
        document.getElementById('otp_code').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
</body>
</html>