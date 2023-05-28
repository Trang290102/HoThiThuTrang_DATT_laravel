@extends('layouts.admin')
@section('title', 'Khôi phục khách hàng')
@section('content')

@section('header')
<link rel="stylesheet" href="{{asset ('public/jquery.dataTables.min.css')}}">
@endsection
@section('footer')
<script src="{{asset('public/jquery.dataTables.min.js')}}"></script>
<script>
  let table = new DataTable('#myTable');
</script>
@endsection

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Khôi phục khách hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Khôi phục khách hàng</li>
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
            <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-times"></i> Xóa</button>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{ route('customer.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @includeIf('backend.message_alert')
        <table class="table table-bordered table-striped" id="myTable">
          <thead>
            <tr>
              <th style="width:20px;" class="text-center">#</th>
                    <th style="width:100px;" class="text-center">Hình ảnh</th>
                    <th style="width:150px;">Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th style="width:160px;" class="text-center">Ngày tạo</th>
                    <th style="width:150px;" class="text-center">Chức năng</th>
                    <th style="width:20px;" class="text-center">ID</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($list_customer as $customer)
            <tr>
              <td class="text-center"><input type="checkbox"></td>
                    <td><img class="img-fluid" src="{{ asset('public/images/customer/'.$customer->image)}}" alt="{{$customer->image}}"></td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->created_at }}</td>
              <td class="text-center">
                <a href="{{ route('customer.restore',['customer'=>$customer->id]) }}" class="btn btn-primary btn-sm">
                  <i class="fas fa-trash-restore"></i></a>
                <a href="{{ route('customer.destroy',['customer'=>$customer->id]) }}" class="btn btn-danger btn-sm">
                  <i class="fas fa-ban"></i> </a>
              </td>
              <td class="text-center">{{$customer->id}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
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

@endsection