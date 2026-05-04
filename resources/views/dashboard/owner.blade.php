<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ __('Pemilik Usaha - Dashboard') }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200">
                👔 Pemilik Usaha
            </span>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-lg p-8 text-white">
            <h3 class="text-2xl font-bold mb-2">Selamat datang, {{ auth()->user()->name }}! 🏢</h3>
            <p class="text-indigo-100">Pantau kinerja dan keuangan usaha pertanian Anda secara real-time</p>
        </div>

        <!-- Financial Overview Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Sawah</p>
                <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $totalSawah }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Panen (kg)</p>
                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{ number_format($totalHarvest, 0, ',', '.') }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-emerald-500">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pemasukan</p>
                <p class="text-2xl font-bold text-emerald-600 dark:text-emerald-400 mt-2">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 {{ $totalProfit >= 0 ? 'border-green-500' : 'border-red-500' }}">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Keuntungan</p>
                <p class="text-2xl font-bold {{ $totalProfit >= 0 ? 'text-green-600 dark:text-green-400' : 'text-red-600 dark:text-red-400' }} mt-2">
                    Rp {{ number_format($totalProfit, 0, ',', '.') }}
                </p>
            </div>
            </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Transactions (2 cols) -->
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="text-2xl">💵</span> Pemasukan Terbaru
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Deskripsi</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Jumlah</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($recentTransactions as $transaction)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                        {{ $transaction->deskripsi ?? 'Penjualan Hasil Panen' }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-green-600 dark:text-green-400">
                                        +Rp {{ number_format($transaction->jumlah_uang ?? 0, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ $transaction->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada pemasukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Business Summary -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                    <span class="text-2xl">📊</span> Ringkasan Bisnis
                </h3>

                <div class="space-y-4">
                    <div class="pb-4 border-b border-gray-200 dark:border-gray-700">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Total Pengeluaran</p>
                        <p class="text-2xl font-bold text-red-600 dark:text-red-400 mt-2">
                            Rp {{ number_format($totalExpenses, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="pb-4 border-b border-gray-200 dark:border-gray-700">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Margin Keuntungan</p>
                        <p class="text-2xl font-bold text-indigo-600 dark:text-indigo-400 mt-2">
                            {{ $totalIncome > 0 ? number_format(($totalProfit / $totalIncome) * 100, 1, ',', '.') : 0 }}%
                        </p>
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-3">
                            📋 Menu Cepat
                        </p>
                        <div class="space-y-2">
                            <a href="#" class="block px-4 py-2 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-200 hover:bg-blue-100 dark:hover:bg-blue-900/40 transition text-sm">
                                📊 Laporan Keuangan
                            </a>
                            <a href="#" class="block px-4 py-2 rounded-lg bg-purple-50 dark:bg-purple-900/20 text-purple-700 dark:text-purple-200 hover:bg-purple-100 dark:hover:bg-purple-900/40 transition text-sm">
                                📈 Analytics
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Expenses & Harvest Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Expenses -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="text-2xl">💳</span> Pengeluaran Terbaru
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Deskripsi</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($recentExpenses as $expense)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                        {{ $expense->deskripsi ?? 'Pengeluaran' }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-red-600 dark:text-red-400">
                                        -Rp {{ number_format($expense->jumlah_uang ?? 0, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada pengeluaran
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Recent Harvest -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="text-2xl">📦</span> Hasil Panen Terbaru
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Sawah</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Jumlah (kg)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($harvestData as $harvest)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                        {{ $harvest->sawah->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                        {{ number_format($harvest->hasil_panen ?? $harvest->jumlah_kg ?? 0, 2, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada data panen
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>