<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $bukuId = $this->route('buku') ? $this->route('buku')->id : null;

        return [
            'kode_buku' => ['required', 'string', 'max:50', 'unique:bukus,kode_buku,' . $bukuId],
            'judul'     => ['required', 'string', 'max:255'],
            'penulis'   => ['required', 'string', 'max:255'],
            'stok'      => ['required', 'integer', 'min:0'],
            'kategori'  => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode_buku.required' => 'Kode buku wajib diisi.',
            'kode_buku.unique'   => 'Kode buku ini sudah terdaftar, gunakan kode lain.',
            'judul.required'     => 'Judul buku wajib diisi.',
            'penulis.required'   => 'Nama penulis wajib diisi.',
            'stok.required'      => 'Stok buku wajib diisi.',
            'stok.integer'       => 'Stok harus berupa angka.',
            'kategori.required'  => 'Kategori buku wajib diisi.',
        ];
    }
}