<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Post;

class SiteController extends Controller
{
    public function index($slug = null)
    {
        if ($slug == null) {
            // return view('frontend.home');
            return $this->home();
        } else {
            $link = Link::where('slug', '=', $slug)->first();
            if ($link != NULL) {
                $type = $link->type;
                switch ($type) {
                    case 'brand': {
                            $this->product_brand($slug);
                            break;
                        }
                    case 'category': {
                            $this->product_category($slug);
                            break;
                        }
                    case 'topic': {
                            $this->post_topic($slug);
                            break;
                        }
                    case 'page': {
                            $this->post_page($slug); //bảng post có 2 kiểu type là post và page, page sẽ được lưu vào bảng link

                            break;
                        }
                }
            } else {
                $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
                if ($product != NULL) {
                    $this->product_detail($product);
                } else {
                    $post = Post::where([['status', '=', 1], ['slug', '=', $slug], ['type', '=', 'post']])->first();
                    if ($post != NULL) {
                        $this->post_detail($post);
                    } else {
                        return $this->error_404($slug);
                    }
                }
            }
        }
    }
    private function home()
    {
        $list_category = Category::where([['parent_id', '=', 0], ['status', '=', '1']])->get();
        return view('frontend.home',compact('list_category'));
    }

    //Sanr pham thuoc thuong hieu
    private function product_brand($slug)
    {
        return view('frontend.product-brand');
    }
    private function product_category($slug)
    {
        return view('frontend.product-category');
    }
    private function product_detail($slug)
    {
        return view('frontend.product-detail');
    }
    private function post_topic($slug)
    {
        return view('frontend.post-topic');
    }
    private function post_page($slug)
    {
        return view('frontend.post-page');
    }
    private function post_detail($slug)
    {
        return view('frontend.post-detail');
    }
    private function error_404($slug)
    {
        return view('frontend.404');
    }
}
