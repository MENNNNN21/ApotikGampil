<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatModel as Obat;
use Illuminate\Support\Facades\Storage;   

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $query = Obat::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $obats = $query->latest()->get();
        return view('admin.obat.index', compact('obats'));
    }

    public function create()
    {
        return view('admin.obat.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'expired_at' => 'nullable|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

         if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('obat', 'public');
        }

        Obat::create($data);
        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    public function edit(Obat $obat)
    {
        return view('admin.obat.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'nullable|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'expired_at' => 'nullable|date',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($obat->gambar) {
                Storage::disk('public')->delete($obat->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('obat', 'public');
        }

        $obat->update($data);
        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui');
    }

    public function destroy(Obat $obat)
    {
        if ($obat->gambar) {
            Storage::disk('public')->delete($obat->gambar);
        }

        $obat->delete();
        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus');
    }
}