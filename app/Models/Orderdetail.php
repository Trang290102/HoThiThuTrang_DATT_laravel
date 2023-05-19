<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'httt_orderdetail';
    public $timestamps = false;
    public function productdetail()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
