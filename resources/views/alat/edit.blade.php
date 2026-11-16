@extends('layouts.app')

@section('judul', 'Ubah Alat')

@section('konten')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-sm border border-slate-200">
    <h2 class="text-xl font-bold text-slate-900 mb-4">Ubah Data Alat</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $e) 
                    <li>{{ $e }}</li> 
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('alat.update', $alat) }}" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Kode</label>
            <input type="text" name="kode" value="{{ old('kode', $alat->kode) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $alat->nama) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $alat->stok) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Lokasi</label>
            <input type="text" name="lokasi" value="{{ old('lokasi', $alat->lokasi) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Kondisi</label>
            <select name="kondisi" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
                @foreach (['baik', 'rusak ringan', 'rusak berat'] as $k)
                    <option value="{{ $k }}" @selected(old('kondisi', $alat->kondisi) == $k)>{{ ucfirst($k) }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between pt-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg text-sm transition">Perbarui</button>
            <a href="{{ route('alat.index') }}" class="text-sm text-slate-600 hover:text-slate-900">Kembali</a>
        </div>
    </form>
</div>
@endsection