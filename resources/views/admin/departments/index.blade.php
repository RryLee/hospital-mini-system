@extends('admin/master')

@section('title')
科室管理
@stop

@section('right')
<h3>科室列表 <small><a href="{{ route('admin.departments.create') }}">添加科室</a></small></h3>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>人员</th>
            @if (Auth::user()->admin())
            <th>修改</th>
            <th>删除</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($departments as $department)
        <tr>
            <td>{{ $department->id }}</td>
            <td>{{ $department->name }}</td>
            <td>{{ count($department->doctors) }}</td>
            @if (Auth::user()->admin())
            <td><a href="{{ route('admin.departments.edit', ['id' => $department->id]) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
            <td>
                <form action="{{ route('admin.departments.destroy', ['id' => $department->id]) }}" style="display: inline" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-xs btn-danger" onclick="return confirm('确定删除?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>

{!! $departments->links() !!}
@stop
