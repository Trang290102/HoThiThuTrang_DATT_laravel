@extends('layouts.site')
@section('title', 'Đăng nhập')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="login-form"><!--login form-->
                <h2 class="text-center">ĐĂNG NHẬP</h2>
                @includeIf('backend.message_alert')
                <form action="#">
                    <input type="text" placeholder="Tên đăng nhập" />
                    <input type="password" placeholder="Mật khẩu" />
                    {{-- <span>
                        <input type="checkbox" class="checkbox"> 
                        Nhớ tài khoản
                    </span> --}}
                    <h4><a href="{{URL::to('register')}}">Đăng ký tài khoản mới?</a></h4>
                    <button type="submit" class="btn btn-default" style="margin-bottom: 25px;">Đăng nhập</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-sm-4"></div>

    </div>
</div>
@endsection