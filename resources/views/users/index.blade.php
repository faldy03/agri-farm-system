<x-app-layout>
    <!-- Header Section -->
    <div class="flex items-end justify-between mb-8">
        <div>
            <nav class="flex items-center gap-2 text-slate-400 text-label-caps mb-2">
                <a class="hover:text-emerald-700" href="{{ route('dashboard') }}">Home</a>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-emerald-700">User Management</span>
            </nav>
            <h2 class="font-display-lg text-primary text-[32px] leading-tight">User Management</h2>
            <p class="text-body-sm text-slate-500 mt-1">Configure system access and administrative roles for Agri Farm personnel.</p>
        </div>
        <a href="{{ route('users.create') }}" class="flex items-center gap-2 bg-primary text-white px-6 py-3 rounded-lg font-bold text-body-sm shadow-lg shadow-primary/20 hover:opacity-90 active:scale-95 transition-all">
            <span class="material-symbols-outlined">person_add</span>
            Add New User
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 rounded-lg shadow-sm flex items-center gap-2">
            <span class="material-symbols-outlined">check_circle</span>
            {{ session('success') }}
        </div>
    @endif

    <!-- Summary Cards (Bento Grid Style) -->
    <div class="grid grid-cols-12 gap-gutter mb-8">
        <div class="col-span-3 bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-700">
                <span class="material-symbols-outlined text-[28px]">group</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">TOTAL USERS</p>
                <p class="text-headline-md text-primary">{{ count($users) }}</p>
            </div>
        </div>
        
        <div class="col-span-3 bg-white p-stack-md rounded-xl border border-slate-100 shadow-sm flex items-center gap-4">
            <div class="w-12 h-12 rounded-lg bg-blue-50 flex items-center justify-center text-blue-700">
                <span class="material-symbols-outlined text-[28px]">bolt</span>
            </div>
            <div>
                <p class="text-label-caps text-slate-400">ACTIVE TODAY</p>
                <p class="text-headline-md text-primary">{{ $users->where('status', 'active')->count() }}</p>
            </div>
        </div>

        <div class="col-span-6 bg-primary-container p-stack-md rounded-xl border border-emerald-800 shadow-sm flex items-center justify-between text-white overflow-hidden relative">
            <div class="relative z-10">
                <p class="text-label-caps text-emerald-400 mb-1">SECURITY OVERVIEW</p>
                <h3 class="text-headline-md mb-2">System Integrity Secured</h3>
                <div class="flex items-center gap-4">
                    <span class="flex items-center gap-1 text-[12px] bg-emerald-800/50 px-2 py-1 rounded-full text-emerald-200">
                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">verified_user</span> 
                        SSL Active
                    </span>
                    <span class="flex items-center gap-1 text-[12px] bg-emerald-800/50 px-2 py-1 rounded-full text-emerald-200">
                        <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">history</span> 
                        Last Backup: 2h ago
                    </span>
                </div>
            </div>
            <div class="absolute right-0 top-0 w-32 h-32 bg-emerald-700/20 rounded-full -translate-y-12 translate-x-12 blur-2xl"></div>
            <span class="material-symbols-outlined text-emerald-700/40 text-[80px] absolute -right-4 -bottom-4">shield</span>
        </div>
    </div>

    <!-- System Directory Table -->
    <div class="bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden">
        <!-- Table Controls -->
        <div class="p-6 border-b border-slate-100 flex items-center justify-between gap-4">
            <div class="flex items-center gap-4 flex-1">
                <div class="relative max-w-sm flex-1">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-lg text-body-sm focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" id="search-input" placeholder="Filter by name, email or role..." type="text"/>
                </div>
                <button class="flex items-center gap-2 px-4 py-2 border border-slate-200 rounded-lg text-body-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">
                    <span class="material-symbols-outlined text-lg">filter_list</span>
                    Filters
                </button>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-body-sm text-slate-400">Export:</span>
                <button class="p-2 border border-slate-200 rounded-lg hover:bg-slate-50 text-slate-500 transition-colors">
                    <span class="material-symbols-outlined text-lg">description</span>
                </button>
                <button class="p-2 border border-slate-200 rounded-lg hover:bg-slate-50 text-slate-500 transition-colors">
                    <span class="material-symbols-outlined text-lg">print</span>
                </button>
            </div>
        </div>

        <!-- The Table -->
        <table class="w-full text-left">
            <thead>
                <tr class="bg-surface-container text-slate-500 uppercase tracking-wider text-[11px] font-bold">
                    <th class="px-6 py-4">Name</th>
                    <th class="px-6 py-4">Email Address</th>
                    <th class="px-6 py-4">Role</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100 searchable-rows">
                @forelse ($users as $user)
                    <tr class="hover:bg-slate-50/50 transition-colors group user-row" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-role="{{ $user->getRoleNames()->first() ?? 'User' }}">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10 rounded-full object-cover" src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $user->id }}" alt="{{ $user->name }}"/>
                                <div>
                                    <p class="text-body-sm font-bold text-primary">{{ $user->name }}</p>
                                    <p class="text-[11px] text-slate-400">ID: #AFS-{{ str_pad($user->id, 3, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-body-sm text-slate-600">{{ $user->email }}</td>
                        <td class="px-6 py-4">
                            @php
                                $roles = $user->getRoleNames();
                                $role = $roles->first() ?? 'User';
                                $roleColors = [
                                    'owner' => 'bg-purple-100 text-purple-700',
                                    'admin' => 'bg-blue-100 text-blue-700',
                                    'petani' => 'bg-emerald-100 text-emerald-700',
                                ];
                                $roleColor = $roleColors[$role] ?? 'bg-slate-100 text-slate-700';
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold {{ $roleColor }}">
                                {{ strtoupper($role) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColor = $user->status === 'active' ? 'text-emerald-600' : ($user->status === 'inactive' ? 'text-slate-400' : 'text-red-600');
                                $statusBg = $user->status === 'active' ? 'bg-emerald-600' : ($user->status === 'inactive' ? 'bg-slate-300' : 'bg-red-600');
                            @endphp
                            <span class="inline-flex items-center gap-1.5 text-[12px] font-medium {{ $statusColor }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $statusBg }}"></span>
                                {{ ucfirst($user->status ?? 'inactive') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('users.edit', $user->id) }}" class="p-2 text-slate-400 hover:text-emerald-700 transition-colors">
                                    <span class="material-symbols-outlined text-lg">edit</span>
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-slate-400 hover:text-error transition-colors" onclick="return confirm('Yakin ingin menghapus?')">
                                        <span class="material-symbols-outlined text-lg">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-slate-500">
                            <span class="material-symbols-outlined text-4xl mb-2 block opacity-50">person_off</span>
                            <p class="text-body-sm font-medium">Tidak ada data user</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Footer -->
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
            <p class="text-[12px] text-slate-500 font-medium">Showing <span class="text-primary">1 to {{ min(count($users), 4) }}</span> of {{ count($users) }} users</p>
            @if(count($users) > 1)
                <div class="flex items-center gap-1">
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-slate-200 text-slate-400 hover:bg-white transition-colors">
                        <span class="material-symbols-outlined text-lg">chevron_left</span>
                    </button>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-emerald-200 bg-emerald-50 text-emerald-700 font-bold text-[12px]">1</button>
                    @if(count($users) > 4)
                        <button class="w-8 h-8 flex items-center justify-center rounded border border-slate-200 text-slate-600 hover:bg-white text-[12px] transition-colors">2</button>
                    @endif
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-slate-200 text-slate-400 hover:bg-white transition-colors">
                        <span class="material-symbols-outlined text-lg">chevron_right</span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <!-- Role Permissions Context Card (Asymmetric Layout Extra) -->
    <div class="mt-8 grid grid-cols-12 gap-gutter">
        <div class="col-span-12 lg:col-span-8 bg-white/50 backdrop-blur-sm border border-emerald-100 rounded-xl p-8 relative overflow-hidden">
            <div class="flex gap-8 relative z-10">
                <div class="flex-1">
                    <h4 class="text-headline-md text-primary mb-2">Manage Role Privileges</h4>
                    <p class="text-body-sm text-slate-600 mb-6 max-w-lg">Advanced role management allows you to define exactly what each member of your farm team can access. From harvest schedules to financial reports, precision stewardship starts with secure boundaries.</p>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="p-4 rounded-lg bg-white border border-emerald-100/50 shadow-sm">
                            <p class="text-label-caps text-emerald-700 mb-1">Owner</p>
                            <p class="text-[11px] text-slate-500">Full system access and data ownership.</p>
                        </div>
                        <div class="p-4 rounded-lg bg-white border border-emerald-100/50 shadow-sm">
                            <p class="text-label-caps text-blue-700 mb-1">Admin</p>
                            <p class="text-[11px] text-slate-500">User oversight and operational config.</p>
                        </div>
                        <div class="p-4 rounded-lg bg-white border border-emerald-100/50 shadow-sm">
                            <p class="text-label-caps text-emerald-600 mb-1">Petani</p>
                            <p class="text-[11px] text-slate-500">Field logs, inventory, and activity tracker.</p>
                        </div>
                    </div>
                </div>
                <div class="hidden xl:block w-48">
                    <img class="rounded-xl w-full h-full object-cover" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=300&h=300&fit=crop" alt="Digital infrastructure"/>
                </div>
            </div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-emerald-50 rounded-full blur-3xl opacity-50"></div>
        </div>

        <div class="col-span-12 lg:col-span-4 bg-emerald-900 rounded-xl p-8 text-white flex flex-col justify-between shadow-2xl">
            <div>
                <span class="material-symbols-outlined text-[40px] text-emerald-400 mb-4">gpp_maybe</span>
                <h4 class="text-headline-md mb-2">System Audit Required</h4>
                <p class="text-body-sm text-emerald-100/80">There are {{ $users->where('status', 'inactive')->count() }} accounts that haven't logged in recently. We recommend reviewing these for potential suspension.</p>
            </div>
            <button class="mt-8 py-3 bg-emerald-400 text-emerald-950 font-bold rounded-lg hover:bg-emerald-300 transition-colors active:scale-95">
                Start Security Audit
            </button>
        </div>
    </div>

    <script>
        // Search functionality
        const searchInput = document.getElementById('search-input');
        const userRows = document.querySelectorAll('.user-row');

        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            
            userRows.forEach(row => {
                const name = row.dataset.name.toLowerCase();
                const email = row.dataset.email.toLowerCase();
                const role = row.dataset.role.toLowerCase();
                
                if (name.includes(searchTerm) || email.includes(searchTerm) || role.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>