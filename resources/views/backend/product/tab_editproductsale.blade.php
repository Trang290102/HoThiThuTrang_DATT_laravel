<div class="row">
  @php
    $product_sale= $product->productsale;
    $pricesale= $product_sale->price_sale ?? "";
    $datebegin= $product_sale->date_begin ?? "";
    $begin = !empty($datebegin) ? (new DateTime($datebegin))->format('Y-m-d') : "";
    // if($datebegin != "")
    // {
    //   $dateTime = new DateTime($datebegin);
    //   $begin = $dateTime->format('Y-m-d');

    // }else {
    //   $begin = "";
    // }
    $dateend= $product_sale->date_end ?? "";
    $end = !empty($dateend) ? (new DateTime($dateend))->format('Y-m-d') : "";
  @endphp
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price_sale">Giá khuyến mãi</label>
            <input type="text" name="price_sale" value="{{ $pricesale }}" id="price_sale" class="form-control" placeholder="Nhập giá khuyến mãi"> 
            @if ($errors->has('price_sale'))
              <div class="text-danger">{{$errors->first($pricesale)}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="date_begin">Ngày bắt đầu</label>
            <input type="date" name="date_begin" value="{{ $begin }}" id="date_begin" class="form-control" placeholder="Nhập ngày bắt đầu> 
            @if ($errors->has('date_begin'))
              <div class="text-danger">{{$errors->first($begin)}}</div>
            @endif 
        </div>
        <div class="mb-3">
          <label for="date_end">Ngày kết thúc</label>
          <input type="date" name="date_end" value="{{ $end }}" id="date_end" class="form-control" placeholder="Ngày kết thúc"> 
          @if ($errors->has('date_end'))
            <div class="text-danger">{{$errors->first($end)}}</div>
          @endif 
      </div>
    </div>
</div>
