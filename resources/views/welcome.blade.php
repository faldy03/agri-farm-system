<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriSteward - Precision Stewardship</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    @endif
    
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Manrope', sans-serif;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body class="bg-surface text-on-surface antialiased">
    <!-- TopNavBar -->
    <header class="flex justify-between items-center w-full h-16 px-10 sticky top-0 z-40 bg-white shadow-sm border-b border-stone-200">
        <div class="text-xl font-extrabold text-emerald-900">AgriSteward</div>
        <nav class="hidden md:flex items-center gap-8">
            <a class="text-emerald-700 font-bold border-b-2 border-emerald-700 text-sm h-16 flex items-center" href="#">Home</a>
            <a class="text-stone-500 font-medium hover:bg-stone-50 transition-colors text-sm px-4 py-2 rounded-lg" href="#">Solutions</a>
            <a class="text-stone-500 font-medium hover:bg-stone-50 transition-colors text-sm px-4 py-2 rounded-lg" href="#">About</a>
            <a class="text-stone-500 font-medium hover:bg-stone-50 transition-colors text-sm px-4 py-2 rounded-lg" href="#">Support</a>
        </nav>
        <div class="flex items-center gap-4">
            <button class="material-symbols-outlined text-stone-500 hover:bg-stone-50 p-2 rounded-full transition-colors">help</button>
            @auth
                <a href="{{ url('/dashboard') }}" class="bg-emerald-700 text-white px-6 py-2 rounded-lg text-sm font-semibold hover:opacity-90 transition-all">Dashboard</a>
            @else
                <a href="#" class="bg-emerald-700 text-white px-6 py-2 rounded-lg text-sm font-semibold hover:opacity-90 transition-all">Get Started</a>
            @endauth
        </div>
    </header>

    <main class="min-h-[calc(100vh-64px-88px)] relative flex items-center justify-center overflow-hidden">
        <!-- Hero Background Image -->
        <div class="absolute inset-0 z-0">
            <img alt="Professional Agriculture Landscape" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAecnXs2eSKM57BKxswfxPFrpgqQ--L4PY1aqcP9txd4WgVHj2o-ArOGZ2pbIjj09zJPf2W7bIHX5FPsVCZJ-MN3b0ipOYuaC2HxK8WfO6MK8jrpz-KGMDEpmYBgif4Owbcws4pQSg5X25qvg2H5U90SCsR-vus1H0VNWXiC5yytm7pZiTqQ-6sgg00ANDk5XQHapEM3YVZNKJtFdsbxTpGR1nSQWKbqEpwM9DC-_Eydy-bc779ViY0XN5S-NOCGLDSF4zAFDQ1aA"/>
            <div class="absolute inset-0 bg-gradient-to-r from-emerald-950/80 via-emerald-900/40 to-transparent"></div>
        </div>

        <div class="relative z-10 w-full max-w-7xl mx-auto px-10 grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            <!-- Value Proposition -->
            <div class="lg:col-span-7 text-white">
                <div class="inline-flex items-center gap-2 px-3 py-1 bg-emerald-500/20 border border-emerald-400/30 rounded-full mb-6">
                    <span class="material-symbols-outlined text-emerald-300 text-sm">verified</span>
                    <span class="text-xs uppercase text-emerald-100 font-bold tracking-widest">Enterprise Ready</span>
                </div>
                <h1 class="text-5xl font-extrabold mb-6 leading-tight">
                    Precision Stewardship for Modern Farming
                </h1>
                <p class="text-lg text-emerald-50/80 max-w-xl mb-10">
                    Empowering farm managers with real-time data analytics, automated activity tracking, and intelligent harvest forecasting. Bridge the gap between tradition and technology.
                </p>
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-md p-4 rounded-xl border border-white/10">
                        <span class="material-symbols-outlined text-emerald-300">monitoring</span>
                        <div>
                            <div class="font-bold text-lg">94%</div>
                            <div class="text-xs text-emerald-100/60 uppercase tracking-widest">Yield Accuracy</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-md p-4 rounded-xl border border-white/10">
                        <span class="material-symbols-outlined text-emerald-300">cloud_sync</span>
                        <div>
                            <div class="font-bold text-lg">Real-time</div>
                            <div class="text-xs text-emerald-100/60 uppercase tracking-widest">Sync Speed</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Login Card -->
            <div class="lg:col-span-5">
                <div class="bg-white/95 backdrop-blur-xl p-6 rounded-2xl shadow-2xl border border-stone-200/50 w-auto">
                    <div class="mb-8">
                        <h2 class="text-2xl font-semibold text-emerald-900 mb-2">Manager Portal</h2>
                        <p class="text-sm text-stone-500">Enter your credentials to access the AgriSteward dashboard.</p>
                    </div>
                    
                    @if ($errors->any())
                        <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf
                        
                        <!-- Email Address -->
                        <div>
                            <label class="block font-semibold text-xs text-stone-500 mb-2 uppercase tracking-wider">Email Address</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-stone-400">
                                    <span class="material-symbols-outlined text-xl">mail</span>
                                </span>
                                <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-3 bg-stone-50 border-0 border-b border-stone-200 focus:border-b-2 focus:border-emerald-600 focus:ring-0 transition-all text-stone-800 placeholder:text-stone-300" placeholder="manager@agristeward.com" required autofocus autocomplete="email"/>
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="block font-semibold text-xs text-stone-500 mb-2 uppercase tracking-wider">Password</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-stone-400">
                                    <span class="material-symbols-outlined text-xl">lock</span>
                                </span>
                                <input type="password" name="password" class="w-full pl-10 pr-4 py-3 bg-stone-50 border-0 border-b border-stone-200 focus:border-b-2 focus:border-emerald-600 focus:ring-0 transition-all text-stone-800 placeholder:text-stone-300" placeholder="••••••••" required autocomplete="current-password"/>
                            </div>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Remember Me / Forgot Password -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer group">
                                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-stone-300 text-emerald-700 focus:ring-emerald-500" {{ old('remember') ? 'checked' : '' }}/>
                                <span class="text-sm text-stone-600 group-hover:text-stone-900 transition-colors">Remember Me</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-sm text-emerald-700 font-semibold hover:underline">Forgot Password?</a>
                            @endif
                        </div>

                        <!-- Sign In Button -->
                        <button type="submit" class="w-full bg-emerald-700 text-white py-4 rounded-lg font-bold text-base shadow-lg shadow-emerald-900/20 hover:scale-[1.01] active:scale-[0.98] transition-all">
                            Sign In
                        </button>

                        <!-- Divider -->
                        <div class="relative py-4">
                            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-stone-100"></div></div>
                            <div class="relative flex justify-center text-xs uppercase"><span class="bg-white px-2 text-stone-400">Security Verified</span></div>
                        </div>

                        <!-- OAuth Buttons -->
                        <div class="flex justify-center gap-4">
                            <button type="button" class="p-3 border border-stone-200 rounded-lg hover:bg-stone-50 transition-colors">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                                </svg>
                            </button>
                            <button type="button" class="p-3 border border-stone-200 rounded-lg hover:bg-stone-50 transition-colors">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.4 24c5.3 0 9.9-1.7 12.9-4.6l-6.3-4.9c-1.8 1.3-4.2 2-6.6 2-5.1 0-9.4-3.5-10.9-8.3H.9v5.1C2.3 20.6 6.4 24 11.4 24z"/><path d="M8.1 14.7a6.97 6.97 0 0 1-.6-2.2 6.97 6.97 0 0 1 .6-2.2V5.3H2.3A11.95 11.95 0 0 0 0 12c0 2 .5 3.9 1.3 5.6l5.5-4.3z"/><path d="M11.4 4.5c1.9 0 3.6.6 4.9 1.9l3.7-3.7C21.3 1.1 17.7 0 11.4 0 6.4 0 2.3 3.4.9 7.8l5.7 4.4c1.5-4.8 5.8-8.3 10.9-8.3z"/><path d="M11.4 8.2a3.8 3.8 0 0 1 3.8 3.8 3.8 3.8 0 0 1-3.8 3.8 3.8 3.8 0 0 1-3.8-3.8 3.8 3.8 0 0 1 3.8-3.8z"/>
                                </svg>
                            </button>
                        </div>
                    </form>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <p class="text-center text-sm text-stone-600 mt-6">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-emerald-700 font-semibold hover:underline">Create one</a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-stone-50 border-t border-stone-200 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center px-10 max-w-7xl mx-auto">
            <div class="text-xs text-stone-500 mb-4 md:mb-0">
                © 2024 AgriSteward Systems. All rights reserved.
            </div>
            <div class="flex gap-8">
                <a class="text-xs text-stone-400 hover:text-emerald-600 hover:underline transition-all" href="#">Privacy Policy</a>
                <a class="text-xs text-stone-400 hover:text-emerald-600 hover:underline transition-all" href="#">Terms of Service</a>
                <a class="text-xs text-stone-400 hover:text-emerald-600 hover:underline transition-all" href="#">Support</a>
            </div>
        </div>
    </footer>
</body>
</html>
