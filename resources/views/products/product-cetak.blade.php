<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <style>
        .table-data {
            border-collapse: collapse;
            width: 100%;
        }
        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px 20px;
            text-align: center;
        }
        .table-data tr th {
            background-color: #2c3e50;
            color: white;
        }
        .table-data tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table-data tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h3>Data Produk</h3>
    <table class="table-data">
        <thead>
            <tr>
                <th>id_produk</th>
                <th>Foto</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($product->foto && file_exists(public_path('img_products/' . $product->foto)))
                        <img src="{{ asset('img_products/' . $product->foto) }}" alt="Foto" width="50">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $product->nama_barang }}</td>
                <td>{{ $product->kategori }}</td>
                <td>{{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>{{ $product->keterangan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
