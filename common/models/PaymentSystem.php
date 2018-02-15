<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class PaymentSystem extends ActiveRecord
{

    public static function tableName()
    {
        return 'payment_system';
    }

    public function rules()
    {
        return [
            [['public_key', 'private_key', 'payment_name', 'sandbox'], 'required'],
            [['public_key', 'private_key', 'payment_name'], 'string', 'max' => 255],
            [['public_key', 'private_key',], 'string'],
            [['sandbox'], 'integer']
        ];
    }

    public function attributeLabels()
    {
        return [
            'public_key' => 'Public key',
            'private_key' => 'Private key',
            'payment_name' => 'Имя оплаты',
            'sandbox' => 'Тестовый режим'
        ];
    }

}