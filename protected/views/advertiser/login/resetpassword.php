<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Đăng nhập quản trị</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="<?php echo base_url() ?>/public/assets/opensans/fontcss.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url() ?>/public/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>/public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>/public/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url() ?>/public/assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="<?php echo base_url() ?>/public/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>/public/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>/public/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>/public/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="<?php echo base_url() ?>/public/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="<?php echo base_url() ?>/public/assets/admin/layout/img/logo-big.png" alt=""/>
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<?php
$form = $data['form'];
$attrName = $form->attributeLabels();
?>
<div class="content" style="width: 460px !important;">
    <form class="resetpassword-form" action="" method="post">
        <h3>Tạo mật khẩu mới</h3>
        <?php echo CHtml::errorSummary($form); ?>
        <?php echo showMessage() ?>
        <p>Tạo mật khẩu mới cho tài khoản: <strong style="color: #4db3a5"><?php echo $data['user']['email'] ?></strong></p>
        <div class="form-group">
            <?php
            $attr = array(
                'class' => 'form-control placeholder-no-fix',
                'placeholder' => $attrName['password']
            );
            ?>
            <?php echo CHtml::activePasswordField($form, 'password', $attr) ?>
        </div>

        <div class="form-group">
            <?php
            $attr = array(
                'class' => 'form-control placeholder-no-fix',
                'placeholder' => $attrName['re_password']
            );
            ?>
            <?php echo CHtml::activePasswordField($form, 're_password', $attr) ?>
        </div>
        <div class="form-actions">
            <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Cập nhật</button>
        </div>
    </form>
    <style type="text/css">
        span.help-block {
            color: red;
        }
    </style>
</div>
<div class="copyright">
    2015 © anhmantk
</div>
<!-- END LOGIN -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url() ?>/public/assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url() ?>/public/assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url() ?>/public/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/public/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/public/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/public/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/public/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url() ?>/public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() ?>/public/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>/public/assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
    jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
        Login.init();
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>