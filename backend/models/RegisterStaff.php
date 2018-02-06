<?php

namespace backend\models;

use Yii;
use yii\base\Model;

class RegisterStaff extends Model
{

    public $username;
    public $password;
    public $email;

    public $name;
    public $surname;
    public $photo;
    
    public $role;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой никнейм уже зарегистрирован.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой email уже зарегистрирован.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['name', 'surname'], 'trim'],
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'max' => 255],

            ['photo', 'file'],
            
            ['role', 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Email',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'photo' => 'Фото пользователя',
            'role' => 'Роль'
        ];
    }

}