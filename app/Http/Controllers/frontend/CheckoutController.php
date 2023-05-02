<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Helper\CartHelper;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public  function __construct()
    {
        $this->middleware('LoginCustomer');
        
    }
    public function form()
    {
        return view('frontend.cart.checkout');
    }

    public function submit_form(Request $request, CartHelper $cart)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $cus_id = Auth::guard('customer')->user()->id;
        $order = new Order;
        $order->user_id = $cus_id;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->status = 1;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->created_at = date('Y-m-d H:i:s');
        if ($order->save()) {
            $order_id = $order->id;
            foreach ($cart->items as $product_id => $item) {
                $order_detail = new OrderDetail();
                $order_detail->order_id =  $order_id;
                $order_detail->product_id = $item['id'];
                $order_detail->qty = $item['quantity'];
                $order_detail->price = $item['price'];
                $order_detail->amount = (int)$item['price'] * (int)$item['quantity'];
                $order_detail->save();
            }
            session(['cart' => '']);
            return redirect()->route('checkout.success')->with('successMessage', 'Đặt hàng thành công! Chân thành cảm ơn quý khách!!!');
        } else {
            return redirect()->back()->with('errorMessage', 'Đặt hàng không thành công! Vui lòng liên hệ bộ phận CSKH.');
        }
    }
    public function checkout_success()
    {
        return view('frontend.cart.checkout-success');
    }
}
