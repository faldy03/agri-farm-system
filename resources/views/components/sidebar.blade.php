<!-- SideNavBar (Shared Component) -->
<aside class="fixed left-0 top-0 h-screen w-64 bg-[#1B4332] dark:bg-slate-950 text-emerald-50 border-r border-emerald-900 shadow-2xl z-50 flex flex-col py-8 px-4 font-manrope">
    <div class="mb-10 px-4">
        <h1 class="text-white font-black text-lg uppercase tracking-widest">Agri Farm</h1>
        <p class="text-[10px] text-emerald-400/80 font-bold tracking-tighter">Precision Stewardship</p>
    </div>
    
    <nav class="flex-1 space-y-1">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 text-emerald-200/60 px-4 py-3 hover:text-white hover:bg-emerald-800/20 transition-all duration-200 active:scale-95 origin-left rounded-lg {{ request()->routeIs('dashboard') ? 'bg-emerald-800/40 text-white border-l-4 border-emerald-400' : '' }}">
            <span class="material-symbols-outlined">dashboard</span>
            <span class="text-body-sm font-medium">Dashboard</span>
        </a>
        
        @if(auth()->user()->hasAnyRole(['admin', 'owner']))
            <a href="{{ route('users.index') }}" class="flex items-center gap-3 text-emerald-200/60 px-4 py-3 hover:text-white hover:bg-emerald-800/20 transition-all duration-200 active:scale-95 origin-left rounded-lg {{ request()->routeIs('users.*') ? 'bg-emerald-800/40 text-white border-l-4 border-emerald-400' : '' }}">
                <span class="material-symbols-outlined">group</span>
                <span class="text-body-sm font-medium">User Management</span>
            </a>
        @endif
        
        <a href="#" class="flex items-center gap-3 text-emerald-200/60 px-4 py-3 hover:text-white hover:bg-emerald-800/20 transition-all duration-200 active:scale-95 origin-left rounded-lg">
            <span class="material-symbols-outlined">landscape</span>
            <span class="text-body-sm font-medium">Sawah Fields</span>
        </a>
        
        <a href="#" class="flex items-center gap-3 text-emerald-200/60 px-4 py-3 hover:text-white hover:bg-emerald-800/20 transition-all duration-200 active:scale-95 origin-left rounded-lg">
            <span class="material-symbols-outlined">inventory_2</span>
            <span class="text-body-sm font-medium">Inventory</span>
        </a>
        
        <a href="#" class="flex items-center gap-3 text-emerald-200/60 px-4 py-3 hover:text-white hover:bg-emerald-800/20 transition-all duration-200 active:scale-95 origin-left rounded-lg">
            <span class="material-symbols-outlined">agriculture</span>
            <span class="text-body-sm font-medium">Activities</span>
        </a>
    </nav>
    
    <div class="mt-auto space-y-1">
        <button class="w-full mb-6 bg-emerald-400 text-[#1B4332] font-bold py-3 rounded-xl shadow-lg shadow-emerald-950/20 active:scale-95 transition-transform flex items-center justify-center gap-2">
            <span class="material-symbols-outlined text-xl">add</span>
            <span class="text-body-sm">New Report</span>
        </button>
        
        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 text-emerald-200/60 px-4 py-3 hover:text-white hover:bg-emerald-800/20 transition-all duration-200 rounded-lg">
            <span class="material-symbols-outlined">settings</span>
            <span class="text-body-sm">Settings</span>
        </a>
        
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 text-emerald-200/60 px-4 py-3 hover:text-white hover:bg-emerald-800/20 transition-all duration-200 rounded-lg">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-body-sm">Sign Out</span>
            </button>
        </form>
    </div>
</aside>

    <!-- Sidebar Footer -->
    <div class="p-3 border-t border-gray-200 dark:border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span class="font-medium">Logout</span>
            </button>
        </form>
    </div>
</aside>

<!-- Sidebar Overlay (Mobile) -->
<div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/50 transition-opacity opacity-0 pointer-events-none sm:hidden" onclick="document.getElementById('sidebar').classList.add('-translate-x-full')"></div>

<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    
    // Show overlay when sidebar is open on mobile
    const observer = new MutationObserver(() => {
        if (!sidebar.classList.contains('-translate-x-full')) {
            overlay.classList.remove('opacity-0', 'pointer-events-none');
        } else {
            overlay.classList.add('opacity-0', 'pointer-events-none');
        }
    });
    
    observer.observe(sidebar, { attributes: true });
</script>
