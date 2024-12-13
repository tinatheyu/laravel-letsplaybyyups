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
        <h3>Data Barang Masuk</h3>
    </center>
    <hr />
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($newarrivals as $index => $newarrival)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($newarrival->foto && file_exists(public_path('uploads/' . $newarrival->foto)))
                        <img src="{{ asset('uploads/' . $newarrival->foto) }}" alt="Foto">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $newarrival->nama_barang }}</td>
                <td>{{ $newarrival->kategori }}</td>
                <td>{{ \Carbon\Carbon::parse($newarrival->tanggal_barang_masuk)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
