<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    //
    public function index()
    {
        // Mengambil semua produk beserta relasinya, diurutkan dari yang paling baru ditambahkan
        $products = Product::with(['category', 'detail', 'tags'])->latest()->get();
        
        // Mengirim data ke halaman depan (welcome.blade.php)
        return view('welcome', compact('products'));
    }
}
