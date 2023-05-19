<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Helper\CartHelper;

class DonHangController extends Controller
{
    // public  function __construct()
    // {
    //     $this->middleware('LoginCustomer');
    // }
    public function index()
    {
        return view('frontend.order.list-order');
    }
}
