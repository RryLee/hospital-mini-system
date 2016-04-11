@extends('admin/master')

@section('title')
人员管理
@stop

@section('right')
<h3>人员列表 <small><a href="{{ route('admin.users.create') }}">添加人员</a></small></h3>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>科室</th>
            <th>姓名</th>
            <th>年龄</th>
            <th>性别</th>
            <th>邮箱</th>
            <th>查看</th>
            <th>修改</th>
            <th>删除</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->department->name }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->age }}</td>
                <td>
                    @if ($user->sex == 'male')
                        <i class="fa fa-male"></i>
                    @else
                        <i class="fa fa-female"></i>
                    @endif
                </td>
                <td>{{ $user->email }}</td>
                <td><a href="{{ route('doctors.show', ['id' => $user->id]) }}" class="fa fa-eye"></a></td>
                <td><a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a></td>
                <td>
                    <form action="{{ route('admin.users.destroy', ['id' => $user->id]) }}" style="display: inline" method="post">
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-xs btn-danger" onclick="return confirm('确定删除?')"><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $users->links() !!}
@endsection
