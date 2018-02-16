<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Addresses extends ActiveRecord
{

    public static function tableName()
    {
        return 'addresses';
    }

    public function rules()
    {
        return [
            [['address'], 'required'],
            [['address'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'address' => 'Адрес'
        ];
    }

}