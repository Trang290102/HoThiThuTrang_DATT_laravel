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

    <div class="container my-4" style="text-align:center;height:500px;">
        <span style="text-align:center;"><img class="ripple-success" src="{{asset('public/images/success.png')}}" alt="success.png"></span>
        <h2 >Đặt hàng hành công!</h2>
        <h3>Vui lòng kiểm tra gmail <span>{{Auth()->guard('customer')->user()->email}}</span> để biết chi tiết thông tin đơn hàng.</h3>      
    </div>     
@endsection
