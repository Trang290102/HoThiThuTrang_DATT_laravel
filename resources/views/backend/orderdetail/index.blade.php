@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (order header) -->
        <!-- Main content -->
        <section class="content py-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-danger text-uppercase" > chi tiết đơn hàng </strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('order.index') }}"class="btn btn-sm btn-info">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <h3>THÔNG TIN KHÁCH HÀNG</h3>
                    <table class="table table-bordered table-striped">
                     
                        <tr>
                            <td>Mã Khách Hàng</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Họ Tên Khách Hàng</td>
                            <td>
                             
                            </td>
    
                        </tr>
                     
                    </table>
                    <h3 class="py-3">CHI TIẾT ĐƠN HÀNG</h3>
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th class="text-center" style="width:180px">Hình Sản phẩm</th>
                                <th>Tên Sản phẩm</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            @foreach ($list_orderdetail as $orderdetail)
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{$orderdetail->price}}</td>
                                <td>{{$orderdetail->number}}</td>
                                <td>{{$orderdetail->amount}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-center py-2">
                                    <a href="#" class="btn btn-sm btn-danger " style="margin-right:5px">
                                        <i class="fas fa-window-close"></i>
                                        Hủy
                                    </a>
                                    <a href="#" class="btn btn-sm btn-primary " style="margin-right:5px">
                                        <i class="fas fa-address-card"></i>
                                        Xác Minh
                                    </a>
                                    <a href="#" class="btn btn-sm btn-info" style="margin-right:5px">
                                        <i class="fas fa-bus-alt"></i>
                                        Vận Chuyển
                                    </a>
                                    <a href="#" class="btn btn-sm btn-success">
                                        <i class="fas fa-check-circle"></i>
                                        Thành Công
                                    </a>
                                    <a href="#" class="btn btn-sm btn-success">
                                        
                                        Xuất Hóa Đơn
                                    </a>
                                </th>
                                <th>Tổng Tiền</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
               
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            

        </section>
        <!-- /.content -->
    </div>
@endsection
