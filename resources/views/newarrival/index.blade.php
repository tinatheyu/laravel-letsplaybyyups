@extends('layouts.app')

@section('content')
    <h3>Data Barang Masuk</h3>
    <div class="text-left">
        <a href="{{ route('newarrival.create') }}" class="btn-tambah">Tambah Data</a>
        <a href="{{ route('newarrival.pdf') }}" class="btn-primary">Cetak</a>
    </div>

    <table class="table table-bordered">
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
            @foreach ($newArrivals as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if (file_exists(public_path('uploads/' . $item->foto)))
                            <img src="{{ asset('uploads/' . $item->foto) }}" width="50" alt="Foto">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->tanggal_barang_masuk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
