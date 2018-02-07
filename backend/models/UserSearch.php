<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

class UserSearch extends User
{

    public $search;

    public function rules()
    {
        return [
            [['search'], 'number'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function search($params)
    {
        $query = User::find()->orderBy(['created_at' => SORT_DESC]);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        $this->load($params);
        
        $query->joinWith(['profile']);
        
        $query->andFilterWhere(['like', 'username', $this->search])
            ->orFilterWhere(['like', 'email', $this->search])
            ->orFilterWhere(['like', 'profile.name', $this->search])
            ->orFilterWhere(['like', 'profile.surname', $this->search]);

        return $dataProvider;
    }
}