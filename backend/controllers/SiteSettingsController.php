<?php
namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\UploadedFile;
use common\models\PaymentSystem;
use common\models\SiteSettings;
use common\models\Addresses;
use common\models\Phones;
use common\models\PageSeo;

class SiteSettingsController extends Controller
{

    //Настройки главной страницы сайта
    public function actionIndex()
    {
        $model = SiteSettings::findOne(1);
        $seo = PageSeo::findOne(1);

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

        if($seo->load(Yii::$app->request->post()) && $seo->save()){
            $seo->facebook_image = UploadedFile::getInstance($seo, 'facebook_image');
            $seo->twitter_image_upload = UploadedFile::getInstance($seo, 'twitter_image_upload');

            if($seo->facebook_image){
                if(!empty($seo->og_image)) {
                    $picture = explode('/backend/web' ,$seo->og_image);
                    unlink(getcwd().''.$picture[1]);
                }

                $imageName = uniqid();
                $seo->facebook_image->saveAs('storage/seo_images/'.$imageName.'.'.$seo->facebook_image->extension);
                $seo->og_image = '/backend/web/storage/seo_images/'.$imageName.'.'.$seo->facebook_image->extension;
                $seo->save(false);
            }

            if($seo->twitter_image_upload){
                if(!empty($seo->twitter_image)) {
                    $picture = explode('/backend/web' ,$seo->twitter_image);
                    unlink(getcwd().''.$picture[1]);
                }

                $imageName = uniqid();
                $seo->twitter_image_upload->saveAs('storage/seo_images/'.$imageName.'.'.$seo->twitter_image_upload->extension);
                $seo->twitter_image = '/backend/web/storage/seo_images/'.$imageName.'.'.$seo->twitter_image_upload->extension;
                $seo->save(false);
            }

            Yii::$app->session->setFlash('success', 'SEO настройки успешно сохранены!');
        }

        return $this->render('index', [
            'model' => $model,
            'seo' => $seo
        ]);
    }

    //Система баллов
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

    //Настройки LiQPay
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

    //Адреса и телефоны
    public function actionAddress()
    {
        $addressDataProvider = new ActiveDataProvider([
            'query' => Addresses::find()
                ->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        $phoneDataProvider = new ActiveDataProvider([
            'query' => Phones::find()
                ->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        return $this->render('address', [
            'phoneDataProvider' => $phoneDataProvider,
            'addressDataProvider' => $addressDataProvider
        ]);
    }
    
    //Добавление нового адреса
    public function actionAddressCreate()
    {
        $model = new Addresses();
        
        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Адрес успешно добавлен!');
            
            return $this->redirect('address');
        }
        
        return $this->render('address-create', [
            'model' => $model
        ]);
    }

    //Редактирование адреса
    public function actionAddressUpdate($id)
    {
        $model = Addresses::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('warning', 'Адрес успешно отредактирован!');

            return $this->redirect('address');
        }

        return $this->render('address-update', [
            'model' => $model
        ]);
    }

    //Удаление адреса
    public function actionAddressDelete($id)
    {
        $model = Addresses::findOne($id);
        
        if($model && $model->delete()){
            Yii::$app->session->setFlash('danger', 'Адрес успешно удален!');

            return $this->redirect('address');
        }

        Yii::$app->session->setFlash('danger', 'Невозможно удалить адрес!');

        return $this->redirect('address');
    }

    //Добавление нового номера телефона
    public function actionPhoneCreate()
    {
        $model = new Phones();

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Номер телефона успешно добавлен!');

            return $this->redirect('address');
        }

        return $this->render('phone-create', [
            'model' => $model
        ]);
    }

    //Редактирование номера телефона
    public function actionPhoneUpdate($id)
    {
        $model = Phones::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('warning', 'Номер телефона успешно отредактирован!');

            return $this->redirect('address');
        }

        return $this->render('phone-update', [
            'model' => $model
        ]);
    }

    //Удаление номера телефона
    public function actionPhoneDelete($id)
    {
        $model = Phones::findOne($id);

        if($model && $model->delete()){
            Yii::$app->session->setFlash('danger', 'Номер успешно удален!');

            return $this->redirect('address');
        }

        Yii::$app->session->setFlash('danger', 'Невозможно удалить номер телефона!');

        return $this->redirect('address');
    }

}
