<?php

class AdvertiseResetPasswordForm extends CFormModel {

    public $password;
    public $re_password;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('password', 'required'),
            array('password', 'length', 'min' => 6),
            array('re_password', 'compare', 'compareAttribute' => 'password')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'password' => 'Mật khẩu mới',
            're_password' => 'Xác nhận mật khẩu mới',
        );
    }

}
