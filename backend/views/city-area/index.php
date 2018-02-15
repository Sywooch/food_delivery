<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Районы города';

?>

<?= Html::a('
    <button type="button" class="btn bg-teal-400 btn-labeled legitRipple">
        <b><i class="icon-plus3"></i></b>
        Новый район
    </button>
', ['create']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'header' => 'Район доставки',
            'value' => 'region'
        ],
        [
            'header' => 'Стоимость доставки',
            'value' => function($model){
                return $model->delivery_price . ' грн';
            }
        ],
        [
            'header' => 'Действия',
            'format' => 'raw',
            'value' => function($model) {
                return
                    Html::a('<span class="icon-pencil6"></span>', ['update', 'id' => $model->id], ['title' => 'Отредактировать']).' '.
                    Html::a('<span class="icon-trash"></span>', ['delete', 'id' => $model->id],
                        [
                            'title' => 'Удалить',
                            'data' => [
                                'confirm' => 'Вы уверены что хотите удалить район доставки?'
                            ]
                        ]);
            }
        ]
    ],
]); ?>

