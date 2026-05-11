<x-app-layout>
    <!-- Header Section -->
    <div class="flex items-end justify-between mb-8">
        <div>
            <nav class="flex items-center gap-2 text-slate-400 text-label-caps mb-2">
                <a class="hover:text-emerald-700" href="#">Home</a>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-emerald-700">Dashboard</span>
            </nav>
            <h2 class="font-display-lg text-primary text-[32px] leading-tight">Farm Overview</h2>
            <p class="text-body-sm text-slate-500 mt-1">Monitor your agricultural operations and performance metrics in real-time.</p>
        </div>
        <button class="flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-bold text-body-sm shadow-lg shadow-primary/20 hover:opacity-90 active:scale-95 transition-all">
            <span class="material-symbols-outlined">download</span>
            Export Report
        </button>
    </div>

    <!-- Summary Cards Grid -->
    <div class="grid grid-cols-4 gap-gutter mb-8">
        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-700">
                <span class="material-symbols-outlined text-[28px]">landscape</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">TOTAL SAWAH</p>
                <p class="text-headline-md text-primary">124.5</p>
                <p class="text-[10px] text-emerald-600 font-medium">+5.2% from last month</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700">
                <span class="material-symbols-outlined text-[28px]">trending_up</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">PRODUCTION YIELD</p>
                <p class="text-headline-md text-primary">18</p>
                <p class="text-[10px] text-red-600 font-medium">3 critical farms</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center text-amber-700">
                <span class="material-symbols-outlined text-[28px]">track_changes</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">GROWTH METRIC</p>
                <p class="text-headline-md text-primary">82%</p>
                <p class="text-[10px] text-emerald-600 font-medium">3 data sources</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-orange-50 flex items-center justify-center text-orange-700">
                <span class="material-symbols-outlined text-[28px]">schedule</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">NOT HARVESTED</p>
                <p class="text-headline-md text-primary">12</p>
                <p class="text-[10px] text-slate-600 font-medium">Preparation in 36h</p>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-3 gap-gutter mb-8">
        <!-- Profit & Loss Analysis -->
        <div class="col-span-2 bg-white rounded-xl border border-slate-100 shadow-sm p-stack-md">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h4 class="text-headline-md text-primary mb-1">Profit & Loss Analysis</h4>
                    <p class="text-body-sm text-slate-500">Monthly performance overview for all farms</p>
                </div>
            </div>
            <div class="h-64 bg-gradient-to-b from-slate-50 to-white rounded-lg flex items-center justify-center border border-slate-100">
                <div class="text-center">
                    <span class="material-symbols-outlined text-4xl text-slate-300 block mb-2">bar_chart</span>
                    <p class="text-slate-500 text-body-sm">Chart Placeholder</p>
                    <p class="text-[12px] text-slate-400 mt-1">Revenue: $124,500.00 | Expenses: 68.2% | Net Profit: $48,200.00</p>
                </div>
            </div>
        </div>

        <!-- AI Yield Prediction -->
        <div class="bg-emerald-900 rounded-xl p-stack-md text-white shadow-lg overflow-hidden relative">
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-headline-md">AI Yield Prediction</h4>
                    <button class="p-2 bg-emerald-700/50 rounded-full hover:bg-emerald-700 transition-colors">
                        <span class="material-symbols-outlined text-lg">more_vert</span>
                    </button>
                </div>
                
                <div class="mb-6">
                    <div class="flex items-baseline gap-2 mb-2">
                        <span class="text-4xl font-bold">94.8%</span>
                        <span class="text-emerald-200 text-body-sm">Prediction Accuracy</span>
                    </div>
                    <div class="h-1.5 bg-emerald-700/50 rounded-full overflow-hidden">
                        <div class="h-full bg-emerald-400 rounded-full" style="width: 94.8%"></div>
                    </div>
                </div>

                <p class="text-body-sm text-emerald-100/90 mb-4 leading-relaxed">
                    Current soil moisture and climate data indicates optimal growing conditions. Expect peak harvest readiness in 14 days.
                </p>

                <button class="w-full bg-emerald-400 text-emerald-950 font-bold py-3 rounded-lg hover:bg-emerald-300 transition-colors active:scale-95">
                    View All Predictions
                </button>
            </div>
            <div class="absolute -bottom-20 -right-20 w-48 h-48 bg-emerald-700/20 rounded-full blur-3xl"></div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="grid grid-cols-12 gap-gutter">
        <div class="col-span-12 bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Header -->
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h4 class="text-headline-md text-primary mb-1">Recent Activities</h4>
                    <p class="text-body-sm text-slate-500">Latest farm operations and system events</p>
                </div>
                <a href="#" class="text-emerald-700 text-body-sm font-medium hover:text-emerald-800 transition-colors">
                    View All Activities →
                </a>
            </div>

            <!-- Table -->
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-surface-container text-slate-500 uppercase tracking-wider text-[11px] font-bold border-b border-slate-100">
                        <th class="px-6 py-4">Activity Type</th>
                        <th class="px-6 py-4">Farm Location</th>
                        <th class="px-6 py-4">Assigned To</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-emerald-700 text-lg">agriculture</span>
                                </div>
                                <span class="text-body-sm font-medium text-primary">Planting Preparation</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">East Section B-2</td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">Budi Santoso</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-emerald-100 text-emerald-700">In Progress</span>
                        </td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">Oct 22, 2024</td>
                        <td class="px-6 py-4 text-right">
                            <button class="p-2 text-slate-400 hover:text-emerald-700 transition-colors opacity-0 group-hover:opacity-100">
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-blue-700 text-lg">water_drop</span>
                                </div>
                                <span class="text-body-sm font-medium text-primary">Irrigation System</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">North Greenhouse</td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">Ahmad Fauzi</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-100 text-amber-700">Warning</span>
                        </td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">Oct 22, 2024</td>
                        <td class="px-6 py-4 text-right">
                            <button class="p-2 text-slate-400 hover:text-emerald-700 transition-colors opacity-0 group-hover:opacity-100">
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-orange-700 text-lg">shopping_basket</span>
                                </div>
                                <span class="text-body-sm font-medium text-primary">Harvest Schedule</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">West Field Section</td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">Siti Aminah</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-slate-100 text-slate-700">Pending</span>
                        </td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">Oct 21, 2024</td>
                        <td class="px-6 py-4 text-right">
                            <button class="p-2 text-slate-400 hover:text-emerald-700 transition-colors opacity-0 group-hover:opacity-100">
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
