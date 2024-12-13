@extends('layouts.app')

@section('title')
Tambah Product 
@endsection

@section('content')
<div class="container">
    <h3>Input Products</h3>
    <div class="form-container">
        <form action="{{ url('/product/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product-name">Product Name</label>
                <input class="input" type="text" name="nama_barang" id="product-name" placeholder="Product Name" value="{{ old('nama_barang') }}" />
                @error('nama_barang')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input class="input" type="text" name="kategori" id="category" placeholder="Category" value="{{ old('kategori') }}" />
                @error('kategori')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input class="input" type="text" name="harga" id="price" placeholder="Price" value="{{ old('harga') }}" />
                @error('harga')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="input" name="keterangan" id="description" placeholder="Description">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input class="input" type="file" name="foto" id="photo" />
                @error('foto')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-simpan">Simpan</button>
        </form>
    </div>
</div>
@endsection
