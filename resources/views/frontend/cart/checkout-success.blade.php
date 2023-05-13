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
        <div style="margin-bottom:30px;">
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
        </div>          
    </div>     
@endsection
