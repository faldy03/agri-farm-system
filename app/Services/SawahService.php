<?php

namespace App\Services;
use App\Models\Sawah;
use Illuminate\Database\Eloquent\Collection;

class SawahService
{
    /**
     * Get all sawah with user relation
     */
    public function getAllSawah(): Collection
    {
        return Sawah::with('user')->latest()->get();
    }

    /**
     * Get single sawah by ID
     */
    public function getSawahById(int $id): ?Sawah
    {
        return Sawah::with('user')->find($id);
    }

    /**
     * Create new sawah
     */
    public function createSawah(array $data): Sawah
    {
        return Sawah::create([
            'user_id' => $data['user_id'] ?? 1, // sementara (nanti pakai auth)
            'nama' => $data['nama'],
            'luas' => $data['luas'],
            'lokasi_lat' => $data['lokasi_lat'],
            'lokasi_lng' => $data['lokasi_lng'],
            'deskripsi' => $data['deskripsi'] ?? null,
            'status' => $data['status'] ?? 'belum_tanam'
        ]);
    }

    /**
     * Update existing sawah
     */
    public function updateSawah(Sawah $sawah, array $data): Sawah
    {
        $sawah->update(array_filter([
            'nama' => $data['nama'] ?? null,
            'luas' => $data['luas'] ?? null,
            'lokasi_lat' => $data['lokasi_lat'] ?? null,
            'lokasi_lng' => $data['lokasi_lng'] ?? null,
            'deskripsi' => $data['deskripsi'] ?? null,
            'status' => $data['status'] ?? null,
        ], fn($value) => !is_null($value)));

        return $sawah->fresh();
    }

    /**
     * Delete sawah
     */
    public function deleteSawah(Sawah $sawah): bool
    {
        return $sawah->delete();
    }
}
