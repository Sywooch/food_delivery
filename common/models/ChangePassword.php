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
            [['currentPassword', 'newPassword', 'newPasswordConfirm'], 'required'],
            [['currentPassword'], 'validateCurrentPassword'],
            [['newPassword', 'newPasswordConfirm'], 'string', 'min' => 6],
            [['newPassword', 'newPasswordConfirm'], 'filter', 'filter' => 'trim'],
            [['newPasswordConfirm'], 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Пароли не совпадают!'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'currentPassword' => 'Текущий пароль',
            'newPassword' => 'Новый пароль',
            'newPasswordConfirm' => 'Подтверждение нового пароля',
        ];
    }

    public function validateCurrentPassword()
    {
        if (!$this->verifyPassword($this->currentPassword))
        {
            $this->addError("currentPassword", Yii::t('app', 'Текущий пароль не верный!'));
        }
    }

    public function verifyPassword($password)
    {
        $dbpassword = static::findOne(['username' => Yii::$app->user->identity->username])->password_hash;

        return Yii::$app->security->validatePassword($password, $dbpassword);
    }

}