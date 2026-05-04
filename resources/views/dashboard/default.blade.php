<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="max-w-4xl mx-auto">
            <!-- Main Info Card -->
            <div class="bg-gradient-to-r from-blue-500 to-cyan-600 rounded-lg shadow-lg p-12 text-white text-center mb-8">
                <h3 class="text-3xl font-bold mb-4">Selamat Datang di Agri Farm! 🌾</h3>
                <p class="text-lg text-blue-100">
                    Sistem Manajemen Pertanian Modern untuk Pertumbuhan Usaha Anda
                </p>
            </div>

            <!-- Alert Box -->
            <div class="bg-yellow-50 dark:bg-yellow-900/20 border-l-4 border-yellow-500 rounded-lg p-6 mb-8">
                <div class="flex items-start gap-4">
                    <span class="text-3xl">⚠️</span>
                    <div>
                        <h4 class="font-semibold text-yellow-900 dark:text-yellow-200 mb-2">Akses Terbatas</h4>
                        <p class="text-yellow-800 dark:text-yellow-300 mb-3">
                            Akun Anda belum memiliki role yang ditetapkan. Silakan hubungi administrator untuk mendapatkan akses yang sesuai.
                        </p>
                        <a href="mailto:admin@agrifarm.com" class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold rounded-lg transition">
                            📧 Hubungi Administrator
                        </a>
                    </div>
                </div>
            </div>

            <!-- Available Roles -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white">📋 Role yang Tersedia</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-0 divide-x divide-gray-200 dark:divide-gray-700">
                    <!-- Admin Role -->
                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-5xl">🔑</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200">
                                Admin
                            </span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Administrator</h4>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Kelola seluruh sistem</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Manajemen pengguna & role</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Kontrol permission</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Laporan sistem lengkap</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Farmer Role -->
                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-5xl">👨‍🌾</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200">
                                Petani
                            </span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Petani</h4>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Kelola sawah pribadi</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Catat aktivitas pertanian</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Monitor hasil panen</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Dashboard pertanian</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Owner Role -->
                    <div class="p-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-5xl">👔</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200">
                                Owner
                            </span>
                        </div>
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Pemilik Usaha</h4>
                        <ul class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Monitor seluruh usaha</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Analisis finansial</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Laporan keuangan</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span>✓</span>
                                <span>Strategi bisnis</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="mt-8 bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">🎯 Fitur Utama</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-start gap-4">
                        <span class="text-3xl">📊</span>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Dashboard Terintegrasi</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Pantau performa usaha secara real-time dengan visualisasi data yang mudah dipahami</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="text-3xl">🌾</span>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Manajemen Sawah</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Kelola informasi lengkap tentang setiap bidang sawah Anda</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="text-3xl">📝</span>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Pencatatan Aktivitas</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Catat setiap aktivitas pertanian untuk riwayat lengkap</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="text-3xl">💰</span>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Manajemen Keuangan</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Kelola pemasukan dan pengeluaran bisnis pertanian Anda</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="text-3xl">📦</span>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Manajemen Stok</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Pantau stok produk dan hasil panen dengan akurat</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <span class="text-3xl">📈</span>
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white mb-1">Analisis & Laporan</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Dapatkan insight mendalam tentang performa bisnis Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
