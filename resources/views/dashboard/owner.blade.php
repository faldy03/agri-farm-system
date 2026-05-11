<x-app-layout>
    <!-- Header Section -->
    <div class="flex items-end justify-between mb-8">
        <div>
            <nav class="flex items-center gap-2 text-slate-400 text-label-caps mb-2">
                <a class="hover:text-emerald-700" href="#">Home</a>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-emerald-700">Owner Dashboard</span>
            </nav>
            <h2 class="font-display-lg text-primary text-[32px] leading-tight">Business Performance</h2>
            <p class="text-body-sm text-slate-500 mt-1">Monitor financial metrics and operational overview across all farms.</p>
        </div>
        <button class="flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-bold text-body-sm shadow-lg shadow-primary/20 hover:opacity-90 active:scale-95 transition-all">
            <span class="material-symbols-outlined">assessment</span>
            Financial Report
        </button>
    </div>

    <!-- Key Metrics Grid -->
    <div class="grid grid-cols-4 gap-gutter mb-8">
        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-700">
                <span class="material-symbols-outlined text-[28px]">paid</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">TOTAL REVENUE</p>
                <p class="text-headline-md text-primary">$124.5K</p>
                <p class="text-[10px] text-emerald-600 font-medium">+12.5% YoY</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700">
                <span class="material-symbols-outlined text-[28px]">trending_down</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">TOTAL EXPENSES</p>
                <p class="text-headline-md text-primary">$48.2K</p>
                <p class="text-[10px] text-red-600 font-medium">+3.2% vs forecast</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-700">
                <span class="material-symbols-outlined text-[28px]">savings</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">NET PROFIT</p>
                <p class="text-headline-md text-primary">$76.3K</p>
                <p class="text-[10px] text-emerald-600 font-medium">38.7% profit margin</p>
            </div>
        </div>

        <div class="bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4 hover:shadow-md transition-shadow">
            <div class="w-12 h-12 rounded-lg bg-orange-50 flex items-center justify-center text-orange-700">
                <span class="material-symbols-outlined text-[28px]">landscape</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">MANAGED FARMS</p>
                <p class="text-headline-md text-primary">{{ $totalSawah ?? 12 }}</p>
                <p class="text-[10px] text-slate-600 font-medium">8 active operations</p>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-3 gap-gutter mb-8">
        <!-- Financial Trend -->
        <div class="col-span-2 bg-white rounded-xl border border-slate-100 shadow-sm p-stack-md">
            <div class="mb-6">
                <h4 class="text-headline-md text-primary mb-1">Revenue & Expense Trend</h4>
                <p class="text-body-sm text-slate-500">Monthly financial performance over 12 months</p>
            </div>
            <div class="h-64 bg-gradient-to-b from-slate-50 to-white rounded-lg flex items-center justify-center border border-slate-100">
                <div class="text-center">
                    <span class="material-symbols-outlined text-4xl text-slate-300 block mb-2">trending_up</span>
                    <p class="text-slate-500 text-body-sm">Financial Chart Placeholder</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gradient-to-br from-emerald-50 to-emerald-100/50 rounded-xl p-stack-md border border-emerald-200 shadow-sm">
            <h4 class="text-headline-md text-primary mb-4">Quick Actions</h4>
            <div class="space-y-3">
                <button class="w-full bg-white hover:bg-slate-50 border border-emerald-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">add_circle</span>
                    Add New Farm
                </button>
                <button class="w-full bg-white hover:bg-slate-50 border border-emerald-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">person_add</span>
                    Assign Farmer
                </button>
                <button class="w-full bg-white hover:bg-slate-50 border border-emerald-200 rounded-lg px-4 py-3 text-left text-body-sm font-medium text-primary transition-colors flex items-center gap-2">
                    <span class="material-symbols-outlined">description</span>
                    View Reports
                </button>
                <button class="w-full bg-primary hover:opacity-90 text-white rounded-lg px-4 py-3 text-body-sm font-bold transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">settings</span>
                    Business Settings
                </button>
            </div>
        </div>
    </div>

    <!-- Performance Overview -->
    <div class="grid grid-cols-2 gap-gutter">
        <div class="bg-white rounded-xl border border-slate-100 shadow-sm p-stack-md">
            <h4 class="text-headline-md text-primary mb-4">Farm Performance</h4>
            <div class="space-y-3">
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                        <span class="text-body-sm text-slate-600">East Field Section</span>
                    </div>
                    <span class="text-body-sm font-bold text-primary">94%</span>
                </div>
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                        <span class="text-body-sm text-slate-600">North Greenhouse</span>
                    </div>
                    <span class="text-body-sm font-bold text-primary">87%</span>
                </div>
                <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                        <span class="text-body-sm text-slate-600">West Section</span>
                    </div>
                    <span class="text-body-sm font-bold text-primary">72%</span>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-slate-500"></div>
                        <span class="text-body-sm text-slate-600">South Farm</span>
                    </div>
                    <span class="text-body-sm font-bold text-primary">0%</span>
                </div>
            </div>
        </div>

        <div class="bg-primary-container rounded-xl p-stack-md text-white shadow-lg">
            <h4 class="text-headline-md mb-4">Owner Statistics</h4>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-emerald-800/50 rounded-lg p-4 backdrop-blur-sm">
                    <p class="text-[10px] text-emerald-200 mb-1">Active Farmers</p>
                    <p class="text-2xl font-bold">24</p>
                </div>
                <div class="bg-emerald-800/50 rounded-lg p-4 backdrop-blur-sm">
                    <p class="text-[10px] text-emerald-200 mb-1">Total Harvest</p>
                    <p class="text-2xl font-bold">2.4K kg</p>
                </div>
                <div class="bg-emerald-800/50 rounded-lg p-4 backdrop-blur-sm">
                    <p class="text-[10px] text-emerald-200 mb-1">Avg Profit/Farm</p>
                    <p class="text-2xl font-bold">$6.3K</p>
                </div>
                <div class="bg-emerald-800/50 rounded-lg p-4 backdrop-blur-sm">
                    <p class="text-[10px] text-emerald-200 mb-1">System Health</p>
                    <p class="text-2xl font-bold">99.2%</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
                       