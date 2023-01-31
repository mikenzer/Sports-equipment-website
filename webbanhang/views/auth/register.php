<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>
<?php $this->start("page") ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Đăng ký</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/register">
                        <div class="form-group<?=isset($errors['user_name']) ? ' has-error' : '' ?>">
                            <label for="name" class="col-md-4 control-label">Tên</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="user_name" 
                                    value="<?=isset($old['user_name']) ? $this->e($old['user_name']) : '' ?>" required autofocus>
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
                                    value="<?=isset($old['user_phone']) ? $this->e($old['user_phone']) : '' ?>" required autofocus>
                                <?php if (isset($errors['user_phone'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_phone'])?></strong>
                                </span>
                                <?php endif ?>                                  
                            </div>
                        </div>
                        <div class="form-group<?=isset($errors['user_address']) ? ' has-error' : '' ?>">
                            <label for="name" class="col-md-4 control-label">Địa chỉ hiện tại</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="user_address" 
                                    value="<?=isset($old['user_address']) ? $this->e($old['user_address']) : '' ?>" required autofocus>
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
                                    value="<?=isset($old['user_email']) ? $this->e($old['user_email']) : '' ?>" required>
                                <?php if (isset($errors['user_email'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_email'])?></strong>
                                </span>
                                <?php endif ?>       
                            </div>
                        </div>
                        <div class="form-group<?=isset($errors['user_password']) ? ' has-error' : '' ?>">
                            <label for="password" class="col-md-4 control-label">Mật khẩu</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="user_password" required>
                                <?php if (isset($errors['user_password'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_password'])?></strong>
                                </span>
                                <?php endif ?>                                  
                            </div>
                        </div>
                        <div class="form-group<?=isset($errors['user_password_confirmation']) ? ' has-error' : '' ?>">
                            <label for="password-confirm" class="col-md-4 control-label">Nhập lại mật khẩu</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="user_password_confirmation" required>
                                <?php if (isset($errors['user_password_confirmation'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_password_confirmation'])?></strong>
                                </span>
                                <?php endif ?>                                  
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                Đăng ký
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>