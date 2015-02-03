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
{{-- 學生前端內容區（結果） --}}
@section('contain')
<div class="container col-md-offset-1 col-md-10">
    <div class="container col-md-offset-3 col-md-6">
        <center>
            <h2><===志願結果===></h2>
            <table class="table table-bordered">
                <tr>
                    <td>
                        <center>
                            <p>錄取志願</p>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td>
                        <center>
                            <p>{{{$result or '無錄取志願'}}}</p>
                        </center>
                    </td>
                </tr>
            </table>
            <p style="font-size:20px">如果你順利錄取想要志願，恭喜你。<br>如果沒有，不要氣餒，還有機會的。</p>
            <p style="font-size:20px">錄取是開始，請各位開始為新的志願努力吧！</p>
        </center>
    </div>
</div>
@stop
