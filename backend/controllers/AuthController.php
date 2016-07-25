<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 9:55
 */

namespace backend\controllers;

use yii;
use yii\web;
use yii\web\Controller;
use common\models\User;

class AuthController extends BaseController{
   /*获取菜单*/
   public function getAuthMenu(){
       $admin = new User();
      return $admin->getId();
   }

    /*添加角色*/
   public function actionAddRole(){

   }
    /*编辑角色*/
    public function actionEditRole(){

    }
    /*删除角色*/
    public function actionDelRole(){

    }


}