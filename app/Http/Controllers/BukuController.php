<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBukuRequest;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::latest()->paginate(5);
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(StoreBukuRequest $request)
    {
        Buku::create($request->validated());
        return redirect()->route('buku.index')->with('sukses', 'Buku berhasil ditambahkan.');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(StoreBukuRequest $request, Buku $buku)
    {
        $buku->update($request->validated());
        return redirect()->route('buku.index')->with('sukses', 'Data buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('sukses', 'Buku berhasil dihapus.');
    }
}
