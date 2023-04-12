<div>
    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
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
                <div class="col-sm-5">
                    <form action="{{ route('search.home')}}" method="post">
                    
                    @csrf 
                        <div class="search_box pull-right">
                            <input type="text" name="keywordsearch" placeholder="Tìm kiếm sản phẩm" />
                            <input type="submit" name="search" style="margin-top:0;"class="btn btn-primary btn-sm" value="Tìm kiếm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</div>

