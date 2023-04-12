<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price">Giá nhập kho</label>
            <input type="text" name="price" value="{{ old('price') }}"" id="price" class="form-control" placeholder="Giá nhập"> 
            @if ($errors->has('price'))
              <div class="text-danger">{{$errors->first('price')}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="qty">Số lượng</label>
            <input type="number" name="qty" value="{{ old('qty') }}"" id="qty" class="form-control" placeholder="Nhập số lượng"> 
            @if ($errors->has('qty'))
              <div class="text-danger">{{$errors->first('qty')}}</div>
            @endif 
        </div>
    </div>
</div>
