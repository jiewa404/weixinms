<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/15
 * Time: 11:33
 */
namespace backend\controllers;
use Yii;
use yii\web;
use yii\web\Controller;
use common\models\WechatUser;
use common\components\weixin;

class WechatController extends Controller
{
    public $enableCsrfValidation = false;

    /**
     * Created by wangjie404
     * Date: 2016/7/15
     * Time: 11:33
     * 验证微信链接
     */
    
    public function actionValid(){
        //获取配置
        $config=Yii::$app->params['weixin'];
        $weixin = new weixin\Wechat($config);
        $echoStr = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        if($weixin->checkSignature($signature,$timestamp,$nonce)){
            echo $echoStr;
            exit;
        }
   }
    /**
     * Created by wangjie404
     * Date: 2016/7/15
     * Time: 11:33
     * 接入微信
     */
    public function actionSignature(){
        if (!isset($_GET['echostr'])) {
          $this->responseMsg();
        }else{
            return $this->actionValid();
        }
    }

    /**
     * Created by wangjie404
     * Date: 2016/7/15
     * Time: 11:33
     * 执行接收器方法
     */
    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $RX_TYPE = trim($postObj->MsgType);
            if (($postObj->MsgType == "event") && ($postObj->Event == "subscribe" || $postObj->Event == "unsubscribe")){
                //过滤关注和取消关注事件
            }
            //消息类型分离
            switch ($RX_TYPE)
            {
                case "event":
                    $result = $this->receiveEvent($postObj);
                    break;
                case "text":
                        $result = $this->receiveText($postObj);
                    break;
                default:
                    $result = "unknown msg type: ".$RX_TYPE;
                    break;
            }
            echo $result;
        }else {
            echo "";
            exit;
        }
    }
    //接收事件消息
    private function receiveEvent($object)
    {
        switch ($object->Event)
        {
            //关注事件
            case "subscribe":
                $content = "欢迎";
                $this->toDatabase("{$object->FromUserName}");
                $content .= (!empty($object->EventKey))?("\n来自二维码场景 ".str_replace("qrscene_","",$object->EventKey)):"";
                break;
            default:
                $content = "receive a new event: ".$object->Event;
                break;
        }
        return weixin\Wechat::transmitText($object, $content);
    }
    /**
     * Created by wangjie404
     * Date: 2016/7/15
     * Time: 11:33
     * 处理文本消息  param [$object]
     */

    private function receiveText($object)
    {
        $keyword = trim($object->Content);
        //自动回复模式 全词匹配
        if (strstr($keyword, "wifi")){
            $content = "haha 没有wifi密码 逗你玩呢！";
        }
        //自动回复模式 包含匹配
            $content = date("Y-m-d H:i:s",time())."\n爱悦悦 欢迎您\n回复【wifi】查看密码";


        return weixin\Wechat::transmitText($object, $content);
    }

    /**
     * Created by wangjie404
     * Date: 2016/7/15
     * Time: 11:33
     * 关注着用户入库 param [$openid]
     */
    public function  toDatabase($openid){
        $config=Yii::$app->params['weixin'];
        $weixin = new weixin\Wechat($config);
        if(empty($openid)){
          $error=[
              'code' => '000001',
              'msg' => "openid is null",
          ];
            exit(json_encode($error));
        }
        $user_check = WechatUser::find()->where(['openid'=>$openid])->one();
        $userinfo=$weixin->getMemberInfo($openid);
        $wechat= new WechatUser();
        if ($user_check) {
            //更新用户资料
        } else {
            $wechat->openid=$openid;
            $wechat->nickname=$userinfo['nickname'];
            $wechat->language = $userinfo['language'];
            $wechat->sex = $userinfo['sex'];
            $wechat->headimgurl = $userinfo['headimgurl'];
            $wechat->country = $userinfo['country'];
            $wechat->province =$userinfo['province'];
            $wechat->city= $userinfo['city'];
            $wechat->access_token = $userinfo['nickname'];
            $wechat->refresh_token = $userinfo['nickname'];
            $wechat->subscribe_time = $userinfo['subscribe_time'];
            $wechat->subscribe = $userinfo['subscribe'];
            $wechat->groupid = $userinfo['groupid'];
            $wechat ->save();
        }

    }

    public function actionUser(){
        $wechat= new WechatUser();
        $data=$wechat->find()->all();
        foreach ($data as $key=>$value){
            echo $value->nickname;
            echo date("Y-m-d H:i:s",$value->subscribe_time);
            echo "<hr>";

        }
       // var_dump($data);

    }


}