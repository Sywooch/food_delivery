<?php
namespace backend\controllers;

use common\models\SiteSettings;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;


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

}
