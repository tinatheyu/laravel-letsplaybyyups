@extends('layouts.app')

@section('title')
Products
@endsection

@section('content')

<!-- Products Section -->

    <!-- Add Product Button -->
    <div class="text-left">
        <a href="{{ route('product.create') }}" class="btn-tambah">Tambah Data</a>
        <!-- Perbaikan href ke rute cetak yang benar -->
        <a href="{{ url('/product/cetak') }}" class="btn-tambah">Cetak</a>
    </div>

    <!-- Products Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col" style="width: 20%">Photo</th>
                <th>Product Name</th>
                <th scope="col" style="width: 15%">Category</th>
                <th scope="col" style="width: 15%">Price</th>
                <th scope="col" style="width: 30%">Description</th>
                <th scope="col" style="width: 20%">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td><img src="{{ asset('img_products/' . $product->foto) }}" alt="Product Photo" width="150px"></td>
                <td>{{ $product->nama_barang }}</td>
                <td>{{ $product->kategori }}</td>
                <td>Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>{{ $product->keterangan }}</td>
                <td>
                    <!-- Edit Button -->
                    <a class="btn btn-edit" href="product/edit/{{$product->id_produk}}">Edit</a>
                    <a class="btn btn-delete" href="product/hapus/{{$product->id_produk}}">Hapus</a>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
