@extends('admin.master')

@section('title')
后台
@endsection

@section('style')
<style>
.sm-st {
    background: #F0F3F4;
    padding: 20px;
    border-radius: 3px;
    margin-bottom: 20px;
    box-shadow: 0 1px 0 rgba(0, 0, 0, .05);
}
.sm-st-icon {
    width: 60px;
    height: 60px;
    display: inline-block;
    line-height: 60px;
    text-align: center;
    font-size: 30px;
    background: #eee;
    border-radius: 5px;
    float: left;
    margin-right: 10px;
    color: #fff;
}
.sm-st-info {
    font-size: 12px;
    padding-top: 2px;
}
.sm-st-info span {
    display: block;
    font-size: 24px;
    font-weight: 600;
}
.st-red {
    background-color: #f05050;
}
.st-violet {
    background-color: #7266ba;
}
.st-green {
    background-color: #27c24c;
}
.st-blue {
    background-color: #23b7e5;
}
</style>
@stop

@section('right')
    <div class="row">
        <div class="col-sm-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-red">
                    <i class="fa fa-group"></i>
                </span>
                <div class="sm-st-info">
                    <span>{{ $data['userCount'] }}</span>
                    人员
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-violet">
                    <i class="fa fa-tag"></i>
                </span>
                <div class="sm-st-info">
                    <span>{{ $data['departmentCount'] }}</span>
                    科室
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-green">
                    <i class="fa fa-codiepie"></i>
                </span>
                <div class="sm-st-info">
                    <span>{{ $data['drugCount'] }}</span>
                    药品
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-blue">
                    <i class="fa fa-keyboard-o"></i>
                </span>
                <div class="sm-st-info">
                    <span>{{ $data['orderNotCompletedCount'] }}</span>
                    当前挂号
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-info">
        <i class="fa fa-bullhorn"></i> 历史接受病人 <b>{{ $data['orderCount'] }}</b> 人次，已经收取费用 <b>{{ $data['incoming'] }}</b> 元
    </div>
@stop
