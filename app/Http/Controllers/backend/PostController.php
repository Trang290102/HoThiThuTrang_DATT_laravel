<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Link;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    #GET:admin/post, admin/post/index
    public function index()
    {
        

        $list_post = Post::join('httt_topic', 'httt_topic.id', '=', 'httt_post.topic_id')
            ->select('httt_post.*', 'httt_topic.name as topic_name')
            ->where([['httt_post.status', '!=', 0], ['httt_post.type', '=', 'post']])
            ->orderBy('httt_post.created_at', 'desc')
            ->get();
        return view('backend.post.index', compact('list_post'));
    }
    #GET:admin/post/trash
    public function trash()
    {
        

        $list_post = Post::where([['status', '=', 0], ['type', '=', 'post']])->orderBy('created_at', 'desc')->get();
        return view('backend.post.trash', compact('list_post'));
    }

    #GET: admin/post/create
    public function create()
    {
        

        $list_topic = Topic::where('status', '!=', 0)->get();
        $html_topic_id = '';

        foreach ($list_topic as $item) {
            $html_topic_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
        }
        return view('backend.post.create', compact('html_topic_id'));
    }


    public function store(PostStoreRequest $request)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $post = new Post; //tạo mới mẫu tin
        $post->title = $request->title;
        $post->slug = Str::slug($post->title = $request->title, '-');
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->detail = $request->detail;
        $post->topic_id = $request->topic_id;
        $post->type = 'post';
        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = $user_id;
        //upload image
        if ($request->has('images')) {
            $path_dir = "public/images/post/";
            $file =  $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = $post->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $post->images = $filename;
        }
        //end upload
        if ($post->save()) {
            return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Thêm bài viết thành công!']);
        }
        return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm bài viết không thành công!']);
    }

    public function show(string $id)
    {
        

        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        return view('backend.post.show', compact('post'));
    }

    public function edit(string $id)
    {
        

        $post = Post::find($id);
        $list_topic = Topic::where('status', '!=', 0)->get();
        $html_topic_id = '';

        foreach ($list_topic as $item) {
            if ($post->topic_id == $item->id) {
                $html_topic_id .= '<option selected value="' . $item->id . '">' . $item->name . '</option>';
            } else {
                $html_topic_id .= '<option value="' . $item->id . '">' . $item->name . '</option>';
            }
        }
        return view('backend.post.edit', compact('post', 'html_topic_id'));
    }

    public function update(PostUpdateRequest $request, string $id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $post = Post::find($id); //lấy mẫu tin
        $post->slug = Str::slug($post->title = $request->title, '-');
        //upload image
        if ($request->has('images')) {
            $path_dir = "public/images/post/";
            if (File::exists(($path_dir . $post->images))) {
                File::delete(($path_dir . $post->images));
            }
            $file =  $request->file('images');
            $extension = $file->getClientOriginalExtension();
            $filename = $post->slug . '.' . $extension;
            $file->move($path_dir, $filename);
            //echo $filename;
            $post->images = $filename;
        }
        //end upload
        $post->title = $request->title;
        $post->topic_id = $request->topic_id;
        $post->detail = $request->detail;
        $post->metakey = $request->metakey;
        $post->metadesc = $request->metadesc;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = $user_id;
        if ($post->save()) {
            return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật bài viết thành công!']);
        }
        return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Cập nhật bài viết không thành công!']);
    }


    #GET:admin/post/destroy/{id}
    public function destroy(string $id)
    {
        $post = Post::find($id);
        //thong tin hinh xoa
        $path_dir = "public/images/post/";
        $path_image_delete = $path_dir . $post->images;
        if ($post == null) {
            return redirect()->route('post.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($post->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
            return redirect()->route('post.trash')->with('message', ['type' => 'success', 'msg' => 'Xóa bài viết thành công!']);
        }
        return redirect()->route('post.trash')->with('message', ['type' => 'danger', 'msg' => 'Xóa bài viết không thành công!']);
    }
    #GET:admin/post/status/{id}
    public function status($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $post->status = ($post->status == 1) ? 2 : 1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = $user_id;
        $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
    #GET:admin/post/delete/{id}
    public function delete($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa vào thùng rác không thành công!']);
        }
        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = $user_id;
        $post->save();
        return redirect()->route('post.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công!']);
    }
    #GET:admin/post/restore/{id}
    public function restore($id)
    {
        $user_id = Auth::user()->id;
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('post.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = $user_id;
        $post->save();
        return redirect()->route('post.trash')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}
