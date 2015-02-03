{{-- 引入學生前端模版 --}}
@extends('layout')

{{-- 學生前端狀態（已登入） --}}
@section('status')
<h3>《 選填志願》</h3>
<p>姓名：{{{Session::get('name')}}}</p>
<p>學號：{{{Session::get('account')}}}</p>
<p>班級：{{{Session::get('class')}}}</p>
<p>座號：{{{Session::get('seat')}}}</p>
<a href="logout">
    <button type="button" class="btn btn-lg btn-danger btn-block">登出系統</button>
</a>
@stop

{{-- 學生前端內容區（選填志願） --}}
@section('contain')
<div class="container col-md-offset-1 col-md-10">
    <form role="form" class="form-horizontal" method="POST">
        <legend>選填志願序</legend>
        @if(Session::get('error')=="1")
        <div class="alert alert-warning" role="alert">===請全部填寫===</div>
        @endif
        @if(Session::get('error')=="2")
        <div class="alert alert-warning" role="alert">===不能有重複的志願===</div>
        @endif
        @for ($y = 0; $y < $setting->maxwish; $y++)
        <div class="form-group">
            <label class="col-sm-2 control-label lable">第{{{ $y+1 }}}志願</label>
            <div class="col-sm-10">
                <select class="form-control" name="wish[]">
                    <option value="x">請選擇</option>
                    @for ($i = 0; $i <count($classall); $i++)
                    <option value="{{{ $classall[$i]->id }}}" {{{ $value[$y][$i+1] or '' }}}>{{{ $classall[$i]->name }}}</option>
                    @endfor
                </select>
            </div>
        </div>
        @endfor
        <center>
            <button class="btn btn-lg btn-primary" type="reset">清除結果</button>
            <button class="btn btn-lg btn-primary" type="submit">送出結果</button>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        </center>
    </form>
</div>
@stop
