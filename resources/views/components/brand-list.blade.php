@if (count($list_brand)>0)
<div>
    <h2>Thương hiệu</h2>
    <div class="panel-group category-products" id="accordian"><!--brand-product-->
        @foreach ($list_brand as $brand)
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{route('slug.home',['slug'=>$brand->slug])}}">{{$brand->name}}</a></h4>
            </div>
        </div>
        @endforeach
    </div><!--/brand-product-->
</div>
@endif
