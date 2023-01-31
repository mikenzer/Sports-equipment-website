<?php $this->layout("layouts/admindefault", ["title" => APPNAME]) ?>
<?php $this->start("pagead") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">
            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Sản Phẩm</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Thêm mới sản phẩm</p>
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
            <div class="inner-wrapper row">
                <div class="col-md-12">
                    <form name="frm" id="frm" action="/product" method="post" class="col-md-6 col-md-offset-3" >
                        <!-- Name -->
                        <div class="form-group<?=isset($errors['pro_name']) ? ' has-error' : '' ?>">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="pro_name" class="form-control" maxlen="255" id="pro_name" placeholder="Tên..." 
                                value="<?=isset($old['pro_name']) ? $this->e($old['pro_name']) : '' ?>" />
                            <?php if (isset($errors['pro_name'])): ?>
                            <span class="help-block">
                            <strong><?=$this->e($errors['pro_name'])?></strong>
                            </span>
                            <?php endif ?>                                 
                        </div>
                        <!-- Price -->
                        <div class="form-group<?=isset($errors['pro_price']) ? ' has-error' : '' ?>">
                            <label for="name">Giá sản phẩm</label>
                            <input type="text" name="pro_price" class="form-control" maxlen="255" id="pro_price" placeholder="Giá..." 
                                value="<?=isset($old['pro_price']) ? $this->e($old['pro_price']) : '' ?>" />
                            <?php if (isset($errors['pro_price'])): ?>
                            <span class="help-block">
                            <strong><?=$this->e($errors['pro_price'])?></strong>
                            </span>
                            <?php endif ?>                                 
                        </div>
                        <!-- Brand -->
                        <div class="form-group<?=isset($errors['pro_brand']) ? ' has-error' : '' ?>">
                            <label for="name">Thương hiệu sản phẩm</label>
                            <input type="text" name="pro_brand" class="form-control" maxlen="255" id="pro_brand" placeholder="Thương hiệu..." 
                                value="<?=isset($old['pro_brand']) ? $this->e($old['pro_brand']) : '' ?>" />
                            <?php if (isset($errors['pro_brand'])): ?>
                            <span class="help-block">
                            <strong><?=$this->e($errors['pro_brand'])?></strong>
                            </span>
                            <?php endif ?>                                 
                        </div>
                        <!-- Category -->
                        <div class="form-group<?=isset($errors['pro_cate']) ? ' has-error' : '' ?>">
                            <label for="name">Loại sản phẩm</label>
                            <input type="text" name="pro_cate" class="form-control" maxlen="255" id="pro_cate" placeholder="Loại..." 
                                value="<?=isset($old['pro_cate']) ? $this->e($old['pro_cate']) : '' ?>" />
                            <?php if (isset($errors['pro_cate'])): ?>
                            <span class="help-block">
                            <strong><?=$this->e($errors['pro_cate'])?></strong>
                            </span>
                            <?php endif ?>                                 
                        </div>
                        <!--Photo -->
                        <div class="form-group<?=isset($errors['pro_photo']) ? ' has-error' : '' ?>">
                            <label for="name">Hình ảnh sản phẩm</label>
                            <input type="file" name="pro_photo" class="form-control" id="pro_photo"  
                                value="<?=isset($old['pro_photo']) ? $this->e($old['pro_photo']) : '' ?>" />
                            <?php if (isset($errors['pro_photo'])): ?>
                            <span class="help-block">
                            <strong><?=$this->e($errors['pro_photo'])?></strong>
                            </span>
                            <?php endif ?>                                 
                        </div>
                        <!-- Description -->
                        <div class="form-group<?=isset($errors['pro_notes']) ? ' has-error' : '' ?>">
                            <label for="description">Mô tả sản phẩm </label>
                            <textarea name="pro_notes" id="pro_notes" class="form-control" 
                                placeholder="Mô tả..."><?=isset($old['pro_notes']) ? $this->e($old['pro_notes']) : '' ?></textarea>
                            <?php if (isset($errors['pro_notes'])): ?>
                            <span class="help-block">
                            <strong><?=$this->e($errors['pro_notes'])?></strong>
                            </span>
                            <?php endif ?>                                 
                        </div>
                        <!-- Submit -->
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
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