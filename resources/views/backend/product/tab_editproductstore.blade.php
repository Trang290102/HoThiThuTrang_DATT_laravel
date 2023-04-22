<div class="row">
  @php
  $product_store= $product->productstore;
  $price= $product_store->price ?? "";
  $qty= $product_store->qty ?? "";
@endphp

    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">Giá nhập kho</label>
            <input type="text" name="price" value="{{ $price }}"" id="price" class="form-control" placeholder="Giá nhập"> 
            @if ($errors->has('price'))
              <div class="text-danger">{{$errors->first('price')}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="qty">Số lượng</label>
            <input type="number" name="qty" value="{{ $qty }}"" id="qty" class="form-control" placeholder="Nhập số lượng"> 
            @if ($errors->has('qty'))
              <div class="text-danger">{{$errors->first('qty')}}</div>
            @endif 
        </div>
    </div>
</div>
