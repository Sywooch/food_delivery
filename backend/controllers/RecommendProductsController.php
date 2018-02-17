<?php
namespace backend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use common\models\Products;
use common\models\RecommendProducts;
use yii\helpers\ArrayHelper;


class RecommendProductsController extends Controller
{

    //Рекомендуемые продукты
    public function actionIndex()
    {
        $model = new RecommendProducts();

        $products = ArrayHelper::map(
            Products::find()
                ->leftJoin('recommend_products', 'recommend_products.product_id = products.id')
                ->where(['products.status' => 1])
                ->andWhere(['recommend_products.product_id' => null])
                ->all(),
            'id', 'title');

        $dataProvider = new ActiveDataProvider([
            'query' => RecommendProducts::find()
                ->joinWith(['product'])
                ->where(['products.status' => '1'])
                ->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 20
            ]
        ]);

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success', 'Рекомендуемое блюдо успешно добавлено!');
            
            return $this->refresh();
        }

        return $this->render('index', [
            'model' => $model,
            'products' => $products,
            'dataProvider' => $dataProvider
        ]);
    }


    public function actionChangeStatus($id)
    {
        $model = RecommendProducts::findOne($id);

        if($model){
            $model->status == 0 ? $model->status = 1 : $model->status = 0;

            if($model->save(false)){
                Yii::$app->session->setFlash('info', 'Статус успешно изменен!');

                return $this->redirect('index');
            }
        }
    }

    public function actionDelete($id)
    {
        $model = RecommendProducts::findOne($id);

        if($model && $model->delete()){
            Yii::$app->session->setFlash('danger', 'Рекомендуемое блюдо успешно удалено!');

            return $this->redirect('index');
        }
    }

}
