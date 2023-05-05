<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginCustomerMiddelware
{
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::guard('customer')->check()) {
            $user = Auth::guard('customer')->user();
            //Xét quyền
            if ($user->roles == 2) {
                return $next($request);
            } else {
                return redirect()->route('getdangnhap');
            }
        } else {
            return redirect()->route('getdangnhap')->with('errorMessage', 'Bạn cần đăng nhập để tiếp tục!!!');
        }
        return $next($request);
    }
}
