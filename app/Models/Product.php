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
}
