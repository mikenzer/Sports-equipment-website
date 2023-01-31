<?php $this->layout("layouts/admindefault", ["title" => APPNAME]) ?>
<?php $this->start("pagead") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">
            <!-- SECTION HEADING -->
            <h1 class="section-heading text-center wow fadeIn" data-wow-duration="1s">ADMIN</h1>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h3 class="wow fadeIn" data-wow-duration="5s">Chào mừng bạn đến trang quản lý</h3>
                </div>
            </div>
            <h1 class="section-heading text-center wow fadeIn" data-wow-duration="7s">CHỨC NĂNG THỐNG KÊ DOANH THU ĐANG ĐƯỢC HOÀN THIỆN!</h1>
        </div>
    </section>
</div>
<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>
<script>
    $(document).ready(function(){
        new WOW().init();
    });
</script>
<?php $this->stop() ?>