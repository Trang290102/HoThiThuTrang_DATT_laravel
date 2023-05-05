@extends('layouts.site')
@section('title', 'giỏ hàng')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        @if (count($cart->items)>0)
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" style="width:15%;">Hình ảnh</td>
                        <td class="description" style="width:30%;">Tên sản phẩm</td>
                        <td class="price" style="width:15%; text-align:center;">Giá</td>
                        <td class="quantity" style="width:15%;">Số lượng</td>
                        <td class="total" style="width:20%; text-align:center;">Thành tiền</td>
                        <td style="width:5%;"></td>
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
                        <td class="cart_description" style="width:400px;">
                            <h4><a href="{{route('slug.home',['slug'=>$item['slug']])}}">{{$item['name']}}</a></h4>
                        </td>
                        <td class="cart_price" style="text-align: center;">
                            <p style="margin-bottom:0px;">{{number_format($item['price'])}} VNĐ</p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <form action="{{route('cart.update',['id'=>$item['id']])}}" method="get" accept-charset="utf-8">
                                    <input class="cart_quantity_input" style="width:60px;height:33px;border-radius:4px;border: 1px solid;" type="number" min="1" name="quantity" value="{{$item['quantity']}}" autocomplete="off" size="1">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                </form>
                            </div>
                        </td>
                        <td class="cart_total" style="text-align: center;">
                            <p class="cart_total_price" style="margin-bottom:0px;">{{number_format((int)$item['price']*(int)$item['quantity'])}} VNĐ</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{route('cart.remove',['id'=>$item['id']])}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h3>Tổng tiền: </h3></td>
                        <td style="text-align: center;"> 
                            <h3>{{number_format($cart->total_price)}} VNĐ</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('frontend.home')}}"class="btn btn-info btn-sm text-right">Tiếp tục mua hàng</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-align: center;">
                            <a href="{{route('cart.clear')}}"class="btn btn-danger btn-sm">Xóa hết</a>
                            <a href="{{route('checkout')}}"class="btn btn-success btn-sm">Đặt hàng</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @else
            <h4 class="text-center">Hiện không có sản phẩm nào trong giỏ hàng!!!</h4>
        @endif
    </div>
</section> <!--/#cart_items-->

@endsection
