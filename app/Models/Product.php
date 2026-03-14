<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    // Inverse One-to-Many: Produk milik 1 Kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // One-to-One: 1 Produk punya 1 Detail
    public function detail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    // Many-to-Many: Produk punya banyak Tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}