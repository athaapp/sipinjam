@extends('layouts.app')

@section('judul', 'Detail Buku')

@section('konten')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-sm border border-slate-200">
    <h2 class="text-xl font-bold text-slate-900 mb-6">Detail Informasi Buku</h2>

    <div class="space-y-4 text-sm">
        <div>
            <span class="block font-medium text-slate-500">Kode Buku</span>
            <span class="text-slate-900 text-base font-semibold">{{ $buku->kode_buku }}</span>
        </div>

        <div>
            <span class="block font-medium text-slate-500">Judul Buku</span>
            <span class="text-slate-900 text-base font-semibold">{{ $buku->judul }}</span>
        </div>

        <div>
            <span class="block font-medium text-slate-500">Penulis</span>
            <span class="text-slate-900 text-base">{{ $buku->penulis }}</span>
        </div>

        <div>
            <span class="block font-medium text-slate-500">Stok</span>
            <span class="text-slate-900 text-base">{{ $buku->stok }}</span>
        </div>

        <div>
            <span class="block font-medium text-slate-500">Kategori</span>
            <span class="text-slate-900 text-base">{{ $buku->kategori }}</span>
        </div>
    </div>

    <div class="mt-6 pt-4 border-t border-slate-200 flex justify-between items-center">
        <a href="{{ route('buku.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium px-4 py-2 rounded-lg text-sm transition">Kembali</a>
        <a href="{{ route('buku.edit', $buku) }}" class="bg-amber-500 hover:bg-amber-600 text-white font-medium px-4 py-2 rounded-lg text-sm transition">Ubah Buku</a>
    </div>
</div>
@endsection