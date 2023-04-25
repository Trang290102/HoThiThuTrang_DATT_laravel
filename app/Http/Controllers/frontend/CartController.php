<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Helper\CartHelper;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.cart.index');
    }
    public function add(CartHelper $cart, $id)
    {
        $product = Product::find($id);
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->add($product,$quantity );
        return redirect()->back();
    }
    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(CartHelper $cart, $id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }
    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }
}
