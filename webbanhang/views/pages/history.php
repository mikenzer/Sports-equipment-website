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
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Lịch sử mua hàng</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Đơn hàng đã đặt</p>
                    
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
                            <th>Mã đơn hàng</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Trạng thái</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($history as $his): ?>
                        <tr>
                        <td><?=$this->e($his->bill_id)?></td>
                            <td><?=$this->e($his->pro_name)?></td>
                            
                            <td><img src="/upload/product/<?=$this->e($his->pro_photo)?>" height="100" width="80"></td>
                            <td><?=$this->e(number_format($his->pro_price).''.'đ')?></td>
                            <?php if ($this->e($his->bill_status) == 0) : ?>
                            <td> 
                                <mark style="background-color:#fa8429;">Chờ xác nhận</mark>
                                <form class="delete" action="/delete/<?=$this->e($his->user_id)?>/<?=$this->e($his->bill_id)?>" 
                                    method="POST" style="display: inline;">
                                    <button type="submit" class="btn btn-xs btn-danger" name="delete-bill">
                                    <i alt="Delete" class="fa fa-trash"> Xóa</i>
                                    </button>
                                </form>
                            </td>
                            <?php else : ?>
                                <td>
                                    <mark style="background-color:#4ebeff;">Đã xác nhận</style=>
                                    
                                </td>
                            <?php endif ?>

                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>      
                
              
                
                   
            
            
        </div>
    </section>
</div>
<div id="delete-confirm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                    data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xác nhận thông tin</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal"
                    class="btn btn-danger" id="delete">Xóa</button>
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
        
        $('button[name="delete-bill"]').on('click', function(e){
            e.preventDefault();
            const form = $(this).closest('form');
            const nameTd = $(this).closest('tr').find('td:first');
            if (nameTd.length > 0) {
                $('.modal-body').html(`Bạn có muốn xóa đơn hàng số "${nameTd.text()}"?`);
            } 
            $('#delete-confirm')
                .modal({
                    backdrop: 'static',
                    keyboard: false
                })
            .one('click', '#delete', function() {
                form.trigger('submit');
            });
        });
    });
</script>
<?php $this->stop() ?>