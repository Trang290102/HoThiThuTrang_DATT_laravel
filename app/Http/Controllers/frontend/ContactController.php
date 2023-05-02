<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Post;
use App\Models\Brand;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact');
    }


    // public function index(Request $request)
    // {
    //     $keywords = $request->keywordsearch;
    //     $list_search_product = Product::join('httt_brand', 'httt_brand.id', '=', 'httt_product.brand_id')
    //         // ->join('httt_category', 'httt_category.id', '=', 'httt_product.category_id')
    //         ->select('httt_product.*', 'httt_brand.name as brand_name', 'httt_brand.slug as brand_slug')
    //         ->where('httt_product.status', 1)
    //         ->where('httt_product.name', 'like', '%' . $keywords . '%')
    //         ->orderBy('httt_product.created_at', 'desc')
    //         ->get();
    //     return view('frontend.search-product', compact('list_search_product'));
    // }
}
