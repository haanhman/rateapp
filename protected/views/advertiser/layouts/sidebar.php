<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <?php
            $controller = Yii::app()->controller->id;
            $action = Yii::app()->controller->action->id;
            ?>
            <li class="start <?php if($controller == 'index') echo 'active'; ?>">
                <a href="<?php echo $this->createUrl('index/index') ?>">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="arrow "></span>
                </a>
            </li>
            <li class="<?php if($controller == 'ads') echo 'active'; ?>">
                <a href="javascript:;">
                    <i class="icon-grid"></i>
                    <span class="title">Quảng cáo</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li class="<?php if($controller == 'ads' && $action == 'index') echo 'active'; ?>">
                        <a href="<?php echo $this->createUrl('ads/index') ?>">
                            <i class="icon-briefcase"></i> Danh sách</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>