<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\ProductsSearch;
use yii\web\UploadedFile;
use common\models\Products;


class ProductsController extends Controller
{

    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionCreate()
    {
        $model = new Products();

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');

            if($model->image){
                $imageName = uniqid();
                $model->image->saveAs('storage/product_images/'.$imageName.'.'.$model->image->extension);
                $model->picture = '/backend/web/storage/product_images/'.$imageName.'.'.$model->image->extension;
                $model->save(false);
            }


            Yii::$app->session->setFlash('success', 'Продукт успешно добавлен!');

            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionUpdate($id)
    {
        $model = Products::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->image = UploadedFile::getInstance($model, 'image');

            if($model->image){
                if(!empty($model->picture)) {
                    $picture = explode('/backend/web' ,$model->picture);
                    unlink(getcwd().''.$picture[1]);
                }

                $imageName = uniqid();
                $model->image->saveAs('storage/product_images/'.$imageName.'.'.$model->image->extension);
                $model->picture = '/backend/web/storage/product_images/'.$imageName.'.'.$model->image->extension;
                $model->save(false);
            }

            Yii::$app->session->setFlash('warning', 'Изменения успешно сохранены!');

            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionChangeStatus($id)
    {
        $model = Products::findOne($id);

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
        $model = Products::findOne($id);

        if(Yii::$app->request->post() && $model && $model->delete()) {
            if(!empty($model->picture)) {
                $picture = explode('/backend/web' ,$model->picture);
                unlink(getcwd().''.$picture[1]);
            }

            Yii::$app->session->setFlash('danger', 'Продукт удален!');

            return $this->redirect('index');
        }
    }

}
