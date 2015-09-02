<?php

class AdsController extends AdvertiserController
{
    public function init()
    {
        parent::init();
        $this->_table = 'campaign';
    }

    public function actionIndex()
    {
        $data = array();
        $where = "";
        $query = "SELECT * FROM {{" . $this->_table . "}} WHERE uid = " . $this->user['id'] . $where . " ORDER BY id DESC";
        $data['listItem'] = $this->db->createCommand($query)->queryAll();

        $this->render('index', array('data' => $data));
    }

    public function actionAdd()
    {
        $data = array();
        $form = new AddAdsForm();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $form->setAttributes($_POST['AddAdsForm']);
            if ($form->validate()) {

                $start_time = 0;
                $end_time = 0;
                if ($form->campaign_type == 1) {
                    $start_time = $form->start_time;
                    $arr = explode('/', $start_time);
                    $arr = array_reverse($arr);
                    $date = implode('/', $arr) . ' 00:00:00';
                    $start_time = strtotime($date);
                } else {
                    $arrDate = explode(' - ', $form->range_time);

                    $start_time = $arrDate[0];
                    $arr = explode('/', $start_time);
                    $arr = array_reverse($arr);
                    $date = implode('/', $arr) . ' 00:00:00';
                    $start_time = strtotime($date);

                    $start_time2 = $arrDate[1];
                    $arr = explode('/', $start_time2);
                    $arr = array_reverse($arr);
                    $date = implode('/', $arr) . ' 00:00:00';
                    $end_time = strtotime($date);
                }

                $image = $this->saveAppIcon($form->image);
                $values = array(
                    'uid' => $this->user['id'],
                    'bundle_id' => trim($form->bundle_id),
                    'apple_id' => trim($form->apple_id),
                    'app_name' => trim($form->app_name),
                    'image' => $image,
                    'os' => intval($form->os),
                    'install_number' => intval($form->install_number),
                    'url_post_back' => trim($form->url_post_back),
                    'campaign_type' => intval($form->campaign_type),
                    'start_time' => $start_time,
                    'end_time' => $end_time
                );
                yii_insert_row($this->_table, $values);
                createMessage('Tạo quảng cáo thành công, quảng cáo của bạn sẽ được Admin duyệt trong vòng 24h');
                $this->redirect($this->createUrl('index'));
            }
        }


        $data['form'] = $form;
        $this->render('add', array('data' => $data));
    }

    private function saveAppIcon($url)
    {
        if (!is_dir(IMAGE_PATH)) {
            mkdir(IMAGE_PATH);
        }
        if (!is_dir(IMAGE_PATH_TMP)) {
            mkdir(IMAGE_PATH_TMP);
        }

        $folder = general_character();
        if (!is_dir(IMAGE_PATH . '/' . $folder)) {
            mkdir(IMAGE_PATH . '/' . $folder);
        }
        if (!is_dir(IMAGE_PATH_TMP . '/' . $folder)) {
            mkdir(IMAGE_PATH_TMP . '/' . $folder);
        }

        $file_name = uniqid() . '.jpg';
        $file_dest = IMAGE_PATH_TMP . '/' . $folder . '/' . $file_name;
        $image_data = file_get_contents($url);
        file_put_contents($file_dest, $image_data);


        $destination = IMAGE_PATH . '/' . $folder . '/' . $file_name;
        image_handler($file_dest, $destination, 96, 96, '', 100);
        @unlink($file_dest);
        return $folder . '/' . $file_name;
    }

    public function actionAppInfo()
    {
        $bundle_id = urlGETParams('bundle_id');
        $data = $this->cURLAppleGetAppInfo($bundle_id);
        $response = array();
        if ($data['resultCount'] != 1) {
            $response['status'] = -1;
            echo json_encode($response);
            die;
        }
        $response['status'] = 1;
        $row = array_shift($data['results']);
        $response['apple_id'] = $row['trackId'];
        $response['bundle_id'] = $row['bundleId'];
        $response['app_name'] = $row['trackName'];
        $response['image'] = $row['artworkUrl512'];
        echo json_encode($response);
    }

    private function cURLAppleGetAppInfo($bundle_id)
    {
        $url = 'https://itunes.apple.com/lookup?bundleId=' . $bundle_id . '&country=VN&lang=vi';
        $ch = curl_init($url);

//    curl_setopt($ch, CURLOPT_PROXY, '84.253.120.4');
//    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);

        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1');
        $response = curl_exec($ch);
        $json = json_decode($response, true);
        return $json;
    }



}
