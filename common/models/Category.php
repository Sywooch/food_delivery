<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Category extends ActiveRecord
{

    public $image;

    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name', 'description', 'status'], 'required'],
            [['status'], 'integer'],
            [['name', 'meta_title', 'picture_alt', 'picture_title'], 'string', 'max' => 255],
            [['description', 'meta_description'], 'string'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Категория',
            'description' => 'Описание',
            'meta_title' => 'Мета заголовок',
            'meta_description' => 'Мета описание',
            'image' => 'Фото категории',
            'status' => 'Статус',
            'picture_alt' => 'Alt изображения',
            'picture_title' => 'Title изображения'
        ];
    }

}