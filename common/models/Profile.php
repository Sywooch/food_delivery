<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Profile extends ActiveRecord
{


    public $user_avatar;


    public static function tableName()
    {
        return 'profile';
    }


    public function rules()
    {
        return [
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'max' => 255],
            [['user_avatar'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'user_avatar' => 'Фото пользователя',
        ];
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

}