<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>
<?php $this->start("page_specific_css") ?>
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->stop() ?>
<?php $this->start("page") ?>
<div class="container">
    <div class="row">
        <div class="features_items">
            <!--features_items-->
            <h2 class="title text-center">Sản phẩm mới nhất</h2>
            <?php
                        if(isset($_SESSION['message']))
                        {
                        ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php
                        unset($_SESSION['message']);
                        }
                        ?>
            <?php foreach($products as $product): ?>
            <div class="col-sm-3 ">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <form >
                                <a href="/product-detail/<?=$this->e($product->pro_id)?>">
                                    <img src="/upload/product/<?=$this->e($product->pro_photo)?>" alt="" />
                                    <h2><?=$this->e(number_format($product->pro_price).''.'đ')?></h2>
                                    <p><?=$this->e($product->pro_name)?></p>
                                </a>
                                <?php if (! \App\SessionGuard::isUserLoggedIn()) : ?>
                                <a class="btn btn-info" name="buy-product" >Mua hàng</a>
                                <?php else : ?>
                                <a class="btn btn-info" href="/payment/<?=$this->e(\App\SessionGuard::user()->user_id)?>/<?=$this->e($product->pro_id)?>">Mua hàng</a>
                                <?php endif ?>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                           <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                           <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                        </ul>
                        </div> -->
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div id="payment-confirm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông báo</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <a href="/login" 
                    class="btn btn-info" id="login">Đăng nhập</a>
                <button type="button" data-dismiss="modal"
                    class="btn btn-default">Thoát</button>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
<script>
    $(document).ready(function(){
        
        $('a[name="buy-product"]').on('click', function(e){
            e.preventDefault();
            
            const nameTd = $(this).closest('form').find('p:first');
            if (nameTd.length > 0) {
                $('.modal-body').html(`Bạn cần đăng nhập để mua "${nameTd.text()}"?`);
            } 
            $('#payment-confirm')
                .modal({
                    backdrop: 'static',
                    keyboard: false
                })
            
        });
    });
</script>  
<?php $this->stop() ?>