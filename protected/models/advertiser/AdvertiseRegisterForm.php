<?php

class AdvertiseRegisterForm extends CFormModel {

    public $fullname;
    public $email;
    public $mobile;
    public $password;
    public $re_password;
    public $status = 1;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('fullname, email, password, re_password, mobile', 'required'),
            array('re_password', 'compare', 'compareAttribute' => 'password'),
            array('email', 'email'),
            array('email', 'emailUnique'),
            array('status, email, password, re_password', 'default')
        );
    }

    public function emailUnique()
    {
        $db = EduDataBase::getConnection();
        $query = "SELECT * FROM {{users}} WHERE email = :email";
        $values = array(':email' => $this->email);
        $recored = $db->createCommand($query)->bindValues($values)->queryRow();
        if (!empty($recored)) {
            $this->addError('email', 'Email "' . $this->email . '" đã tồn tại rồi');
        }
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'fullname' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            're_password' => 'Xác nhận mật khẩu',
            'mobile' => 'Số điện thoại liên hệ'
        );
    }

}
