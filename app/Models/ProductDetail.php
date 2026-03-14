<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $guarded = [];

    // Inverse One-to-One: Detail milik 1 Produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
