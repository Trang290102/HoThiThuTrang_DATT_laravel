<div class="row">
    <div class="col-md-12">
        <div class="mb-3">
            <label for="image">Hình ảnh</label>
            <input type="file" name="image[]" multiple value="{{ old('image') }}"" id="image" class="form-control-file" placeholder="Thêm hình ảnh" > 
            @if ($errors->has('image'))
              <div class="text-danger">{{$errors->first('image')}}</div>
            @endif 
        </div>
    </div>          
</div>
