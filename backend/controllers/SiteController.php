<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        //复写父类，父类可能包含csrf验证
        if (parent::beforeAction($action)) {
            if (Yii::$app->user->isGuest)
            {
                $this->redirect(['site/login']);
                return false;
            }
            return true;
        }
        return false;
    }
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*管理员登录*/
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
   /*退出登录*/
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
