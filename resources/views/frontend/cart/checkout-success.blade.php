@extends('layouts.site')
@section('title', 'Đặt hàng')
@section('content')

<section id="cart_items">
    <div class="container">
        <h2 style="text-align:center;">Đặt hàng hành công!!!</h2>
        <p style="text-align:center;">Vui lòng check email {{Auth()->guard('customer')->user()->email}} để biết thêm thông tin đơn hàng.</p>
                
    </div>     

</section> <!--/#cart_items-->


@endsection
