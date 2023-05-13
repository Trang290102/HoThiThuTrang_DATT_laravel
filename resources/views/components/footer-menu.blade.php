<div class="container">
    <div class="row">


        {{-- @foreach ($list_menu as $row_menu)
        @if ($row_menu->MenuSub->count())
                <li class="dropdown"><a href="{{route('slug.home',['slug'=>$row_menu->link])}}">{{$row_menu->name}}<i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                        @foreach ($row_menu->MenuSub as $menu_sub)
                        @if($menu_sub->status==1)
                            <li><a href="{{route('slug.home',['slug'=>$menu_sub->link])}}">{{$menu_sub->name}}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </li>
            @else
                <li><a href="{{route('slug.home',['slug'=>$row_menu->link])}}">{{$row_menu->name}}</a></li>
            @endif
        @endforeach --}}


        @foreach ($list_menu as $row_menu)
        @if ($row_menu->MenuSub->count())
        <div class="col-sm-2">
            <div class="single-widget">
                <h2>{{$row_menu->name}}</h2>
                <ul class="nav nav-pills nav-stacked">
                    @foreach ($row_menu->MenuSub as $menu_sub)
                    @if($menu_sub->status==1)
                        <li><a href="{{route('slug.home',['slug'=>$menu_sub->link])}}">{{$menu_sub->name}}</a></li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        @endforeach

        <div class="col-sm-3 col-sm-offset-1">
            <div class="single-widget">
                <h2>THông tin liên hệ</h2>
                <address>
                    <p>TrangShop Inc.</p>
                    <p>SĐT: +0975 030 513</p>
                    <p>Email: hothutrang421@gmail.com</p>
                    <p>Địa chỉ: 103 Tăng Nhơn Phú, Phước Long B, tp.Thủ Đức, TP.HCM</p>
                </address>
                <div class="social-networks">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
