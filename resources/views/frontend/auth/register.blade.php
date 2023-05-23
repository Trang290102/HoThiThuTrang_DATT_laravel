@extends('layouts.site')
@section('title', 'Đăng ký')
@section('content')
    
<div class="container my-4">
    <div class="row">
        {{-- <div class="col-sm-4"></div> --}}
        <div class="col-sm-6">
            <div class="login-form" style="border-radius:4px;border: 1px solid #cecece; padding: 25px 25px;margin-bottom:20px;"><!--login form-->
                <h2 class="text-center" >Đăng ký tài khoản </h2>
                <form action="{{ route('postregister')}}" method="post" enctype="multipart/form-data">
                    @csrf            
                    <input type="text" name="name" style="border-radius:4px;border: 1px solid #cecece;" value="{{old('name')}}" placeholder="Họ và tên" />
                    @if($errors->has('name'))
                    <div class="text-danger">
                        {{$errors->first('name')}}
                    </div>
                    @endif
                    <input type="text" name="username" style="border-radius:4px;border: 1px solid #cecece;" value="{{old('username')}}" placeholder="Tên đăng nhập" />
                    @if($errors->has('username'))
                    <div class="text-danger">
                        {{$errors->first('username')}}
                    </div>
                    @endif
                    <input type="text" name="phone" style="border-radius:4px;border: 1px solid #cecece;" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('phone')}}" placeholder="Số điện thoại" />
                    @if($errors->has('phone'))
                    <div class="text-danger">
                        {{$errors->first('phone')}}
                    </div>
                    @endif
                    <input type="email" name="email" style="border-radius:4px;border: 1px solid #cecece;" value="{{old('email')}}" placeholder="Email" />
                    @if($errors->has('email'))
                    <div class="text-danger">
                        {{$errors->first('email')}}
                    </div>
                    @endif
                    <input type="text" name="address" style="border-radius:4px;border: 1px solid #cecece;" value="{{old('address')}}" placeholder="Địa chỉ" />
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
                    {{-- <div class="form-group">
                        <label class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" checked="" type="radio" name="gender" value="option1">
                          <span class="custom-control-label"> Male </span>
                        </label>
                        <label class="custom-control custom-radio custom-control-inline">
                          <input class="custom-control-input" type="radio" name="gender" value="option2">
                          <span class="custom-control-label"> Female </span>
                        </label>
                    </div> <!-- form-group end.// -->    --}}

                    <input type="password" name="password" style="border-radius:4px;border: 1px solid #cecece;" value="{{old('password')}}" placeholder="Mật khẩu" />
                    @if($errors->has('password'))
                    <div class="text-danger">
                        {{$errors->first('possword')}}
                    </div>
                    @endif
                    <input type="password" name="password_re" style="border-radius:4px;border: 1px solid #cecece;" placeholder="Xác nhận mật khẩu" />
                    @if($errors->has('password_re'))
                    <div class="text-danger">
                        {{$errors->first('password_re')}}
                    </div>
                    @endif
                    <button type="submit" class="btn btn-info"  style="margin-bottom: 25px;width:100%;height:40px;border-radius:4px;border: 1px solid;">Đăng ký</button>
                </form>
            </div><!--/login form-->
        </div>
        <div class="col-sm-6">
            <img class="img-fluid" style="width: 600px;" src="{{asset('public/images/about-01.jpg')}}" alt="about-01.jpg" />
        </div>
    </div>
</div>
@endsection