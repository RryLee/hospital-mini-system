@extends('admin/master')

@section('title')
修改{{ $department->name }}的信息
@stop

@section('right')
<form action="{{ route('admin.departments.update', ['id' => $department->id]) }}" method="POST">
    <input type="hidden" name="_method" value="PATCH">

    @include('admin.departments.form', ['submitText' => '修改'])

</form>
@endsection
