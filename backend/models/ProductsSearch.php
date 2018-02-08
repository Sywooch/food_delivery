<?php
namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\Products;

class ProductsSearch extends Products
{

    public $search;

    public function rules()
    {
        return [
            [['search'], 'string'],
        ];
    }

    public function search($params)
    {
        $query = Products::find()->orderBy(['created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);
        
        $query->andFilterWhere(['like', 'title', $this->search])
            ->orFilterWhere(['like', 'description', $this->search])
            ->orFilterWhere(['like', 'composition', $this->search])
            ->orFilterWhere(['like', 'price', $this->search])
            ->orFilterWhere(['like', 'discount_price', $this->search]);

        return $dataProvider;
    }
}