<?php
$style='display:none;';
if($data['active'] == 'form') {
    $style='';
}
?>
<form class="login-form" method="post"  style="<?php echo $style ?>">
    <h3 class="form-title">DÀNH CHO NHÀ QUẢNG CÁO</h3>
    <?php echo showMessage() ?>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" placeholder="Email" name="email"/>
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" placeholder="Password"
               name="password"/>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-success uppercase">Đăng nhập</button>
        <a href="javascript:;" id="forget-password" class="forget-password">Quên mật khẩu?</a>
    </div>
    <div class="create-account">
        <p>
            <a href="javascript:;" id="register-btn" class="uppercase">Đăng ký</a>
        </p>
    </div>
    <input type="hidden" name="action" value="form" />
</form>