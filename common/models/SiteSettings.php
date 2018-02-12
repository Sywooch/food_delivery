<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class SiteSettings extends ActiveRecord
{

    public $site_logo;

    public static function tableName()
    {
        return 'site_settings';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['meta_description'], 'string'],
            [['facebook_url', 'instagram_url', 'meta_title'], 'string', 'max' => 255],
            [['facebook_status', 'instagram_status'], 'integer'],
            [['site_logo'], 'file', 'extensions' => 'png, jpg, jpeg']
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название сайта',
            'facebook_url' => 'Facebook ссылка',
            'instagram_url' => 'Instagram ссылка',
            'facebook_status' => 'Facebook статус',
            'instagram_status' => 'Instagram статус',
            'site_logo' => 'Логотип сайта',
            'meta_title' => 'Мета заголовок',
            'meta_description' => 'Мета описание'
        ];
    }

}