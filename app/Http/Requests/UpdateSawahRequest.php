<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSawahRequest extends FormRequest
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
            'nama' => 'sometimes|string|max:255',
            'luas' => 'sometimes|numeric',
            'lokasi_lat' => 'sometimes|numeric',
            'lokasi_lng' => 'sometimes|numeric',
            'deskripsi' => 'nullable|string',
            'status' => 'sometimes|in:belum_tanam,tanam,perawatan,panen'
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nama.string' => 'Nama sawah harus berupa teks',
            'nama.max' => 'Nama sawah maksimal 255 karakter',
            'luas.numeric' => 'Luas sawah harus berupa angka',
            'lokasi_lat.numeric' => 'Latitude harus berupa angka',
            'lokasi_lng.numeric' => 'Longitude harus berupa angka',
            'status.in' => 'Status tidak valid'
        ];
    }
}
