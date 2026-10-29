<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index() 
    {
        $barangs = Barang::all();

        return view('barang', [
            'barangs' => $barangs
        ]);
    }
    // create() bertugas menampilkan halaman formulir.
    public function create()
    {
        return view('barang-create');
    }

    // Menyimpan barang baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required|unique:barangs,kode',
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ], [
            'kode.required' => 'Kode barang wajib diisi.',
            'kode.unique' => 'Kode barang sudah digunakan.',
            'nama.required' => 'Nama barang wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'stok.integer' => 'Stok harus berupa bilangan bulat.',
            'stok.min'=> 'Stok tidak boleh dari kurang dari 0.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
        ]);

        // Menyimpan barang baru.
        Barang::create($data);

        return redirect('/barang')->with('success','Barang berhasil ditambahkan.');
    }

    // Menampilkan formulir edit barang
    public function edit(Barang $barang)
    {
        return view('barang-edit', [
            'barang' => $barang
        ]);
    }

    // Memproses perubahan data barang
    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'kode' => 'required|unique:barangs,kode,'.$barang->id,
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
        ], [
            'kode.required' => 'Kode barang wajib diisi.',
            'kode.unique' => 'Kode barang sudah digunakan.',
            'nama.required' => 'Nama barang wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'stok.integer' => 'Stok harus berupa bilangan bulat.',
            'stok.min'=> 'Stok tidak boleh dari kurang dari 0.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
        ]);

        // Menyimpan barang baru.
        $barang->update($data);

        return redirect('/barang')->with('success', 'Barang berhasil diperbarui.');
    }

    // Memproses hapus barang
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect('/barang')->with('success', 'Barang berhasil dihapus.');
    }
}
