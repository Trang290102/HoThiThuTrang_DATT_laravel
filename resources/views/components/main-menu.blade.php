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
                                            @if($menu_sub->status==1)
                                                <li><a href="{{route('slug.home',['slug'=>$menu_sub->link])}}">{{$menu_sub->name}}</a></li>
                                            @endif
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
                    <form action="{{ route('search.home')}}" method="post">
                    @csrf 
                        <div class="search_box pull-right">
                            <input type="text" name="keywordsearch" placeholder="Tìm kiếm sản phẩm" />
                            {{-- <input type="submit" name="search" style="margin-top:0;"class="btn btn-primary btn-sm" value="Tìm kiếm"> --}}
                            <button type="submit" name="search" style="margin-top:0;    padding: 7.2px 10px;" class="btn btn-primary ">
                                <img  style="width:18px;    height: 18px;" src="{{asset('public/images/Daco_5441418.png')}}" alt="searchicon.png">
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</div>

