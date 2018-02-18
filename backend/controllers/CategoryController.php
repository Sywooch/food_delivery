<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\CategorySearch;
use yii\web\UploadedFile;
use common\models\Category;
use common\models\PageSeo;


class CategoryController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Category();
        $seo = new PageSeo();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');

            if($model->image){
                $imageName = uniqid();
                $model->image->saveAs('storage/category_images/'.$imageName.'.'.$model->image->extension);
                $model->picture = '/backend/web/storage/category_images/'.$imageName.'.'.$model->image->extension;
                $model->save(false);
            }

            $seo->category_id = $model->id;
            $seo->save(false);

            if($seo->load(Yii::$app->request->post()) && $seo->save()) {
                $seo->facebook_image = UploadedFile::getInstance($seo, 'facebook_image');
                $seo->twitter_image_upload = UploadedFile::getInstance($seo, 'twitter_image_upload');

                if($seo->facebook_image){
                    $imageName = uniqid();
                    $seo->facebook_image->saveAs('storage/seo_images/'.$imageName.'.'.$seo->facebook_image->extension);
                    $seo->og_image = '/backend/web/storage/seo_images/'.$imageName.'.'.$seo->facebook_image->extension;
                    $seo->save(false);
                }

                if($seo->twitter_image_upload){
                    $imageName = uniqid();
                    $seo->twitter_image_upload->saveAs('storage/seo_images/'.$imageName.'.'.$seo->twitter_image_upload->extension);
                    $seo->twitter_image = '/backend/web/storage/seo_images/'.$imageName.'.'.$seo->twitter_image_upload->extension;
                    $seo->save(false);
                }
            }

            Yii::$app->session->setFlash('success', 'Категория успешно добавлена!');
            
            return $this->redirect('index');
        }
        
        return $this->render('create', [
            'seo' => $seo,
            'model' => $model
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = Category::findOne($id);
        $seo = PageSeo::findOne(['category_id' => $id]);

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');

            if($model->image){
                if(!empty($model->picture)) {
                    $picture = explode('/backend/web' ,$model->picture);
                    unlink(getcwd().''.$picture[1]);
                }

                $imageName = uniqid();
                $model->image->saveAs('storage/category_images/'.$imageName.'.'.$model->image->extension);
                $model->picture = '/backend/web/storage/category_images/'.$imageName.'.'.$model->image->extension;
                $model->save(false);
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
            }

            Yii::$app->session->setFlash('warning', 'Изменения успешно сохранены!');

            return $this->redirect('index');
        }
        
        return $this->render('update', [
            'seo' => $seo,
            'model' => $model
        ]);
    }

    public function actionChangeStatus($id)
    {
        $model = Category::findOne($id);

        if($model){
            $model->status == 0 ? $model->status = 1 : $model->status = 0;

            if($model->save(false)){
                Yii::$app->session->setFlash('info', 'Статус успешно изменен');

                return $this->redirect('index');
            }
        }
    }
    
    public function actionDelete($id)
    {
        $model = Category::findOne($id);
        
        if(Yii::$app->request->post() && $model && $model->delete()) {
            if(!empty($model->picture)) {
                $picture = explode('/backend/web' ,$model->picture);
                unlink(getcwd().''.$picture[1]);
            }
            
            Yii::$app->session->setFlash('danger', 'Категория удалена!');

            return $this->redirect('index');
        }
    }

}
