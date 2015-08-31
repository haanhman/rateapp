<?php
$style='display:none;';
if($data['active'] == 'forget') {
    $style='';
}
$form = $data['forget'];
$attrName = $form->attributeLabels();
?>
<form class="forget-form" action="" method="post" style="<?php echo $style ?>">
    <h3>Quên mật khẩu?</h3>
    <?php echo CHtml::errorSummary($form); ?>
    <?php
        if(!empty(Yii::app()->session['forget_error'])) {
            ?>
            <div class="portlet-body">
                <div class="alert alert-block alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <h4 class="alert-heading">Error!</h4>
                    <p><?php echo Yii::app()->session['forget_error'] ?></p>
                </div>
            </div>
            <?php
            unset(Yii::app()->session['forget_error']);
        }

    if(!empty(Yii::app()->session['forget_success'])) {
        ?>
        <div class="portlet-body">
            <div class="alert alert-block alert-success fade in">
                <button type="button" class="close" data-dismiss="alert"></button>
                <p><?php echo Yii::app()->session['forget_success'] ?></p>
            </div>
        </div>
        <?php
        unset(Yii::app()->session['forget_success']);
    }
    ?>
    <p>
        Vui lòng cung cấp email bạn đã đăng ký
    </p>
    <div class="form-group">
        <?php
        $attr = array(
            'class' => 'form-control placeholder-no-fix',
            'placeholder' => $attrName['email']
        );
        ?>
        <?php echo CHtml::activeTextField($form, 'email', $attr) ?>
    </div>
    <input type="hidden" name="action" value="forget" />
    <div class="form-actions">
        <button type="button" id="back-btn" class="btn btn-default">Quay lại</button>
        <button type="submit" class="btn btn-success uppercase pull-right">Lấy lại mật khẩu</button>
    </div>
</form>