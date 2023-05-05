<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Contact;

use Illuminate\Support\Facades\Auth;


class contactController extends Controller
{
    #GET:admin/contact, admin/contact/index
    public function index()
    {
        $list_contact = Contact::where('status', '!=', 0)->get();
        return view('backend.contact.index', compact('list_contact'));
    }

    // Ghi chú về trạng thái contact
    // - 0: Xóa vào thùng rác
    // - 1: trạng thái hiện
    // - 2: trạng thái ẩn
    // tồn tại reply id là đã trả lời
    // không tồn tại reply id là chưa trả lời 

    #GET:admin/contact/trash
    public function trash()
    {
        $list_contact = Contact::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.contact.trash', compact('list_contact'));
    }

    public function show(string $id)
    {

        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.contact.show', compact('contact'));
    }

    public function edit(string $id)
    {
        $contact = Contact::find($id);
        return view('backend.contact.reply', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact_id = Auth::contact()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $contact = Contact::find($id); //lấy mẫu tin
        $contact->name = $request->name; //tên có thể đăng nhâp
        $contact->contactname = $request->contactname;
        $contact->phone = $request->phone;
        $contact->password = bcrypt($request->password);
        //mật khẩu nên có 1 trang riêng để thay đổi mật khẩu, cần xác nhận mật khẩu cũ trước khi encode
        $contact->roles = $request->roles;
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->gender = $request->gender;
        $contact->status = $request->status;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = $contact_id;
        //upload image
        $slug = Str::slug($contact->name = $request->name, '-');
        if ($request->has('image')) {
            $path_dir = "public/images/contact/";
            if (File::exists(($path_dir . $contact->image))) {
                File::delete(($path_dir . $contact->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $contact->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $contact->image = $filename;
        }
        //end upload
        if ($contact->save()) {
            return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật liên hệ thành công!']);
        }
        return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật liên hệ không thành công!']);
    }

    #GET:admin/contact/destroy/{id}
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($contact->delete()) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa liên hệ thành công!']);
        }
        return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa liên hệ không thành công!']);
    }
    #GET:admin/contact/status/{id}
    public function status($id)
    {
        $contact_id = Auth::contact()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $contact->status = ($contact->status == 1) ? 2 : 1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = $contact_id;
        $contact->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/contact/delete/{id}
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $contact_id = Auth::contact()->id;
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $contact->status = 0;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = $contact_id;
        $contact->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/contact/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $contact_id = Auth::contact()->id;
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $contact->status = 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = $contact_id;
        $contact->save();
        return redirect()->route('contact.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
