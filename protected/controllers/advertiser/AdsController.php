<?php

class AdsController extends AdvertiserController
{
    public function actionIndex() {
        $this->render('index');
    }

    public function actionAdd() {
        $this->render('add');
    }

}
