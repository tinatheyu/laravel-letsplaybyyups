<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        img {
            width: 50px;
        }
    </style>
</head>
<body>
    <center>
        <h3>Data Produk</h3>
    </center>
    <hr />
    <table>
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
            @foreach($product as $index => $product)
            <tr>
                <td>{{ $product->id_produk }}</td>
                <td><img src="{{ $product->foto }}" alt="Foto Produk"></td>
                <td>{{ $product->nama_barang }}</td>
                <td>{{ $product->kategori }}</td>
                <td>{{ $product->harga }}</td>
                <td>{{ $product->deskripsi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>