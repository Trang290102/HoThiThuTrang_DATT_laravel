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
        return $this->hasMany(ProductStore::class, 'product_id', 'id');
    }
    public function qtybuy($id)
    {
        $qty_buy = 0;
        $qty_buy = OrderDetail::join('httt_order', 'httt_order.id', '=', 'httt_orderdetail.order_id')
            ->where([['httt_order.status', '!=', 1], ['httt_order.status', '!=', 0]])
            ->where('product_id', '=', $id)
            ->sum('httt_orderdetail.qty');
        return $qty_buy;
    }
    public function qtystore($id)
    {
        $qty_store = 0;
        $qty_store = ProductStore::where('product_id', '=', $id)
            ->sum('qty');
        return $qty_store;
    }
}
