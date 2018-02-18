<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Products extends ActiveRecord
{

    public $image;

    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'composition', 'price', 'category_id'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['price', 'discount_price'], 'number'],
            [['title', 'picture_alt', 'picture_title'], 'string', 'max' => 255],
            [['description', 'composition'], 'string'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg']
        ];
    }

    public function attributeLabels()
    {
        return [
            'category_id' => 'Категория',
            'title' => 'Продукт',
            'description' => 'Описание',
            'composition' => 'Состав продукта',
            'price' => 'Цена',
            'discount_price' => 'Акционная цена',
            'image' => 'Фото категории',
            'status' => 'Статус',
            'picture_alt' => 'Alt изображения',
            'picture_title' => 'Title изображения'
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

}