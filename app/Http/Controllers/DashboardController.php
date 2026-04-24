<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * DashboardController
 *
 * Menangani tampilan dashboard berdasarkan role user yang login.
 * - Admin: Melihat overview seluruh sistem
 * - Farmer: Melihat dashboard khusus petani
 * - Owner: Melihat dashboard khusus pemilik usaha
 */
class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard sesuai role user
     */
    public function index(): View
    {
        $user = auth()->user();

        // Tentukan view berdasarkan role user
        if ($user->hasRole('admin')) {
            return $this->adminDashboard();
        } elseif ($user->hasRole('farmer')) {
            return $this->farmerDashboard();
        } elseif ($user->hasRole('owner')) {
            return $this->ownerDashboard();
        }

        // Default dashboard untuk user tanpa role
        return view('dashboard.default', ['user' => $user]);
    }

    /**
     * Dashboard untuk Admin
     * Menampilkan overview seluruh sistem
     */
    private function adminDashboard(): View
    {
        $user = auth()->user();

        // Ambil data statistik
        $stats = [
            'total_farmers' => \App\Models\User::whereHas('roles', function ($q) {
                $q->where('name', 'farmer');
            })->count(),
            'total_owners' => \App\Models\User::whereHas('roles', function ($q) {
                $q->where('name', 'owner');
            })->count(),
            'total_fields' => \App\Models\Sawah::count(),
            'total_harvest' => \App\Models\Panen::sum('jumlah_kg') ?? 0,
        ];

        // Data recent activities (untuk grafik/chart)
        $recentActivities = \App\Models\AktivitasSawah::latest()->take(5)->get();

        return view('dashboard.admin', [
            'user' => $user,
            'stats' => $stats,
            'recentActivities' => $recentActivities,
        ]);
    }

    /**
     * Dashboard untuk Farmer (Petani)
     * Menampilkan dashboard khusus untuk petani
     */
    private function farmerDashboard(): View
    {
        $user = auth()->user();

        // Ambil data yang relevan untuk petani
        $sawahCount = \App\Models\Sawah::count();
        $aktivitasCount = \App\Models\AktivitasSawah::count();
        $panenCount = \App\Models\Panen::count();
        $recentActivities = \App\Models\AktivitasSawah::latest()->take(5)->get();
        $recentHarvest = \App\Models\Panen::latest()->take(5)->get();

        return view('dashboard.farmer', [
            'user' => $user,
            'sawahCount' => $sawahCount,
            'aktivitasCount' => $aktivitasCount,
            'panenCount' => $panenCount,
            'recentActivities' => $recentActivities,
            'recentHarvest' => $recentHarvest,
        ]);
    }

    /**
     * Dashboard untuk Owner (Pemilik Usaha)
     * Menampilkan dashboard khusus untuk pemilik usaha pertanian
     */
    private function ownerDashboard(): View
    {
        $user = auth()->user();

        // Ambil data overview usaha pertanian
        $totalSawah = \App\Models\Sawah::count();
        $totalHarvest = \App\Models\Panen::sum('jumlah_kg') ?? 0;
        $totalIncome = \App\Models\Transaksi_Pemasukan::sum('jumlah') ?? 0;
        $totalExpenses = \App\Models\Transaksi_Pengeluaran::sum('jumlah') ?? 0;
        $totalProfit = $totalIncome - $totalExpenses;

        // Data untuk chart/analytics
        $recentTransactions = \App\Models\Transaksi_Pemasukan::latest()->take(5)->get();
        $recentExpenses = \App\Models\Transaksi_Pengeluaran::latest()->take(5)->get();
        $harvestData = \App\Models\Panen::latest()->take(5)->get();

        return view('dashboard.owner', [
            'user' => $user,
            'totalSawah' => $totalSawah,
            'totalHarvest' => $totalHarvest,
            'totalIncome' => $totalIncome,
            'totalExpenses' => $totalExpenses,
            'totalProfit' => $totalProfit,
            'recentTransactions' => $recentTransactions,
            'recentExpenses' => $recentExpenses,
            'harvestData' => $harvestData,
        ]);
    }
}
