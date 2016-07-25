<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/18
 * Time: 11:21
 */
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use backend\models\Auth;
use backend\models\Role;

/**
 * Site controller
 */
class BaseController extends Controller{

    public function beforeAction($action)
    {
        //复写父类，父类可能包含csrf验证
        if (parent::beforeAction($action)) {
            if (Yii::$app->user->isGuest)
            {
                $this->redirect(['site/login']);
                return false;
            }
            $this->_log();
            return true;
        }
        return false;
    }
   /*权限验证*/

    public function auth(){
        $admin_id = Yii::$app->user->getId();
        $auth  =  Auth::getAuth($admin_id);
        if($auth->role_id>0){
            if(Role::getAdminMenu($auth->role_id)){
                return  Role::getAdminMenu($auth->role_id);
            }else{
                $error=[
                    'code' => '10002',
                    'msg'  => '该角色未分配权限',
                ];
            }
        }else{
            $error=[
                'code' => '10001',
                'msg'  => '用户未分配角色',
            ];
        }

        return json_encode($error);
    }


    private function  _log(){
       // echo $this->id.$this->action->id;
      file_put_contents('log.txt',$this->id.$this->action->id,FILE_APPEND);
      // print_r($this);
/*            Yii::$app->oplog->set([
                'module'=> $this->module->id,
                'controller' => $this->id,
                'action' => $this->action->id,
                'menu_name' => '',
            ]);*/

    }
}