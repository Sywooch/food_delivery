<?php
namespace backend\controllers;

use backend\models\RegisterStaff;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use backend\models\UserSearch;


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
    
    public function actionCreate()
    {
        $model = new RegisterStaff();

        return $this->render('create', [
            'model' => $model
        ]);
    }
    
}
