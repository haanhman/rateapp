<?php

class AdvertiseForgetForm extends CFormModel {

    public $email;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('email', 'required'),
            array('email', 'email')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'email' => 'Email'
        );
    }

}
