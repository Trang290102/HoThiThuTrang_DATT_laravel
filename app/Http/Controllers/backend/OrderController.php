<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductStore;


use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    #GET:admin/order, admin/order/index
    public function index()
    {
        // 
        $list_order = Order::where('status', '!=', 0)
            ->orderBy('httt_order.created_at', 'desc')
            ->get();
        return view('backend.order.index', compact('list_order'));
    }
    #GET:admin/order/trash
    public function trash()
    {
        $list_order = Order::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.order.trash', compact('list_order'));
    }

    #GET:admin/order/list_new/{id} đơn hàng mới
    public function list_new()
    {
        $list_order = Order::where('status', '=', 1)->orderBy('created_at', 'desc')->get();
        return view('backend.order.list_new', compact('list_order'));
    }
    #GET:admin/order/list_new/{id} đơn hàng đã xác nhận
    public function list_xacnhan()
    {
        $list_order = Order::where([['status', '!=', 1],['status', '!=', 0]])->orderBy('created_at', 'desc')->get();
        return view('backend.order.list_xacnhan', compact('list_order'));
    }
    



    #GET:admin/order/show/{id}đơn hàng
    public function show(string $id)
    {
        $orderdetail = OrderDetail::where('order_id', '=', $id)->get();
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        } else {
            return view('backend.order.show', compact('order', 'orderdetail'));
        }
    }


    #GET:admin/order/destroy/{id}
    //Xóa đơn hàng khỏi DB
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($order->delete()) {
            //xoa order-detail
            OrderDetail::where('order_id', '=', $id)->delete();
            return redirect()->route('order.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa đơn hàng thành công!']);
        }
        return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa đơn hàng không thành công!']);
    }

    #GET:admin/order/delete/{id}
    //Hủy đơn hàng
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/order/xac-nhan/{id}
    //xác nhận đơn hàng
    public function xacnhan($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $order->status = 2;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->back()->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    //trạng thái chuẩn bị
    public function chuanbi($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $order->status = 3;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->back()->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }

    public function giaohang($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $order->status = 4;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->back()->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    public function ghtc($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $order->status = 5;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->back()->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    public function ghtb($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->back()->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $order->status = 6;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->back()->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
//1:đặt hàng thành công - chờ xác nhận
//1:chờ xác nhận user có thể yêu cầu hủy đơn
//2:xác nhận thành công (gọi điện cho user) thì chuyển đế 2, nếu hủy thì chuyển đến 0
//3:chuẩn bị(không thể hủy)
/////////////////////////////// :vận chuyển(không thể hủy)
//4:giao hàng
//5:thành công(hoàn thành đơn hàng)
//6:thất bại
