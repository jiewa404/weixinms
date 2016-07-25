<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 14:54
 */

namespace  backend\controllers;


use backend\models\User;
use Yii;
use yii\web;
use backend\controllers\BaseController;



class UserController extends BaseController{

    public function actionIndex(){
        $model = new User();
        $model=$model->find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionList(){

        Yii::$app->response->format =  web\Response::FORMAT_JSON;
        return  User::find()->select('*')->asArray()->all();
    }

}