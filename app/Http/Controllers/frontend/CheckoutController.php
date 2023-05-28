<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductStore;
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
        foreach ($cart->items as $product_id => $item) {
            $qty_buy = 0;
            $qty_buy= OrderDetail::join('httt_order', 'httt_order.id', '=', 'httt_orderdetail.order_id')
            ->where([['httt_order.status', '!=', 1], ['httt_order.status', '!=', 0]])
            ->where('product_id','=',  $item['id'])
            ->sum('httt_orderdetail.qty');
            $qty_store=0;
            $qty_store= ProductStore::where('product_id','=', $item['id'])
            ->sum('qty');
            if ($item['quantity'] > ($qty_store - $qty_buy)) {
                return redirect()->back()->with('errorMessage', 'Số lượng sản phẩm vượt quá số lượng hàng tồn kho! Vui lòng kiểm tra chi tiết số lượng các sản phẩm.');
            }
        }
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
                // $product_store = ProductStore::where('product_id', '=', $item['id'])->first();
                // $t = $product_store->qty;
                // $t -= $item['quantity'];
                // $product_store->qty = $t;
                // $product_store->save();
            }
            // foreach ($cart->items as $product_id => $item) {
            //     $product_store = ProductStore::where('product_id', '=', $item['id'])->first();
            //     // $product_store = ProductStore::find($item['id'])->first();
            //     $t=$product_store->qty;
            //     $t-=$item['quantity'];
            //     $product_store->qty = $t;
            //     $product_store->save();
            // }
            // dd($order);
            //gửi mail chi tiết đơn hàng
            Mail::send('frontend.mail.order', compact('auth', 'cart', 'order'), function ($email) use ($auth) {
                $email->subject('TrangShop - Đặt hàng thành công');
                $email->to($auth->email, $auth->name);
            });
            //xóa cart
            session(['cart' => '']);
            // return redirect()->route('checkout.success');
            $orderdetail = OrderDetail::where('order_id', '=', $order->id)->get();
            return view('frontend.cart.checkout-success', compact('orderdetail'));
        } else {
            return redirect()->back()->with('errorMessage', 'Đặt hàng không thành công! Vui lòng liên hệ bộ phận CSKH.');
        }
    }
    // public function checkout_success()
    // {
    //     return view('frontend.cart.checkout-success');
    // }
    public function mail()
    {
        $name = Auth::guard('customer')->user()->name;
        Mail::send('frontend.mail.order', compact('name'), function ($email) use ($name) {
            $email->subject('Shop Phụ kiện & Túi xách TrangShop');
            $email->to('hothutrang421@gmail.com', $name);
        });
    }
}
