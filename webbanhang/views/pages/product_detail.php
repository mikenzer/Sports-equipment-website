<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>
<?php $this->start("page_specific_css") ?>
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->stop() ?>
<?php $this->start("page") ?>
<div class="container">
    <h2 class="title text-center">Chi tiết sản phẩm</h2>
    <div class="row">
        <?php foreach($product as $pro): ?>
        <div class="product-details">
            <!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="/upload/product/<?=$this->e($pro->pro_photo)?>" alt=""/>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->
                    <form>
                        <h2><?=$this->e($pro->pro_name)?></h2>
                        <p><b>Mã ID:</b> <?=$this->e($pro->pro_id)?> </p>
                        <p><b>Điều kiện:</b> Mới</p>
                        <p><b>Thương hiệu:</b> <?=$this->e($pro->pro_brand)?></p>
                        <p><b>Danh mục:</b> <?=$this->e($pro->pro_cate)?></p>
                        <p><b>Thông tin:</b> <?=$this->e($pro->pro_notes)?></p>
                        <p><b>Giá:</b> <?=$this->e(number_format($pro->pro_price).''.'đ')?></p>
                        <?php if (! \App\SessionGuard::isUserLoggedIn()) : ?>
                        <a class="btn btn-info" name="buy-product" >Mua hàng</a>
                        <?php else : ?>
                        <a class="btn btn-info" href="/payment/<?=$this->e(\App\SessionGuard::user()->user_id)?>/<?=$this->e($pro->pro_id)?>">Mua hàng</a>
                        <?php endif ?>                
                    </form>
                </div>
                <?php endforeach ?>
                <!--/product-information-->
            </div>
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
            
            const nameTd = $(this).closest('form').find('h2:first');
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