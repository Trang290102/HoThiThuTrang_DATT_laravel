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
                <form action="{{route('postdangnhap')}}" method="post" accept-charset="utf-8">
                    @csrf
                    <input type="text" name="username" value="{{old('username')}}"  placeholder="Tên đăng nhập hoặc email" />
                    @if($errors->has('username'))
                    <div class="text-danger">
                        {{$errors->first('username')}}
                    </div>
                    @endif
                    <input type="password" name="password" value="{{old('password')}}"  placeholder="Mật khẩu" />
                    @if($errors->has('password'))
                    <div class="text-danger">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                    <span style="line-height: 30px;">
                        <input type="checkbox" class="checkbox"  value="remember" value="1"> 
                        Nhớ tài khoản
                    </span>
                    {{-- <div class="form-group">
                        <div class="checkbox">
                            <input type="checkbox" class="checkbox" value="remember" value="1"> 
                        Nhớ tài khoản
                        </div>
                    </div> --}}
                    <h4><a href="{{URL::to('register')}}">Đăng ký tài khoản mới?</a></h4>
                    <button type="submit" class="btn btn-default" style="margin-bottom: 25px;">Đăng nhập</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-sm-4"></div>

    </div>
</div>
@endsection