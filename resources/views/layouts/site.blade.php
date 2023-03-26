<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">  
    <link href="{{asset('public/owlcarousel/assets/owl.theme.default.min.css')}}" rel="stylesheet">  
    
    {{-- <link href="{{asset('public/fontawesome/css/all.min.css')}}" rel="stylesheet"> --}}


    <link rel="shortcut icon" href="public/images/favicon.ico">
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
                                <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
 
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/trang-chu')}}"><img src="{{('public/images/logo2.png')}}" alt="" width="270" height="100" /></a>
                        </div>
                       
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                <li><a href="login.html"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
        <x-main-menu />
    </header><!--/header-->

    

    <section>
        <div class="container">
            {{-- <div class="row"> --}}
                {{-- <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục loại sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Túi xách
                                        </a>
                                    </h4>
                                </div>
                                <div id="sportswear" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Xem tất cả túi xách </a></li>
                                            <li><a href="#">Túi xách da thật </a></li>
                                            <li><a href="#">Túi xách tay </a></li>
                                            <li><a href="#">Túi đeo chéo</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#mens">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Phụ kiện
                                        </a>
                                    </h4>
                                </div>
                                <div id="mens" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <li><a href="#">Xem tất cả phụ kiện</a></li>
                                            <li><a href="#">Thắt lưng</a></li>
                                            <li><a href="#">Mũ/nón</a></li>
                                            <li><a href="#">Túi dệt/lưới</a></li>
                                            <li><a href="#">Tất/vớ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Balo</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Ví bóp</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Mắt kính</a></h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="#">Khăn mùi xoa</a></h4>
                                </div>
                            </div>
                            
                        </div><!--/category-products-->

                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#"></span>Thương hiệu 1</a></li>
                                    <li><a href="#"></span>Thương hiệu 2</a></li>
                                    <li><a href="#"></span>Thương hiệu 3</a></li>
                                    <li><a href="#"></span>Thương hiệu 4</a></li>
                                    <li><a href="#"></span>Thương hiệu 5</a></li>
                                    <li><a href="#"> <span class="pull-right">(9)</span>Thương hiệu 6</a></li>
                                
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                        

                        <div class="shipping text-center" ><!--shipping-->
                            <img src="public/images/festive-2022-2-b-2.gif" alt="" width="260" height="350" />
                        </div><!--/shipping-->

                    </div>
                </div> --}}
                
                {{-- <div class="col-sm-9 padding-right"> --}}
                   @yield('content')
                {{-- </div> --}}


            {{-- </div> --}}
        </div>
    </section>
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <div class="logo pull-left">
                                <a href="{{URL::to('/trang-chu')}}"><img src="{{('public/images/logo2.png')}}" alt="" width="170" height="60" /></a>
                            </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/images/iframe1.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/images/iframe2.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/images/iframe3.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{('public/images/iframe4.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="images/home/map.png" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Hổ trợ trực tuyến</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Trạng thái đặt hàng</a></li>
                                <li><a href="#">Hỏi đáp</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Cửa hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Túi xách</a></li>
                                <li><a href="#">Balo</a></li>
                                <li><a href="#">Phụ kiện</a></li>
                                <li><a href="#">Kính mắt</a></li>
                                <li><a href="#">Ví bóp</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Chính sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Chính sách hoàn tiền</a></li>
                                <li><a href="#">Thanh toán</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Giới thiệu</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Giới thiệu về TRANG</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Vui lòng điền email" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Nhận các bản cập nhật mới nhất từ<br />trang web của chúng tôi và cập nhật bản thân của bạn ...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
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
    <script src="{{asset('public/owlcarousel/owl.carousel.min.js')}}"></script>

</body>
</html>