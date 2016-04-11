@extends('admin/master')

@section('title')
药品管理
@stop

@section('right')
<h3>药品列表 <small><a href="{{ route('admin.drugs.create') }}">添加药品</a></small></h3>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>价钱 / ¥</th>
            <th>功效</th>
            @if (Auth::user()->admin())
            <th>修改</th>
            <th>删除</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($drugs as $drug)
        <tr>
            <td>{{ $drug->id }}</td>
            <td>{{ $drug->name }}</td>
            <td>{{ $drug->price }}</td>
            <td>{{ $drug->function }}</td>
            @if (Auth::user()->admin())
            <td><a href="{{ route('admin.drugs.edit', ['id' => $drug->id]) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
            <td>
                <form action="{{ route('admin.drugs.destroy', ['id' => $drug->id]) }}" style="display: inline" method="post">
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

{!! $drugs->links() !!}
@stop
