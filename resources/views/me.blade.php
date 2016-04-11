@extends('layouts.app')

@section('title')
{{ Auth::user()->name }}的个人中心
@stop

@section('content')

<div class="container">
    <form method="POST" action="{{ route('me.update') }}">
        {!! csrf_field() !!}

        <!-- 姓名 field -->
        <div class="form-group">
            <label for="name">姓名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: Auth::user()->name }}">
        </div>

        <!-- Password field -->
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <!-- Passworf_confirmation field -->
        <div class="form-group">
            <label for="password_confirmation">确认密码</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
        </div>

        <div class="form-group">
            <input type="submit" value="确定" class="btn btn-primary">
        </div>
    </form>
</div>

@stop
