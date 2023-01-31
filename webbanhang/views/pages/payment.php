<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>
<?php $this->start("page_specific_css") ?>
<link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
<?php $this->stop() ?>
<?php $this->start("page") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">
            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Thanh toán</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Thông tin mua hàng</p>
                    
                </div>
            </div>
            <?php foreach($product as $pro): ?>
            <?php foreach($user as $us): ?>
            <form class="form-horizontal" role="form" action="/confirm/<?=$this->e($us->user_id)?>" method="POST" >
            <div class="table-responsive">
            
                <table  id="contacts" class="table table-bordered table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            
                           
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td><?=$this->e($pro->pro_name)?></td>
                            
                            <td><img src="/upload/product/<?=$this->e($pro->pro_photo)?>" height="100" width="80"></td>
                            <td><?=$this->e(number_format($pro->pro_price).''.'đ')?></td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Thông tin giao hàng</p>
                </div>
            </div>
            <div class="inner-wrapper row">
                <div class="col-md-12">
                
                
                        <div class="form-group<?=isset($errors['user_name']) ? ' has-error' : '' ?>">
                            <label for="name" class="col-md-4 control-label">Tên khách hàng</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="user_name" 
                                    value="<?=$this->e($us->user_name)?>" required autofocus>
                                <?php if (isset($errors['user_name'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_name'])?></strong>
                                </span>
                                <?php endif ?>                                  
                            </div>
                        </div>
                        <div class="form-group<?=isset($errors['user_phone']) ? ' has-error' : '' ?>">
                            <label for="name" class="col-md-4 control-label">Số điện thoại</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="user_phone" 
                                value="<?=$this->e($us->user_phone)?>" required autofocus>
                                <?php if (isset($errors['user_phone'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_phone'])?></strong>
                                </span>
                                <?php endif ?>                                  
                            </div>
                        </div>
                        <div class="form-group<?=isset($errors['user_address']) ? ' has-error' : '' ?>">
                            <label for="name" class="col-md-4 control-label">Địa chỉ giao hàng</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="user_address" 
                                value="<?=$this->e($us->user_address)?>" required autofocus>
                                <?php if (isset($errors['user_address'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_address'])?></strong>
                                </span>
                                <?php endif ?>                                  
                            </div>
                        </div>
                        <div class="form-group<?=isset($errors['user_email']) ? ' has-error' : '' ?>">
                            <label for="email" class="col-md-4 control-label">Địa chỉ E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="user_email" 
                                value="<?=$this->e($us->user_email)?>" required>
                                <?php if (isset($errors['user_email'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_email'])?></strong>
                                </span>
                                <?php endif ?>       
                            </div>
                        </div>
                        <input id="name" type="hidden" class="form-control" name="user_id" 
                                    value="<?=$this->e($us->user_id)?>">
                                    <input id="name" type="hidden" class="form-control" name="pro_id" 
                                    value="<?=$this->e($pro->pro_id)?>">
                                    
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                Đặt hàng
                                </button>
                            </div>
                        </div>
                </form>
                <?php endforeach ?>
                    <?php endforeach ?>
                </div>
            </div>
            
        </div>
    </section>
</div>
<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  

<?php $this->stop() ?>