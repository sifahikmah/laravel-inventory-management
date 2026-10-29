<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Barang</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 32px;
            font-family: Arial, sans-serif;
            background-color: #f3f5f9;
            color: #1e293b;

        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .header {
            margin: 0 0 10px;
            font-size: 28px;
            color: #172554;
        }

        .header p {
            margin: 0;
            color: #64748b;
        }

        .card {
            padding: 24px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(15, 23, 42,0.06);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 20px;
        }

        .card-header h2 {
            margin: 0;
            font-size: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-primary {
            background: #1d4ed8;
            color: white;
        }

        .btn-primary:hover {
            background: #1e40af;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f1f5f9;
            color: #334155;
            font-weight: 600;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .stock {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 5px;
            background: #dcfce7;
            color: #166534;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-edit {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .btn-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .actions form {
            margin: 0;
        }

        .alert-success {
            margin-bottom: 20px;
            padding: 12px 16px;
            border: 1px solid #86efac;
            border-radius: 6px;
            background: #dcfce7;
            color: #166534;
        }

        .empty-state {
            padding: 28px;
            text-align: center;
            color: #64748b;
        }

        @media (max-width: 600px) {
            body {
                padding: 16px;
            }

            .card {
                padding: 16px;
            }

            .header h1 {
                font-size: 24px;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Inventory Management System</h1>
        
            <p>Selamat datang di halaman inventaris barang.</p>

        </header>

        @if (session('success'))
            <div class="alert-success">
            <p>{{ session('success') }}</p>
            </div>

        @endif

        <section class="card">
            <div class="card-header">
                <h2>Daftar Barang</h2>

                <a href="{{ url('/barang/create') }}" class="btn btn-primary">
                    + Tambah Barang
                </a>
            </div>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($barangs as $barang)
                        <tr>
                            <td>{{ $barang->kode }}</td>
                            <td>{{ $barang->nama }}</td>
                            <td>{{ $barang->kategori }}</td>
                            <td>
                                <span class="stock">
                                    {{ $barang->stok }}
                                </span>
                            </td>
                            <td>
                                Rp {{ number_format($barang->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <div class="actions">
                                    <a href="{{ url('/barang/' . $barang->id . '/edit') }}" class="btn btn-edit">Edit</a>

                                    <form action="{{ url('/barang/'.$barang->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        @csrf 
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-state">
                                    Belum ada data barang.
                                    Silakan tambahkan barang baru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</body>
</html>