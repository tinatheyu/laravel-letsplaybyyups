@extends('layouts.app')

@section('title', 'New Arrival | Admin Panel')

@section('content')
    <h3>New Arrival</h3>
    
    <div class="text-left">
        <a href="{{ route('newarrival.create') }}" class="btn-tambah">Tambah Data</a>
    </div>

    <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
        <a href="{{ url('/newarrival/cetak') }}" class="text-white no-underline">Cetak</a>
    </button>

    <!-- Table displaying new arrivals -->
    <table class="table-data">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($newarrivals as $newarrival)
                <tr>
                    <td>{{ $newarrival->id_newarrival }}</td>
                    <td>
                        @if ($newarrival->foto && file_exists(public_path('uploads/' . $newarrival->foto)))
                            <img src="{{ asset('uploads/' . $newarrival->foto) }}" alt="Foto" width="50">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $newarrival->nama_barang }}</td>
                    <td>{{ $newarrival->kategori }}</td>
                    <td>{{ \Carbon\Carbon::parse($newarrival->tanggal_barang_masuk)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
