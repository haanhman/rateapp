<?php

$backend_settings = array(
    'name' => 'Quản lý quảng cáo - Advertiser',
    'defaultController' => 'index',
    'components' => array(
        'componentConfig' => array(
            'coreMessages' => array(
                'language' => 'vi'
            )
        ),
        'urlManager' => array(
            'class' => 'BackendUrlManager',
            'urlFormat' => 'path',
            'rules' => array(                
                'advertiser' => 'index/index',
                'advertiser/login' => 'login/index',
                'advertiser/<controller>' => '<controller>',
                'advertiser/<controller>/<action>' => '<controller>/<action>',
            ),
        )
    )
);
return CMap::mergeArray(require(dirname(__FILE__) . '/main.php'), $backend_settings);