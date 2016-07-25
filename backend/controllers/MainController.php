<?php
/**
 * Created by PhpStorm.
 * User: wangjie404
 * Date: 2016/7/18
 * Time: 13:52
 */
namespace  backend\controllers;

use backend\models\Menu;
use Yii;
use yii\web\Controller;
use yii\web;



class MainController extends BaseController{

    public function actionIndex(){
        return $this->render('index');
    }
  /*
   * 后台菜单
   * User: wangjie404
   * Date: 2016/7/20
   */
    public function actionMenu()
    {
        //设置返回的格式 为json
        Yii::$app->response->format =  web\Response::FORMAT_JSON;
        $res = Menu::find()->select('id, pid, name, route, icon')->asArray()->all();
        return $this->combine($res);
    }

    public function  actionTest(){
        var_dump($this->auth()->menu_id);
    }

    /*
     * 菜单整理
     * User: wangjie404
     * Date: 2016/7/20
     */
    public function combine($arr=[]){
        if(isset($arr)){
          foreach ($arr as $key => $value){
              $combine[$value['id']]=$value;
          }
        }
       return $combine;
    }
}