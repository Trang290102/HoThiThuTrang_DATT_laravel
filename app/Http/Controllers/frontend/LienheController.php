<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Mail;

class LienheController extends Controller
{
    public  function __construct()
    {
        $this->middleware('LoginCustomer');
    }
    public function getcontact()
    {
        return view('frontend.contact');
    }
    public function postcontact(Request $request)
    {
        // Mail::send('');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $cus_id = Auth::guard('customer')->user()->id;
        $contact = new Contact; // tạo mới
        $contact->user_id = $cus_id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->status = 1;
        $contact->created_at = date('Y-m-d H:i:s');
        // dd($contact);
        if ($contact->save()) {
            return redirect()->route('frontend.contact')->with('contactMessage', 'Hãy đợi email trả lời từ chúng tôi.');
        }
        // return view('frontend.contact');
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
