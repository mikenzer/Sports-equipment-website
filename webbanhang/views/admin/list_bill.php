<?php $this->layout("layouts/admindefault", ["title" => APPNAME]) ?>
<?php $this->start("pagead") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">
            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Đơn Hàng</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Danh sách đơn hàng</p>
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
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt hàng</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bills as $bill): ?>
                        <tr>
                            <td><?=$this->e($bill->bill_id)?></td>
                            <td><?=$this->e($bill->created_at)?></td>
                            <?php if ($this->e($bill->bill_status) == 0) : ?>
                            <td> 
                                <mark style="background-color:#fa8429;">Chờ xác nhận</mark>
                                
                            </td>
                            <?php else : ?>
                                <td>
                                    <mark style="background-color:#4ebeff;">Đã xác nhận</style=>
                                    
                                </td>
                            <?php endif ?>
                            <td>
                                <a href="/view-bill/<?=$this->e($bill->bill_id)?>" 
                                    class="btn btn-xs btn-primary">
                                <i alt="Edit" class="fa fa-pencil"> Xem</i></a>
                                
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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