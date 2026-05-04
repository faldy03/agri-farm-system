<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                {{ __('Petani - Dashboard') }}
            </h2>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                👨‍🌾 Petani
            </span>
        </div>
    </x-slot>

    <div class="p-6 space-y-6">
        <!-- Welcome Banner -->
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg shadow-lg p-8 text-white">
            <h3 class="text-2xl font-bold mb-2">Selamat datang, {{ auth()->user()->name }}! 🌾</h3>
            <p class="text-green-100">Kelola sawah dan aktivitas pertanian Anda dengan mudah</p>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-green-500 hover:shadow-md transition">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Jumlah Sawah</p>
                <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $sawahCount }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-blue-500 hover:shadow-md transition">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Aktivitas Bulan Ini</p>
                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-2">{{ $aktivitasCount }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border-l-4 border-amber-500 hover:shadow-md transition">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Jumlah Panen</p>
                <p class="text-3xl font-bold text-amber-600 dark:text-amber-400 mt-2">{{ $panenCount }}</p>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Activities (2 cols) -->
            <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                        <span class="text-2xl">📋</span> Aktivitas Terbaru
                    </h3>
                </div>

                <div class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($recentActivities as $activity)
                        <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <p class="font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $activity->keterangan ?? 'Aktivitas' }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                        Sawah: <strong>{{ $activity->sawah->nama ?? '-' }}</strong>
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs text-gray-500 dark:text-gray-400">
                                        {{ $activity->created_at->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                            Belum ada aktivitas
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
                    <span class="text-2xl">⚡</span> Aksi Cepat
                </h3>
                <div class="space-y-2">
                    <a href="#" class="block px-4 py-3 rounded-lg bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold hover:from-green-600 hover:to-emerald-700 transition text-center">
                        + Tambah Sawah
                    </a>
                    <a href="#" class="block px-4 py-3 rounded-lg bg-gradient-to-r from-blue-500 to-cyan-600 text-white font-semibold hover:from-blue-600 hover:to-cyan-700 transition text-center">
                        + Aktivitas Baru
                    </a>
                    <a href="#" class="block px-4 py-3 rounded-lg bg-gradient-to-r from-amber-500 to-orange-600 text-white font-semibold hover:from-amber-600 hover:to-orange-700 transition text-center">
                        + Catat Panen
                    </a>
                </div>
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
                            <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">Tanggal Panen</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($recentHarvest as $harvest)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                    {{ $harvest->sawah->nama ?? '-' }}
                                </td>
                                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                    {{ number_format($harvest->jumlah_kg, 2, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                    {{ $harvest->tanggal_panen->format('d M Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Belum ada data panen
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Greeting Card -->
            <div class="mb-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg shadow-lg p-8 text-white">
                <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ auth()->user()->name }}! 🌾</h3>
                <p class="text-green-100">Kelola sawah dan aktivitas pertanian Anda dengan mudah</p>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Sawah Count Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Jumlah Sawah</p>
                                <p class="text-4xl font-bold text-green-600 dark:text-green-400 mt-2">
                                    {{ $sawahCount }}
                                </p>
                            </div>
                            <div class="text-5xl opacity-20">🌾</div>
                        </div>
                    </div>
                    <div class="bg-green-50 dark:bg-green-900 px-6 py-3">
                        <a href="#" class="text-sm font-semibold text-green-700 dark:text-green-200 hover:underline">
                            Lihat Semua →
                        </a>
                    </div>
                </div>

                <!-- Aktivitas Count Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Aktivitas Bulan Ini</p>
                                <p class="text-4xl font-bold text-blue-600 dark:text-blue-400 mt-2">
                                    {{ $aktivitasCount }}
                                </p>
                            </div>
                            <div class="text-5xl opacity-20">📋</div>
                        </div>
                    </div>
                    <div class="bg-blue-50 dark:bg-blue-900 px-6 py-3">
                        <a href="#" class="text-sm font-semibold text-blue-700 dark:text-blue-200 hover:underline">
                            Lihat Detail →
                        </a>
                    </div>
                </div>

                <!-- Panen Count Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Jumlah Panen</p>
                                <p class="text-4xl font-bold text-amber-600 dark:text-amber-400 mt-2">
                                    {{ $panenCount }}
                                </p>
                            </div>
                            <div class="text-5xl opacity-20">📦</div>
                        </div>
                    </div>
                    <div class="bg-amber-50 dark:bg-amber-900 px-6 py-3">
                        <a href="#" class="text-sm font-semibold text-amber-700 dark:text-amber-200 hover:underline">
                            Lihat Hasil →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Recent Activities (Left - 2 cols) -->
                <div class="lg:col-span-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                            📋 Aktivitas Terbaru
                        </h3>
                    </div>

                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($recentActivities as $activity)
                            <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <div class="flex justify-between items-start">
                                    <div class="flex-1">
                                        <p class="font-semibold text-gray-900 dark:text-gray-100">
                                            {{ $activity->deskripsi }}
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                            Sawah: <strong>{{ $activity->sawah->nama ?? '-' }}</strong>
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $activity->created_at->format('d M Y') }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">
                                            {{ $activity->created_at->format('H:i') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="p-6 text-center text-gray-500 dark:text-gray-400">
                                Belum ada aktivitas. Mulai tambahkan aktivitas!
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Quick Actions (Right - 1 col) -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">
                        ⚡ Aksi Cepat
                    </h3>
                    <div class="space-y-3">
                        <a href="#" class="block px-4 py-3 rounded bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold hover:from-green-600 hover:to-emerald-700 transition text-center">
                            + Tambah Sawah
                        </a>
                        <a href="#" class="block px-4 py-3 rounded bg-gradient-to-r from-blue-500 to-cyan-600 text-white font-semibold hover:from-blue-600 hover:to-cyan-700 transition text-center">
                            + Aktivitas Baru
                        </a>
                        <a href="#" class="block px-4 py-3 rounded bg-gradient-to-r from-amber-500 to-orange-600 text-white font-semibold hover:from-amber-600 hover:to-orange-700 transition text-center">
                            + Catat Panen
                        </a>
                        <a href="#" class="block px-4 py-3 rounded bg-gradient-to-r from-purple-500 to-pink-600 text-white font-semibold hover:from-purple-600 hover:to-pink-700 transition text-center">
                            📊 Laporan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Harvest -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                        📦 Hasil Panen Terbaru
                    </h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">
                                    Sawah
                                </th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">
                                    Jumlah (kg)
                                </th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">
                                    Tanggal Panen
                                </th>
                                <th class="px-6 py-3 text-left font-semibold text-gray-900 dark:text-gray-100">
                                    Kualitas
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($recentHarvest as $harvest)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $harvest->sawah->nama ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-900 dark:text-gray-100">
                                        {{ number_format($harvest->hasil_panen, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ $harvest->tanggal_panen->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                            Premium
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
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
