<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class CityArea extends ActiveRecord
{

    public static function tableName()
    {
        return 'city_area';
    }

    public function rules()
    {
        return [
            [['region', 'delivery_price'], 'required'],
            [['region'], 'string', 'max' => 255],
            [['delivery_price'], 'number']
        ];
    }

    public function attributeLabels()
    {
        return [
            'region' => 'Район города',
            'delivery_price' => 'Стоимость доставки'
        ];
    }

}