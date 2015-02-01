<html>

<head>
    <title>大安高工綜合高中選學程系統</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!--<link rel="stylesheet" href="css/bootstrap-theme.min.css" />-->
    <link rel=stylesheet href="css/index.css" />
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container" id="header">
        <h1>大安高工綜合高中選學程系統</h1>
        <p>By 電腦研究社 16th 網管 綜高二仁 陳典佑</p>
    </div>
    <div class="container" id="body">
        <div id="status" class="col-md-2">
            @yield('status')
        </div>
        <div id="contain" class="col-md-10">
            @yield('contain')
        </div>
    </div>
    <div class="container" id="footer">
        <div class="col-md-12" id="license">
            <p style="text-align:right">Auto-Distribute System All rights reserved Daan Computer Research Club</p>
        </div>
    </div>
</body>

</html>
