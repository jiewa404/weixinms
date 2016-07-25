<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/19
 * Time: 9:34
 */
namespace  backend\controllers;
use Yii;
use yii\web\Controller;

class TestController extends BaseController{
    public function actionIndex(){
       echo 'test/index';
    }
    public function actionShow(){
        echo 'test/show';
    }
    public function actionEdit(){
        echo 'test/edit';
    }

}