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
            [['name', 'time_from', 'time_to', 'score', 'main_address', 'contact_email'], 'required'],
            [['contact_email'], 'email'],
            [['main_address'], 'string'],
            [['time_from', 'time_to'], 'string', 'max' => 10],
            [['facebook_url', 'instagram_url', 'latitude', 'longitude', 'logo_alt', 'logo_title'], 'string', 'max' => 255],
            [['facebook_status', 'instagram_status', 'score'], 'integer'],
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
            'main_address' => 'Адрес',
            'site_logo' => 'Логотип сайта',
            'time_from' => 'Часы работы "от"',
            'time_to' => 'Часы работы "до"',
            'score' => 'Количество гривен за 1 балл',
            'logo_alt' => 'Alt логотипа',
            'logo_title' => 'Title логотипа',
            'contact_email' => 'Email для формы обратной связи'
        ];
    }

}