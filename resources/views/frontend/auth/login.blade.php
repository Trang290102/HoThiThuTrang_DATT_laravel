@extends('layouts.site')
@section('title', 'Đăng nhập')
@section('content')
<div class="container my-4">
    <form action="{{route('postlogin')}}" method="post" accept-charset="utf-8">
        @csrf
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="login-form"><!--login form-->
                    <h2 class="text-center">ĐĂNG NHẬP</h2>
                    <form action="#">
                        <input type="text" placeholder="Tên đăng nhập" />
                        <input type="password" placeholder="Mật khẩu" />
                        <span>
                            <input type="checkbox" class="checkbox"> 
                            Nhớ tài khoản
                        </span>
                        <button type="submit" class="btn btn-default" style="margin-bottom: 25px;">Login</button>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-md-4"></div>
        </div>
    </form>
</div>
@endsection