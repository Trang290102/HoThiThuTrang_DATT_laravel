<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Topic;
use App\Models\Link;
use App\Http\Requests\TopicStoreRequest;
use App\Http\Requests\TopicUpdateRequest;
use Illuminate\Support\Facades\Auth;


class TopicController extends Controller
{
    #GET:admin/topic, admin/topic/index
    public function index()
    {
        
        $list_topic = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.index', compact('list_topic'));
    }
    #GET:admin/topic/trash
    public function trash()
    {
        
        $list_topic = Topic::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.trash', compact('list_topic'));
    }

    #GET: admin/topic/create
    public function create()
    {
        

        $list_topic = Topic::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';

        foreach ($list_topic as $item) {
            $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.topic.create', compact('html_parent_id', 'html_sort_order'));
    }


    public function store(TopicStoreRequest $request)
    {
        $user_id = Auth::user()->id;
        $topic = new Topic; //tạo mới mẫu tin
        $topic->name = $request->name;
        $topic->slug = Str::slug($topic->name = $request->name, '-');
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->parent_id = $request->parent_id;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = $user_id;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/topic/";
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $topic->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $topic->image = $filename;
        }
        //end upload
        if ($topic->save()) {
            $link = new Link();
            $link->slug = $topic->slug;
            $link->table_id = $topic->id;
            $link->type = 'topic';
            $link->save();
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Thêm chủ đề thành công!']);
        }
        return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm chủ đề không thành công!']);
    }

    public function show(string $id)
    {
        

        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.topic.show', compact('topic'));
    }

    public function edit(string $id)
    {
        

        $topic = Topic::find($id);
        $list_topic = Topic::where('status', '!=', 0)->get();
        $html_parent_id = '';
        $html_sort_order = '';

        foreach ($list_topic as $item) {
            if ($topic->parent_id == $item->id) {
                $html_parent_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
            } else {
                $html_parent_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
            $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->name . '</option>';
        }
        return view('backend.topic.edit', compact('topic', 'html_parent_id', 'html_sort_order'));
    }

    public function update(TopicUpdateRequest $request, string $id)
    {
        $user_id = Auth::user()->id;
        $topic = Topic::find($id); //lấy mẫu tin
        $topic->name = $request->name;
        $topic->slug = Str::slug($topic->name = $request->name, '-');
        $topic->metakey = $request->metakey;
        $topic->metadesc = $request->metadesc;
        $topic->parent_id = $request->parent_id;
        $topic->sort_order = $request->sort_order;
        $topic->status = $request->status;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->created_by = $user_id;
        //upload image
        if ($request->has('image')) {
            $path_dir = "public/images/topic/";
            if (File::exists(($path_dir . $topic->image))) {
                File::delete(($path_dir . $topic->image));
            }
            $file =  $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $topic->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $topic->image = $filename;
        }
        //end upload
        if ($topic->save()) {
            if ($link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first()) {
                $link->slug = $topic->slug;
                $link->save();
            }
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật chủ đề thành công!']);
        }
        return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật chủ đề không thành công!']);
    }

    #GET:admin/topic/destroy/{id}
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/topic/";
        $path_image_delete = $path_dir . $topic->image;
        if ($topic == null) {
            return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($topic->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            //xoa link
            if ($link = Link::where([['type', '=', 'topic'], ['table_id', '=', $id]])->first()) {
                $link->delete();
            }
            return redirect()->route('topic.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa chủ đề thành công!']);
        }
        return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa chủ đề không thành công!']);
    }
    #GET:admin/topic/status/{id}
    public function status($id)
    {
        $user_id = Auth::user()->id;
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $topic->status = ($topic->status == 1) ? 2 : 1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = $user_id;
        $topic->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/topic/delete/{id}
    public function delete($id)
    {
        $user_id = Auth::user()->id;
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = $user_id;
        $topic->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/topic/restore/{id}
    public function restore($id)
    {
        $user_id = Auth::user()->id;
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = $user_id;
        $topic->save();
        return redirect()->route('topic.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
