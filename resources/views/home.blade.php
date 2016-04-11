@extends('layouts.app')

@section('title')
首页
@stop

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>XX 门诊，祝您早日康复</h1>
            <p>我们是一所集医疗、预防、检测、康复为一体的综合性医疗机构。</p>
            <p>
                <a class="btn btn-primary btn-lg" href="{{ route('doctors.index') }}">找大夫</a>
            </p>
        </div>
    </div>
</div>
@endsection
