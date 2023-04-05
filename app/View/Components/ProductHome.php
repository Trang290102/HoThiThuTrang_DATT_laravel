<?php

namespace App\View\Components;

use Closure;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductHome extends Component
{
    public $row_category;
    public function __construct($rowcat)
    {
        $this->row_category = $rowcat;
    }

    public function render(): View|Closure|string
    {
        $row_cat = $this->row_category;
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
            ->select('httt_product.*', 'httt_brand.name as brand_name','httt_brand.slug as brand_slug')
            ->where('httt_product.status', 1)
            ->whereIn('category_id', $list_category_id)->take(10)->get();
        return view('components.product-home', compact('row_cat', 'product_list'));
        // $product_list = Product::join('httt_product_image', 'httt_product_image.product_id', '=', 'httt_product.id')
        //     ->where('status', 1)
        //     ->groupBy('httt_product_image.product_id')
        //     ->whereIn('category_id', $list_category_id)
        //     ->orderBy('created_at', 'desc')
        //     ->take(10)->get();
        // return view('components.product-home', compact('row_cat', 'product_list'));
    }
}
