<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Phones extends ActiveRecord
{

    public static function tableName()
    {
        return 'phones';
    }

    public function rules()
    {
        return [
            [['phone'], 'required'],
            [['phone'], 'string', 'max' => 50]
        ];
    }

    public function attributeLabels()
    {
        return [
            'phone' => 'Номер телефона'
        ];
    }

}