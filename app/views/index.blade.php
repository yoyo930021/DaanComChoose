{{-- 引入學生前端模版 --}}   
@extends('layout')

{{-- 學生前端狀態（登入區） --}}
@section('status')

<form class="form-signin" method="POST">
    <h2 class="form-signin-heading">學生登入</h2>
    @if($settings->open==0)
    <div class="alert alert-warning" role="alert">===系統未開放===</div>
    @endif
    @if(Session::get('error')=="#")
    <div class="alert alert-warning" role="alert">===帳密錯誤===</div>
    @endif
    @if(Session::get('logout')=="#")
    <div class="alert alert-success" role="alert">===登出成功===</div>
    @endif
    <label class="sr-only" for="inputAccount">帳號</label>
    <input name="inputAccount" class="form-control" type="text" autofocus="" required="" placeholder="請輸入學號"></input>
    <label for="inputPassword" class="sr-only">密碼</label>
    <input name="inputPassword" class="form-control" placeholder="請輸入身份證後四碼" required="" type="password"></input>
    <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
</form>
<p style="text-align:center">如密碼無法登入請嘗試0000</p>
<p class="help"><a href="#"> >>各學程簡介<< </a></p>
<p class="help" style="font-size:15px"><a href="#"> >>系統使用說明<< </a></p>
<li class="admin"><a href="admin">管理登入</a></li>
@stop

{{-- 學生前端內容區（公告） --}}
@section('contain')
<p>請同學登入選課。 若不清楚使用方式，請先詳閱使用說明。</p>
{{ $settings->post }}
@stop
