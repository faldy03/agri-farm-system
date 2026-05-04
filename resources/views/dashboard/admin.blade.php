<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ __('Admin Dashboard') }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200">
                🔑 Administrator
            </span>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-lg shadow-lg p-8 text-white">
            <h3 class="text-2xl font-bold mb-2">Selamat datang kembali! 👋</h3>
            <p class="text-purple-100">Pantau semua aktivitas sistem dari dashboard administrator Anda</p>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Farmers Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Petani</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">
                            {{ $stats['total_farmers'] }}
                        </p>
                    </div>
                    <div class="text-4xl opacity-30">👨‍🌾</div>
                </div>
            </div>

            <!-- Total Owners Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-indigo-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pemilik Usaha</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">
                            {{ $stats['total_owners'] }}
                        </p>
                    </div>
                    <div class="text-4xl opacity-30">👔</div>
                </div>
            </div>

            <!-- Total Fields Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Sawah</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">
                            {{ $stats['total_fields'] }}
                        </p>
                    </div>
                    <div class="text-4xl opacity-30">🌾</div>
                </div>
            </div>

            <!-- Total Harvest Card -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-orange-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Panen (kg)</p>
                        <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">
                            {{ number_format($stats['total_harvest'], 0, ',', '.') }}
                        </p>
                    </div>
                    <div class="text-4xl opacity-30">📦</div>
                </div>
            </div>
        </div>

        <!-- Activities and Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Activities -->
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="text-2xl">📋</span> Aktivitas Terbaru
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Deskripsi</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Sawah</th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($recentActivities as $activity)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                        {{ $activity->keterangan ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ $activity->sawah->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ $activity->created_at->format('d M Y H:i') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada aktivitas
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl">⚡</span> Menu Admin
                </h3>
                <div class="space-y-2">
                    <a href="{{ route('users.index') }}" class="block px-4 py-3 rounded-lg bg-blue-50 dark:bg-blue-900/20 text-blue-700 dark:text-blue-200 hover:bg-blue-100 dark:hover:bg-blue-900/40 transition font-medium">
                        👥 Kelola Pengguna
                    </a>
                    <a href="#" class="block px-4 py-3 rounded-lg bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-200 hover:bg-green-100 dark:hover:bg-green-900/40 transition font-medium">
                        🔐 Role & Permission
                    </a>
                    <a href="#" class="block px-4 py-3 rounded-lg bg-purple-50 dark:bg-purple-900/20 text-purple-700 dark:text-purple-200 hover:bg-purple-100 dark:hover:bg-purple-900/40 transition font-medium">
                        📊 Laporan Sistem
                    </a>
                    <a href="#" class="block px-4 py-3 rounded-lg bg-orange-50 dark:bg-orange-900/20 text-orange-700 dark:text-orange-200 hover:bg-orange-100 dark:hover:bg-orange-900/40 transition font-medium">
                        ⚙️ Pengaturan
                    </a>
                </div>
            </div>
        </div>
    </div>
{{-- </x-app-layout> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistik Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Farmers Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Petani</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">
                                    {{ $stats['total_farmers'] }}
                                </p>
                            </div>
                            <div class="text-4xl text-green-500">👨‍🌾</div>
                        </div>
                    </div>
                </div>

                <!-- Total Owners Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Pemilik Usaha</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">
                                    {{ $stats['total_owners'] }}
                                </p>
                            </div>
                            <div class="text-4xl text-indigo-500">👔</div>
                        </div>
                    </div>
                </div>

                <!-- Total Fields Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Sawah</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">
                                    {{ $stats['total_fields'] }}
                                </p>
                            </div>
                            <div class="text-4xl text-yellow-500">🌾</div>
                        </div>
                    </div>
                </div>

                <!-- Total Harvest Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Panen (kg)</p>
                                <p class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">
                                    {{ number_format($stats['total_harvest'], 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="text-4xl text-orange-500">📦</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        Aktivitas Terbaru
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">
                                    Deskripsi
                                </th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">
                                    Sawah
                                </th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">
                                    Tanggal
                                </th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($recentActivities as $activity)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                        {{ $activity->deskripsi }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ $activity->sawah->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ $activity->created_at->format('d M Y H:i') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                            Aktif
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Belum ada aktivitas
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                        Menu Admin
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200 hover:bg-blue-100 dark:hover:bg-blue-800 transition">
                            📊 Kelola Pengguna
                        </a>
                        <a href="#" class="block px-4 py-2 rounded bg-green-50 dark:bg-green-900 text-green-700 dark:text-green-200 hover:bg-green-100 dark:hover:bg-green-800 transition">
                            🔐 Kelola Role & Permission
                        </a>
                        <a href="#" class="block px-4 py-2 rounded bg-purple-50 dark:bg-purple-900 text-purple-700 dark:text-purple-200 hover:bg-purple-100 dark:hover:bg-purple-800 transition">
                            📈 Laporan Sistem
                        </a>
                        <a href="#" class="block px-4 py-2 rounded bg-orange-50 dark:bg-orange-900 text-orange-700 dark:text-orange-200 hover:bg-orange-100 dark:hover:bg-orange-800 transition">
                            ⚙️ Pengaturan Sistem
                        </a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                        Informasi Sistem
                    </h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">User Online:</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">12 users</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Total Transaksi:</span>
                            <span class="font-semibold text-gray-900 dark:text-gray-100">245 transaksi</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Status Sistem:</span>
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                ✓ Normal
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
