<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginAdminMiddelware
{
    public function handle(Request $request, Closure $next): Response
    {

        if (Auth::check()) {
            $user = Auth::user();
            //Xét quyền
            if ($user->roles == 1) 
            {
                return $next($request);
            }
            else {
                return redirect()->route('admin.getlogin');
            }
        }
        else
        {
            return redirect()->route('admin.getlogin');
        }
        return $next($request);
    }
}
