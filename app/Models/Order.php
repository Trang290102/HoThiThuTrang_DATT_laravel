<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'httt_order';
    
    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    // public function orderuser()
    // {
    //     return $this->hasOne(User::class, 'user_id', 'id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
