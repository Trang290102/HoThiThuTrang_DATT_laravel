@extends('layouts.site')
@section('title', 'Giỏ hàng')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <h2 class="text-center">Giỏ hàng</h2>

        <div class="table-responsive cart_info">
            @if (count($cart->items)>0)
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        {{-- <td class="image" style="width:15%;">id</td> --}}
                        <td class="image" style="width:15%;">Hình ảnh</td>
                        <td class="description" style="width:30%;">Tên sản phẩm</td>
                        <td class="price" style="width:15%; text-align:center;">Giá</td>
                        <td class="quantity" style="width:15%; text-align:center;">Số lượng</td>
                        <td class="total" style="width:20%; text-align:center;">Thành tiền</td>
                        <td style="width:5%;"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->items as $item)
                    @php
                        $product_image= $item['image'];
                        $hinh="";
                        if(count($product_image)>0)
                        {
                            $hinh=$product_image[0]["image"];
                        }
                        // $qty=0;
                        // if($product->productstore)
                        // {
                        //     $qty=$product->productstore["qty"];
                        // }


                        // $store=$productstore->qty;
                       
                        // if($item["quantity"] > $store)
                        // {
                        //     $qty=-1;
                        // }
                    @endphp
                    <tr>
                        {{-- <td>{{$item['id']}}</td> --}}
                        <td class="cart_product">
                            <a href="{{route('slug.home',['slug'=>$item['slug']])}}"><img class="img-fluid w-100" style="width:70px;" src="{{asset('public/images/product/'.$hinh)}}" alt="$hinh"></a>
                        </td>
                        <td class="cart_description" style="width:400px;">
                            <h4><a href="{{route('slug.home',['slug'=>$item['slug']])}}">{{$item['name']}}</a></h4>
                        </td>
                        <td class="cart_price" style="text-align: center;">
                            <p style="margin-bottom:0px;">{{number_format($item['price'])}} VNĐ</p>
                        </td>
                        <td class="qua-col">
                            {{-- @if($store!=0)
                                @if ($item["quantity"] > $store)
                                    <div class="quantity" style="justify-content: center;">
                                        <form action="{{route('cart.update',['id'=>$item['id']])}}" method="get" accept-charset="utf-8">
                                            <div class="pro-qty">
                                                <input type="text" name="quantity" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" data-id="{{$item['id']}}" value="{{$item['quantity']}}">
                                            </div>
                                            <button type="submit" class="btn btn-default" style="height:46px;"><i class="fa fa-arrow-circle-o-right"></i></button>
                                        </form>
                                    </div>
                                    <p style="font-color:red;">Số lượng hàng trong kho không đủ!!!</p>
                                    {{$productstore->qty}}
                                @else --}}
                                    <div class="quantity" style="justify-content: center;">
                                        <form action="{{route('cart.update',['id'=>$item['id']])}}" method="get" accept-charset="utf-8">
                                            <div class="pro-qty">
                                                <input type="text" name="quantity" spellcheck="false" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" data-id="{{$item['id']}}" value="{{$item['quantity']}}">
                                            </div>
                                            <button type="submit" class="btn btn-default" style="height:46px;"><i class="fa fa-arrow-circle-o-right"></i></button>
                                        </form>
                                    </div>
                                {{-- @endif
                            @else
                                <img class="img-fluid w-100" style="margin:auto;" src="{{asset('public/images/sold_out.png')}}" alt="sold_out.png" />
                            @endif --}}
                        </td>          
                        <td class="cart_total" style="text-align: center;">
                            <p class="cart_total_price" style="margin-bottom:0px;">{{number_format((int)$item['price']*(int)$item['quantity'])}} VNĐ</p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" href="{{route('cart.remove',['id'=>$item['id']])}}"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><h3>Tổng tiền: </h3></td>
                        <td style="text-align: center;"> 
                            <h3>{{number_format($cart->total_price)}} VNĐ</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{route('frontend.home')}}"class="btn btn-info btn-sm text-right">Tiếp tục mua hàng</a>
                        </td>
                        <td></td>
                        <td></td>
                        <td class="btn btn-primary btn-sm edit-all" id="edit-all"> Cập nhật giỏ hàng</td>

                        <td style="text-align: center;">
                            <a href="{{route('cart.clear')}}"class="btn btn-danger btn-sm">Xóa hết</a>
                            <a href="{{route('checkout')}}"class="btn btn-success btn-sm">Đặt hàng</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- <div class="card-body border-top">
                <a href="#" class="btn btn-primary float-md-right"> Make Purchase <i class="fa fa-chevron-right"></i> </a>
                <a href="#" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
            </div> --}}
            @else
            <h4 class="text-center">Hiện không có sản phẩm nào trong giỏ hàng!!!</h4>
            <a href="{{route('frontend.home')}}"class="btn btn-info btn-sm" ><i class="fa fa-chevron-left"></i> Tiếp tục mua hàng</a>
            {{-- <button type="submit" class="btn btn-success" style="margin-bottom: 25px;width:20%;height:40px;border-radius:4px;border: 1px solid;"> <i class="fa fa-chevron-left"></i> Về giỏ hàng</button> --}}

            @endif
        </div>
    </div>
</section> <!--/#cart_items-->

@endsection
@section('footer')
<script src="{{asset('https://code.jquery.com/jquery-3.7.0.js')}}"></script>

<script>
    
     $(".edit-all").on("click", function(){
        var lists = [];
        $("table tbody tr td").each(function(){
            $(this).find("input").each(function(){
                var element = {key: $(this).data('id'), value: $(this).val()};
                lists.push(element);
            });
        });
        console.log(lists);
        var data = {
                _token : '{{ csrf_token() }}',
                data : lists,
            }

        $.ajax({
            url:"cart/update-all",
            type:"POST",
            // data: my_data, // <--- HERE
            data: data,
            // success:function(data){
            //     console.log(lists);
            // },error:function(){ 
            //     alert("error!!!!");
            // }
        // });
        
            }).done(function(response){
            // console.log(response);
            // alert("OK");
            location.reload();
            swal("Cập nhật thành công!", "", "success");
        });
     
    });
</script>
<script>
/*-------------------
Quantity change
--------------------- */
(function ($) {
var proQty = $('.pro-qty');
proQty.prepend('<span class="dec qtybtn">-</span>');
proQty.append('<span class="inc qtybtn">+</span>');
proQty.on('click', '.qtybtn', function () {
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
    if ($button.hasClass('inc')) {
        var newVal = parseFloat(oldValue) + 1;
    } else {
        // Don't allow decrementing below zero
        if (oldValue > 1) {
            var newVal = parseFloat(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    $button.parent().find('input').val(newVal);
});

})(jQuery);
</script>
   
@endsection
