<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/21
 * Time: 10:14
 */
namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class Role extends ActiveRecord
{

    const STATUS_OPEN = 1;

    public static function tableName()
    {
        return '{{%admin_role}}';
    }

    public static function getAdminMenu($role_id){
        return static::findOne(['id' => $role_id, 'status' => self::STATUS_OPEN]);
    }


}