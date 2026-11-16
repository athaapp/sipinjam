@extends('layouts.app')

@section('judul', 'Daftar Alat')

@section('konten')
<div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
    <a href="{{ route('alat.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">+ Tambah Alat</a>

    <form method="GET" action="{{ route('alat.index') }}" class="flex gap-2 w-full sm:w-auto">
        <input type="text" name="cari" value="{{ $cari ?? '' }}" placeholder="Cari nama alat..." class="border border-slate-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full sm:w-64">
        <button type="submit" class="bg-slate-800 hover:bg-slate-900 text-white px-4 py-2 rounded-lg text-sm transition">Cari</button>
        @if(filled($cari))
            <a href="{{ route('alat.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-3 py-2 rounded-lg text-sm flex items-center transition">Reset</a>
        @endif
    </form>
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
                <th class="py-3 px-4 font-semibold">Kode</th>
                <th class="py-3 px-4 font-semibold">Nama</th>
                <th class="py-3 px-4 font-semibold">Stok</th>
                <th class="py-3 px-4 font-semibold">Kondisi</th>
                <th class="py-3 px-4 font-semibold">Lokasi</th>
                <th class="py-3 px-4 font-semibold text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200 text-sm">
            @forelse ($alat as $a)
            <tr class="hover:bg-slate-50 transition">
                <td class="py-3 px-4 font-medium text-slate-900">{{ $a->kode }}</td>
                <td class="py-3 px-4">{{ $a->nama }}</td>
                <td class="py-3 px-4">
                    @if ($a->stok == 0)
                        <span class="bg-red-100 text-red-700 text-xs font-semibold px-2.5 py-1 rounded-full">0 (Habis)</span>
                    @else
                        <span class="font-medium text-slate-700">{{ $a->stok }}</span>
                    @endif
                </td>
                <td class="py-3 px-4 capitalize">{{ $a->kondisi }}</td>
                <td class="py-3 px-4 text-slate-600">{{ $a->lokasi }}</td>
                <td class="py-3 px-4 text-center space-x-2">
                    <a href="{{ route('alat.show', $a) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Detail</a>
                    <a href="{{ route('alat.edit', $a) }}" class="text-amber-600 hover:text-amber-900 font-medium">Ubah</a>
                    <form method="POST" action="{{ route('alat.destroy', $a) }}" class="inline" onsubmit="return confirm('Hapus alat ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-900 font-medium bg-transparent border-0 cursor-pointer">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-6 text-center text-slate-500">Data alat tidak ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $alat->links() }}
</div>
@endsection