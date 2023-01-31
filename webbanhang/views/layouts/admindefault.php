<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?=$this->e($title)?></title>
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/sticky-footer.css" rel="stylesheet">
        <link href="/css/font-awesome.min.css" rel="stylesheet">
        <!-- <link href="/css/animate.css" rel="stylesheet"> -->
        <link href="/css/main.css" rel="stylesheet">
        <?=$this->section("page_specific_css")?>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    <div class="col-sm-3">
                        <a ><img src="/images/home/ttnsport.png" alt="" height="50" width="60" /></a>
                    </div>
                    <div class ="col-sm-8">
                        <a class="navbar-brand" href="/admin">
                            <?=$this->e($title) ?> ADMIN
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                &nbsp;
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <li><a href="/add-product">Thêm sản phẩm</a></li>
                <li><a href="/list-product">Danh sách sản phẩm</a></li>
                <li><a href="/list-bill">Danh sách đơn hàng</a></li>
                </ul>
                </div>
            </div>
        </nav>
        <?=$this->section("pagead")?>
        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <?=$this->section("page_specific_js")?>
    </body>
</html>