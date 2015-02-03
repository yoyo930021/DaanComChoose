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

{{-- 學生前端內容區（確認志願） --}}
@section('contain')
<div class="container col-md-offset-1 col-md-10">
    <div>
        <center>
            <h2>選填結果</h2>
            <table class="table table-bordered">
                <tbody>
                    
                    @for ($y = 0; $y < count($wishresult); $y++)
                    <tr>
                        <td>第{{{$y+1}}}志願</td>
                        <td>{{{$wishresult[$y]->name}}}</td>
                    </tr>
                    @endfor
                </tbody>
            </table>
            <form role="form" method="POST" action="chooseresult">
                @foreach ($wishresult as $wishone)
                <input type="hidden" name="wish[]" value="{{{$wishone->id}}}">
                @endforeach
                <a href="choose">
                    <button class="btn btn-lg btn-primary" type="button">重新填寫</button>
                </a>
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                <button class="btn btn-lg btn-primary" type="submit">確認結果</button>
            </form>
        </center>
    </div>
</div>
@stop
