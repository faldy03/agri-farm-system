<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Pengguna Baru
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nama Lengkap</label>
                        <input type="text" name="name" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500" value="{{ old('name') }}" required>
                        @error('name') 
                            <span class="text-red-500 text-xs">{{ $message }}</span> 
                        @enderror </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500" value="{{ old('email') }}" required>
                        @error('email') 
                            <span class="text-red-500 text-xs">{{ $message }}</span> 
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Password</label>
                        <input type="password" name="password" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500" required>
                        @error('password') 
                            <span class="text-red-500 text-xs">{{ $message }}</span> 
@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Role</label>
                        <select name="role" class="w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-100 shadow-sm focus:border-blue-500">
                            <option value="user">User / Petani</option>
                            <option value="owner">Owner</option>
                            <option value="admin">Admin</option>
                        </select>
                        @error('role') 
                            <span class="text-red-500 text-xs">{{ $message }}</span> 
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('users.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Simpan User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>