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
