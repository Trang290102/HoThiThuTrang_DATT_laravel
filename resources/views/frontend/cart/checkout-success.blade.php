@extends('layouts.site')
@section('title', $row_topic->name)
@section('content')
    <div class="container my-4">
        <h2 style="text-align:center;">Đặt hàng hành công!!!</h2>
        <p style="text-align:center;">Vui lòng check email {{Auth()->guard('customer')->user()->email}} để biết thêm thông tin đơn hàng.</p>      
    </div>     
@endsection
