<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class PageSeo extends ActiveRecord
{

    public $facebook_image;
    public $twitter_image_upload;

    public static function tableName()
    {
        return 'page_seo';
    }

    public function rules()
    {
        return [
            [['product_id', 'category_id'], 'integer'],
            [['meta_description', 'og_description', 'twitter_description'], 'string'],
            [
                [
                    'title_page', 'meta_title', 'og_title', 'twitter_card',
                    'twitter_title', 'twitter_image_alt', 'page_priority', 'update_frequency'
                ],
                'string', 'max' => 255
            ]
        ];
    }

    public function attributeLabels()
    {
        return [
            'title_page' => 'Заголовок страницы',
            'meta_title' => 'Мета заголовок',
            'meta_description' => 'Мета описание',
            'og_title' => 'og:title',
            'og_description' => 'og:description',
            'facebook_image' => 'og:image',
            'twitter_card' => 'twitter:card',
            'twitter_title' => 'twitter:title',
            'twitter_description' => 'twitter:description',
            'twitter_image_upload' => 'twitter:image',
            'twitter_image_alt' => 'twitter:image:alt',
            'page_priority' => 'Приоритет страницы',
            'update_frequency' => 'Частота обновления'
        ];
    }

}