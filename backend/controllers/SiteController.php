<?php
namespace backend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\widgets\ActiveForm;
use common\models\LoginForm;
use common\models\Profile;
use common\models\User;
use common\models\ChangePassword;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;


class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'request-password-reset', 'reset-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'profile', 'change-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProfile()
    {
        $model = Yii::$app->user->identity;
        $profile = Profile::findOne($model->getId());

        if($model->load(Yii::$app->request->post()) &&
            $profile->load(Yii::$app->request->post()) &&
            $model->save() &&
            $profile->save()) {

            $profile->user_avatar = UploadedFile::getInstance($profile, 'user_avatar');

            if($profile->user_avatar){
                if(!empty($profile->avatar)) {
                    $picture = explode('/backend/web' ,$profile->avatar);
                    unlink(getcwd().''.$picture[1]);
                }

                $imageName = uniqid();
                $profile->user_avatar->saveAs('storage/user_avatars/'.$imageName.'.'.$profile->user_avatar->extension);
                $profile->avatar = '/backend/web/storage/user_avatars/'.$imageName.'.'.$profile->user_avatar->extension;
                $profile->save(false);
            }

            Yii::$app->session->setFlash('success', 'Профиль успешно отредактирован!');
        }

        return $this->render('profile', [
            'model' => $model,
            'profile' => $profile
        ]);
    }

    public function actionChangePassword()
    {
        $model = new ChangePassword();
        $user = Yii::$app->user->identity;

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        $loadedPost = $model->load(Yii::$app->request->post());

        if ($loadedPost) {
            if ($model->validate()) {
                $user->password_hash = $model->newPassword;
                $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($user->password_hash);

                if ($user->save(false)) {
                    Yii::$app->getSession()->setFlash('success', 'Вы успешно поменяли пароль!');
                } else {
                    Yii::$app->getSession()->setFlash('danger', 'Ошибка! Не удалось поменять пароль!');
                }

                return $this->refresh();
            }
        } else {
            return $this->render('change_password', [
                'model' => $model
            ]);
        }
    }

    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRequestPasswordReset()
    {
        $this->layout = 'login';

        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Проверьте ваш email и следуйте дальнейшим инструкциям.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Email не найден.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        $this->layout = 'login';

        try {
            $user = User::findByPasswordResetToken($token);
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getUser()->login($user);

            Yii::$app->session->setFlash('success', 'Новый пароль успешно сохранен.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
