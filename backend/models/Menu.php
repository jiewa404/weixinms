<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/20
 * Time: 10:09
 */
namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

class Menu extends  ActiveRecord{

    public static function tableName()
    {
        return '{{%menu}}';
    }

}
