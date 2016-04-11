@extends('layouts.app')

@section('title')
{{ $doctor->name }}大夫
@stop

@section('content')
<div class="container">
    <div class="text-center">
        <h3>{{ $doctor->name }}</h3>
        <img src="http://www.placehold.it/160x160">
        <br />
        <br />
        <p>年龄: {{ $doctor->age }}</p>
        <p>联系方式: <a href="mailto:{{ $doctor->email }}">{{ $doctor->email }}</a></p>
        <p>进入<a href="#">{{ $doctor->department->name }}</a>专科</p>
    </div>
</div>
@stop
