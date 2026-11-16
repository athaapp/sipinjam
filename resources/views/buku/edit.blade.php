@extends('layouts.app')

@section('judul', 'Ubah Buku')

@section('konten')
<div class="max-w-xl mx-auto bg-white p-6 rounded-xl shadow-sm border border-slate-200">
    <h2 class="text-xl font-bold text-slate-900 mb-4">Ubah Data Buku</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-50 border border-red-200 text-red-700 rounded-lg text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $e) 
                    <li>{{ $e }}</li> 
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('buku.update', $buku) }}" class="space-y-4">
        @csrf
        @method('PUT')
        
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Kode Buku</label>
            <input type="text" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Judul Buku</label>
            <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Penulis</label>
            <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Stok</label>
            <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Kategori</label>
            <input type="text" name="kategori" value="{{ old('kategori', $buku->kategori) }}" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>

        <div class="flex items-center justify-between pt-2">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg text-sm transition">Perbarui Buku</button>
            <a href="{{ route('buku.index') }}" class="text-sm text-slate-600 hover:text-slate-900">Kembali</a>
        </div>
    </form>
</div>
@endsection