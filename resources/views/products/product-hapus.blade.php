@extends('layouts.app')

@section('title')
Delete Product
@endsection

@section('content')
<h3>Delete Product</h3>
<div class="form-login">
  <h4>Are you sure you want to delete this product?</h4>
  <button type="submit" class="btn btn-simpan" name="hapus" style="width: 40%; margin: 20px auto;">
    <a href={{ url('/product/destroy/' . $product->id_products ) }}>
      Yes
    </a>
  </button>
  <button type="submit" class="btn btn-simpan" name="tidak" style="width: 40%; margin: 20px auto;">
    <a href="/product">
      No
    </a>
  </button>
</div>
@endsection
