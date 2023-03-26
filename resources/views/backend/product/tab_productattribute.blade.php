<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="name1">Tên thuộc tính</label>
            <input type="text" name="name1" value="{{ old('name1') }}"" id="name1" class="form-control" placeholder="Nhập tên sản phẩm"> 
            @if ($errors->has('name1'))
              <div class="text-danger">{{$errors->first('name')}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="megtakey">Mô tả</label>
            <textarea name="megtakey" id="megtakey" class="form-control"
            placeholder="Từ khóa tìm kiếm">{{ old('megtakey') }}</textarea>
            @if ($errors->has('megtakey'))
            <div class="text-danger">{{$errors->first('megtakey')}}</div>
          @endif 
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="nagfme">Giá trị</label>
            <input type="text" name="nagfme" value="{{ old('nagfme') }}"" id="nagfme" class="form-control" placeholder="Nhập tên sản phẩm"> 
            @if ($errors->has('nagfme'))
              <div class="text-danger">{{$errors->first('nagfme')}}</div>
            @endif 
        </div>
        <div class="mb-3">
            <label for="nagfme">Thứ tự</label>
            <textarea name="nagfme" id="nagfme" class="form-control"
            placeholder="Từ khóa tìm kiếm">{{ old('nagfme') }}</textarea>
            @if ($errors->has('nagfme'))
            <div class="text-danger">{{$errors->first('nagfme')}}</div>
          @endif 
        </div>
    </div>          
</div>
