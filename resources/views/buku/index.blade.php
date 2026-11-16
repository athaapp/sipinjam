@extends('layouts.app')

@section('judul', 'Daftar Buku')

@section('konten')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold text-slate-900">Manajemen Buku Perpustakaan</h2>
    <a href="{{ route('buku.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg text-sm transition">+ Tambah Buku</a>
</div>

@if (session('sukses'))
    <div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg text-sm">
        {{ session('sukses') }}
    </div>
@endif

<div class="bg-white shadow-sm border border-slate-200 rounded-xl overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-slate-100 text-slate-700 text-xs uppercase tracking-wider border-b border-slate-200">
                <th class="py-3 px-4">Kode</th>
                <th class="py-3 px-4">Judul</th>
                <th class="py-3 px-4">Penulis</th>
                <th class="py-3 px-4">Stok</th>
                <th class="py-3 px-4">Kategori</th>
                <th class="py-3 px-4 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-sm">
            @forelse ($bukus as $b)
            <tr class="hover:bg-slate-50 transition">
                <td class="py-3 px-4 font-medium text-slate-900">{{ $b->kode_buku }}</td>
                <td class="py-3 px-4">{{ $b->judul }}</td>
                <td class="py-3 px-4 text-slate-600">{{ $b->penulis }}</td>
                <td class="py-3 px-4">{{ $b->stok }}</td>
                <td class="py-3 px-4">{{ $b->kategori }}</td>
                <td class="py-3 px-4 text-center space-x-2">
                    <a href="{{ route('buku.show', $b) }}" class="text-indigo-600 hover:underline font-medium">Detail</a>
                    <a href="{{ route('buku.edit', $b) }}" class="text-amber-600 hover:underline font-medium">Ubah</a>
                    <form method="POST" action="{{ route('buku.destroy', $b) }}" class="inline" onsubmit="return confirm('Hapus buku ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline font-medium bg-transparent border-0 cursor-pointer">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-6 text-center text-slate-500">Belum ada data buku.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $bukus->links() }}
</div>
@endsection