<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <title>@yield('title')</title>
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/responsive.css')}}" rel="stylesheet">
    @yield('header')

    {{-- <link href="{{asset('public/fontawesome/css/all.min.css')}}" rel="stylesheet"> --}}

    <link rel="shortcut icon" href="{{asset('public/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/images/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/images/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/images/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('public/images/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +097 503 0513</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> hothutrang421@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        {{-- <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
 
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img src="{{asset('public/images/logo2.png')}}" alt="" width="270" height="90" /></a>
                        </div>
                       
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                @php
                                    $total = '0';
                                    if ($cart != null) {
                                        $total = $cart->total_quantity;
                                    }
                                @endphp
                                {{-- <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li> --}}
                                {{-- <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Thanh toán</a></li> --}}
                                @if(Auth::guard('customer')->check())
                                <li><a href="{{route('profile')}}"><i class="fa fa-user"></i> {{Auth('customer')->user()->name}}</a></li>
                                <li><a href="{{route('dangxuat')}}"><i class="fa fa-sign-out"></i> Đăng Xuất</a></li>
                                <li><a href="{{route('order.list')}}"><i class="fa fa-truck"></i> Đơn hàng</a></li>

                                @else
                                <li><a href="{{route('getdangnhap')}}"><i class="fa fa-user"></i> Đăng Nhập</a></li>
                                @endif
                                <li><a href="{{route('frontend.cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng
                                    <span id="total-quantity-show">({{$total}})</span> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
        
        <x-main-menu />
    </header><!--/header-->

    

    <section>
        @yield('content')
    </section>
    <footer id="footer"><!--Footer-->
        <div class="footer-widget">
            <x-footer-menu />
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2023 TrangShop. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="#">Hồ Thị Thu Trang</a></span></p>
                </div>
            </div>
        </div>

    </footer><!--/Footer-->
	
    <script src="{{asset('public/js/jquery.js')}}"></script>
	<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('public/js/price-range.js')}}"></script>
    <script src="{{asset('public/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
    <script src="{{asset('public/js/jquery.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if(Session::has('successMessage'))
    <script>
        swal("Thành công!", "{{Session::get('successMessage')}}", "success");
    </script>
    @endif
    @if(Session::has('errorMessage'))
    <script>
        swal("Thất bại!", "{{Session::get('errorMessage')}}", "warning");
    </script>
    @endif
    @if(Session::has('contactMessage'))
    <script>
        swal("Gửi tin thành công!", "{{Session::get('contactMessage')}}", "success");
    </script>
    @endif
    {{-- <script>
        function AddCart(id){
            // console.log(id);
            $.ajax({
                url:'cart/add/'+id,
                type:'GET',
            }).done(function(response){
                RenderCart(response);
				swal("Here's the title!", "...and here's the text!");
			});
        }
        function RenderCart(response) {
            // $("#change-item-cart").empty();
            // $("#change-item-cart").html(response);
            $("#total-quantity-show").text($("#total-quantity-cart").val());
        }
    </script> --}}


    @yield('footer')
</body>
</html>