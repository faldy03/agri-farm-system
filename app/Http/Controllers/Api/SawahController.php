<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSawahRequest;
use App\Http\Requests\UpdateSawahRequest;
use App\Models\Sawah;
use App\Services\SawahService;

class SawahController extends Controller
{
    public function __construct(private SawahService $sawahService)
    {
    }

    /**
     * Get all sawah
     */
    public function index()
    {
        $sawah = $this->sawahService->getAllSawah();

        return response()->json([
            'success' => true,
            'message' => 'Data sawah berhasil diambil',
            'data' => $sawah
        ]);
    }

    /**
     * Get single sawah
     */
    public function show($id)
    {
        $sawah = $this->sawahService->getSawahById($id);

        if (!$sawah) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $sawah
        ]);
    }

    /**
     * Create new sawah
     */
    public function store(StoreSawahRequest $request)
    {
        $sawah = $this->sawahService->createSawah($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Sawah berhasil ditambahkan',
            'data' => $sawah
        ], 201);
    }

    /**
     * Update sawah
     */
    public function update(UpdateSawahRequest $request, $id)
    {
        $sawah = $this->sawahService->getSawahById($id);

        if (!$sawah) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $updated = $this->sawahService->updateSawah($sawah, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Sawah berhasil diupdate',
            'data' => $updated
        ]);
    }

    /**
     * Delete sawah
     */
    public function destroy($id)
    {
        $sawah = $this->sawahService->getSawahById($id);

        if (!$sawah) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $this->sawahService->deleteSawah($sawah);

        return response()->json([
            'success' => true,
            'message' => 'Sawah berhasil dihapus'
        ]);
    }
}