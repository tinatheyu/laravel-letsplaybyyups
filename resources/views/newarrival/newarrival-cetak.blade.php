<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>New Arrival</title>
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
  <h3>Data New Arrival</h3>
  <table class="table-data">
    <thead>
      <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Tanggal Masuk</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($newarrivals as $newarrival)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>
          @if ($newarrival->foto && file_exists(public_path('uploads/' . $newarrival->foto)))
            <img src="{{ asset('uploads/' . $newarrival->foto) }}" alt="Foto" width="50">
          @else
            No Image
          @endif
        </td>
        <td>{{ $newarrival->nama_barang }}</td>
        <td>{{ $newarrival->kategori }}</td>
        <td>{{ $newarrival->tanggal_barang_masuk }}</td>
      </tr>
      @empty
      <tr>
        <td colspan="5" align="center">Tidak ada data</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</body>

</html>
