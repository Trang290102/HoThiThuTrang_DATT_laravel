<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductStore;
use App\Helper\CartHelper;
use App\Models\OrderDetail;


class CartController extends Controller
{
    // public  function __construct()
    // {
    //     $this->middleware('LoginCustomer');
    // }
    public function index(CartHelper $cart)
    {
        // array_push($productstore, $cart->items);
        // foreach ($cart->items as $item) {
        //     $productstore = array();
        //     array_push($productstore, $item['id']);
        //     $productstore = ProductStore::where('product_id', '=', $item['id'])->first();
        // }
        return view('frontend.cart.index');
    }
    public function add(CartHelper $cart, $id)
    {
        $product = Product::find($id);
        $productstore = ProductStore::where('product_id', '=', $id)->first();
        if (request()->quantity) {
            $qty_buy = 0;
            $qty_buy = OrderDetail::join('httt_order', 'httt_order.id', '=', 'httt_orderdetail.order_id')
                ->where([['httt_order.status', '!=', 1], ['httt_order.status', '!=', 0]])
                ->where('product_id', '=', $product->id)
                ->sum('httt_orderdetail.qty');
            $qty_store = 0;
            $qty_store = ProductStore::where('product_id', '=', $product->id)
                ->sum('qty');
            //cho trường hợp nhập số lượng sản phẩm từ detail
            if (request()->quantity > ($qty_store - $qty_buy)) {
                return redirect()->back()->with('errorMessage', 'Số lượng sản phẩm vượt quá số lượng hàng tồn kho!');
            } else {
                $quantity = request()->quantity;
                $cart->add($product, $quantity);
                return redirect()->back()->with('successMessage', 'Thêm vào giỏ hàng thành công!');
            }
        } else {
            $quantity = 1;
            $cart->add($product, $quantity);
            return redirect()->back()->with('successMessage', 'Thêm vào giỏ hàng thành công!');
        }
        // $quantity = request()->quantity ? request()->quantity : 1;
    }
    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(CartHelper $cart, $id)
    {
        $qty_buy = 0;
        $qty_buy = OrderDetail::join('httt_order', 'httt_order.id', '=', 'httt_orderdetail.order_id')
            ->where([['httt_order.status', '!=', 1], ['httt_order.status', '!=', 0]])
            ->where('product_id', '=', $id)
            ->sum('httt_orderdetail.qty');
        $qty_store = 0;
        $qty_store = ProductStore::where('product_id', '=', $id)
            ->sum('qty');
        if (request()->quantity > ($qty_store - $qty_buy)) {
            return redirect()->back()->with('errorMessage', 'Số lượng sản phẩm vượt quá số lượng hàng tồn kho!');
        } else {
            $quantity = request()->quantity ? request()->quantity : 1;
            $cart->update($id, $quantity);
            return redirect()->back()->with('successMessage', 'Cập nhật giỏ hàng thành công!');
        }
    }
    public function updateall(Request $request, CartHelper $cart)
    {
        foreach ($request->data as $item) {
            // $quantity = request()->quantity ? request()->quantity : 1;
            // $product_store = ProductStore::where('product_id', '=', $item["key"])->first();
            // if ($item["value"] < $product_store->qty || $item["value"] = $product_store->qty) {
            $cart->update($item["key"], $item["value"]);
            // }
            //  else {
            //     return redirect()->back()->with('errorMessage', 'Số lượng sản phẩm vượt quá số lượng hàng tồn kho!');
            // }
        }
        // return view('frontend.cart.index');
    }

    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back()->with('successMessage', 'Xóa hết giỏ hàng thành công!');
    }
}
