<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewarrivalController;
use Barryvdh\DomPDF\Facade as PDF;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcome');
});


// Route::get('/product/cetak', function () {
//     $products = App\Models\Product::all();
//     $pdf = PDF::loadView('product.cetak', compact('products'));
    
//     // Menetapkan ukuran kertas A4 dan orientasi lanskap (atau portrait)
//     $pdf->setPaper('A4', 'landscape'); // Jika ingin orientasi portrait, ganti dengan 'portrait'

//     // Mengunduh file PDF
//     return $pdf->download('products.pdf');
// });


Route::get('/product/cetak', function () {
    try {
        $products = App\Models\Product::all();
        $pdf = PDF::loadView('product.cetak', compact('products'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('products.pdf');
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});



// Route untuk manajemen produk
Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index'); // Menampilkan produk
    Route::get('/create', [ProductController::class, 'create'])->name('product.create'); // Form tambah produk
    Route::post('/store', [ProductController::class, 'store'])->name('product.store'); // Simpan produk baru
    Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit'); // Form edit produk
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update'); // Update produk
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete'); // Hapus produk
    Route::get('/check/{id}', [ProductController::class, 'check'])->name('product.check'); // Cek detail produk
    Route::get('/pdf', [ProductController::class, 'generatePdf'])->name('product.pdf'); // Generate PDF produk
    Route::get('/cetak', [ProductController::class, 'cetak'])->name('product.cetak'); // Cetak data produk
});

// Route untuk manajemen new arrival
Route::get('/newarrival', [NewarrivalController::class, 'newarrival']);
Route::get('/create', [NewarrivalController::class, 'create'])->name('newarrival.create'); // Form tambah produk
Route::get('/cetak', [NewarrivalController::class, 'cetak'])->name('newarrival.cetak'); // Cetak data
Route::get('/pdf', [NewarrivalController::class, 'generatePdf'])->name('newarrival.pdf'); // Generate PDF

Route::get('/newarrival/pdf', [NewarrivalController::class, 'generatePdf'])->name('newarrival.pdf');
