@extends('layouts.admin')
@section('title', 'Cập nhật người dùng')
@section('content')

<form action="{{ route('user.update',['user'=>$user->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
@csrf
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật người dùng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Cập nhật người dùng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
           <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Lưu[Cập nhật]</button>
                <a href="{{ route('user.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <div class="row">
              <div class="col-md-6">
                
                <div class="mb-3">
                 <label for="username">Họ tên người dùng</label> 
                 <input type="text" name="username" value="{{ old('username',$user->username) }}" id="username" class="form-control"
                  placeholder="Nhập họ tên người dùng">
                  @if($errors->has('username'))
                  <div class="text-danger">
                    {{$errors->first('username')}}
                  </div>
                  @endif
                </div>

                <div class="mb-3">
                  <label for="name">Tên đăng nhập</label> 
                  <input type="text" name="name" value="{{ old('name',$user->name) }}" id="name" class="form-control"
                   placeholder="Nhập tên đăng nhập">
                   @if($errors->has('name'))
                   <div class="text-danger">
                     {{$errors->first('name')}}
                   </div>
                   @endif
                 </div>

                <div class="mb-3">
                 <label for="email">Email</label> 
                 <input type="text" name="email" value="{{ old('email',$user->email) }}" id="email" class="form-control"
                  placeholder="Nhập email">
                  @if($errors->has('email'))
                  <div class="text-danger">
                    {{$errors->first('email')}}
                  </div>
                  @endif
                </div>

                <div class="mb-3">
                  <label for="phone">Số điện thoại</label> 
                  <input type="text" name="phone" value="{{ old('phone',$user->phone) }}" id="phone" class="form-control"
                   placeholder="Nhập số điện thoại">
                   @if($errors->has('phone'))
                   <div class="text-danger">
                     {{$errors->first('phone')}}
                   </div>
                   @endif
                 </div>
                 <div class="mb-3">
                  <label for="address">Địa chỉ</label> 
                  <input type="text" name="address" value="{{ old('address',$user->address) }}" id="address" class="form-control"
                   placeholder="Nhập địa chỉ">
                   @if($errors->has('address'))
                   <div class="text-danger">
                     {{$errors->first('address')}}
                   </div>
                   @endif
                 </div>

                {{-- <div class="mb-3">
                 <label for="password">Mật khẩu</label> 
                 <input type="password" name="password" value="{{ old('password',$user->password) }}" id="password" class="form-control"
                  placeholder="Nhập password">
                  @if($errors->has('password'))
                  <div class="text-danger">
                    {{$errors->first('password')}}
                  </div>
                  @endif
                </div>

                <div class="mb-3">
                 <label for="password_re">Xác nhận mật khẩu</label> 
                 <input type="password" name="password_re" value="{{old('password_re')}}" id="password_re" class="form-control"
                  placeholder="Xác nhận mật khẩu">
                  @if($errors->has('password_re'))
                  <div class="text-danger">
                    {{$errors->first('password_re')}}
                  </div>
                  @endif
                </div> --}}


              </div>
              <div class="col-md-6"> 

                <div class="mb-3">
                 <label for="gender">Giới tính</label> 
                 <select class="form-control" name="gender" id="gender">
                    <option value="1" {{ ($user->gender==1)?'selected':''}}>Nam</option>
                    <option value="0" {{ ($user->gender==0)?'selected':''}}>Nữ</option>
                 </select>
                 @if($errors->has('gender'))
                  <div class="text-danger">
                    {{$errors->first('gender')}}
                  </div>
                  @endif
                </div>
                <div class="mb-3">
                  <label for="roles">Phận sự</label> 
                  <select class="form-control" name="roles" id="roles">
                    <option value="1" {{ ($user->roles==1)?'selected':''}}>Admin</option>
                    <option value="0" {{ ($user->roles==0)?'selected':''}}>User</option>
                  </select>
                  @if($errors->has('roles'))
                   <div class="text-danger">
                     {{$errors->first('roles')}}
                   </div>
                   @endif
                 </div>

                <div class="mb-3">
                 <label for="image">Hình đại diện</label> 
                 <input type="file" name="image" value="{{ old('image')}}" id="image" class="form-control-file">
                </div>

                
                <div class="mb-3">
                 <label for="status">Trạng thái</label> 
                 <select class="form-control" name="status" id="status">
                  <option value="1" {{ ($user->status==1)?'selected':''}}>Xuất bản</option>
                  <option value="2" {{ ($user->status==2)?'selected':''}}>Chưa xuất bản</option>
                 </select>
                </div>

              </div>

            </div>
           
          </div>

        </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
  
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
</form>

  @endsection
