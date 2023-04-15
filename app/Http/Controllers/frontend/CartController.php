<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Post;
use App\Models\Brand;

class CartController extends Controller
{
    public function addcart($id)
    {
        $product=Product::find($id);
        print_r($product);
    }
}
