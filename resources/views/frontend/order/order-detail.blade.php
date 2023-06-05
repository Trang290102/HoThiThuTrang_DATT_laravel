@extends('layouts.site')
@section('title', 'Danh sách đơn hàng')
@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-5">
             <h3>THÔNG TIN KHÁCH HÀNG</h3>

            <table>
                <tr>
                    <td style="width:170px;"> <h5>Mã đơn hàng</h5>  </td>
                    <td><b>{{$order->id}}</b></td>
                </tr>
                <tr>
                    <td> <h5> Họ và tên người nhận</h5> </td>
                    <td>
                        {{ $order->name}}
                    </td>
                </tr>
                <tr>
                  <td><h5>Số điện thoại</h5></td>
                  <td>{{ $order->phone}}</td>
                </tr>
                <tr>
                  <td><h5>Địa chỉ</h5></td>
                  <td>{{ $order->address}}</td>
                </tr>
                <tr>
                  <td><h5>Ghi chú</h5></td>
                  <td>{{ $order->note}}</td>
                </tr>
                <tr>
                  <td><h5>Thời gian đặt hàng</h5></td>
                  <td>{{ $order->created_at }}</td>
                </tr>
            </table>
            <div style="margin-top:20px;">
                <a href="{{route('donhang.huy',['order'=>$order->id])}}"class="btn btn-danger btn-sm">Hủy đơn hàng</a>
            </div>
        </div>
        <div class="col-md-7">
            <h3 class="py-3">CHI TIẾT ĐƠN HÀNG</h3>
            @php
                $total = 0;
            @endphp
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width:50px;">STT</th>
                        <th style="width:90px;" >Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=0;
                    @endphp
                  @foreach ($orderdetail as $item)
                  @php
                    $product=$item->productdetail;
                    $ten=$product["name"];
                    $slug=$product["slug"];
                    $product_image= $product->productimg;
                    if(count($product_image)>0)
                    $hinh="";
                    {
                        $hinh=$product_image[0]["image"];
                    }
                    $total+=$item->amount;
                    $i++;
                  @endphp       

                  <tr> 
                    <td class="text-center">{{$i}}</td>
                    <td>
                        <a href="{{route('slug.home',['slug'=>$slug])}}"><img class="img-fluid w-100" style="width:60px;" src="{{asset('public/images/product/'.$hinh)}}" alt="$hinh"></a>
                    </td>
                    <td><p><a href="{{route('slug.home',['slug'=>$slug])}}" style="color:black;">{{$ten}}</a></p></td>
                    <td>{{number_format($item->price)}} VNĐ x {{$item->qty}}</td>
                </tr>
                  @endforeach
                </tbody>        
            </table>
            <h4 class="text-right">Tổng trị giá: <span class="text-danger">{{number_format($total)}} VNĐ</span> </h4>
        </div>
    </div>
     
    @switch($order->status)
    @case(0)
        <div class="alert alert-danger mt-3" style="background-color:#fd7c7aad; color:rgb(123, 28, 28);">
            <p class="icontext text-left"><i class="icon text-danger fa fa-ban"></i> Đơn hàng đã được hủy. </p>
        </div>
      @break
    @case(1)
        <div class="alert mt-3" style="background-color:#7e7afdbc; color:white;">
            <p class="icontext text-left"><i class="icon text-white fa fa-exclamation"></i> Chờ xác nhận đơn hàng. Nếu quá 24h mà đơn hàng chưa được xác nhận, vui lòng liên hệ 0975 030 513. </p>
        </div>
      @break
    @case(2)
        <div class="alert mt-3" style="background-color:#2cdba7;">
            <p class="icontext text-left"><i class="icon fa fa-check"></i> Đơn hàng đã được xác nhận, sẽ giao đến đơn vị vận chuyển trong thời gian sớm nhất!</p>
        </div>
          @break
    @case(3)
    <div class="alert alert-info  mt-3">
        <p class="icontext text-left"><i class="icon text-info fa fa-archive"></i> Đơn hàng đang được chuẩn bị, sẽ giao đến đơn vị vận chuyển trong thời gian sớm nhất!</p>
    </div>  
          @break
    @case(4)
        <div class="alert alert-warning mt-3" style="background-color:#fe9655;color:white;">
            <p class="icontext text-left"><i class="icon text-white fa fa-truck"></i>  Đang giao hàng.</p>
        </div>
      @break
    @case(5)
        <div class="alert alert-success mt-3">
            <p class="icontext text-left"><i class="icon text-success fa fa-check"></i>  Đơn hàng được giao thành công. Cảm ơn quý khách đã mua hàng.</p>
        </div>        
    @break
    @case(6)
    <div class="alert alert-danger mt-3">
        <p class="icontext text-left"><i class="icon text-danger fa fa-ban"></i>  Giao hàng thất bại. Quý khách vui lòng liên hệ với chúng tôi để biết rõ trạng thái đơn hàng.</p>
    </div>      
    @break
    @default
  @endswitch



  {{-- <div class="alert alert-danger mt-3" style="background-color:#fd7c7aad; color:rgb(123, 28, 28);">
    <p class="icontext text-left"><i class="icon text-danger fa fa-ban"></i> Đơn hàng đã được hủy. </p>
</div>
<div class="alert mt-3" style="background-color:#7e7afdbc; color:white;">
    <p class="icontext text-left"><i class="icon text-white fa fa-exclamation"></i> Chờ xác nhận đơn hàng. Nếu quá 24h mà đơn hàng chưa được xác nhận, vui lòng liên hệ 0975 030 513. </p>
</div>

<div class="alert mt-3" style="background-color:#2cdba7;">
    <p class="icontext text-left"><i class="icon  fa fa-check"></i> Đơn hàng đã được xác nhận, sẽ giao đến đơn vị vận chuyển trong thời gian sớm nhất!</p>
</div>
<div class="alert alert-info  mt-3">
    <p class="icontext text-left"><i class="icon text-info fa fa-archive"></i> Đơn hàng đang được chuẩn bị, sẽ giao đến đơn vị vận chuyển trong thời gian sớm nhất!</p>
</div>
  <div class="alert alert-warning mt-3" style="background-color:#fb9d62;color:white;">
    <p class="icontext text-left"><i class="icon text-white fa fa-truck"></i>  Đang giao hàng.</p>
</div>
  <div class="alert alert-success mt-3">
    <p class="icontext text-left"><i class="icon text-success fa fa-check"></i>  Đơn hàng được giao thành công. Cảm ơn quý khách đã mua hàng.</p>
</div>   
<div class="alert alert-danger mt-3">
    <p class="icontext text-left"><i class="icon text-danger fa fa-ban"></i>  Giao hàng thất bại. Quý khách vui lòng liên hệ với chúng tôi để biết rõ trạng thái đơn hàng.</p>
</div>   --}}
</div>
  @endsection
