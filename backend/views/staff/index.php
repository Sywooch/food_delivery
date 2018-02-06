<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Персонал';

?>

<?= Html::a('
    <button type="button" class="btn bg-teal-400 btn-labeled legitRipple">
        <b><i class="icon-reading"></i></b>
        Новый пользователь
    </button>
', ['create']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'header' => 'Фото',
            'format' => 'raw',
            'value' => function($model){
                return Html::img($model->profile->avatar, [
                    'alt' => 'profile_image',
                    'style' => [
                        'height' => '50px'
                    ]
                ]);
            }
        ],
        [
            'header' => 'Пользователь',
            'value' => function($model){
                return $model->profile->surname.' '.$model->profile->name;
            }
        ],
        [
            'header' => 'Email',
            'value' => 'email'
        ],
        [
            'header' => 'Логин',
            'value' => 'username'
        ],
        [
            'header' => 'Роль',
            'value' => function($model){
                return $model->role->item_name;
            }
        ],
        [
            'header' => 'Зарегистрирован',
            'value' => function($model){
                return gmdate('d.m.Y H:i:s', $model->created_at);
            }
        ],
        [
            'header' => 'Статус',
            'format' => 'raw',
            'value' => function($model){
                if($model->status == 0) return '<span class="label label-danger">Удален</span>';
                if($model->status == 10) return '<span class="label label-success">Активный</span>';
            }
        ],
        [
            'header' => 'Действия',
            'format' => 'raw',
            'value' => function($model){
                if(Yii::$app->user->identity->getId() == $model->id) {
                    return '';
                } else {
                    return Html::a('<span class="icon-pencil6"></span>', ['update', 'id' => $model->id], ['title' => 'Отредактировать']).' '.
                           Html::a('<span class=" icon-trash"></span>', ['delete', 'id' => $model->id], ['title' => 'Удалить']);
                }
            }
        ]
    ],
]); ?>


