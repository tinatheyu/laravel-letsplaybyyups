@extends('layouts.app')

@section('title')
Edit Product | Product Admin
@endsection

@section('content')
<div class="container">
    <h3>Edit Product</h3>
    <div class="form-container">
        <form action="/product/update/{{$product->id_produk}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input class="input" type="text" name="nama_barang" id="product-name" placeholder="Product Name" 
                    value="{{ old('nama_barang', $product->nama_barang) }}" />
                @error('nama_barang')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input class="input" type="text" name="kategori" id="category" placeholder="Category" 
                    value="{{ old('kategori', $product->kategori) }}" />
                @error('kategori')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input class="input" type="text" name="harga" id="price" placeholder="Price" 
                    value="{{ old('harga', $product->harga) }}" />
                @error('harga')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="input" name="keterangan" id="description" 
                    placeholder="Description">{{ old('keterangan', $product->keterangan) }}</textarea>
                @error('keterangan')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <div class="image-preview">
                    <img src="{{ asset('img_products/' . $product->foto) }}" alt="Product Image" width="200px">
                </div>
                <input type="file" name="foto" id="photo" />
                @error('foto')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-simpan">Edit</button>
        </form>
    </div>
</div>
@endsection
