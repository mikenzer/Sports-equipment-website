<?php $this->layout("layouts/admindefault", ["title" => APPNAME]) ?>
<?php $this->start("pagead") ?>
<div class="container">
    <section id="inner" class="inner-section section">
        <div class="container">
            <!-- SECTION HEADING -->
            <h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s">Sản Phẩm</h2>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <p class="wow fadeIn" data-wow-duration="2s">Sửa thông tin sản phẩm</p>
                </div>
            </div>
            <div class="inner-wrapper row">
                <div class="col-md-12">
                    <?php foreach($product as $pro): ?>
                    <form name="frm" id="frm" action="/update/<?=$this->e($pro->pro_id)?>" method="post" class="col-md-6 col-md-offset-3" >
                        <!-- Name -->
                        <div class="form-group<?=isset($errors['pro_name']) ? ' has-error' : '' ?>">
                            <label for="name">Tên sản phẩm</label>
                            <input type="text" name="pro_name" class="form-control" maxlen="255" id="pro_name" placeholder="Tên..." 
                                value="<?=$this->e($pro->pro_name)?>" />
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
                                value="<?=$this->e($pro->pro_price)?>" />
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
                                value="<?=$this->e($pro->pro_brand)?>" />
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
                                value="<?=$this->e($pro->pro_cate)?>" />
                            <?php if (isset($errors['pro_cate'])): ?>
                            <span class="help-block">
                            <strong><?=$this->e($errors['pro_cate'])?></strong>
                            </span>
                            <?php endif ?>                                 
                        </div>
                        <!--Photo -->
                        <div class="form-group<?=isset($errors['pro_photo']) ? ' has-error' : '' ?>">
                            <label for="name">Hình ảnh sản phẩm</label>
                            <input type="file" name="pro_photo" class="form-control" id="pro_photo"/>
                            <img src="/upload/product/<?=$this->e($pro->pro_photo)?>" height="100" width="80">
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
                                placeholder="Mô tả (Tối đa 255 ký tự)..."><?=isset($old['pro_notes']) ? $this->e($old['pro_notes']) : '' ?><?=$this->e($pro->pro_notes)?></textarea>
                            <?php if (isset($errors['pro_notes'])): ?>
                            <span class="help-block">
                            <strong><?=$this->e($errors['pro_notes'])?></strong>
                            </span>
                            <?php endif ?>                                 
                        </div>
                        <!-- Submit -->
                        <button type="submit" name="submit" id="submit" class="btn btn-primary">Sửa</button>
                    </form>
                    <?php endforeach ?>
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