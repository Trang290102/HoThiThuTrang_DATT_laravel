@extends('layouts.site')
@section('title', $product->name)
@section('header')
    <link href="{{asset('public/css/style-product-detail.css')}}" rel="stylesheet">
    <link href="{{asset('public/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">  
    <link href="{{asset('public/owlcarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">  
@endsection
@section('footer')
    <script src="{{asset('public/js/script-product-detail.js')}}"></script>
    <script src="{{asset('public/owlcarousel/owl.carousel.min.js')}}"></script>
@endsection
@php
    $product_image= $product->productimg;
    $hinh="";
    if(count($product_image)>0)
    {
        $hinh=$product_image[0]["image"];
    }
    $sale=$product->price_buy;
    if($product->productsale)
    {
        $sale=$product->productsale["price_sale"];
    }
@endphp
@section('content')
<div class="container my-4">
    <div class = "product-div">
        <div class = "product-div-left">
            <div class = "img-container">
                <img src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" />
            </div>
            @if (count($product_image)>1)
            <div class = "hover-container">
                @for ($i=0; $i <= count($product_image)-1; $i++)
                @php
                    $hinh=$product_image[$i]["image"];
                @endphp
                <div><img src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" /></div>
                @endfor
            </div>
            @endif
        </div>
        <div class = "product-div-right">
            <form action="{{route('cart.add',['id'=>$product->id])}}" method="get" accept-charset="utf-8">
            <div class="product-information">
                <span class = "product-name">{{$product->name}}</span>
                <strong>
                    <span class="product-price">{{number_format($sale)}}<sup>đ</sup></span> 
                    <del>{{number_format($product->price_buy)}}<sup>đ</sup></del>
                </strong>
                <div style="height:150px;">
                    <p class = "product-description">{!!$product->metadesc!!}</p>
                </div>
                {{-- <span>
                    <label>Quantity:</label>
                    <input type="text" value="3" />
                </span> --}}
                <table>
                    <tbody>
                        <tr>
                            <td class="qua-col">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" value="1">
                                    </div>
                                    {{-- <button type="submit" class="btn btn-default" style="height:46px;"><i class="fa fa-arrow-circle-o-right"></i></button> --}}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    
                    {{-- <div class="quantity_button">
                        <input class="cart_quantity_input" style="width:60px;height:33px;border-radius:4px;border: 1px solid;margin-left:15px;" type="number" min="1" name="quantity" value="1" autocomplete="off" size="1">
                    </div> --}}
                <div class = "btn-groups">
                    <button type = "submit" class = "add-cart-btn"><i class = "fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                    <button type = "button" class = "buy-now-btn"><i class="fas fa-wallet"></i> Mua ngay</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <div class = "product-div-right">
        <div class="product-information">
            <h3>Thông tin chi tiết</h3>
            <p class = "product-description">{!!$product->detail!!}</p>           
        </div>
    </div>

    <div class="my-4">
        <div class="headline">
            <h2 class="category text-center">SẢN PHẨM CÙNG LOẠI</h2>
        </div>
        <div class="owl-carousel owl-theme">
            @foreach($product_list as $row)
            @php
                $product_image= $row->productimg;
                $hinh="";
                if(count($product_image)>0)
                {
                    $hinh=$product_image[0]["image"];
                } 
            @endphp
            <div class="item">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo ">
                            {{-- <img src="{{asset('public/images/product/'.$product->image)}}" alt="" /> --}}
                            <a href="{{route('slug.home',['slug'=>$row->slug])}}">
                                <img class="img-fluid w-100" src="{{asset('public/images/product/'.$hinh)}}" alt="{{$hinh}}" />
                            </a>
                            <div class="productname">
                                <a href="{{route('slug.home',['slug'=>$row->brand_slug])}}"><p>{{$row->brand_name}}</p></a>

                                <a href="{{route('slug.home',['slug'=>$row->slug])}}">
                                    <h2> {{$row->name}}</h2>
                                </a>    
                            </div>
                            <div class="price text-center">
                                <strong>
                                    <span>{{number_format($row->price_buy)}}<sup>đ</sup></span> 
                                    <del>{{number_format($row->price_buy)}}<sup>đ</sup></del>
                                </strong>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--end owl-casousel -->
    </div>
</div>
@endsection
