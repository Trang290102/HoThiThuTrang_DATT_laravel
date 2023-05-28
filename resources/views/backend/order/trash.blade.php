@extends('layouts.admin')
@section('title', 'Thùng rác đơn hàng')
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
          <h1>Thùng rác đơn hàng</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
            <li class="breadcrumb-item active">Thùng rác đơn hàng</li>
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
            <a href="{{ route('order.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @includeIf('backend.message_alert')
        <table class="table table-bordered table-striped" id="myTable">
          <thead>
            <tr>
                <th style="width:20px;" class="text-center"> #</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Ghi chú</th>
                <th class="text-center">Ngày mua</th>
                <th style="width:150px;" class="text-center">Chức năng</th>
                <th  style="width:20px;" class="text-center">ID</th>
                {{-- <th style="width: 20%">
                </th> --}}
            </tr>
        </thead>
        <tbody>
          @foreach ($list_order as $order)
          <tr>
              <td class="text-center"><input type="checkbox"></td>
              <td>{{$order->name}}</td>
              <td>{{$order->email}}</td>
              <td>{{$order->phone}}</td>
              <td>{{$order->note}}</td>
              <td class="text-center">{{$order->created_at}}</td>
              <td class="text-center">
                <a href="{{ route('order.destroy',['order'=>$order->id]) }}" class="btn btn-danger btn-sm">
                  <i class="fas fa-ban"></i> Xóa khỏi CSDL </a>

              </td>
              <td class="text-center">{{$order->id}}</td>
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