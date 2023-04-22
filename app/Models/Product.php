<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'httt_product';

    //theo hướng dẫn của thầy
    public function productimg()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function productsale()
    {
        return $this->hasOne(ProductSale::class, 'product_id', 'id');
    }

    public function productstore()
    {
        return $this->hasOne(ProductStore::class, 'product_id', 'id');
    }
}
