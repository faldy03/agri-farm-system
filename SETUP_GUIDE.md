# Dokumentasi Sistem Role-Based Authentication & Dashboard

## 📋 Ringkasan Sistem

Sistem ini mengimplementasikan role-based authentication dan dashboard yang berbeda untuk setiap role. Ada 3 role utama: **Admin**, **Farmer** (Petani), dan **Owner** (Pemilik Usaha).

---

## 🔐 Role dan Permission

### 1. **Admin** 🔑
- **Akses**: Penuh ke seluruh sistem
- **Permission**:
  - Kelola pengguna
  - Kelola role dan permission
  - Lihat semua data (Sawah, Aktivitas, Panen, Transaksi)
  - Akses laporan sistem
  - Pengaturan sistem

**Dashboard Admin** menampilkan:
- Statistik sistem (total petani, pembeli, sawah, panen)
- Aktivitas terbaru di seluruh sistem
- Menu admin untuk mengelola pengguna
- Informasi status sistem

### 2. **Farmer** 👨‍🌾
- **Akses**: Mengelola sawah dan aktivitas pertanian
- **Permission**:
  - Buat/Edit/Hapus sawah
  - Catat aktivitas pertanian
  - Catat hasil panen
  - Lihat produk (read-only)

**Dashboard Farmer** menampilkan:
- Jumlah sawah, aktivitas, dan panen
- Aktivitas terbaru
- Hasil panen terbaru
- Tombol aksi cepat (Tambah Sawah, Aktivitas Baru, Catat Panen)

### 3. **Owner** 👔
- **Akses**: Monitoring dan analisis usaha pertanian
- **Permission**:
  - Lihat dashboard overview
  - Lihat semua data sawah, aktivitas, panen
  - Lihat laporan keuangan dan transaksi
  - Lihat analytics dan produk

**Dashboard Owner** menampilkan:
- Statistik keuangan (pemasukan, pengeluaran, keuntungan)
- Margin keuntungan dan profitabilitas
- Pemasukan terbaru
- Pengeluaran terbaru
- Hasil panen terbaru
- Menu untuk laporan keuangan dan analytics

---

## 👥 Test Users (untuk Testing)

Tiga user sudah dibuat secara otomatis saat seeder dijalankan:

| Email | Password | Role |
|-------|----------|------|
| admin@agrifarm.com | password123 | Admin |
| farmer@agrifarm.com | password123 | Farmer |
| owner@agrifarm.com | password123 | Owner |

> **Catatan**: Untuk produksi, ubah password ini menjadi password yang aman!

---

## 📁 Struktur File yang Dibuat

```
app/
  Http/Controllers/
    DashboardController.php          # Handler dashboard role-based

database/
  seeders/
    RoleAndPermissionSeeder.php      # Seeder roles, permissions, users

resources/views/
  dashboard/
    admin.blade.php                  # Dashboard Admin
    farmer.blade.php                 # Dashboard Farmer
    owner.blade.php                  # Dashboard Owner
    default.blade.php                # Dashboard default (user tanpa role)

routes/
  web.php                            # Updated dengan DashboardController
  
layouts/
  navigation.blade.php               # Updated dengan role-based menu
```

---

## 🎨 Desain Dashboard dengan Tailwind CSS

Semua dashboard dirancang menggunakan **Tailwind CSS v3** dengan fitur:

✅ **Responsive Design**
- Desktop, tablet, dan mobile friendly
- Grid system yang fleksibel

✅ **Dark Mode Support**
- Setiap elemen mendukung dark mode dengan `dark:` classes
- Transisi warna yang halus

✅ **Visual Hierarchy**
- Cards dengan shadow dan hover effects
- Typography yang jelas dan terstruktur
- Color coding berdasarkan status/kategori

✅ **Interactive Elements**
- Buttons dengan gradient colors
- Tables dengan hover effects
- Smooth transitions

✅ **Emoji Integration**
- Menggunakan emoji untuk visual clarity
- Membuat interface lebih menarik dan mudah dipahami

---

## 🚀 Cara Menggunakan Sistem

### 1. **Setup Database**

Jika belum dijalankan, jalankan seeder:

```bash
php artisan migrate:fresh
php artisan db:seed
```

### 2. **Login dengan Test Account**

1. Buka aplikasi di `http://localhost/agri-farm`
2. Klik "Login"
3. Gunakan salah satu email test account di atas
4. Password: `password123`

### 3. **Akses Dashboard Sesuai Role**

- **Admin** → Melihat overview sistem
- **Farmer** → Mengelola sawah dan aktivitas
- **Owner** → Monitoring dan analytics bisnis pertanian

### 4. **Menambah User Baru**

Untuk menambah user dengan role tertentu, gunakan Tinker atau controller:

```bash
php artisan tinker
```

```php
$user = User::create([
    'name' => 'Nama User',
    'email' => 'user@example.com',
    'password' => bcrypt('password'),
]);

$user->assignRole('farmer'); // atau 'admin', 'buyer'
```

### 5. **Mengelola Roles & Permissions**

Gunakan Spatie Permission commands:

```bash
# Buat role baru
php artisan permission:create-role custom_role

# Buat permission baru
php artisan permission:create-permission create-custom

# Assign permission ke role
$role = Role::findByName('custom_role');
$role->givePermissionTo('create-custom');
```

---

## 🔒 Security Best Practices

### 1. **Authorization dengan Middleware**

Implementasi middleware untuk mengecek role:

```php
// Dalam route
Route::middleware('role:admin')->group(function () {
    // Route yang hanya bisa diakses admin
});

Route::middleware('role:farmer|admin')->group(function () {
    // Route yang bisa diakses farmer atau admin
});
```

### 2. **Policy untuk Model Authorization**

Untuk resource tertentu, gunakan Policy:

```php
// Cek di controller
if ($user->cannot('update', $sawah)) {
    abort(403);
}
```

### 3. **Database Permission Validation**

Setiap aksi di database sudah dilindungi dengan permission checks di seeder.

---

## 📊 Query Performance Optimization

Dashboard menggunakan best practices Laravel:

- ✅ **Eager Loading** (`with()`) untuk prevent N+1 queries
- ✅ **Query Optimization** (`whereHas`, `whereIn`)
- ✅ **Database Caching** potential dengan cache tags
- ✅ **Efficient Counts** dengan `count()` bukan load relations

Contoh di DashboardController:

```php
// ❌ N+1 Query
$farmers = User::all(); // Load semua user
foreach ($farmers as $farmer) {
    $farmer->roles; // Query untuk setiap user
}

// ✅ Optimized dengan whereHas
$farmerCount = User::whereHas('roles', function ($q) {
    $q->where('name', 'farmer');
})->count();
```

---

## 🧹 Code Clean & Readable

Kode dirancang dengan prinsip SOLID:

### 1. **Single Responsibility Principle**
- `DashboardController` hanya handle dashboard logic
- Seeder hanya handle data seeding
- Views hanya handle presentation

### 2. **Readable Comments**
```php
/**
 * DashboardController
 *
 * Menangani tampilan dashboard berdasarkan role user yang login.
 */
```

### 3. **Consistent Naming**
- Method names: `adminDashboard()`, `farmerDashboard()`, `buyerDashboard()`
- Variable names yang deskriptif: `$stats`, `$recentActivities`
- Model names: Singular form (User, Sawah, Panen)

### 4. **DRY Principle**
- Logic yang sama dikelompokkan dalam method
- Reusable views components
- Shared layout (`app.blade.php`)

---

## 🎓 Tips untuk Belajar dan Develop

### 1. **Pahami Flow Dashboard**

```
User Login
    ↓
DashboardController@index
    ↓
Check User Role
    ↓
Return View Sesuai Role
    ↓
Display Dashboard dengan Data
```

### 2. **Modify Dashboard**

Untuk menambah fitur ke dashboard tertentu, edit file view di `resources/views/dashboard/`:

```blade
<!-- Tambah kartu statistik baru -->
<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold">Judul Kartu</h3>
    <!-- Konten -->
</div>
```

### 3. **Tambah Permission Baru**

1. Edit `RoleAndPermissionSeeder.php`
2. Tambah permission ke array `$permissions`
3. Assign ke roles yang sesuai
4. Jalankan `php artisan migrate:fresh --seed`

### 4. **Tailwind CSS Cheat Sheet**

- Spacing: `px-4` (horizontal), `py-4` (vertical), `p-6` (semua), `gap-4` (spacing antar elemen)
- Color: `bg-blue-500`, `text-gray-900`, `border-gray-200`
- Responsive: `sm:`, `md:`, `lg:` prefix
- Dark Mode: `dark:bg-gray-800`, `dark:text-white`
- State: `hover:`, `focus:`, `active:`, `disabled:`

---

## 📝 Struktur Blade Template

Semua dashboard menggunakan layout component:

```blade
<x-app-layout>
    <x-slot name="header">
        <!-- Header section -->
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Content -->
        </div>
    </div>
</x-app-layout>
```

Layout ini sudah include:
- Navbar dengan role-based menu
- Dark mode support
- Responsive padding
- Standard spacing

---

## ⚙️ Konfigurasi Spatie Permission

Konfigurasi ada di `config/permission.php`:

```php
'models' => [
    'permission' => Spatie\Permission\Models\Permission::class,
    'role' => Spatie\Permission\Models\Role::class,
],

'table_names' => [
    'roles' => 'roles',
    'permissions' => 'permissions',
    'model_has_permissions' => 'model_has_permissions',
    'model_has_roles' => 'model_has_roles',
    'role_has_permissions' => 'role_has_permissions',
],
```

---

## 🐛 Troubleshooting

### Masalah: Dashboard tidak muncul sesuai role

**Solusi:**
```bash
# Clear cache
php artisan cache:clear
php artisan config:clear

# Verify role
php artisan tinker
>>> auth()->user()->getRoleNames()
```

### Masalah: Permission tidak ter-sync

**Solusi:**
```bash
php artisan cache:forget spatie.permission.cache
php artisan cache:clear
```

### Masalah: Model tidak ditemukan

**Solusi:** Pastikan model sudah di-import di controller:
```php
use App\Models\Sawah;
use App\Models\Panen;
use App\Models\Aktivitas_Sawah;
```

---

## 📚 Resources Tambahan

- [Spatie Permission Docs](https://spatie.be/docs/laravel-permission/v6/introduction)
- [Laravel Authorization](https://laravel.com/docs/11.x/authorization)
- [Tailwind CSS Docs](https://tailwindcss.com/docs)
- [Blade Documentation](https://laravel.com/docs/11.x/blade)

---

## 🎉 Selesai!

Sistem role-based authentication dan dashboard sudah siap digunakan! 

Gunakan test accounts untuk testing, dan kembangkan lebih lanjut sesuai kebutuhan bisnis Anda.

**Happy Coding! 🚀**
