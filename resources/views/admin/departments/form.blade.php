{{ csrf_field() }}
<!-- Name field -->
<div class="form-group">
    <label for="name">名称</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $department->name }}">
</div>

<div class="form-group">
    <button class="btn btn-danger" type="submit">{{ $submitText }}</button>
    <a href="{{ route('admin.departments.index') }}"><button class="btn btn-primary" type="button">返回</button></a>
</div>
