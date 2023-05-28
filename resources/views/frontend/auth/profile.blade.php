
@extends('layouts.site')
@section('title', 'Thông tin')
@section('header')
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
{{-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{asset('public/css/style-profile.css')}}" rel="stylesheet">

@endsection
@section('content')
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
body {
	background: #f9f9f9;
	font-family: "Roboto", sans-serif;
}

.shadow {
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1) !important;
}

.profile-tab-nav {
	min-width: 250px;
}

.tab-content {
	flex: 1;
}

.form-group {
	margin-bottom: 1.5rem;
}

.nav-pills a.nav-link {
	padding: 15px 20px;
	border-bottom: 1px solid #ddd;
	border-radius: 0;
	color: #333;
}
.nav-pills a.nav-link i {
	width: 20px;
}

.img-circle img {
	height: 170px;
	width: 170px;
	border-radius: 100%;
	border: 5px solid #fff;
}
</style>
<body>
	{{-- <h2 class="mb-4 text-center"> <b>Cài đặt tài khoản</b></h2> --}}

	<section class="py-5 my-5">
		<div class="container">
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							@if(Auth::guard('customer')->user()->gender=1)
							<img src="{{asset('public/images/male.jpg')}}" style="margin-top:20px" alt="Image" class="shadow">
							@else
							<img src="{{asset('public/images/female.jpg')}}" alt="Image" class="shadow">
							@endif
						</div>
						<h4 class="text-center">{{Auth::guard('customer')->user()->name}}</h4>
					</div>
				</div>
				<div style="margin:30px; padding-bottom:20px;">
					<form action="{{ route('postprofile')}}" method="post" enctype="multipart/form-data">
					@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Họ và tên</label>
								  	<input type="text" name="name" class="form-control" value="{{Auth::guard('customer')->user()->name}}">
								</div>
								<div class="form-group">
									<label>Tên đăng nhập</label>
									<input type="text" name="username" class="form-control" value="{{Auth::guard('customer')->user()->username}}">
							  	</div>
								<div class="form-group">
									<label for="gender">Giới tính</label>
									<select class="form-control" name="gender" id="gender">
										@php
											$gender=Auth::guard('customer')->user()->gender;
										@endphp
										<option value="1" {{ ((int)$gender==1)?'selected':''}}>Nam</option>
										<option value="0" {{ ((int)$gender==0)?'selected':''}}>Nữ</option>
									</select>								
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label>Số điện thoại</label>
									<input type="text" name="phone" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" value="{{Auth::guard('customer')->user()->phone}}">
							  </div>
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="email" name="email" class="form-control" value="{{Auth::guard('customer')->user()->email}}">
								</div>
								<div class="form-group">
									<label>Địa chỉ</label>
									<input type="text" name="address" class="form-control" value="{{Auth::guard('customer')->user()->address}}">
							  </div>
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-info">Cập nhật</button>
						</form>
							<button type="reset" unset class="btn btn-light">Hủy</button>
						</div>
				</div>
				
					{{-- <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Thay đổi mật khẩu</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Mật khẩu hiện tại</label>
								  	<input type="password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Mật khẩu mới</label>
								  	<input type="password" name="password_new" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Xác nhập mật khẩu mới</label>
								  	<input type="password" name="password_re" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-info">Cập nhật</button>
							<button class="btn btn-light">Hủy</button>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</section>
@endsection
@section('footer')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection
