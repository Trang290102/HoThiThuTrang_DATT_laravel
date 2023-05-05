<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Helper\CartHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\MailServiceProvider;


class CheckoutController extends Controller
{
    // public  function __construct()
    // {
    //     $this->middleware('LoginCustomer');
    // }
    public function form()
    {
        return view('frontend.cart.checkout');
    }

    public function submit_form(Request $request, CartHelper $cart)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $cus_id = Auth::guard('customer')->user()->id;
        $auth = Auth::guard('customer')->user();
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
            //gửi mail chi tiết đơn hàng
            Mail::send('frontend.mail.order', compact('auth', 'cart', 'order'), function ($email) use ($auth) {
                $email->subject('TrangShop - Đặt hàng thành công');
                $email->to($auth->email, $auth->name);
            });

            return redirect()->route('checkout.success');
                //xóa cart
                session(['cart' => '']);

        } else {
            return redirect()->back()->with('errorMessage', 'Đặt hàng không thành công! Vui lòng liên hệ bộ phận CSKH.');
        }
    }
    public function checkout_success()
    {
        return view('frontend.cart.checkout-success');
    }
    public function mail()
    {
        $name = Auth::guard('customer')->user()->name;
        Mail::send('frontend.mail.order', compact('name'), function ($email) use ($name) {
            $email->subject('Shop Phụ kiện & Túi xách TrangShop');
            $email->to('hothutrang421@gmail.com', $name);
        });
    }
}
