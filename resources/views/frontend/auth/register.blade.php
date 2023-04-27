@extends('layouts.site')
@section('title', 'Đăng ký')
@section('content')
    
<div class="container my-4">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="login-form"><!--login form-->
                <h2 class="text-center">Đăng ký tài khoản </h2>
                <form action="{{ route('postregister')}}" method="post" enctype="multipart/form-data">
                    @csrf            
                    <input type="text" name="username" value="{{old('username')}}" placeholder="Họ và tên khách hàng" />
                    @if($errors->has('username'))
                    <div class="text-danger">
                        {{$errors->first('username')}}
                    </div>
                    @endif
                    <input type="text" name="name" value="{{old('name')}}" placeholder="Tên đăng nhập" />
                    @if($errors->has('name'))
                    <div class="text-danger">
                        {{$errors->first('name')}}
                    </div>
                    @endif
                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="Số điện thoại" />
                    @if($errors->has('phone'))
                    <div class="text-danger">
                        {{$errors->first('phone')}}
                    </div>
                    @endif
                    <input type="email" name="email" value="{{old('email')}}" placeholder="Email" />
                    @if($errors->has('email'))
                    <div class="text-danger">
                        {{$errors->first('email')}}
                    </div>
                    @endif
                    <input type="text" name="address" value="{{old('address')}}" placeholder="Địa chỉ" />
                    <div style="margin-bottom:15px;">
                        <label for="gender">Giới tính</label> 
                        <select class="form-control" name="gender" id="gender">
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                        </select>
                        @if($errors->has('gender'))
                        <div class="text-danger">
                            {{$errors->first('gender')}}
                        </div>
                        @endif
                    </div>       

                    <input type="password" name="password" value="{{old('password')}}" placeholder="Mật khẩu" />
                    @if($errors->has('password'))
                    <div class="text-danger">
                        {{$errors->first('possword')}}
                    </div>
                    @endif
                    <input type="password" name="password_re" placeholder="Xác nhận mật khẩu" />
                    @if($errors->has('password_re'))
                    <div class="text-danger">
                        {{$errors->first('password_re')}}
                    </div>
                    @endif
                    <button type="submit" class="btn btn-default" style="margin-bottom: 25px;">Đăng ký</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
@endsection