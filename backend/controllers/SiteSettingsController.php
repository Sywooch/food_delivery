<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use common\models\PaymentSystem;
use common\models\SiteSettings;

class SiteSettingsController extends Controller
{

    public function actionIndex()
    {
        $model = SiteSettings::findOne(1);

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->site_logo = UploadedFile::getInstance($model, 'site_logo');

            if($model->site_logo){
                if(!empty($model->logo)) {
                    $picture = explode('/backend/web' ,$model->logo);
                    unlink(getcwd().''.$picture[1]);
                }

                $imageName = uniqid();
                $model->site_logo->saveAs('storage/site_logo/'.$imageName.'.'.$model->site_logo->extension);
                $model->logo = '/backend/web/storage/site_logo/'.$imageName.'.'.$model->site_logo->extension;
                $model->save(false);
            }

            Yii::$app->session->setFlash('success', 'Изменения успешно сохранены!');
        }

        return $this->render('index', [
            'model' => $model
        ]);
    }
    
    public function actionScore()
    {
        $model = SiteSettings::find()
            ->where(['id' => 1])
            ->one();
        
        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Сохранения успешно изменены!');
            
            return $this->refresh();
        }
        
        return $this->render('score', [
            'model' => $model
        ]);
    }
    
    public function actionPaymentSystem()
    {
        $model = PaymentSystem::findOne(1);
        
        if($model->load(Yii::$app->request->post())){
            $model->public_key = base64_encode($model->public_key);
            $model->private_key = base64_encode($model->private_key);

            if($model->save()){
                Yii::$app->session->setFlash('success', 'Изменения успешно сохранены!');

                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('danger', 'Невозможно сохранить данные!');

                return $this->refresh();
            }
        }

        $model->public_key = base64_decode($model->public_key);
        $model->private_key = base64_decode($model->private_key);
        
        return $this->render('payment-system', [
            'model' => $model
        ]);
    }

}
