@extends('admin/master')

@section('title')
修改{{ $user->name }}的资料
@stop

@section('right')
<form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST">
    <input type="hidden" name="_method" value="PATCH">

    @include('admin.users.form', ['submitText' => '修改'])

</form>
@endsection
