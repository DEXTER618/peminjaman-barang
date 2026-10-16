<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
{
    $cari = $request->input('cari');

    $daftarBarang = Barang::with('kategori')
        ->when($cari, function ($query, $cari) {
            $query->where(function ($q) use ($cari) {
                $q->where('kode_barang', 'like', "%{$cari}%")
                  ->orWhere('nama_barang', 'like', "%{$cari}%");
            });
        })
        ->latest()
        ->get();

    return view('daftar_barang', compact('daftarBarang', 'cari'));
}
    public function dashboard()
{
    $totalBarang = Barang::count();

    $barangTersedia = Barang::where('status', 'Tersedia')->count();

    $barangDipinjam = Barang::where('status', 'Dipinjam')->count();

    $barangMaintenance = Barang::where('status', 'Maintenance')->count();

    return view('dashboard', compact(
        'totalBarang',
        'barangTersedia',
        'barangDipinjam',
        'barangMaintenance'
    ));
}

    public function create()
    {
        $kategoris = Kategori::all();

        return view('barang_create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'spesifikasi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
        ]);

        Barang::create($validated);

        return redirect('/barang')
            ->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategoris = Kategori::all();

        return view('barang_edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'spesifikasi' => 'nullable|string',
            'stok' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status' => 'required|in:Tersedia,Dipinjam,Maintenance',
        ]);

        $barang->update($validated);

        return redirect('/barang')
            ->with('success', 'Barang berhasil diperbarui!');
    }
    public function destroy($id)
{
    $barang = Barang::findOrFail($id);
    $barang->delete();

    return redirect('/barang')
        ->with('success', 'Barang berhasil dihapus!');
}
}