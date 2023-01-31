<?php $this->layout("layouts/admindefault", ["title" => APPNAME]) ?>
<?php $this->start("pagead") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">
            <!-- SECTION HEADING -->
            <?php foreach ($view as $vie): ?>
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">
                Chi tiết đơn hàng mã <?=$this->e($vie->bill_id) ?>
                <?php if ($this->e($vie->bill_status) == 0) : ?>
                           
                                <i style="color:#fa8429;">(Chờ xác nhận)</i>
                                
                            
                            <?php else : ?>
                                <i style="color:#4ebeff;">(Đã xác nhận)</i>
                           
                            <?php endif ?>
            </h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Thông tin đơn hàng</p>
                    
                
            </div>
            </div>
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
                            <td><?=$this->e($vie->pro_name)?></td>
                            <td><img src="/upload/product/<?=$this->e($vie->pro_photo)?>" height="100" width="80"></td>
                            <td><?=$this->e(number_format($vie->pro_price).''.'đ')?></td>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Thông tin khách hàng</p>
                    
                </div>
                <table  id="contacts" class="table table-bordered table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Địa chỉ giao hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td><?=$this->e($vie->user_name)?></td>
                            <td><?=$this->e($vie->user_address)?></td>
                            <td><?=$this->e($vie->user_phone)?></td>
                            <td><?=$this->e($vie->user_email)?></td>
                        </tr>
                        
                    </tbody>
                </table>
                <form action="/confirm-bill/<?=$this->e($vie->bill_id)?>" method="post">
                <input type="hidden" value="<?=$this->e($vie->bill_id)?>">
                <button  type="submit" class="btn btn-info">Xác nhận</button>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</div>

<?php $this->stop() ?>
<?php $this->start("page_specific_js") ?>
<!-- <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>   -->
<script>
    $(document).ready(function(){
        new WOW().init();
        
        $('#contacts').DataTable();           
    });
</script>

<?php $this->stop() ?>