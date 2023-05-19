<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Helper\CartHelper;

class CartController extends Controller
{
    // public  function __construct()
    // {
    //     $this->middleware('LoginCustomer');
    // }
    public function index()
    {
        return view('frontend.cart.index');
    }
    public function add(CartHelper $cart, $id)
    {
        $product = Product::find($id);
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->add($product, $quantity);
        return redirect()->back()->with('successMessage', 'Thêm vào giỏ hàng thành công!');
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
        return redirect()->route('frontend.cart')->with('successMessage', 'Cập nhật giỏ hàng thành công!');
    }
    public function updateall(Request $request, CartHelper $cart)
    {
        // dd($request->data);
        // $data = $request->data;
        foreach ($request->data as $item) {
            // $quantity = request()->quantity ? request()->quantity : 1;
            $cart->update($item["key"], $item["value"]);
        }
        // return view('frontend.cart.index');

    }

    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back()->with('successMessage', 'Xóa hết giỏ hàng thành công!');
    }
}
