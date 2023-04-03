<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index()
    {
        $user_name = Auth::user()->name;
        return view('backend.dashboard.index',compact('user_name'));
    }
}
