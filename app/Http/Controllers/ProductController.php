<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk
        return view('products.product', compact('products'));
    }

    // Show the form to create a new product
    public function create()
    {
        return view('products.product-entry'); // Corrected the path for your create view
    }

    // Store a newly created product in storage
    public function store(Request $request)
{
    $request->validate([
        'foto' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        'nama_barang' => 'required',
        'kategori' => 'required',
        'keterangan' => 'required',
        'harga' => 'required',
    ]);

    $foto = $request->file('foto');
    $nama_foto = time() . '_' . substr($foto->getClientOriginalName(), 0, 100); // Limit filename length
    $tujuan_upload = 'img_products'; // Folder untuk gambar produk
    $foto->move($tujuan_upload, $nama_foto);

    Product::create([
        'foto' => $nama_foto,
        'nama_barang' => $request->nama_barang,
        'kategori' => $request->kategori,
        'keterangan' => $request->keterangan,
        'harga' => $request->harga,
    ]);

    return redirect('/product');
}


    // Show the form to edit an existing product
    public function edit($id_product)
    {
        $product = Product::find($id_product); // Perbaiki variabelnya
        return view('products.product-edit', compact('product')); // Gunakan $product, bukan $products
    }

    // Update an existing product in storage
    public function update(Request $request, $id_product)
    {
        $request->validate([
            'foto' => 'required|file|mimes:png,jpg,jpeg|max:2048',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
        ]);

        $product = Product::find($id_product); // Perbaiki variabelnya

        if($request->hasFile('foto')) {
            File::delete('img_products/'.$product->foto); // Hapus foto lama
            $foto = $request->file('foto');
            $nama_foto = time() . '_' . substr($foto->getClientOriginalName(), 0, 100); // Limit filename length to 100 characters
            $tujuan_upload = 'img_products';
            $foto->move($tujuan_upload, $nama_foto);
            $product->foto = $nama_foto;
        }

        $product->update([ // Update produk
            'foto' => $nama_foto,
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
        ]);

        return redirect('/product');
    }

    // Show confirmation to delete a product
    public function delete($id_product)
    {
        $product = Product::find($id_product);
        $product->delete(); // Perbaiki variabelnya
         // Perbaiki variabelnya
        return redirect('product'); // Kirim $product ke view
    }

    // Delete a product from storage
    public function destroy($id_product)
    {
        $product = Product::find($id_product);
        File::delete('img_products/'.$product->foto);
        $product->delete();
        return redirect('/product');
    }
    public function cetak()
{
    $products = Product::all(); // Ambil semua data produk
    return view('products.product-cetak', compact('products')); // Pastikan view ini ada
}

}
