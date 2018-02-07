<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Category;

class CategorySearch extends Model
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
        $query = Category::find()->orderBy(['created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);


        $query->andFilterWhere(['like', 'title', $this->search])
            ->orFilterWhere(['like', 'description', $this->search]);

        return $dataProvider;
    }
}