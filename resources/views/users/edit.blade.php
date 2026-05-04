<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit Profil') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Profile Card (Left) -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <!-- Profile Header -->
                        <div class="h-32 bg-gradient-to-r from-green-500 to-emerald-600"></div>

                        <!-- Avatar Section -->
                        <div class="px-6 pb-6">
                            <div class="flex flex-col items-center -mt-16">
                                <div class="w-32 h-32 rounded-full bg-gradient-to-br from-blue-500 to-cyan-600 border-4 border-white dark:border-gray-800 flex items-center justify-center text-white font-bold text-5xl shadow-lg">
                                    {{ substr($user->name, 0, 1) }}
                                </div>

                                <div class="mt-4 text-center">
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $user->name }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                                    
                                    @php
                                        $roles = $user->getRoleNames();
                                    @endphp
                                    @if($roles->count() > 0)
                                        <div class="mt-3 flex flex-wrap gap-2 justify-center">
                                            @foreach($roles as $role)
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200">
                                                    {{ ucfirst($role) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-6 w-full space-y-2 text-sm">
                                    <div class="flex justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <span class="text-gray-600 dark:text-gray-400">Bergabung:</span>
                                        <span class="font-semibold text-gray-900 dark:text-white">{{ $user->created_at->format('d M Y') }}</span>
                                    </div>
                                    <div class="flex justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                                        <span class="text-gray-600 dark:text-gray-400">Update Terakhir:</span>
                                        <span class="font-semibold text-gray-900 dark:text-white">{{ $user->updated_at->format('d M Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Section (Right - 2 cols) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Update Profile Information -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                            <span class="text-2xl">👤</span> Informasi Profil
                        </h3>

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            @method('patch')

                            <!-- Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="Masukkan nama lengkap">
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-green-500 focus:border-transparent transition" placeholder="nama@example.com">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center gap-4 pt-4">
                                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold rounded-lg hover:from-green-600 hover:to-emerald-700 transition shadow-sm">
                                    💾 Simpan Perubahan
                                </button>

                                @if (session('status') === 'profile-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 dark:text-green-400">
                                        ✓ Perubahan berhasil disimpan!
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>

                    <!-- Update Password -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                            <span class="text-2xl">🔐</span> Ubah Password
                        </h3>

                        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            @method('put')

                            <!-- Current Password -->
                            <div>
                                <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password Saat Ini</label>
                                <input type="password" id="update_password_current_password" name="current_password" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" autocomplete="current-password" placeholder="Masukkan password saat ini">
                                @error('current_password', 'updatePassword')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="update_password_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password Baru</label>
                                <input type="password" id="update_password_password" name="password" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" autocomplete="new-password" placeholder="Masukkan password baru">
                                @error('password', 'updatePassword')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label for="update_password_password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konfirmasi Password</label>
                                <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" autocomplete="new-password" placeholder="Konfirmasi password baru">
                                @error('password_confirmation', 'updatePassword')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center gap-4 pt-4">
                                <button type="submit" class="px-6 py-2 bg-gradient-to-r from-blue-500 to-cyan-600 text-white font-semibold rounded-lg hover:from-blue-600 hover:to-cyan-700 transition shadow-sm">
                                    🔄 Update Password
                                </button>

                                @if (session('status') === 'password-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600 dark:text-green-400">
                                        ✓ Password berhasil diperbarui!
                                    </p>
                                @endif
                            </div>
                        </form>
                    </div>

                    <!-- Delete Account -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                            <span class="text-2xl">⚠️</span> Hapus Akun
                        </h3>

                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                            Setelah akun dihapus, tidak ada pemulihan yang mungkin. Harap dipastikan.
                        </p>

                        <button type="button" onclick="document.getElementById('confirm-user-deletion').showModal()" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition shadow-sm">
                            🗑️ Hapus Akun
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <dialog id="confirm-user-deletion" class="backdrop:bg-black/50 rounded-lg shadow-xl max-w-md">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                ⚠️ Hapus Akun
            </h3>

            <p class="text-sm text-gray-600 dark:text-gray-400 mb-6">
                Apakah Anda yakin ingin menghapus akun Anda? Tindakan ini tidak dapat dibatalkan.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4">
                @csrf
                @method('delete')

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Masukkan password untuk konfirmasi
                    </label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-red-500 focus:border-transparent transition" placeholder="••••••••">
                </div>

                <div class="flex gap-4">
                    <button type="button" onclick="document.getElementById('confirm-user-deletion').close()" class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition font-medium">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
                        Hapus Akun
                    </button>
                </div>
            </form>
        </div>
    </dialog>
</x-app-layout>
