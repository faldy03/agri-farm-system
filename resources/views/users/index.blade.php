<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Manajemen Pengguna
        </h2>
    </x-slot>
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm">
            {{ session('success') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="flex justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                    Daftar User
                </h3>
                <a href="{{ route('users.create') }}"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    + Tambah User
                </a>
            </div>

            <!-- Table -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left">Nama</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Role</th>
                                <th class="px-6 py-3 text-left">Tanggal Dibuat</th>
                                <th class="px-6 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y dark:divide-gray-700">
                            @forelse ($users as $user)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-gray-100">
                                        {{ $user->name }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ $user->email }}
                                    </td>

                                    <td class="px-6 py-4">
                                        @foreach ($user->roles as $role)
                                            <span class="px-2 py-1 text-xs rounded 
                                                                @if($role->name == 'admin') bg-red-100 text-red-700
                                                                @elseif($role->name == 'owner') bg-purple-100 text-purple-700
                                                                @else bg-green-100 text-green-700 @endif">
                                                {{ $role->name }}
                                            </span>
                                        @endforeach
                                    </td>

                                    <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                        {{ $user->created_at->format('d M Y') }}
                                    </td>

                                    <td class="px-6 py-4 text-center space-x-2">
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="px-3 py-1 bg-yellow-400 text-white rounded hover:bg-yellow-500">
                                            Edit
                                        </a>

                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600"
                                                onclick="return confirm('Yakin ingin menghapus?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-6 text-gray-500">
                                        Tidak ada data user
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