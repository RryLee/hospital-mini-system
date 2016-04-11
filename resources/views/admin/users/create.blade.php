@extends('admin/master')

@section('title')
添加人员
@stop

@section('right')
<form action="{{ route('admin.users.store') }}" method="POST">

    @include('admin.users.form', ['submitText' => '添加'])

</form>
@stop
