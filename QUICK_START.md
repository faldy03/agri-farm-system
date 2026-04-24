# 🚀 Quick Start Guide - Role-Based Dashboard

## ⚡ Mulai dalam 5 Menit

### 1️⃣ **Jalankan Seeder** (jika belum)

```bash
php artisan migrate:fresh
php artisan db:seed
```

### 2️⃣ **Test Login dengan Account Berikut**

Gunakan salah satu akun di bawah ini dengan password `password123`:

| Role | Email |
|------|-------|
| 🔑 Admin | `admin@agrifarm.com` |
| 👨‍🌾 Farmer | `farmer@agrifarm.com` |
| � Owner | `owner@agrifarm.com` |

### 3️⃣ **Akses Dashboard**

Buka `http://localhost/agri-farm` dan login! Dashboard akan otomatis disesuaikan berdasarkan role.

---

## 📋 File Utama

| File | Fungsi |
|------|--------|
| `app/Http/Controllers/DashboardController.php` | Logic dashboard sesuai role |
| `database/seeders/RoleAndPermissionSeeder.php` | Setup roles & permissions |
| `resources/views/dashboard/admin.blade.php` | Dashboard Admin |
| `resources/views/dashboard/farmer.blade.php` | Dashboard Farmer |
| `resources/views/dashboard/owner.blade.php` | Dashboard Owner |
| `routes/web.php` | Routes dengan DashboardController |

---

## 🎨 Fitur

✅ **3 Role Berbeda** dengan dashboard unik untuk masing-masing  
✅ **Tailwind CSS Design** - Modern, responsive, dark mode ready  
✅ **Clean Code** - Mudah dibaca dan dipelajari  
✅ **Role-Based Access** - Kontrol akses dengan permission  
✅ **Database Seeder** - Auto-setup roles & test users  

---

## 🔧 Tambah User Baru dengan Role

```bash
php artisan tinker
```

```php
$user = User::create([
    'name' => 'Nama Pemilik',
    'email' => 'owner@farm.com',
    'password' => bcrypt('password123'),
]);

$user->assignRole('owner');

# Atau
$user->syncRoles(['owner', 'admin']); // Multiple roles
```

---

## 🛡️ Protect Routes dengan Role

```php
// app/routes/web.php

Route::middleware('role:admin')->group(function () {
    // Hanya admin yang bisa akses
    Route::get('/admin-only', [AdminController::class, 'index']);
});

Route::middleware('role:owner|admin')->group(function () {
    // Owner atau Admin
    Route::get('/business', [BusinessController::class, 'index']);
});
```

---

## 🎓 Struktur Code

```
DashboardController
├── index()                      // Entry point
├── adminDashboard()             // Dashboard Admin
├── farmerDashboard()            // Dashboard Farmer
└── buyerDashboard()             // Dashboard Buyer

RoleAndPermissionSeeder
├── Buat permissions
├── Buat roles (admin, farmer, buyer)
├── Assign permissions ke roles
└── Buat test users & assign roles
```

---

## 💡 Tips

1. **Ubah Dashboard?** Edit file di `resources/views/dashboard/`
2. **Ubah Logic?** Edit `DashboardController.php`
3. **Tambah Permission?** Edit `RoleAndPermissionSeeder.php`
4. **Clear Cache?** Run `php artisan cache:clear`

---

## 📚 Belajar Lebih Lanjut

Baca `SETUP_GUIDE.md` untuk dokumentasi lengkap dengan:
- Penjelasan detail setiap role
- Security best practices
- Performance optimization
- Troubleshooting guide

---

**Selamat! Sistem role-based dashboard sudah siap! 🎉**
