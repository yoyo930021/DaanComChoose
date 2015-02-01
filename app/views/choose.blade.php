    @extends('layout')

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

    @section('contain')
            <div class="container col-md-offset-1 col-md-10">
                <form role="form" class="form-horizontal">
                    <legend>選填志願序</legend>
                    
                    @for ($y = 1; $y <= $setting->maxwish; $y++)
                    <div class="form-group">
                        <label class="col-sm-2 control-label lable">第{{{ $y }}}志願</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="wish{{{ $y }}}">
                            <option value="x">請選擇</option>
                            @foreach ($classall as $classone)
                                    <option value="{{{ $classone->id }}}">{{{ $classone->name }}}</option>
                            @endforeach
                            </select>
                           </div>
                          </div>
                     @endfor
                    <center>
                        <button class="btn btn-lg btn-primary" type="reset">清除結果</button>
                        <button class="btn btn-lg btn-primary" type="submit">送出結果</button>
                    </center>
                </form>
            </div>
    @stop
