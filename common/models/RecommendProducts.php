<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class RecommendProducts extends ActiveRecord
{

    public static function tableName()
    {
        return 'recommend_products';
    }

    public function rules()
    {
        return [
            [['product_id', 'status'], 'required'],
            [['product_id', 'status'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'product_id' => 'Продукт',
            'status' => 'Статус'
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

}