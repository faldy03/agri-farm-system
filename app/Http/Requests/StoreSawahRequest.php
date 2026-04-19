<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSawahRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'luas' => 'required|numeric',
            'lokasi_lat' => 'required|numeric',
            'lokasi_lng' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'status' => 'nullable|in:belum_tanam,tanam,perawatan,panen'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama sawah wajib diisi',
            'nama.string' => 'Nama sawah harus berupa teks',
            'nama.max' => 'Nama sawah maksimal 255 karakter',
            'luas.required' => 'Luas sawah wajib diisi',
            'luas.numeric' => 'Luas sawah harus berupa angka',
            'lokasi_lat.required' => 'Latitude wajib diisi',
            'lokasi_lat.numeric' => 'Latitude harus berupa angka',
            'lokasi_lng.required' => 'Longitude wajib diisi',
            'lokasi_lng.numeric' => 'Longitude harus berupa angka',
            'status.in' => 'Status tidak valid'
        ];
    }
}
