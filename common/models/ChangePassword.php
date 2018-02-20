<?php

namespace common\models;

use Yii;


class ChangePassword extends User
{

    public $newPassword;
    public $currentPassword;
    public $newPasswordConfirm;

    public function rules()
    {
        return [
            [['newPassword', 'newPasswordConfirm'], 'required'],
            [['newPassword', 'newPasswordConfirm'], 'string', 'min' => 6],
            [['newPassword', 'newPasswordConfirm'], 'filter', 'filter' => 'trim'],
            [['newPasswordConfirm'], 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Пароли не совпадают!'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'newPassword' => 'Новый пароль',
            'newPasswordConfirm' => 'Подтверждение нового пароля',
        ];
    }

}