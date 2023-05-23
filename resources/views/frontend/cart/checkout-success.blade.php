@extends('layouts.site')
@section('title', 'Đặt hàng thành công')
@section('header')
<style>
.ripple-success{
    border-radius: 50%;
    /* display:block; */
    width:170px;
    height:170px;
    animation-name: ripple;
    animation-duration: 1.5s;
    animation-iteration-count: infinite;
    animation-fill-mode: both;
}
@keyframes ripple{
    0%{
        box-shadow: 0 0 0 5px #0e2cb48d, 0 0 0 5px #0e2cb48d;
    }
    70%{
        box-shadow: 0 0 0 10px #83b1ee44, 0 0 0 10px #83b1ee44;
    }
    100%{
        box-shadow: 0 0 0 20px rgba(27, 11, 105, 0), 0 0 0 20px rgba(25, 11, 11, 0);
    }
}
</style>
@endsection
@section('content')

    <div class="container my-4" style="text-align:center;">
        <span style="text-align:center;"><img class="ripple-success" src="{{asset('public/images/success.png')}}" alt="success.png"></span>
        <h2 >Đặt hàng hành công!</h2>
        <h3>Vui lòng kiểm tra gmail <span>{{Auth()->guard('customer')->user()->email}}</span> để xem lại thông tin đơn hàng.</h3>
        {{-- <div style="margin-bottom:30px;">
            <h2>Chi tiết đơn đặt hàng</h2>
            <table border="1" cellspacing="0" cellpadding="10" style="width:100%">
                <thead>
                    <tr>
                        <td>STT</td>
                        <td>Tên sản phẩm</td>
                        <td>Giá</td>
                        <td>Số lượng</td>
                        <td>Thành tiền</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($cart->items as $item)
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{$item['name']}}
                        </td>
                        <td>
                            <p>{{number_format($item['price'])}} VNĐ</p>
                        </td>
                        <td>
                            <p>{{$item['quantity']}}</p>
                        </td>
                        <td>
                            <p>{{number_format((int)$item['price']*(int)$item['quantity'])}} VNĐ</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h3 style="text-align:right;">Tổng giá trị: {{number_format($cart->total_price)}} VNĐ</h3>
        </div> --}}
        <div style="margin-bottom:30px;">
            <h3 class="py-3">CHI TIẾT ĐƠN HÀNG</h3>
            @php
                $total = 0;
            @endphp
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        {{-- <th style="width:50px;">#</th> --}}
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

                    // $product_image= $product->productimg;
                    // if(count($product_image)>0)
                    // $hinh="";
                    // {
                    //     $hinh=$product_image[0]["image"];
                    // }
                    $total+=$item->amount;
                  @endphp       

                    <tr> 
                        {{-- <td style="text-align:center;">{{$item->product_id}}</td> --}}
                        {{-- <td>
                        <img class="img-fluid" src="{{asset('public/images/product/'.$hinh)}}" alt="{{ $hinh }}">
                        </td> --}}
                        <td>{{$ten}}</td>
                        <td>{{number_format($item->price)}} VNĐ</td>
                        <td>{{$item->qty}}</td>
                        <td>{{number_format($item->amount)}} VNĐ</td>
                    </tr>
                    {{-- <tr>
                        <th>Tổng Tiền</th>
                        <th> {{number_format($total)}} VNĐ</th>
                    </tr> --}}
                  @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <th colspan="4" class="text-center py-2">
                        </th>
                        <th>Tổng Tiền</th>
                        <th> {{number_format($total)}} VNĐ</th>
                    </tr>
                </tfoot> --}}
            </table>
            <h3 style="text-align:right;">Tổng giá trị: {{number_format($total)}} VNĐ</h3>
        </div>
        <div class="alert alert-success mt-3">
            <p class="icontext text-left"><i class="icon text-success fa fa-truck"></i> Giao hàng miễn phí trong vòng 1-2 tuần.</p>
        </div>
               
    </div>     
@endsection
