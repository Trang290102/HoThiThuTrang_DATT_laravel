<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\OrderUpdateRequest;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    #GET:admin/order, admin/order/index
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_order = Order::join('httt_users', 'httt_users.id', '=', 'httt_order.user_id')
            ->orderBy('httt_order.created_at', 'desc')
            ->get();
        return view('backend.order.index', compact('list_order', 'user_name'));
    }
    #GET:admin/order/trash
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_order = Order::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.order.trash', compact('list_order', 'user_name'));
    }
    #GET:admin/order/show/{id}
    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $order = Order::join('httt_orderdetail', 'httt_orderdetail.order_id', '=', 'httt_order.id')
            ->join('httt_users', 'httt_users.id', '=', 'httt_order.user_id')
            ->orderBy('httt_order.created_at', 'desc')
            ->first();
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        } else {
            return view('backend.order.show', compact('order', 'user_name'));
        }
    }

    public function edit(string $id)
    {
        $user_name = Auth::user()->name;
        $list_order = Order::where('httt_order.id', '=', $id)
            ->join('httt_orderdetail', 'httt_orderdetail.order_id', '=', 'httt_order.id')
            ->join('httt_users', 'httt_users.id', '=', 'httt_order.user_id')
            ->orderBy('httt_order.created_at', 'desc')
            ->first();
        return view('backend.order.edit', compact('list_order'));
    }

    public function update(OrderUpdateRequest $request, string $id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $order = Order::find($id); //lấy mẫu tin
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->status = $request->status;

        if ($order->save()) //lưu vào csdl
        {
            return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành công']);
        }
        return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật thất bại']);
    }

    #GET:admin/order/destroy/{id}
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($order->delete()) {
            return redirect()->route('order.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa thương hiệu thành công!']);
        }
        return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa thương hiệu không thành công!']);
    }
    #GET:admin/order/status/{id}
    public function status($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $order->status = ($order->status == 1) ? 2 : 1;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/order/delete/{id}
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
    #GET:admin/order/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $order->status = 2;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = $user_id;
        $order->save();
        return redirect()->route('order.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
