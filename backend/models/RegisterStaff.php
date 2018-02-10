<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use common\models\Profile;
use backend\models\AuthAssignment;

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
//            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой никнейм уже зарегистрирован.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой email уже зарегистрирован.'],

//            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['name', 'surname'], 'trim'],
            [['name', 'surname'], 'required'],
            [['name', 'surname'], 'string', 'max' => 255],

            [['photo'], 'file', 'extensions' => 'png, jpg, jpeg'],
            
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

    public function RegisterStaff($request, $photo)
    {
        $user = new User();
        $profile = new Profile();
        $auth_assignment = new AuthAssignment();

        $user->username = !empty($request['username']) ? $request['username'] : $request['name'].'_'.uniqid();
        $password = !empty($request['password']) ? $request['password'] : uniqid();
        $user->password_hash = Yii::$app->security->generatePasswordHash($password);
        $user->email = $request['email'];
        $user->generateAuthKey();

        if($user->save()){
            $auth_assignment->item_name = $request['role'];
            $auth_assignment->user_id = $user->id;
            $auth_assignment->created_at = Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s'));

            if($auth_assignment->save()){
                $profile->name = $request['name'];
                $profile->surname = $request['surname'];
                $profile->user_id = $user->id;

                if($profile->save()){
                    if($photo) {
                        $imageName = uniqid();
                        $photo->saveAs('storage/user_avatars/'.$imageName.'.'.$photo->extension);
                        $profile->avatar = '/backend/web/storage/user_avatars/'.$imageName.'.'.$photo->extension;
                        $profile->save(false);
                    }

                    $this->SendActivateEmail($user->username, $password, $user->email);

                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function SendActivateEmail($login, $password, $to_email)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'activateAccount-html'],
                [
                    'login' => $login,
                    'password' => $password
                ]
            )
            ->setFrom([Yii::$app->params['adminEmail'] => 'BBQ'])
            ->setTo($to_email)
            ->setSubject('Доступ в панель администрации')
            ->send();
    }

}