{{ csrf_field() }}
<!-- Name field -->
<div class="form-group">
    <label for="name">用户名</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: $user->name }}">
</div>

<div class="form-group">
    <label for="department_id">科室</label>
    <select name="department_id" id="department_id" class="form-control">
        @foreach ($departments as $id => $department)
            <option value="{{ $id }}" @if (old('department_id') == $id) selected @elseif ($user->department_id == $id) selected @endif>{{ $department }}</option>
        @endforeach
    </select>
</div>

<!-- Age field -->
<div class="form-group">
    <label for="age">年龄</label>
    <input type="number" class="form-control" id="age" name="age" value="{{ old('age') ?: $user->age }}">
</div>

<!-- Sex field -->
<div class="form-group">
    <label for="sex">性别</label>
    <select name="sex" id="sex" class="form-control">
        <option value="male" @if (old('sex') == 'male') selected @elseif ($user->sex == 'male') selected @endif>男</option>
        <option value="female" @if (old('sex') == 'female') selected @elseif ($user->sex == 'female') selected @endif>女</option>
    </select>
</div>

<!-- Email field -->
<div class="form-group">
    <label for="email">邮箱</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?: $user->email }}" @if ($user->id != null) disabled @endif>
</div>

<!-- Password field -->
<div class="form-group">
    <label for="password">密码@if ($user->id != null)(可不填)@endif</label>
    <input type="password" class="form-control" name="password" id="password">
</div>

<!-- Passwro field -->
<div class="form-group">
    <label for="password_confirmation">确认密码</label>
    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
</div>

<div class="form-group">
    <button class="btn btn-danger" type="submit">{{ $submitText }}</button>
    <a href="{{ route('admin.users.index') }}"><button class="btn btn-primary" type="button">返回</button></a>
</div>
