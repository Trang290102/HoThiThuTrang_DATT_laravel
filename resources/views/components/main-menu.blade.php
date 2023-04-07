<div>
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            @foreach ($list_menu as $row_menu)
                            @if ($row_menu->MenuSub->count())
                                    <li class="dropdown"><a href="{{route('slug.home',['slug'=>$row_menu->link])}}">{{$row_menu->name}}<i class="fa fa-angle-down"></i></a>
                                        <ul role="menu" class="sub-menu">
                                            @foreach ($row_menu->MenuSub as $menu_sub)
                                                <li><a href="{{route('slug.home',['slug'=>$menu_sub->link])}}">{{$menu_sub->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{route('slug.home',['slug'=>$row_menu->link])}}">{{$row_menu->name}}</a></li>
                                @endif
                            @endforeach
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

