<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
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
        <h1>Tambah Barang</h1>

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form action="{{ url('/barang') }}" method="POST">
            <!-- - @csrf membuat token keamanan yang diwajibkan Laravel untuk formulir POST berbasis web. Token ini membantu mencegah permintaan palsu dari situs lain. -->
            @csrf
            <label>Kode Barang</label>
            <input type="text" name="kode">

            <label>Nama Barang</label>
            <input type="text" name="nama">
            
            <label>Kategori</label>
            <input type="text" name="kategori">

            <label>Stok</label>
            <input type="number" name="stok">

            <label>Harga</label>
            <input type="number" name="harga">

            <button type="submit" class="btn-simpan">Simpan Barang</button>
        </form>
    </div>
</body>
</html>