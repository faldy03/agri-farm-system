<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-4">Selamat Datang di Agri Farm! 🌾</h3>

                    <p class="text-gray-600 dark:text-gray-400 mb-6">
                        Akun Anda belum memiliki role yang ditetapkan. Silakan hubungi administrator untuk mendapatkan akses yang sesuai.
                    </p>

                    <div class="bg-yellow-50 dark:bg-yellow-900 border border-yellow-200 dark:border-yellow-700 rounded-lg p-4 mb-6">
                        <p class="text-yellow-800 dark:text-yellow-200">
                            <strong>⚠️ Informasi:</strong> Hubungi admin untuk mendapatkan role (Admin, Petani, atau Pembeli)
                        </p>
                    </div>

                    <p class="text-gray-500 dark:text-gray-400">
                        Role yang tersedia:
                    </p>
                    <ul class="mt-4 space-y-2 text-gray-600 dark:text-gray-300">
                        <li class="flex items-center"><span class="mr-2">🔑</span> <strong>Admin</strong> - Kelola seluruh sistem</li>
                        <li class="flex items-center"><span class="mr-2">👨‍🌾</span> <strong>Farmer</strong> - Kelola sawah dan aktivitas pertanian</li>
                        <li class="flex items-center"><span class="mr-2">👔</span> <strong>Owner</strong> - Monitor dan analisis usaha pertanian</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
