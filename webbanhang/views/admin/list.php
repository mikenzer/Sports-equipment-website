<?php $this->layout("layouts/admindefault", ["title" => APPNAME]) ?>
<?php $this->start("pagead") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">
            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Sản Phẩm</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Danh sách sản phẩm</p>
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
                </div>
            </div>
            <div class="table-responsive">
                <table  id="contacts" class="table table-bordered table-responsive table-striped">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Sửa, Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product): ?>
                        <tr>
                            <td><?=$this->e($product->pro_name)?></td>
                            <td><?=$this->e(number_format($product->pro_price).''.'đ')?></td>
                            <td><img src="/upload/product/<?=$this->e($product->pro_photo)?>" height="100" width="80"></td>
                            <td>
                                <a href="/edit-product/<?=$this->e($product->pro_id)?>" 
                                    class="btn btn-xs btn-warning">
                                <i alt="Edit" class="fa fa-pencil"> Sửa</i></a>
                                <form class="delete" action="/delete/<?=$this->e($product->pro_id)?>" 
                                    method="POST" style="display: inline;">
                                    <button type="submit" class="btn btn-xs btn-danger" name="delete-contact">
                                    <i alt="Delete" class="fa fa-trash"> Xóa</i>
                                    </button>
                                </form>
                            </td>
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
        new WOW().init();
        
        $('#contacts').DataTable();           
    });
</script>
<script>
    $(document).ready(function(){
        
        $('button[name="delete-contact"]').on('click', function(e){
            e.preventDefault();
            const form = $(this).closest('form');
            const nameTd = $(this).closest('tr').find('td:first');
            if (nameTd.length > 0) {
                $('.modal-body').html(`Bạn có muốn xóa "${nameTd.text()}"?`);
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