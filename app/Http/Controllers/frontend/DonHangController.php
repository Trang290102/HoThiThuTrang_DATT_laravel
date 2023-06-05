<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;


use App\Helper\CartHelper;

class DonHangController extends Controller
{
    // public  function __construct()
    // {
    //     $this->middleware('LoginCustomer');
    // }
    public function index()
    {
        $cus_id = Auth::guard('customer')->user()->id;
        $list_order = Order::where('user_id', '=', $cus_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.order.list-order', compact('list_order'));
    }

    //Hủy đơn hàng
    public function huy($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::guard('customer')->user()->id;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->back()->with('errorMessage', 'Đơn hàng không tồn tại!!!');
        }
        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->route('donhang.list')->with('SuccessMessage', 'Hủy đơn hàng thành công!!!');
    }
    //Chi tiết đơn hàng
    public function chitiet(string $id)
    {
        $orderdetail = OrderDetail::where('order_id', '=', $id)->get();
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        } else {
            return view('frontend.order.order-detail', compact('order', 'orderdetail'));
        }
    }
}
