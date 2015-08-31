<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IndexController
 *
 * @author anhmantk
 */
class LoginController extends CController
{

    protected $user;
    private $_table;
    /**
     *
     * @var CDbConnection
     */
    private $db;

    public function init()
    {
        parent::init();
        $this->user = Yii::app()->session['advertiser'];
        $this->_table = 'users';
        $this->db = EduDataBase::getConnection();
        $this->layout = null;
        Yii::import('application.models.advertiser.*');
    }

    //put your code here
    public function actionIndex()
    {
        $data = array();

        $registerForm = new AdvertiseRegisterForm();
        $forgetForm = new AdvertiseForgetForm();
        if (!empty($_GET['dest'])) {
            $redirect = base64_decode($_GET['dest']);
        }
        $action = 'form';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $action = formPostParams('action');
            if ($action == 'form') {
                $this->loginProcess();
            }
            if ($action == 'forget') {
                $forgetForm = $this->forgetProcess();
            }
            if ($action == 'register') {
                $registerForm = $this->registerProcess();
            }

        } else {
            $user = Yii::app()->session['advertiser'];
            if (!empty($user)) {
                $this->redirect($redirect);
            }
        }

        $data['register'] = $registerForm;
        $data['forget'] = $forgetForm;
        $data['active'] = $action;

        $this->renderPartial('index', array('data' => $data));
    }

    private function forgetProcess()
    {
        $forgetForm = new AdvertiseForgetForm();
        $forgetForm->attributes = $_POST['AdvertiseForgetForm'];
        if ($forgetForm->validate()) {
            $email = trim($forgetForm->email);
            //kiem tra email co ton tai hay khong
            $query = "SELECT * FROM {{" . $this->_table . "}} WHERE email = :email AND is_advertiser = 1 LIMIT 1";
            $values = array(':email' => $email);
            $row = $this->db->createCommand($query)->bindValues($values)->queryRow();
            if (empty($row)) {
                Yii::app()->session['forget_error'] = 'Email không tồn tại, vui lòng kiểm tra lại hoặc liên hệ với BQT để được giúp đỡ.';
            } else {
                //tao link reset va gui vao mail cho nguoi dung
                $time_out = strtotime('+1 day');
                $base46 = $row['id'] . '<>' . $row['email'] . '<>' . $time_out;
                $url = $this->createAbsoluteUrl('login/resetpassword', array('id' => base64_encode($base46)));
                $data = array();
                $data['user'] = $row;
                $data['url'] = $url;
                $data['time_out'] = $time_out;
                $html = $this->renderPartial('reset_password_mail', array('data' => $data), true);
                send_mail(null, $row['email'], 'Lấy lại mật khẩu', $html, array(), $fromName = 'RateApp', $mail_server = 1, $attachment = '');
                Yii::app()->session['forget_success'] = 'Hệ thống đã gửi email hướng dẫn tạo mật khẩu mới, vui lòng kiểm tra email của bạn';
            }
        }
        return $forgetForm;
    }

    private function registerProcess()
    {
        $registerForm = new AdvertiseRegisterForm();
        $registerForm->attributes = $_POST['AdvertiseRegisterForm'];
        if ($registerForm->validate()) {
            $values = array(
                'fullname' => trim($registerForm->fullname),
                'email' => trim($registerForm->email),
                'mobile' => trim($registerForm->mobile),
                'password' => md5(trim($registerForm->password)),
                'created' => time(),
                'is_advertiser' => 1,
                'status' => 1
            );
            yii_insert_row($this->_table, $values);
            $values['id'] = $this->db->lastInsertID;

            Yii::app()->session['advertiser'] = $values;

            $this->redirect($this->createUrl('index/index'));
        }
        return $registerForm;
    }

    private function loginProcess()
    {
        if (!isset($_GET['dest'])) {
            $redirect = $this->createUrl('index/index');
        }

        $email = formPostParams('email', VARIABLE_STRING);
        $password = formPostParams('password', VARIABLE_STRING);
        $condition = array(
            ':email' => $email,
            ':password' => md5($password)
        );
        $query = "SELECT * FROM {{" . $this->_table . "}} WHERE email = :email AND password = :password AND is_advertiser = 1";
        $user = $this->db->createCommand($query)->bindValues($condition)->queryRow();

        if (!empty($user)) {
            Yii::app()->session['advertiser'] = $user;
            $this->redirect($redirect);
        } else {
            createMessage('Email hoặc mật khẩu không đúng', 'danger');
        }
    }

    public function actionResetPassword()
    {
        $id = urlGETParams('id');
        $base64Data = base64_decode($id);
        $arr = explode('<>', $base64Data);
        if (count($arr) < 3) {
            $this->redirect($this->createUrl('index'));
        }
        if ($arr[2] <= time()) {
            createMessage('URL hết hạn', 'danger');
            $this->redirect($this->createUrl('index'));
        }

        $query = "SELECT * FROM {{" . $this->_table . "}} WHERE id = :id AND email = :email AND is_advertiser = 1 LIMIT 1";
        $values = array(':email' => $arr[1], ':id' => $arr[0]);
        $row = $this->db->createCommand($query)->bindValues($values)->queryRow();
        if (empty($row)) {
            $this->redirect($this->createUrl('index'));
        }
        $data = array('user' => $row);
        $resetForm = new AdvertiseResetPasswordForm();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $resetForm->setAttributes($_POST['AdvertiseResetPasswordForm']);
            if ($resetForm->validate()) {
                $query = "UPDATE {{" . $this->_table . "}} SET password = :password WHERE id = " . $arr[0];
                $values = array(':password' => md5($resetForm->password));
                $this->db->createCommand($query)->bindValues($values)->execute();
                Yii::app()->session['reset_passsword'] = $row['email'];
                $this->redirect($this->createUrl('success'));
            }
        }

        $data['form'] = $resetForm;
        $this->render('resetpassword', array('data' => $data));
    }

    public function actionSuccess() {
        if(empty(Yii::app()->session['reset_passsword'])) {
            $this->redirect($this->createUrl('index'));
        }
        $this->render('success');
    }

    public function actionLogout()
    {
        $user = Yii::app()->session['advertiser'];
        if (!empty($user)) {
            unset(Yii::app()->session['advertiser']);
            Yii::app()->session->clear();
        }
        $this->redirect($this->createUrl('login/index'));
    }

}
