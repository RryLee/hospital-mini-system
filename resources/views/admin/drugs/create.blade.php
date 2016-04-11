@extends('admin/master')

@section('title')
添加药品
@stop

@section('right')
<form action="{{ route('admin.drugs.store') }}" method="POST">

    @include('admin.drugs.form', ['submitText' => '添加'])

</form>
@endsection
