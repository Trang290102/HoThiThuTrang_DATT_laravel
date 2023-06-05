@extends('layouts.site')
@section('title', 'Danh sách đơn hàng')
@section('content')
<div class="container">

    <div class="card-body">
        <h2 class="text-center"> <b>Danh sách đơn hàng của bạn</b> </h2>
        {{-- @includeIf('backend.message_alert') --}}
        <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th>Thứ tự</th>
                <th class="text-center">Mã đơn hàng</th>
                <th class="text-center">Ngày đặt hàng</th>
                <th class="text-center">Trạng thái đơn hàng</th>
                <th></th>
                {{-- <th style="width: 20%">
                </th> --}}
            </tr>
        </thead>
        <tbody>
            @php
                $i=1;
            @endphp
            @foreach ($list_order as $order)
            <tr>
                <td>{{$i}}</td>
                <td class="text-center">{{$order->id}}</td>
                <td class="text-center">{{$order->created_at}}</td>
                <td class="text-center">
                  @switch($order->status)
                    @case(0)
                      <p style="color:rgb(208, 43, 25)"><b>Đã hủy</b></p>
                      @break
                    @case(1)
                      <p style="color:rgb(249, 156, 15)"><b>Chờ xác nhận</b></p>
                      {{-- <div class="alert mt-3" style="background-color:#7e7afdbc; color:white;">
                        <p class="icontext text-left"><i class="icon text-white fa fa-exclamation"></i> Chờ xác nhận</p>
                    </div> --}}
                      @break
                    @case(2)
                      <p style="color:rgb(11, 104, 233)"><b>Đã xác nhận</b></p>
                      @break
                    @case(3)
                      <p style="color:rgb(60, 217, 209)"><b>Chuẩn bị</b></p>
                      @break
                    @case(4)
                      <p style="color:rgb(49, 162, 228)"><b>Giao hàng</b></p>
                      @break
                    @case(5)
                      <p style="color:rgb(22, 222, 39)"><b>Giao hàng thành công</b></p>
                      @break
                    @case(6)
                    <p style="color:gray"><b>Giao hàng thất bại</b></p>
                    @break
                    @default
                  @endswitch
                </td>
                <td class="text-center">
                    @if ($order->status == 1)
                    <a  href="{{ route('donhang.chitiet',['order'=>$order->id]) }}">
                        <b style="color:green;">Chi tiết đơn hàng</b> 
                    </a>
                <br/>
                    <a href="{{ route('donhang.huy',['order'=>$order->id]) }}">
                     <b style="color:red;">Hủy đơn hàng</b> 
                  </a>
                    @else
                    <a  href="{{ route('donhang.chitiet',['order'=>$order->id]) }}">
                        <b style="color:green;">Chi tiết đơn hàng</b> 
                    </a>
                    @endif
                </td>
            </tr>
            @php
                $i++;
            @endphp
            @endforeach
        </tbody>
    </table>
      </div>
      <!-- /.card-body --> 
</div>
@endsection