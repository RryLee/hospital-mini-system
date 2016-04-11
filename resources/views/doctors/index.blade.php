@extends('layouts.app')

@section('title')
找大夫到 xx 医院
@stop

@section('content')
<div class="container">
    <div class="row">
        @foreach ($doctors as $doctor)
        <div class="col-xs-4">
            <div class="form-group">
                <div class="media">
                    <div class="media-left media-middle">
                       <a href="#">
                           <img class="media-object" src="http://www.placehold.it/60x60">
                       </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="{{ route('doctors.show', ['id' => $doctor->id]) }}">{{ $doctor->name }}</a>({{ $doctor->age }})</h4>
                        <p>所属科室: <a href="#">{{ $doctor->department->name }}</a></p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {!! $doctors->links() !!}
</div>
@stop
