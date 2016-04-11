@extends('admin/master')

@section('title')
添加科室
@stop

@section('right')
<form action="{{ route('admin.departments.store') }}" method="POST">

    @include('admin.departments.form', ['submitText' => '添加'])

</form>
@endsection
