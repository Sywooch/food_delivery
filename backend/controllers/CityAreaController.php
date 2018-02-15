<?php
namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\CityArea;


class CityAreaController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CityArea::find(),
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $model = new CityArea();
        
        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Район доставки успешно добавлен!');
            
            return $this->redirect('index');
        }
        
        return $this->render('create', [
            'model' => $model
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = CityArea::findOne($id);

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('warning', 'Район доставки успешно отредактирован!');
            
            return $this->redirect('index');
        }

        return $this->render('update', [
            'model' => $model
        ]);
    }

    public function actionDelete($id)
    {
        $model = CityArea::findOne($id);

        if($model && $model->delete()){
            Yii::$app->session->setFlash('danger', 'Район доставки удален!');

            return $this->redirect('index');
        }
    }

}
