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
                            <input type="text" name="name" value="{{Auth::guard('customer')->user()->name}}" placeholder="Họ và tên khách hàng">
                            <input type="text" name="email" value="{{Auth::guard('customer')->user()->email}}" placeholder="Email">
                            <input type="text" name="phone" value="{{Auth::guard('customer')->user()->phone}}" placeholder="Số điện thoại">
                            <input type="text" name="address" value="{{Auth::guard('customer')->user()->address}}" placeholder="Địa chỉ">
                        
                    </div>
                </div>
                {{-- <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div> --}}
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Ghi chú đơn hàng</p>
                        <textarea name="note"  placeholder="Ghi chú đơn hàng" rows="6"></textarea>
                    </div>	
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Đặt hàng</button>
    </form>

        <div class="review-payment">
            <h2>Giỏ hàng của bạn</h2>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image" style="width:15%;">Hình ảnh</td>
                        <td class="description" style="width:30%;" >Tên sản phẩm</td>
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
                                {{$item['quantity']}}
                            </p>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price" style="margin-bottom:0px; text-align:center;">$59</p>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h3>Tổng tiền: </h3></td>
                        <td> <h3>{{number_format($cart->total_price)}} VNĐ</h3></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->


@endsection
