<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * RoleAndPermissionSeeder
 *
 * Membuat role, permission, dan user untuk sistem agri-farm.
 * Roles yang dibuat: Admin, Farmer, Owner
 */
class RoleAndPermissionSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Daftar permissions yang tersedia
        $permissions = [
            // Dashboard
            'view dashboard',
            // Sawah (Fields)
            'create sawah',
            'read sawah',
            'update sawah',
            'delete sawah',
            // Aktivitas Sawah
            'create aktivitas',
            'read aktivitas',
            'update aktivitas',
            'delete aktivitas',
            // Produk
            'create produk',
            'read produk',
            'update produk',
            'delete produk',
            // Stok
            'read stok',
            'update stok',
            // Panen
            'create panen',
            'read panen',
            'update panen',
            'delete panen',
            // Transaksi
            'create transaksi',
            'read transaksi',
            'update transaksi',
            'delete transaksi',
            // User Management
            'manage users',
            'manage roles',
        ];

        // Buat semua permission
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Daftar roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $farmerRole = Role::firstOrCreate(['name' => 'farmer']);
        $ownerRole = Role::firstOrCreate(['name' => 'owner']);

        // Assign permissions ke Admin
        $adminPermissions = Permission::all();
        $adminRole->syncPermissions($adminPermissions);

        // Assign permissions ke Farmer (Petani yang menggarap sawah)
        $farmerPermissions = Permission::whereIn('name', [
            'view dashboard',
            'create sawah',
            'read sawah',
            'update sawah',
            'create aktivitas',
            'read aktivitas',
            'update aktivitas',
            'create panen',
            'read panen',
            'update panen',
            'read stok',
            'read produk',
        ])->get();
        $farmerRole->syncPermissions($farmerPermissions);

        // Assign permissions ke Owner (Pemilik usaha/sawah)
        $ownerPermissions = Permission::whereIn('name', [
            'view dashboard',
            'read sawah',
            'read aktivitas',
            'read panen',
            'read stok',
            'read produk',
            'read transaksi',
        ])->get();
        $ownerRole->syncPermissions($ownerPermissions);

        // Buat user untuk testing
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@agrifarm.com'],
            [
                'name' => 'Admin Agri Farm',
                'password' => bcrypt('password123'),
            ]
        );
        $adminUser->assignRole('admin');

        $farmerUser = User::firstOrCreate(
            ['email' => 'farmer@agrifarm.com'],
            [
                'name' => 'Petani Sejati',
                'password' => bcrypt('password123'),
            ]
        );
        $farmerUser->assignRole('farmer');

        $ownerUser = User::firstOrCreate(
            ['email' => 'owner@agrifarm.com'],
            [
                'name' => 'Pemilik Usaha Pertanian',
                'password' => bcrypt('password123'),
            ]
        );
        $ownerUser->assignRole('owner');
    }
}
