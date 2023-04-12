<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="price_sale">Giá khuyến mãi</label>
            <input type="text" name="price_sale" value="{{ old('price_sale') }}"" id="price_sale" class="form-control" placeholder="Nhập giá khuyến mãi"> 
            @if ($errors->has('price_sale'))
              <div class="text-danger">{{$errors->first('price_sale')}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="date_begin">Ngày bắt đầu</label>
            <input type="date" name="date_begin" value="{{ old('date_begin') }}"" id="date_begin" class="form-control" placeholder="Nhập ngày bắt đầu> 
            @if ($errors->has('date_begin'))
              <div class="text-danger">{{$errors->first('date_begin')}}</div>
            @endif 
        </div>
        <div class="mb-3">
          <label for="date_end">Ngày kết thúc</label>
          <input type="date" name="date_end" value="{{ old('date_end') }}"" id="date_end" class="form-control" placeholder="Ngày kết thúc"> 
          @if ($errors->has('date_end'))
            <div class="text-danger">{{$errors->first('date_end')}}</div>
          @endif 
      </div>
    </div>
</div>
