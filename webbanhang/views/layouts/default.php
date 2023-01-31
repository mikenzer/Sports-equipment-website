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
                        <a class="navbar-brand" href="/home">
                            <?=$this->e($title)?>
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
                <?php if (! \App\SessionGuard::isUserLoggedIn()) : ?>
                <li><a href="/login"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                <li><a href="/register"><i class="fa fa-pencil"></i> Đăng ký</a></li>
                <?php else : ?>
                <li class="dropdown">
                
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <i class="fa fa-user"></i> Xin chào <?=$this->e(\App\SessionGuard::user()->user_name)?> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                <li>
                
                <a href="/history/<?=$this->e(\App\SessionGuard::user()->user_id)?>">
                Lịch sử mua hàng  <i class="fa fa-history"></i>
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                </form>
                </li>
                <li>
                <a href="/logout"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                Đăng xuất <i class="fa fa-sign-out"></i>
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                </form>
                </li>
                </ul>
                </li>
                <?php endif ?>
                </ul>
                </div>
            </div>
        </nav>
        <?=$this->section("page")?>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="single-widget">
                            <h2>Giới Thiệu</h2>
                            <p>Chuyên cung cấp các sản phẩm, thiết bị thể thao chính hãng, chất lượng</p>
                            <p>Công ty Cổ phần TTN STORE với số đăng ký kinh doanh: 0105777650 </p>
                            <p>Địa chỉ đăng ký: 132/7 đường 3/2, phường Hưng Lợi, quận Ninh Kiều, thành phố Cần Thơ</p>
                            <p>Số điện thoại: 0379530595</p>
                            <p>Email: <a href="mailto:nhanb1809382@student.ctu.edu.vn">nhanb1809382@student.ctu.edu.vn</a></p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="single-widget">
                            <h2>Đối tác</h2>
                            <img src="/images/logobrand/fornix.png" width="100px" />
                            <img src="/images/logobrand/kingsport.png" width="100px" />
                            <img src="/images/logobrand/giant.png" width="100px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="/js/wow.min.js"></script>
        <?=$this->section("page_specific_js")?>
    </body>
</html>