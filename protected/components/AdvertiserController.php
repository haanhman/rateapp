<?php

class AdvertiserController extends CController
{

    protected $_table;
    protected $user;

    /**
     *
     * @var CDbConnection
     */
    protected $db;

    public function init()
    {
        parent::init();

        $this->db = EduDataBase::getConnection();
        $this->user = Yii::app()->session['advertiser'];
        if (empty($this->user)) {
            $query_string = '?dest=' . base64_encode($_SERVER['REQUEST_URI']);
            $redirect = '/advertiser/login/index' . $query_string;
            $this->redirect($redirect);
        }

        //chon ngon ngu cho site
//        $lang = 'vi';
//        Yii::app()->sourceLanguage = '00';
//        Yii::app()->language = $lang;
        Yii::import('application.models.advertiser.*');
        Yii::app()->setSystemViewPath(ROOT_PATH . '/protected/views/system');
    }

    /**
     * get row data
     * @param $row_id
     * @param $table_name
     * @return CDbDataReader|mixed
     */
    public function getRow($row_id, $table_name = '')
    {
        $table = !empty($table_name) ? $table_name : $this->_table;
        $query = "SELECT * FROM {{" . $table . "}} WHERE id = " . $row_id;
        return $this->db->createCommand($query)->queryRow();
    }

}
