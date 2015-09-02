<?php

class AddAdsForm extends CFormModel {

    public $bundle_id;
    public $apple_id;
    public $app_name;
    public $image;
    public $os;
    public $install_number;
    public $url_post_back;
    public $campaign_type = 1;
    public $start_time;
    public $range_time;


    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('bundle_id, apple_id, app_name, os, install_number, campaign_type', 'required'),
            array('apple_id', 'numerical'),
            array('install_number', 'numerical', 'min' => 1000),
            array('image, url_post_back, start_time, range_time', 'default')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'bundle_id' => 'Bundle ID',
            'apple_id' => 'Apple ID',
            'app_name' => 'Tên ứng dụng',
            'image' => 'Hình ảnh',
            'os' => 'Hệ điều hành',
            'install_number' => 'Số lượng cài đặt yêu cầu',
            'url_post_back' => 'UrlPostBack',
            'campaign_type' => 'Hình thức chạy chiến dịch',
            'start_time' => 'Thời gian bắt đầu chạy',
            'range_time' => 'Chạy trong khoảng thời gian'
        );
    }

}
