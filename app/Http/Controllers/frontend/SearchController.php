<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Product;
use App\Models\Post;
use App\Models\Brand;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->keywordsearch;
        $list_search_product = Product::where('httt_product.status', 1)
            ->where('httt_product.name', 'like', '%' . $keywords . '%')
            ->orderBy('httt_product.created_at', 'desc')
            // ->paginate(9);
            ->get();
        return view('frontend.search-product', compact('list_search_product'));
    }
}
