<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Post;
use App\Models\Brand;
use App\Models\Topic;


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
                            return $this->product_brand($slug);
                            break;
                        }
                    case 'category': {
                            return $this->product_category($slug);
                            break;
                        }
                    case 'topic': {
                            return $this->post_topic($slug);
                            break;
                        }
                    case 'page': {
                            return $this->post_page($slug); //bảng post có 2 kiểu type là post và page, page sẽ được lưu vào bảng link
                            break;
                        }
                }
            } else {
                $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
                if ($product != NULL) {
                    return $this->product_detail($product);
                } else {
                    $post = Post::where([['status', '=', 1], ['slug', '=', $slug], ['type', '=', 'post']])->first();
                    if ($post != NULL) {
                        return $this->post_detail($post);
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
        return view('frontend.home', compact('list_category'));
    }

    //Sanr pham thuoc thuong hieu
    private function product_brand($slug)
    {
        $row_brand = Brand::where([['slug', '=', $slug], ['status', '=', '1']])->first();
        $product_list = Product::where([['status', '=', '1'], ['brand_id', '=', $row_brand->id]])
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        $count_list = Product::where([['status', '=', '1'], ['brand_id', '=', $row_brand->id]])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.product-brand', compact('row_brand', 'product_list', 'count_list'));
    }
    private function product_category($slug)
    {
        $row_cat = Category::where([['slug', '=', $slug], ['status', '=', '1']])->first();
        $list_category_id = array();
        array_push($list_category_id, $row_cat->id);
        //xet cap con
        $list_category1 = Category::where([['parent_id', '=', $row_cat->id], ['status', '=', '1']])
            ->orderBy('updated_at', 'desc')
            ->get();
        if (count($list_category1) > 0) {
            foreach ($list_category1 as $row_cat1) {
                array_push($list_category_id, $row_cat1->id);
                $list_category2 = Category::where([['parent_id', '=', $row_cat1->id], ['status', '=', '1']])->get();
                if (count($list_category2) > 0) {
                    foreach ($list_category2 as $row_cat2) {
                        array_push($list_category_id, $row_cat2->id);
                        $list_category3 = Category::where([['parent_id', '=', $row_cat2->id], ['status', '=', '1']])->get();
                        if (count($list_category3) > 0) {
                            foreach ($list_category3 as $row_cat3) {
                                array_push($list_category_id, $row_cat3->id);
                            }
                        }
                    }
                }
            }
        }
        $product_list = Product::join('httt_brand', 'httt_brand.id', '=', 'httt_product.brand_id')
            ->select('httt_product.*', 'httt_brand.name as brand_name', 'httt_brand.slug as brand_slug')
            ->where('httt_product.status', 1)
            ->whereIn('category_id', $list_category_id)->paginate(9);
        $count_list = Product::join('httt_brand', 'httt_brand.id', '=', 'httt_product.brand_id')
            ->select('httt_product.*', 'httt_brand.name as brand_name', 'httt_brand.slug as brand_slug')
            ->where('httt_product.status', 1)
            ->whereIn('category_id', $list_category_id)->get();
        return view('frontend.product-category', compact('product_list', 'row_cat', 'count_list'));
    }
    private function product_detail($product)
    {
        $list_category_id = array();
        array_push($list_category_id, $product->category_id);
        //xet cap con
        $list_category1 = Category::where([['parent_id', '=', $product->category_id], ['status', '=', '1']])
            ->orderBy('updated_at', 'desc')
            ->get();
        if (count($list_category1) > 0) {
            foreach ($list_category1 as $row_cat1) {
                array_push($list_category_id, $row_cat1->id);
                $list_category2 = Category::where([['parent_id', '=', $row_cat1->id], ['status', '=', '1']])->get();
                if (count($list_category2) > 0) {
                    foreach ($list_category2 as $row_cat2) {
                        array_push($list_category_id, $row_cat2->id);
                        $list_category3 = Category::where([['parent_id', '=', $row_cat2->id], ['status', '=', '1']])->get();
                        if (count($list_category3) > 0) {
                            foreach ($list_category3 as $row_cat3) {
                                array_push($list_category_id, $row_cat3->id);
                            }
                        }
                    }
                }
            }
        }
        $product_list = Product::join('httt_brand', 'httt_brand.id', '=', 'httt_product.brand_id')
            ->select('httt_product.*', 'httt_brand.name as brand_name', 'httt_brand.slug as brand_slug')
            ->where([['httt_product.status', '=', 1], ['httt_product.id', '!=', $product->id]])
            ->whereIn('category_id', $list_category_id)
            ->orderBy('httt_product.created_at', 'desc')
            ->take(10)->get();
        return view('frontend.product-detail', compact('product', 'product_list'));
    }
    private function post_topic($slug)
    {
        $row_topic = Topic::where([['slug', '=', $slug], ['status', '=', '1']])->first();
        $list_topic_id = array();
        array_push($list_topic_id, $row_topic->id);
        //xet cap con
        $list_topic1 = Topic::where([['parent_id', '=', $row_topic->id], ['status', '=', '1']])
            ->orderBy('updated_at', 'desc')
            ->get();
        if (count($list_topic1) > 0) {
            foreach ($list_topic1 as $row_topic1) {
                array_push($list_topic_id, $row_topic1->id);
                $list_topic2 = Topic::where([['parent_id', '=', $row_topic1->id], ['status', '=', '1']])->get();
                if (count($list_topic2) > 0) {
                    foreach ($list_topic2 as $row_topic2) {
                        array_push($list_topic_id, $row_topic2->id);
                        $list_topic3 = Topic::where([['parent_id', '=', $row_topic2->id], ['status', '=', '1']])->get();
                        if (count($list_topic3) > 0) {
                            foreach ($list_topic3 as $row_topic3) {
                                array_push($list_topic_id, $row_topic3->id);
                            }
                        }
                    }
                }
            }
        }
        $post_list = Post::join('httt_topic', 'httt_topic.id', '=', 'httt_post.topic_id')
            ->select('httt_post.*', 'httt_topic.name as topic_name', 'httt_topic.slug as topic_slug')
            ->where([['httt_post.status', '=', 1], ['httt_post.type', '=', 'post']])
            ->orderBy('httt_post.created_at', 'desc')
            ->whereIn('topic_id', $list_topic_id)->paginate(5);

        return view('frontend.post-topic', compact('post_list', 'row_topic'));
    }
    private function post_page($slug)
    {
        $page = Post::where([['status', '=', 1], ['type', '=', 'page'], ['slug', '=', $slug]])->first();
        return view('frontend.post-page', compact('page'));
    }
    private function post_detail($post)
    {
        $list_topic_id = array();
        array_push($list_topic_id, $post->id);
        //xet cap con
        $list_topic1 = Topic::where([['parent_id', '=', $post->id], ['status', '=', '1']])
            ->orderBy('updated_at', 'desc')
            ->get();
        if (count($list_topic1) > 0) {
            foreach ($list_topic1 as $row_topic1) {
                array_push($list_topic_id, $row_topic1->id);
                $list_topic2 = Topic::where([['parent_id', '=', $row_topic1->id], ['status', '=', '1']])->get();
                if (count($list_topic2) > 0) {
                    foreach ($list_topic2 as $row_topic2) {
                        array_push($list_topic_id, $row_topic2->id);
                        $list_topic3 = Topic::where([['parent_id', '=', $row_topic2->id], ['status', '=', '1']])->get();
                        if (count($list_topic3) > 0) {
                            foreach ($list_topic3 as $row_topic3) {
                                array_push($list_topic_id, $row_topic3->id);
                            }
                        }
                    }
                }
            }
        }
        // $post_list = Post::join('httt_topic', 'httt_topic.id', '=', 'httt_topic.brand_id')
        //     ->select('httt_product.*', 'httt_topic.name as topic_name', 'httt_topic.slug as topic_slug')
        //     ->where([['httt_product.status', '=', 1], ['httt_product.id', '!=', $post->id]])
        //     ->whereIn('topic_id', $list_topic_id)
        //     ->orderBy('httt_post.created_at', 'desc')
        //     ->take(4)->get();
        return view('frontend.post-detail', compact('post'));
    }
    private function error_404($slug)
    {
        return view('frontend.404');
    }
}
