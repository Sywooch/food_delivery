<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

class UserSearch extends User
{

    
    public function rules()
    {
        return [
            [['id', 'description_ua', 'description_en', 'stock', 'room_count', 'bed_count', 'floor'], 'integer'],
            [['title_ru', 'title_ua', 'title_en', 'description_ru', 'coordinates', 'type', 'area', 'min_price', 'max_price', 'apartment_id',
                'tv', 'iron', 'plazm_tv', 'fridge', 'balcony', 'door', 'smoke', 'drying_machine', 'separate_entrance', 'internet',
                'washer_machine', 'gas', 'wifi', 'boiler', 'laptop', 'conditioner', 'jacuzzi', 'pool', 'image', 'comment'], 'safe'],
            [['price_2', 'price_night', 'price_day', 'price_5', 'price_10', 'apartment_area'], 'number'],
        ];
    }
    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function search($params)
    {
        $query = User::find();
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        $this->load($params);

//        $query->andFilterWhere([
//            'id' => $this->id,
//            'description_ua' => $this->description_ua,
//            'description_en' => $this->description_en,
//            'stock' => $this->stock,
//            'price_2' => $this->price_2,
//            'price_night' => $this->price_night,
//            'price_day' => $this->price_day,
//            'price_5' => $this->price_5,
//            'price_10' => $this->price_10,
//            'room_count' => $this->room_count,
//            'bed_count' => $this->bed_count,
//            'floor' => $this->floor,
//            'apartment_area' => $this->apartment_area,
//        ]);
        
//        $query->joinWith(['facilities', 'comments']);
        
//        $query->andFilterWhere(['like', 'title_ru', $this->title_ru]);
        return $dataProvider;
    }
}