@extends('layouts.site')
@section('title', 'Đăng ký')
@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="login-form"><!--login form-->
                <h2 class="text-center">Đăng ký tài khoản </h2>
                <form action="#">
                    <input type="text" placeholder="Họ và tên khách hàng" />
                    <input type="text" placeholder="Tên đăng nhập" />
                    <input type="text" placeholder="Số điện thoại" />
                    <input type="text" placeholder="Địa chỉ" />
                    {{-- <input type="checkbox" class="checkbox" value="Nam">Nam
                    <input type="checkbox" class="checkbox" value="Nữ">Nữ --}}
                    <input type="password" placeholder="Mật khẩu" />
                    <input type="password" placeholder="Xác nhận mật khẩu" />
                    <button type="submit" class="btn btn-default" style="margin-bottom: 25px;">Đăng ký</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-sm-4"></div>

    </div>
</div>
@endsection