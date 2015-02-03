{{-- 學生前端模版 --}}
<html>

<head>
    {{-- 標題 --}}
    <title>大安高工綜合高中選學程系統</title>
    <meta charset="UTF-8" />
    {{-- 手機網頁宣告（禁止縮放） --}}
    <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1.0,maximum-scale=1.0">
    {{-- jquery函式庫（bootstrap必要組件） --}}
    <script src="js/jquery-2.1.3.min.js"></script>
    {{-- bootstrap模版 --}}
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    {{-- bootstrap主題 --}}
    <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css" />-->
    {{-- 學生前端css --}}
    <link rel=stylesheet href="css/index.css" />
</head>

<body>
    {{-- =======網頁上面區塊（標題、作者）======= --}}
    <div class="container" id="header">
        <h1>大安高工綜合高中選學程系統</h1>
        <p>By 電腦研究社 16th 網管 綜高二仁 陳典佑</p>
    </div>
    {{-- =======網頁中間內容======= --}}
    <div class="container" id="body">
        {{-- 學生前端狀態 --}}
        <div id="status" class="col-md-2">
            @yield('status')
        </div>
        {{-- 學生前端內容區 --}}
        <div id="contain" class="col-md-10">
            @yield('contain')
        </div>
    </div>
    {{-- =======網頁下面內容======== --}}
    <div class="container" id="footer">
        <div class="col-md-12" id="license">
            <p style="text-align:right">Auto-Distribute System All rights reserved Daan Computer Research Club</p>
        </div>
    </div>
</body>

</html>
