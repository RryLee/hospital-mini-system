@extends('admin/master')

@section('title')
添加记录
@stop

@section('right')
<form action="{{ route('admin.orders.store') }}" method="POST">
    {{ csrf_field() }}

    <!-- Name field -->
    <div class="form-group">
        <label for="patient">病人姓名</label>
        <input type="text" class="form-control" id="patient" name="patient" value="{{ old('patient') }}">
    </div>

    <div class="form-group">
        <label for="doctor_id">医生</label>
        <select name="doctor_id" id="doctor_id" class="form-control">
            @foreach ($doctors as $id => $doctor)
                <option value="{{ $id }}" @if (old('doctor_id') == $id) selected @endif>{{ $doctor }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="drug_id">药品</label>
        <select name="drug_id" id="drug_id" class="form-control">
            @foreach ($drugs as $id => $drug)
                <option value="{{ $id }}" @if (old('drug_id') == $id) selected @endif>{{ $drug }}</option>
            @endforeach
        </select>
    </div>

    <!-- Drug field -->
    <div class="form-group">
        <label for="drug_amount">数量</label>
        <input type="number" class="form-control" id="drug_amount" name="drug_amount" value="{{ old('drug_amount') }}">
    </div>

    <div class="form-group">
        <button class="btn btn-danger" type="submit">确定</button>
        <a href="{{ route('admin.orders.index') }}"><button class="btn btn-primary" type="button">返回</button></a>
    </div>
</form>
@stop
