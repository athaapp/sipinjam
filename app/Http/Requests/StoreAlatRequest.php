<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAlatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('alat')?->id;
        return [
            'kode'    => ['required', 'string', 'max:20', Rule::unique('alats', 'kode')->ignore($id)],
            'nama'    => ['required', 'string', 'max:100'],
            'stok'    => ['required', 'integer', 'min:0'],
            'kondisi' => ['required', 'in:baik,rusak ringan,rusak berat'],
            'lokasi'  => ['required', 'string', 'min:3'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode alat wajib diisi.',
            'kode.unique'   => 'Kode alat sudah dipakai.',
            'nama.required' => 'Nama alat wajib diisi.',
            'stok.min'      => 'Stok tidak boleh negatif.',
            'lokasi.min'    => 'Nama harus minimal 3 karakter.',
        ];
    }
}
