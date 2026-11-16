@extends('layouts.app')

@section('judul', 'Detail Alat')

@section('konten')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-sm border border-slate-200">
    <h2 class="text-xl font-bold text-slate-900 mb-6">Detail Informasi Alat</h2>

    <div class="space-y-4 text-sm">
        <div class="border-b border-slate-100 pb-3">
            <span class="block text-xs font-semibold uppercase text-slate-400">Kode Alat</span>
            <span class="text-slate-900 font-medium text-base">{{ $alat->kode }}</span>
        </div>

        <div class="border-b border-slate-100 pb-3">
            <span class="block text-xs font-semibold uppercase text-slate-400">Nama Alat</span>
            <span class="text-slate-900 font-medium text-base">{{ $alat->nama }}</span>
        </div>

        <div class="border-b border-slate-100 pb-3">
            <span class="block text-xs font-semibold uppercase text-slate-400">Stok</span>
            <span class="text-slate-900 font-medium text-base">
                @if ($alat->stok == 0)
                    <span class="bg-red-100 text-red-700 text-xs font-semibold px-2.5 py-1 rounded-full">0 (Habis)</span>
                @else
                    {{ $alat->stok }}
                @endif
            </span>
        </div>

        <div class="border-b border-slate-100 pb-3">
            <span class="block text-xs font-semibold uppercase text-slate-400">Kondisi</span>
            <span class="text-slate-900 font-medium text-base capitalize">{{ $alat->kondisi }}</span>
        </div>

        <div class="pb-2">
            <span class="block text-xs font-semibold uppercase text-slate-400">Lokasi</span>
            <span class="text-slate-900 font-medium text-base">{{ $alat->lokasi ?? '-' }}</span>
        </div>
    </div>

    <div class="mt-6 pt-4 border-t border-slate-200 flex items-center justify-between">
        <a href="{{ route('alat.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-4 py-2 rounded-lg text-sm font-medium transition">Kembali ke Daftar</a>
        <a href="{{ route('alat.edit', $alat) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">Ubah Data</a>
    </div>
</div>
@endsection