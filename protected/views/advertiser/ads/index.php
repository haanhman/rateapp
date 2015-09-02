<!--<h3 class="page-title">-->
<!--    Blank Page-->
<!--</h3>-->
<div class="row">
    <div class="col-md-12">

        <div style="margin-bottom: 10px;">
            <a href="<?php echo $this->createUrl('add') ?>" class="btn btn-circle red-sunglo btn-sm">
                <i class="fa fa-plus"></i> Thêm mới</a>
        </div>
        <?php echo showMessage() ?>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    Danh sách quảng cáo
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="vertical-align: middle">STT</th>
                            <th style="width: 40%; vertical-align: middle">Tên ứng dụng</th>
                            <th>Hình ảnh</th>
                            <th style="vertical-align: middle">
                                <div class="col-md-12" style="text-align: center; border-bottom: 1px solid #ddd">
                                    Số lượt cài đặt
                                </div>
                                <div class="col-md-6" style="text-align: center;  border-right: 1px solid #ddd">
                                    Yêu cầu
                                </div>
                                <div class="col-md-6" style="text-align: center">
                                    Đã cài
                                </div>
                            </th>
                            <th style="vertical-align: middle; width: 15%">Thời gian chạy chiến dịch</th>
                            <th style="vertical-align: middle">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (!empty($data['listItem'])) {
                            $i = 1;
                            foreach ($data['listItem'] as $item) {
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $i ?></td>
                                    <td>
                                        <?php
                                        echo '<a target="_blank" href="https://itunes.apple.com/app/id'.$item['apple_id'].'">'.$item['app_name'].'</a><br />';
                                        echo 'Bundle ID: <strong>' . $item['bundle_id'] . '</strong><br />';
                                        echo 'Apple ID: <strong>' . $item['apple_id'] . '</strong>';
                                        ?>
                                    </td>
                                    <td>
                                        <a target="_blank" href="https://itunes.apple.com/app/id<?php echo $item['apple_id'] ?>">
                                            <img src="<?php echo get_image_file($item['image']) ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <div class="col-md-6" style="text-align: center">
                                            <?php echo number_format($item['install_number'], 0, '', ',') ?>
                                        </div>
                                        <div class="col-md-6" style="text-align: center; font-weight: bold">
                                            0
                                        </div>
                                    </td>
                                    <td>
                                        <?php
                                        if ($item['end_time'] > 0) {
                                            echo date('d/m/Y', $item['start_time']) . ' - ' . date('d/m/Y', $item['end_time']);
                                        } else {
                                            echo date('d/m/Y', $item['start_time']);
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $status_label = array(
                                            0 => 'info',
                                            1 => 'success',
                                            2 => 'warning',
                                            3 => 'danger',
                                        );
                                        ?>
                                        <span class="label label-sm label-<?php echo $status_label[$item['status']] ?>">
                                            <?php
                                            $status = array(
                                                0 => 'Chờ duyệt',
                                                1 => 'Đã duyệt, đang chạy',
                                                2 => 'Kết thúc',
                                                3 => 'Không duyệt'
                                            );
                                            echo $status[$item['status']];
                                            ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>