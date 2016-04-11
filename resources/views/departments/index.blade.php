@extends('layouts.app')

@section('title')
按专科到 xx 医院
@stop

@section('content')
<div class="container">
    <div class="row">
        @foreach ($departments as $department)
        <div class="col-xs-4">
            <div class="form-group">
                <div class="media">
                    <div class="media-left media-middle">
                       <a href="#">
                           <img class="media-object" src="http://www.placehold.it/60x60">
                       </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">{{ $department->name }}</h4>
                        <p>共有{{ count($department->doctors) }}名医生</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
