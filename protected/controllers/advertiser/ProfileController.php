<?php

class ProfileController extends AdvertiserController
{
    public function actionPassword() {
        $data = array();
        $form = new AdvertiseChangePasswordForm();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form->attributes = $_POST['AdvertiseChangePasswordForm'];
            if ($form->validate()) {
                $uid = $this->user['id'];
                $query = "UPDATE {{users}} SET password = :password WHERE id = " . $uid;
                $this->db->createCommand($query)->bindValues(array(':password' => md5($form->password)))->execute();

                Yii::app()->session['advertiser']['password'] = md5($form->password);
                createMessage('Thay đổi mật khẩu thành công');
                $this->redirect($this->createUrl('password'));
            }
        }
        $data['form'] = $form;
        $this->render('password', array('data' => $data));
    }
}
