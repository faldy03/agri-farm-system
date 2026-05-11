<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "surface-tint": "#3f6653",
                            "primary-fixed-dim": "#a5d0b9",
                            "on-tertiary-container": "#cd9d6d",
                            "on-tertiary": "#ffffff",
                            "inverse-surface": "#2e3132",
                            "secondary": "#77574d",
                            "primary-container": "#1b4332",
                            "primary-fixed": "#c1ecd4",
                            "on-primary-container": "#86af99",
                            "surface-bright": "#f8f9fa",
                            "on-primary": "#ffffff",
                            "error-container": "#ffdad6",
                            "on-surface-variant": "#414844",
                            "surface-container-lowest": "#ffffff",
                            "surface": "#f8f9fa",
                            "inverse-on-surface": "#f0f1f2",
                            "on-secondary": "#ffffff",
                            "on-background": "#191c1d",
                            "outline": "#717973",
                            "secondary-fixed-dim": "#e7bdb1",
                            "surface-variant": "#e1e3e4",
                            "surface-dim": "#d9dadb",
                            "surface-container": "#edeeef",
                            "tertiary-fixed-dim": "#f0bd8b",
                            "surface-container-high": "#e7e8e9",
                            "surface-container-highest": "#e1e3e4",
                            "outline-variant": "#c1c8c2",
                            "on-primary-fixed-variant": "#274e3d",
                            "background": "#f8f9fa",
                            "secondary-container": "#fed3c7",
                            "on-tertiary-fixed-variant": "#623f18",
                            "on-secondary-fixed": "#2c160e",
                            "primary": "#012d1d",
                            "on-surface": "#191c1d",
                            "on-tertiary-fixed": "#2c1600",
                            "tertiary-fixed": "#ffdcbd",
                            "tertiary-container": "#56340e",
                            "tertiary": "#3b1f00",
                            "on-secondary-fixed-variant": "#5d4037",
                            "on-secondary-container": "#795950",
                            "on-primary-fixed": "#002114",
                            "error": "#ba1a1a",
                            "on-error-container": "#93000a",
                            "on-error": "#ffffff",
                            "surface-container-low": "#f3f4f5",
                            "inverse-primary": "#a5d0b9",
                            "secondary-fixed": "#ffdbd0"
                        },
                        borderRadius: {
                            DEFAULT: "0.25rem",
                            lg: "0.5rem",
                            xl: "0.75rem",
                            full: "9999px"
                        },
                        spacing: {
                            "stack-md": "24px",
                            "stack-lg": "48px",
                            "stack-sm": "12px",
                            "gutter": "24px",
                            "container-max": "1440px",
                            "margin-page": "40px",
                            "base": "8px"
                        },
                        fontFamily: {
                            body: ["Manrope", "sans-serif"],
                        },
                        fontSize: {
                            "body-lg": ["16px", { lineHeight: "24px", fontWeight: "400" }],
                            "headline-md": ["24px", { lineHeight: "32px", fontWeight: "600" }],
                            "display-lg": ["48px", { lineHeight: "56px", letterSpacing: "-0.02em", fontWeight: "700" }],
                            "label-caps": ["12px", { lineHeight: "16px", letterSpacing: "0.05em", fontWeight: "700" }],
                            "body-sm": ["14px", { lineHeight: "20px", fontWeight: "400" }]
                        }
                    },
                },
            }
        </script>
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }
            body { font-family: 'Manrope', sans-serif; }
        </style>
    </head>
    <body class="bg-background text-on-background antialiased min-h-screen">
        <!-- SideNavBar (Shared Component) -->
        <x-sidebar />

        <!-- TopNavBar (Shared Component) -->
        <header class="fixed top-0 right-0 left-64 h-16 bg-white/90 dark:bg-slate-900/90 backdrop-blur-md border-b border-slate-200 dark:border-slate-800 shadow-sm z-40 flex items-center justify-between px-10 transition-all">
            <div class="flex items-center gap-6 flex-1">
                <div class="relative w-96">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
                    <input class="w-full pl-10 pr-4 py-2 bg-surface-container-low border-none rounded-full text-body-sm focus:ring-2 focus:ring-emerald-500 transition-all" placeholder="Search system resources..." type="text"/>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <div class="flex gap-4">
                    <button class="text-slate-500 hover:text-emerald-600 transition-colors">
                        <span class="material-symbols-outlined">notifications</span>
                    </button>
                    <button class="text-slate-500 hover:text-emerald-600 transition-colors">
                        <span class="material-symbols-outlined">help_outline</span>
                    </button>
                </div>
                <div class="h-8 w-[1px] bg-slate-200 mx-2"></div>
                <div x-data="{ open: false }" class="relative flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-body-sm font-bold text-emerald-900 leading-tight">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-slate-500 font-medium">{{ auth()->user()->getRoleNames()->first() ?? 'User' }}</p>
                    </div>
                    <button @click="open = !open" class="relative">
                        <img class="w-10 h-10 rounded-full object-cover border-2 border-emerald-100" src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ auth()->user()->id }}" alt="{{ auth()->user()->name }}"/>
                    </button>

                    <!-- Dropdown Menu -->
                    <div @show="open" @click.away="open = false" x-transition class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 top-full" style="display: none;" x-show="open">
                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                            <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">{{ auth()->user()->email }}</p>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                            <span class="material-symbols-outlined inline mr-2" style="font-size: 16px;">person</span>Edit Profil
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <span class="material-symbols-outlined inline mr-2" style="font-size: 16px;">logout</span>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content Canvas -->
        <main class="ml-64 pt-16 min-h-screen bg-surface-container-low p-10">
            {{ $slot }}
        </main>
    </body>
</html>
