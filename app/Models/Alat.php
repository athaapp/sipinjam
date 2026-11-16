<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alat extends Model{

    protected $fillable = ['kode', 'nama', 'stok', 'kondisi', 'lokasi',];

    public function peminjamans(): HasMany
    {
        return $this->hasMany(Peminjaman::class);
    }

}
