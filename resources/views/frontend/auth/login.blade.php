@extends('layouts.site')
@section('title', 'Đăng nhập')
@section('content')
<div class="container my-4">
    {{-- <div class="row">
        <div class="col-sm-4"></div> --}}
        {{-- <div class="col-sm-4"> --}}
            <div class="login-form" style="border-radius:4px;border: 1px solid #cecece; padding: 25px 25px;margin:25px 30%;"><!--login form-->
                <h2 class="text-center">ĐĂNG NHẬP</h2>
                @includeIf('backend.message_alert')
                <form action="{{route('postdangnhap')}}" method="post" accept-charset="utf-8">
                    @csrf
                    <input type="text" name="username" style="border-radius:4px;border: 1px solid #cecece;" value="{{old('username')}}"  placeholder="Tên đăng nhập hoặc email" />
                    @if($errors->has('username'))
                    <div class="text-danger">
                        {{$errors->first('username')}}
                    </div>
                    @endif
                    <input type="password" name="password" style="border-radius:4px;border: 1px solid #cecece;" value="{{old('password')}}"  placeholder="Mật khẩu" />
                    @if($errors->has('password'))
                    <div class="text-danger">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                    {{-- <span style="line-height: 30px;">
                        <input type="checkbox" class="checkbox"  value="remember" value="1"> 
                        Nhớ tài khoản
                    </span> --}}
                    {{-- <h5><a href="{{URL::to('register')}}" style="color:black;">Đăng ký tài khoản mới?</a></h5> --}}

                    {{-- <div class="form-group">
                        <div class="checkbox">
                            <input type="checkbox" class="checkbox" value="remember" value="1"> 
                        Nhớ tài khoản
                        </div>
                    </div> --}}

                    <button type="submit" class="btn btn-info" style="margin-bottom: 25px;width:100%;height:40px;border-radius:4px;border: 1px solid;">Đăng nhập</button>
                    <p class="text-center mt-4">Bạn không có tài khoản? <a href="{{URL::to('register')}}">Đăng ký</a></p>
                </form>
            </div><!--/login form-->
        {{-- </div> --}}
        {{-- <div class="col-sm-4"></div> --}}

    </div>
</div>
@endsection