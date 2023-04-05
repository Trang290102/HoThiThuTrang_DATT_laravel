<div>
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            @foreach ($list_menu as $row_menu)
                            <li><a href="{{route('slug.home',['slug'=>$row_menu->link])}}">{{$row_menu->name}}</a></li>
                            @endforeach
                            {{-- <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li> --}}
                            <li class="dropdown"><a href="#">Danh mục sản phẩm<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="shop.html">Sản phẩm</a></li>
                                    <li><a href="product-details.html">Sản phẩm chi tiết</a></li>
                                    <li><a href="checkout.html">Sản phẩm</a></li>
                                    <li><a href="cart.html">Sản phẩm</a></li>
                                    <li><a href="login.html">Sản phẩm</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="blog.html">Danh mục tin tức</a></li>
                                    <li><a href="blog-single.html">Danh mục tin tức</a></li>
                                </ul>
                            </li>
                            <li><a href="contact-us.html">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Tìm kiếm" />
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
    </div>