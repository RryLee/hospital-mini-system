@extends('admin/master')

@section('title')
收费管理
@stop

@section('right')
<h3>挂号列表 <small><a href="{{ route('admin.orders.create') }}">添加记录</a></small></h3>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>医生</th>
            <th>药物</th>
            <th>数量</th>
            <th>费用 / ¥</th>
            <th>删除</th>
            <th>完成</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->patient }}</td>
            <td>{{ $order->doctor->name }}</td>
            <td>{{ $order->drug->name }}</td>
            <td>{{ $order->drug_amount }}</td>
            <td>{{ $order->drug_amount * $order->drug->price }}</td>
            <td>
                <form action="{{ route('admin.orders.destroy', ['id' => $order->id]) }}" style="display: inline" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-xs btn-danger" onclick="return confirm('确定删除?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            <td>
                @if ($order->completed)
                <i class="fa fa-check-square-o"></i> 已交
                @else
                <form action="{{ route('admin.orders.update', ['id' => $order->id]) }}" style="display: inline" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="PATCH">
                    <button class="btn btn-xs btn-success" onclick="return confirm('确定已交清费用?')"><i class="fa fa-check"></i></button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $orders->links() !!}
@stop
