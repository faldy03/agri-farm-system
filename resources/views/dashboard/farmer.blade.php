<x-app-layout>
    <!-- Header Section -->
    <div class="flex items-end justify-between mb-8">
        <div>
            <nav class="flex items-center gap-2 text-slate-400 text-label-caps mb-2">
                <a class="hover:text-emerald-700" href="#">Home</a>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-emerald-700">My Dashboard</span>
            </nav>
            <h2 class="font-display-lg text-primary text-[32px] leading-tight">Field Operations</h2>
            <p class="text-body-sm text-slate-500 mt-1">Manage your daily farm activities and field performance.</p>
        </div>
        <button class="flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-bold text-body-sm shadow-lg shadow-primary/20 hover:opacity-90 active:scale-95 transition-all">
            <span class="material-symbols-outlined">note_add</span>
            Log Activity
        </button>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-4 gap-gutter mb-8">
        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-700">
                <span class="material-symbols-outlined text-[28px]">landscape</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">MY SAWAH</p>
                <p class="text-headline-md text-primary">{{ $sawahCount ?? 0 }}</p>
                <p class="text-[10px] text-emerald-600 font-medium">Managed fields</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700">
                <span class="material-symbols-outlined text-[28px]">agriculture</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">ACTIVITIES</p>
                <p class="text-headline-md text-primary">{{ $aktivitasCount ?? 0 }}</p>
                <p class="text-[10px] text-slate-600 font-medium">This month</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-orange-50 flex items-center justify-center text-orange-700">
                <span class="material-symbols-outlined text-[28px]">shopping_basket</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">HARVESTED</p>
                <p class="text-headline-md text-primary">0 kg</p>
                <p class="text-[10px] text-slate-600 font-medium">Ready to harvest</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-green-50 flex items-center justify-center text-green-700">
                <span class="material-symbols-outlined text-[28px]">check_circle</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">FIELD HEALTH</p>
                <p class="text-headline-md text-primary">94%</p>
                <p class="text-[10px] text-emerald-600 font-medium">Average score</p>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="grid grid-cols-3 gap-gutter mb-8">
        <!-- Field Status -->
        <div class="col-span-2 bg-white rounded-xl border border-slate-100 shadow-sm p-stack-md">
            <h4 class="text-headline-md text-primary mb-4">Field Status Overview</h4>
            <div class="space-y-3">
                <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            <p class="text-body-sm font-medium text-primary">North Field - Section A</p>
                        </div>
                        <p class="text-[12px] text-slate-500">Soil moisture: 68% | Temp: 28°C</p>
                    </div>
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[11px] font-bold">Optimal</span>
                </div>
                <div class="flex items-center justify-between pb-4 border-b border-slate-100">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-3 h-3 rounded-full bg-amber-500"></div>
                            <p class="text-body-sm font-medium text-primary">East Field - Section B</p>
                        </div>
                        <p class="text-[12px] text-slate-500">Soil moisture: 45% | Temp: 26°C</p>
                    </div>
                    <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-full text-[11px] font-bold">Water Needed</span>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <div class="w-3 h-3 rounded-full bg-emerald-500"></div>
                            <p class="text-body-sm font-medium text-primary">West Field - Section C</p>
                        </div>
                        <p class="text-[12px] text-slate-500">Soil moisture: 72% | Temp: 29°C</p>
                    </div>
                    <span class="px-3 py-1 bg-emerald-100 text-emerald-700 rounded-full text-[11px] font-bold">Optimal</span>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gradient-to-br from-emerald-50 to-emerald-100/50 rounded-xl p-stack-md border border-emerald-200 shadow-sm">
            <h4 class="text-headline-md text-primary mb-4">Quick Actions</h4>
            <div class="space-y-3">
                <button class="w-full bg-white hover:bg-slate-50 border border-emerald-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">note_add</span>
                    Log Activity
                </button>
                <button class="w-full bg-white hover:bg-slate-50 border border-emerald-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">water_drop</span>
                    Irrigation
                </button>
                <button class="w-full bg-white hover:bg-slate-50 border border-emerald-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">bug_report</span>
                    Report Issue
                </button>
                <button class="w-full bg-primary hover:opacity-90 text-white rounded-lg px-4 py-3 text-body-sm font-bold transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">shopping_basket</span>
                    Schedule Harvest
                </button>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100">
            <h4 class="text-headline-md text-primary mb-1">Recent Farm Activities</h4>
            <p class="text-body-sm text-slate-500">Your logged activities from the past 30 days</p>
        </div>
        <table class="w-full text-left">
            <thead>
                <tr class="bg-surface-container text-slate-500 uppercase tracking-wider text-[11px] font-bold border-b border-slate-100">
                    <th class="px-6 py-4">Activity</th>
                    <th class="px-6 py-4">Field</th>
                    <th class="px-6 py-4">Duration</th>
                    <th class="px-6 py-4">Notes</th>
                    <th class="px-6 py-4">Date</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-emerald-600 text-lg">water_drop</span>
                            <span class="text-body-sm font-medium">Irrigation</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-body-sm text-slate-600">North Field - A</td>
                    <td class="px-6 py-4 text-body-sm text-slate-600">2.5 hours</td>
                    <td class="px-6 py-4 text-body-sm text-slate-600">Morning watering</td>
                    <td class="px-6 py-4 text-body-sm text-slate-600">Oct 22</td>
                </tr>
                <tr class="hover:bg-slate-50/50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-amber-600 text-lg">pest_control</span>
                            <span class="text-body-sm font-medium">Pest Control</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-body-sm text-slate-600">East Field - B</td>
                    <td class="px-6 py-4 text-body-sm text-slate-600">1.5 hours</td>
                    <td class="px-6 py-4 text-body-sm text-slate-600">Spraying treatment</td>
                    <td class="px-6 py-4 text-body-sm text-slate-600">Oct 21</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>

            
