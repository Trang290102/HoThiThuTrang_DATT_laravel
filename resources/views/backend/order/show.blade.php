@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
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
              <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
              <a href="{{ route('order.index') }}" class="btn btn-sm btn-info"><i class="fas fa-reply"></i> Quay về dánh sách</a>
            </div>
           </div>
          </div>
          <div class="card-body">
            @includeIf('backend.message_alert')
            <h3>THÔNG TIN KHÁCH HÀNG</h3>
            <table class="table table-bordered table-striped">
                <tr>
                    <td>Mã Khách Hàng</td>
                    <td>{{ $order->user_id}}</td>
                </tr>
                <tr>
                    <td>Họ Tên Khách Hàng</td>
                    <td>
                        {{ $order->name}}
                    </td>
                </tr>
                <tr>
                  <td>Số điện thoại</td>
                  <td>{{ $order->phone}}</td>
                </tr>
                <tr>
                  <td>Địa chỉ</td>
                  <td>{{ $order->address}}</td>
                </tr>
                <tr>
                  <td>Chi chú của khách hàng</td>
                  <td>{{ $order->note}}</td>
                </tr>
            </table>
            <h3 class="py-3">CHI TIẾT ĐƠN HÀNG</h3>
            @php
                $total =0;
            @endphp
            <table class="table table-bordered table-striped" id="myTable">
                <thead>
                    <tr>
                        <th style="width:50px;">#</th>
                        <th style="width:90px">Hình </th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($orderdetail as $item)
                  @php
                    $product=$item->productdetail;
                    $ten=$product["name"];

                    $product_image= $product->productimg;
                    if(count($product_image)>0)
                    $hinh="";
                    {
                        $hinh=$product_image[0]["image"];
                    }
                    $total+=$item->amount;
                  @endphp       

                  <tr> 
                    <td style="text-align:center;">{{$item->product_id}}</td>
                    <td>
                    <img class="img-fluid" src="{{asset('public/images/product/'.$hinh)}}" alt="{{ $hinh }}">
                    </td>
                    <td>{{$ten}}</td>
                    <td>{{number_format($item->price)}} VNĐ</td>
                    <td>{{$item->qty}}</td>
                    <td>{{number_format($item->amount)}} VNĐ</td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-center py-2">
                            <a href="{{ route('order.delete',['order'=>$order->id]) }}" class="btn btn-sm btn-danger " style="margin-right:5px">
                                <i class="fas fa-times"></i>
                                Hủy
                            </a>
                            <a href="#" class="btn btn-sm btn-secondary " style="margin-right:5px">
                              <i class="fas fa-clipboard-check"></i>
                                Xác Nhận
                            </a>
                            <a href="#" class="btn btn-sm btn-primary " style="margin-right:5px">
                              <i class="fas fa-dolly-flatbed"></i>
                              Chuẩn bị
                            </a>
                            <a href="#" class="btn btn-sm btn-info" style="margin-right:5px">
                              <i class="fas fa-truck"></i>
                                Vận Chuyển
                            </a>
                            <a href="#" class="btn btn-sm btn-success">
                              <i class="fas fa-check"></i>
                                Giao hàng thành công
                            </a>
                            <a href="#" class="btn btn-sm btn-warning">
                              <i class="fas fa-file-invoice-dollar"></i>
                                Xuất Hóa Đơn
                            </a>
                        </th>
                        <th>Tổng Tiền</th>
                        <th> {{number_format($total)}} VNĐ</th>
                    </tr>
                </tfoot>
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
