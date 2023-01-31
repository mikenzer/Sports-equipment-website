<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>
<?php $this->start("page") ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- FLASH MESSAGES HERE -->
            <div class="panel panel-default">
                <div class="panel-heading">Đăng nhập</div>
                <div class="panel-body">
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
                    <form class="form-horizontal" role="form" method="POST" action="/login">
                        <div class="form-group <?=isset($errors['user_email']) ? 'has-error' : '' ?>">
                            <label for="email" class="col-md-4 control-label">Địa chỉ E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="user_email" 
                                    value="<?=isset($old['user_email']) ? $this->e($old['user_email']) : '' ?>" required autofocus>
                                <?php if (isset($errors['user_email'])): ?>
                                <span class="help-block">
                                <strong><?=$this->e($errors['user_email'])?></strong>
                                </span>
                                <?php endif ?>                               
                            </div>
                        </div>
                        <div class="form-group <?=isset($errors['user_password']) ? 'has-error' : '' ?>">
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
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                Đăng nhập
                                </button>
                                <a class="btn btn-link" href="/register">
                                Bạn là người dùng mới?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>