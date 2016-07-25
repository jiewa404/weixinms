<?php
/**
 * Created by wangjie404
 * Date: 2016/7/25
 * Time: 10:09
 * 自定义菜单
 */
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class TopicMenu extends  ActiveRecord{

    const MENU_ID=1;

    public static function tableName()
    {
        return '{{%topic_menu}}';
    }
   /* 获取菜单*/
    public static function getMenu(){
        return static::findOne(['id' => self::MENU_ID]);
    }

}
