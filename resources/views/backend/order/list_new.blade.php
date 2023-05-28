@extends('layouts.admin')
@section('title', 'Danh sách đơn hàng mới')
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
            <h1>Danh sách đơn hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">bảng điều khiển</a></li>
              <li class="breadcrumb-item active">Danh sách đơn hàng mới</li>
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
              <a href="{{ route('order.new') }}" class="btn btn-sm btn-secondary"> <i class="fas fa-check"></i>Chưa xác nhận</a>
              <a href="{{ route('order.listxacnhan') }}" class="btn btn-sm btn-info"> <i class="fas fa-check"></i>Đã xác nhận</a>
            </div>
            <div class="col-md-6 text-right">
              <a href="{{ route('order.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>

                <a href="{{ route('order.trash') }}" class="btn btn-sm btn-danger"> <i class="fas fa-times"></i> Thùng rác</a>
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
                    <th>Số điện thoại</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th class="text-center">Ngày mua</th>
                    <th class="text-center">Chức năng</th>
                    <th  class="text-center">ID</th>
                    {{-- <th style="width: 20%">
                    </th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($list_order as $order)
                <tr>
                    <td class="text-center"><input type="checkbox"></td>
                    <td>{{$order->name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->note}}</td>
                    <td>
                      @switch($order->status)
                        @case(1)
                          <p style="color:rgb(254, 100, 54)"><b>Chờ xác nhận</b></p>
                          @break
                        @case(2)
                          <p style="color:rgb(11, 104, 233)"><b>Đã xác nhận</b></p>
                          @break
                        @case(3)
                          <p style="color:rgb(7, 158, 145)"><b>Chuẩn bị</b></p>
                          @break
                        @case(4)
                        <p style="color:rgb(245, 199, 16)"><b>Giao hàng</b></p>
                        @break
                        @case(5)
                          <p style="color:rgb(7, 220, 82)"><b>Giao hàng thành công</b></p>
                          @break
                        @case(6)
                          <p style="color:gray"><b>Giao hàng thất bại</b></p>
                          @break
                      
                        @default
                          
                      @endswitch
                    </td>
                    <td class="text-center">{{$order->created_at}}</td>
                    <td class="text-center">
                        <a  href="{{ route('order.show',['order'=>$order->id]) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye"></i>Xem
                        </a>
                        
                        <a href="{{ route('order.delete',['order'=>$order->id]) }}" class="btn btn-sm btn-danger " style="margin-right:5px">
                          <i class="fas fa-times"></i>
                          Hủy
                      </a>
                      <a href="{{ route('order.xacnhan',['order'=>$order->id]) }}" class="btn btn-sm btn-success " style="margin-right:5px">
                        <i class="fas fa-clipboard-check"></i>
                          Xác Nhận
                      </a>
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
