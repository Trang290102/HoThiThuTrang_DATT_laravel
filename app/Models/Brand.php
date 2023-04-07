<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model
{
    use HasFactory;
    protected $table = 'httt_brand';
    public function BrandSub()
    {
        return $this->hasMany(Brand::class, 'parent_id');
    }
}
