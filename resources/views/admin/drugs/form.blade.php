{{ csrf_field() }}
<!-- Name field -->
<div class="form-group">
    <label for="name">名称</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $drug->name }}">
</div>

<div class="form-group">
    <label for="price">价格</label>
    <input type="text" class="form-control" id="price" name="price" value="{{ old('price') ?: $drug->price }}">
</div>

<div class="form-group">
    <label for="function">功效</label>
    <textarea name="function" id="function" class="form-control" rows="5">{{ old('function') ?: $drug->function }}</textarea>
</div>

<div class="form-group">
    <button class="btn btn-danger" type="submit">{{ $submitText }}</button>
    <a href="{{ route('admin.drugs.index') }}"><button class="btn btn-primary" type="button">返回</button></a>
</div>
