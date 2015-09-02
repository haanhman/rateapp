<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>/public/assets/global/plugins/clockface/css/clockface.css"/>
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css"/>
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css"/>
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
<link rel="stylesheet" type="text/css"
      href="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>

<?php
$form = $data['form'];
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    Đăng ký quảng cáo
                </div>
            </div>
            <?php echo CHtml::errorSummary($form); ?>
            <div class="portlet-body form">
                <form class="form-horizontal" action="" method="POST">

                    <div class="form-body">
                        <div class="form-group">
                            <?php echo CHtml::activeLabel($form, 'bundle_id', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php echo CHtml::activeTextField($form, 'bundle_id', array('class' => 'form-control')) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::activeLabel($form, 'apple_id', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php echo CHtml::activeTextField($form, 'apple_id', array('class' => 'form-control')) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::activeLabel($form, 'app_name', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php echo CHtml::activeTextField($form, 'app_name', array('class' => 'form-control')) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::activeLabel($form, 'app_name', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php
                                    $url = !empty($form->image) ? trim($form->image) : '/public/img/icon_app.png';
                                ?>
                                <img id="app_image" src="<?php echo $url ?>" alt="" style="max-width: 96px" />
                                <?php echo CHtml::activeHiddenField($form, 'image', array('class' => 'form-control')) ?>
                            </div>
                        </div>



                        <div class="form-group">
                            <?php echo CHtml::activeLabel($form, 'os', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php echo CHtml::activeDropDownList($form, 'os', array(1 => 'iOS'), array('class' => 'form-control', 'style' => 'width: 200px;')) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::activeLabel($form, 'install_number', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php echo CHtml::activeTextField($form, 'install_number', array('placeholder' => '>= 1000','class' => 'form-control')) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::activeLabel($form, 'url_post_back', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php echo CHtml::activeTextField($form, 'url_post_back', array('placeholder' => 'Option','class' => 'form-control')) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo CHtml::activeLabel($form, 'campaign_type', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php
                                $option = array(
                                    1 => 'Chạy hết lượng cài đặt yêu cầu',
                                    2 => 'Chạy trong thời gian yêu cầu'
                                );
                                ?>
                                <?php echo CHtml::activeDropDownList($form, 'campaign_type', $option, array('class' => 'form-control', 'style' => 'width: 300px;')) ?>
                            </div>
                        </div>
                        <div class="form-group start_time" <?php if($form->campaign_type == 2) echo 'style="display: none;"'; ?>>
                            <?php echo CHtml::activeLabel($form, 'start_time', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <?php echo CHtml::activeTextField($form, 'start_time', array('readonly' => true, 'class' => 'form-control date-picker', 'style' => 'width: 150px;')) ?>

                            </div>
                        </div>

                        <div class="form-group range_time" <?php if($form->campaign_type == 1) echo 'style="display: none;"'; ?>>
                            <?php echo CHtml::activeLabel($form, 'range_time', array('class' => 'col-md-3 control-label')); ?>
                            <div class="col-md-9">
                                <div class="input-group input-medium" id="defaultrange_modal">
                                    <?php echo CHtml::activeTextField($form, 'range_time', array('readonly' => true, 'class' => 'form-control')) ?>
                                    <span class="input-group-btn">
															<button class="btn default date-range-toggle" type="button">
                                                                <i class="fa fa-calendar"></i></button>
															</span>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="form-actions">
                        <label class="col-md-3 control-label">&nbsp;</label>

                        <div class="col-md-9">
                            <button type="submit" class="btn blue">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--<script src="--><?php //echo base_url() ?><!--/public/assets/admin/pages/scripts/components-pickers.js" type="text/javascript"></script>-->

<script type="text/javascript"
        src="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>/public/assets/global/plugins/clockface/js/clockface.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript"
        src="<?php echo base_url() ?>/public/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script src="<?php echo base_url() ?>/public/assets/admin/pages/scripts/addads.js" type="text/javascript"></script>