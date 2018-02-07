<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use backend\models\UserSearch;
use backend\models\AuthAssignment;
use backend\models\RegisterStaff;
use common\models\Profile;
use common\models\User;
use yii\web\UploadedFile;


class StaffController extends Controller
{
    
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
    
    //Регистрация нового персонала
    public function actionCreate()
    {
        $model = new RegisterStaff();
        
        if($model->load(Yii::$app->request->post())) {
            $model->photo = UploadedFile::getInstance($model, 'photo');
            
            if($model->RegisterStaff(Yii::$app->request->post('RegisterStaff'), $model->photo)) {
                Yii::$app->session->setFlash('success', 'Пользователь успешно зарегистрирован!');
                
                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }
    
    //редактирование профиля персонала
    public function actionUpdate($id)
    {
        $model = new RegisterStaff();
        $user = User::findOne($id);
        $profile = Profile::findOne(['user_id' => $id]);
        $auth_assignment = AuthAssignment::findOne(['user_id' => $id]);

        if($user->load(Yii::$app->request->post()) && $profile->load(Yii::$app->request->post()) && $auth_assignment->load(Yii::$app->request->post())){

            $post = Yii::$app->request->post();

            $user->email = $post['User']['email'];
            $user->username = $post['User']['username'];
            $auth_assignment->item_name = $post['AuthAssignment']['item_name'];

            if($auth_assignment->save() && $profile->save()){

                $model->photo = UploadedFile::getInstance($model, 'photo');

                if($model->photo){
                    if(!empty($profile->avatar)) {
                        $avatar = explode('/backend/web' ,$profile->avatar);
                        unlink(getcwd().''.$avatar[1]);
                    }

                    $imageName = uniqid();
                    $model->photo->saveAs('storage/user_avatars/'.$imageName.'.'.$model->photo->extension);
                    $profile->avatar = '/backend/web/storage/user_avatars/'.$imageName.'.'.$model->photo->extension;
                    $profile->save(false);
                }

                if(empty($post['User']['username'])) {
                    $user->username = $profile['name'].'_'.uniqid();
                }

                if($user->save()){
                    Yii::$app->session->setFlash('warning', 'Изменения успешно сохранены!');

                    return $this->redirect('index');
                }
            }
        }
        
        return $this->render('update', [
            'user' => $user,
            'model' => $model,
            'profile' => $profile,
            'auth_assignment' => $auth_assignment
        ]);
    }

    //Восстановление персонала (смена статуса)
    public function actionActivate($id)
    {
        $user = User::findOne($id);

        if(Yii::$app->request->post() && $user){
            $user->status = 10;
            $user->save(false);

            Yii::$app->session->setFlash('info', 'Пользователь успешно восстановлен!');

            return $this->redirect('index');
        }
    }

    //Удаление персонала (смена статуса)
    public function actionDelete($id)
    {
        $user = User::findOne($id);

        if(Yii::$app->request->post() && $user){
            $user->status = 0;
            $user->save(false);

            Yii::$app->session->setFlash('danger', 'Пользователь успешно удален!');

            return $this->redirect('index');
        }
    }
    
}
