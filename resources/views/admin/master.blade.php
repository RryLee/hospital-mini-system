@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-2">
            <div class="panel panel-default">
                <div class="panel-heading">控制面板</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> 综合信息</a></li>
                        @if (Auth::user()->admin())
                            <li class="list-group-item"><a href="{{ route('admin.users.index') }}"><i class="fa fa-users fa-fw"></i> 人员管理</a></li>

                            <li class="list-group-item"><a href="{{ route('admin.orders.index') }}"><i class="fa fa-keyboard-o fa-fw"></i> 收费管理</a></li>
                        @endif
                        <li class="list-group-item"><a href="{{ route('admin.departments.index') }}"><i class="fa fa-tags fa-fw"></i> 科室管理</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.drugs.index') }}"><i class="fa fa-codiepie fa-fw"></i> 药品管理</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            @yield('right')
        </div>
    </div>
</div>
@endsection
