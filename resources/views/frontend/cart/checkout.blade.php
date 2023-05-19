@extends('layouts.site')
@section('title', 'Đặt hàng')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{route('frontend.home')}}">Home</a></li>
              <li class="active">Đặt hàng</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="step-one">
            <h2 class="heading">Đặt hàng</h2>
        </div>
        {{-- <div class="checkout-options">
            <h3>New User</h3>
            <p>Checkout options</p>
            <ul class="nav">
                <li>
                    <label><input type="checkbox"> Register Account</label>
                </li>
                <li>
                    <label><input type="checkbox"> Guest Checkout</label>
                </li>
                <li>
                    <a href=""><i class="fa fa-times"></i>Cancel</a>
                </li>
            </ul>
        </div><!--/checkout-options--> --}}

        {{-- <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req--> --}}

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-4">
                    <div class="shopper-info">
                        <form action="{{ route('checkout')}}" method="post">
                            @csrf
                            <p>Thông tin khách hàng</p>
                            <input type="text" style="border-radius:4px;border: 1px solid #cecece;" name="name" value="{{Auth::guard('customer')->user()->name}}" placeholder="Họ và tên khách hàng">
                            <input type="text" style="border-radius:4px;border: 1px solid #cecece;" name="email" value="{{Auth::guard('customer')->user()->email}}" placeholder="Email">
                            <input type="text" style="border-radius:4px;border: 1px solid #cecece;" name="phone" value="{{Auth::guard('customer')->user()->phone}}" placeholder="Số điện thoại">
                            <input type="text" style="border-radius:4px;border: 1px solid #cecece;" name="address" value="{{Auth::guard('customer')->user()->address}}" placeholder="Địa chỉ">
                            <textarea name="note"  style="border-radius:4px;border: 1px solid #cecece;" placeholder="Ghi chú đơn hàng" rows="7"></textarea>
                    </div>
                </div>
                {{-- <div class="col-sm-4">
                    <div class="order-message">
                        <p>Ghi chú đơn hàng</p>
                        <textarea name="note"  placeholder="Ghi chú đơn hàng" rows="6"></textarea>
                    </div>	
                </div> --}}
                <div class="col-md-8">
                    <p>Chi tiết đơn hàng</p>
                    <table border="1" cellspacing="0" cellpadding="10" style="width:100%">
                        <thead>
                            <tr>
                                <td >STT</td>
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
        </div>
        <div class="alert alert-success mt-3" style="margin:10px 0px;">
            <p class="icontext text-left"><i class="icon text-success fa fa-truck"></i> Giao hàng miễn phí trong vòng 1-2 tuần.</p>
        </div>
        <button type="submit" style="margin-bottom: 25px;width:30%;height:40px;border-radius:4px;border: 1px solid;" class="btn btn-info text-end">Đặt hàng</button>
    </form>
    {{-- <button class="btn btn-success" style="margin-bottom: 25px;"> <a href="{{route('frontend.cart')}}"> </a><i class="fa fa-chevron-left"></i> Về giỏ hàng</button> --}}


        {{-- <div class="review-payment">
            <h2>Chi tiết đơn hàng</h2>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" style="width:15%;">Hình ảnh</td>
                        <td class="description" style="width:30%;" >Sản phẩm</td>
                        <td class="price" style="width:20%; text-align:center;">Giá</td>
                        <td class="quantity" style="width:15%; text-align:center;">Số lượng</td>
                        <td class="total" style="width:20%; text-align:center;">Thành tiền</td>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($cart->items as $item)
                    @php
                        $product_image= $item['image'];
                        $hinh="";
                        if(count($product_image)>0)
                        {
                            $hinh=$product_image[0]["image"];
                        } 
                    @endphp
                    <tr>
                        <td class="cart_product">
                            <a href="{{route('slug.home',['slug'=>$item['slug']])}}"><img class="img-fluid w-100" style="width:70px;" src="{{asset('public/images/product/'.$hinh)}}" alt="$hinh"></a>
                        </td>
                        <td class="cart_description" style="width:400px; text-align:left;">
                            <h4><a href="{{route('slug.home',['slug'=>$item['slug']])}}">{{$item['name']}}</a></h4>
                        </td>
                        <td class="cart_price" >
                            <p style="margin-bottom:0px; text-align:center;">{{number_format($item['price'])}} VNĐ</p>
                        </td>
                        <td class="cart_quantity">
                            <p style="margin-bottom:0px;" class="text-center">
                               x {{$item['quantity']}}
                            </p>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price" style="margin-bottom:0px; text-align:center;">{{number_format((int)$item['price']*(int)$item['quantity'])}} VNĐ</p>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h3>Tổng tiền: </h3></td>
                        <td style="text-align:center;"> <h3>{{number_format($cart->total_price)}} VNĐ</h3></td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
    </div>
</section> <!--/#cart_items-->


@endsection
