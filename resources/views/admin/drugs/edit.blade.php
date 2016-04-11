@extends('admin/master')

@section('title')
修改{{ $drug->name }}的信息
@stop

@section('right')
<form action="{{ route('admin.drugs.update', ['id' => $drug->id]) }}" method="POST">
    <input type="hidden" name="_method" value="PATCH">

    @include('admin.drugs.form', ['submitText' => '修改'])

</form>
@endsection
