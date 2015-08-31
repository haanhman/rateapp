<?php
$form = $data['register'];
$attrName = $form->attributeLabels();

$style='display:none;';
if($data['active'] == 'register') {
    $style='';
}
?>

<form class="register-form" action="" method="post" style="<?php echo $style ?>">
    <h3>Đăng ký</h3>
    <?php echo CHtml::errorSummary($form); ?>
    <div class="form-group">
        <?php
            $attr = array(
                'class' => 'form-control placeholder-no-fix',
                'placeholder' => $attrName['fullname']
            );
        ?>
        <?php echo CHtml::activeTextField($form, 'fullname', $attr) ?>
    </div>
    <div class="form-group">
        <?php
        $attr = array(
            'class' => 'form-control placeholder-no-fix',
            'placeholder' => $attrName['email']
        );
        ?>
        <?php echo CHtml::activeTextField($form, 'email', $attr) ?>
    </div>

    <div class="form-group">
        <?php
        $attr = array(
            'class' => 'form-control placeholder-no-fix',
            'placeholder' => $attrName['mobile']
        );
        ?>
        <?php echo CHtml::activeTextField($form, 'mobile', $attr) ?>
    </div>

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
    <input type="hidden" name="action" value="register" />
    <div class="form-actions">
        <button type="button" id="register-back-btn" class="btn btn-default">Quay lại</button>
        <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Đăng ký</button>
    </div>
</form>