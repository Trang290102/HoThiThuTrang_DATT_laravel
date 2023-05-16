<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    #GET:admin/contact, admin/contact/index
    public function index()
    {
        $list_contact = Contact::where('status', '!=', 0)->get();
        return view('backend.contact.index', compact('list_contact'));
    }
    public function noreply()
    {
        $list_contact = Contact::where([['email', '!=', null], ['replay_id', '=', null]])->get();
        return view('backend.contact.contact', compact('list_contact'));
    }

    // Ghi chú về trạng thái contact
    // - 0: Xóa vào thùng rác
    // - 1: chưa trả lời
    // - 2:đã trả lời
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
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $contact_reply = new Contact; //lấy mẫu tin
        $contact_reply->user_id = $user_id;
        $contact_reply->name = Auth::user()->name;
        $contact_reply->status = 1;
        $contact_reply->title = $request->title;
        $contact_reply->content = $request->content;
        $contact_reply->updated_at = date('Y-m-d H:i:s');
        $contact_reply->updated_by = $user_id;
        $contact_reply->replay_id = $id;

        //end upload
        if ($contact_reply->save()) {
            $contact = Contact::find($id);
            $contact->replay_id = $user_id;
            $contact->status = 1;
            if($contact->save())
            {
            //gửi mail chi tiết đơn hàng
            Mail::send('backend.mail.contact', compact('contact', 'contact_reply'), function ($email) use ($contact) {
                $email->subject('TrangShop - Trả lời liên hệ');
                $email->to($contact->email, $contact->name);
            });
            }
            return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Trả lời liên hệ thành công!']);
        }
        return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Trả lời liên hệ thất bại!']);
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
    // public function status($id)
    // {
    //     $user_id = Auth::user()->id;
    //     date_default_timezone_set("Asia/Ho_Chi_Minh");
    //     $contact = Contact::find($id);
    //     if ($contact == null) {
    //         return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
    //     }
    //     $contact->status = ($contact->status == 1) ? 2 : 1;
    //     $contact->updated_at = date('Y-m-d H:i:s');
    //     $contact->updated_by = $user_id;
    //     $contact->save();
    //     return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    // }
    #GET:admin/contact/delete/{id}
    public function delete($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $contact->status = 0;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = $user_id;
        $contact->save();
        return redirect()->route('contact.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/contact/restore/{id}
    public function restore($id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $user_id = Auth::user()->id;
        $contact = Contact::find($id);
        if ($contact == null) {
            return redirect()->route('contact.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $contact->status = 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = $user_id;
        $contact->save();
        return redirect()->route('contact.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
