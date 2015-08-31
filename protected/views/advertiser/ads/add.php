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

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i> Đăng ký quảng cáo
                </div>
            </div>
            <div class="portlet-body form">
                <form class="form-horizontal" action="" method="POST">

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Bundle ID</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Apple ID</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tên ứng dụng</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Hình ảnh</label>

                            <div class="col-md-9">
                                <img src="/public/img/icon_app.png" style="max-width:96px;" />
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Hệ điều hành</label>

                            <div class="col-md-9">
                                <select class="form-control" style="width: 200px;">
                                    <option value="1">iOS</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Số lượng cài đặt yêu cầu</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" style="width: 200px" placeholder=">=1000">
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">UrlPostBack</label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Enter text">
                            </div>
                        </div>
                    </div>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Hình thức chạy chiến dịch</label>

                            <div class="col-md-9">

                                <select class="form-control" style="width: 300px;">
                                    <option value="1">Chạy hết lượng cài đặt yêu cầu</option>
                                    <option value="2">Chạy trong thời gian yêu cầu</option>
                                </select>
                                <br />
                                <label>Thời gian bắt đầu chạy</label><br />

                                <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" value="">

                                <div class="input-group input-large" id="defaultrange_modal">
                                    <input type="text" class="form-control" readonly="">
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


<script type="text/javascript">
    $(function () {
        $('.date-picker').datepicker({
            rtl: Metronic.isRTL(),
            format: 'dd/mm/yyyy',
            orientation: "left",
            autoclose: true,

        });

        $('#defaultrange_modal').daterangepicker({
                opens: (Metronic.isRTL() ? 'left' : 'right'),
                format: 'DD/MM/YYYY',
                separator: ' to ',
                startDate: moment(),
                endDate: moment().add('days', 29),
                minDate: '01/01/2012',
                maxDate: '12/31/2018',
            },
            function (start, end) {
                $('#defaultrange_modal input').val(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            }
        );

    });
</script>