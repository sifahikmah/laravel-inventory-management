<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* width: 100% tetap memperhitungkan padding dan border, sehingga input tidak meluber keluar card. */
        * {
            box-sizing: border-box;
        }
        body {
            background-color: #f3f5f9;
            font-family: Arial, sans-serif;
            padding: 32px;
            color: #1e293b;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffff;
            padding: 24px;
            border-radius: 12px;
        
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            margin-top: 6px;
            margin-bottom: 8px;
        }

        .btn-simpan {
            background-color: #1d4ed8;
            color: #ffff;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-simpan:hover {
            background-color: #1e40af;
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Barang</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <!-- url.. Mengirim perubahan ke URL barang yang sedang diedit. Misalnya, jika ID barang adalah 1, tujuannya menjadi /barang/1 -->
        <form action="{{ url('/barang/' . $barang->id) }}" method="POST">
            @csrf
            <!-- @method('PUT'): agar pengiriman POST tersebut diperlakukan sebagai permintaan PUT dan cocok dengan route update() yang sudah kita buat -->
            @method('PUT')

            <label>Kode Barang</label>
            <input type="text" name="kode" value="{{ $barang->kode }}">

            <label>Nama Barang</label>
            <input type="text" name="nama" value="{{ $barang->nama }}">

            <label>Kategori</label>
            <input type="text" name="kategori" value="{{ $barang->kategori }}">

            <label>Stok</label>
            <input type="number" name="stok" value="{{ $barang->stok }}">

            <label>Harga</label>
            <input type="number" name="harga" value="{{ $barang->harga }}">

            <button type="submit" class="btn-simpan">Simpan Perubahan</button>
        </form>
    </div>

</body>
</html>