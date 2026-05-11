<x-app-layout>
    <!-- Header Section -->
    <div class="flex items-end justify-between mb-8">
        <div>
            <nav class="flex items-center gap-2 text-slate-400 text-label-caps mb-2">
                <a class="hover:text-emerald-700" href="#">Home</a>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-emerald-700">Admin Dashboard</span>
            </nav>
            <h2 class="font-display-lg text-primary text-[32px] leading-tight">System Administration</h2>
            <p class="text-body-sm text-slate-500 mt-1">Manage all users, farms, and system operations.</p>
        </div>
        <button class="flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-bold text-body-sm shadow-lg shadow-primary/20 hover:opacity-90 active:scale-95 transition-all">
            <span class="material-symbols-outlined">admin_panel_settings</span>
            System Settings
        </button>
    </div>

    <!-- Key Metrics -->
    <div class="grid grid-cols-4 gap-gutter mb-8">
        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700">
                <span class="material-symbols-outlined text-[28px]">people</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">TOTAL USERS</p>
                <p class="text-headline-md text-primary">{{ $stats['total_users'] ?? 0 }}</p>
                <p class="text-[10px] text-emerald-600 font-medium">{{ $stats['active_users'] ?? 0 }} active</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-700">
                <span class="material-symbols-outlined text-[28px]">person_check</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">TOTAL FARMERS</p>
                <p class="text-headline-md text-primary">{{ $stats['total_farmers'] ?? 0 }}</p>
                <p class="text-[10px] text-slate-600 font-medium">Field operators</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-orange-50 flex items-center justify-center text-orange-700">
                <span class="material-symbols-outlined text-[28px]">landscape</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">TOTAL FARMS</p>
                <p class="text-headline-md text-primary">{{ $stats['total_farms'] ?? 0 }}</p>
                <p class="text-[10px] text-slate-600 font-medium">Active operations</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-red-50 flex items-center justify-center text-red-700">
                <span class="material-symbols-outlined text-[28px]">warning</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">ALERTS</p>
                <p class="text-headline-md text-primary">{{ $stats['alerts'] ?? 0 }}</p>
                <p class="text-[10px] text-red-600 font-medium">Need attention</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-3 gap-gutter mb-8">
        <!-- User Management -->
        <div class="col-span-2 bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h4 class="text-headline-md text-primary mb-1">Recent User Activity</h4>
                    <p class="text-body-sm text-slate-500">Latest user registrations and status changes</p>
                </div>
                <a href="{{ route('users.index') }}" class="text-emerald-700 text-body-sm font-medium hover:text-emerald-800 transition-colors">
                    View All Users →
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-surface-container text-slate-500 uppercase tracking-wider text-[11px] font-bold border-b border-slate-100">
                            <th class="px-6 py-4">User</th>
                            <th class="px-6 py-4">Role</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Joined</th>
                            <th class="px-6 py-4 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 text-body-sm font-medium text-primary">Hendra Wijaya</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-purple-100 text-purple-700">OWNER</span></td>
                            <td class="px-6 py-4"><span class="inline-flex items-center gap-1.5 text-[12px] font-medium text-emerald-600"><span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>Active</span></td>
                            <td class="px-6 py-4 text-body-sm text-slate-600">Jan 15, 2024</td>
                            <td class="px-6 py-4 text-right"><button class="p-2 text-slate-400 hover:text-emerald-700 transition-colors"><span class="material-symbols-outlined">edit</span></button></td>
                        </tr>
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 text-body-sm font-medium text-primary">Budi Santoso</td>
                            <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-700">PETANI</span></td>
                            <td class="px-6 py-4"><span class="inline-flex items-center gap-1.5 text-[12px] font-medium text-emerald-600"><span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span>Active</span></td>
                            <td class="px-6 py-4 text-body-sm text-slate-600">Feb 20, 2024</td>
                            <td class="px-6 py-4 text-right"><button class="p-2 text-slate-400 hover:text-emerald-700 transition-colors"><span class="material-symbols-outlined">edit</span></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Admin Actions -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-xl p-stack-md border border-blue-200 shadow-sm">
            <h4 class="text-headline-md text-primary mb-4">Admin Controls</h4>
            <div class="space-y-3">
                <a href="{{ route('users.index') }}" class="w-full bg-white hover:bg-slate-50 border border-blue-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">group</span>
                    Manage Users
                </a>
                <button class="w-full bg-white hover:bg-slate-50 border border-blue-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">security</span>
                    Roles & Permissions
                </button>
                <button class="w-full bg-white hover:bg-slate-50 border border-blue-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">assessment</span>
                    System Reports
                </button>
                <button class="w-full bg-primary hover:opacity-90 text-white rounded-lg px-4 py-3 text-body-sm font-bold transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">backup</span>
                    Backup System
                </button>
            </div>
        </div>
    </div>

    <!-- System Health & Alerts -->
    <div class="grid grid-cols-2 gap-gutter">
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-stack-md">
            <h4 class="text-headline-md text-primary mb-4">System Health</h4>
            <div class="space-y-4">
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-body-sm text-slate-600">Server Status</span>
                        <span class="text-[12px] font-bold text-emerald-600">Operational</span>
                    </div>
                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-emerald-500 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-body-sm text-slate-600">Database Status</span>
                        <span class="text-[12px] font-bold text-emerald-600">Healthy</span>
                    </div>
                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-emerald-500 rounded-full" style="width: 98%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-body-sm text-slate-600">Storage Usage</span>
                        <span class="text-[12px] font-bold text-amber-600">72%</span>
                    </div>
                    <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                        <div class="h-full bg-amber-500 rounded-full" style="width: 72%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-red-50 rounded-xl border border-red-200 p-stack-md">
            <h4 class="text-headline-md text-red-900 mb-4">Critical Alerts</h4>
            <div class="space-y-3">
                <div class="flex items-start gap-3 p-3 bg-white rounded-lg border border-red-100">
                    <span class="material-symbols-outlined text-red-600 flex-shrink-0 mt-1">error</span>
                    <div>
                        <p class="text-[12px] font-bold text-primary">Backup failed</p>
                        <p class="text-[11px] text-slate-500">Last backup: 2 days ago</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-3 bg-white rounded-lg border border-amber-100">
                    <span class="material-symbols-outlined text-amber-600 flex-shrink-0 mt-1">warning</span>
                    <div>
                        <p class="text-[12px] font-bold text-primary">High disk usage</p>
                        <p class="text-[11px] text-slate-500">Storage at 85% capacity</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </x-app-layout> --}}   
                
</x-app-layout>
