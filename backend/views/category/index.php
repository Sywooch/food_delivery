<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = 'Категории';

?>

<?= Html::a('
    <button type="button" class="btn bg-teal-400 btn-labeled legitRipple">
        <b><i class="icon-plus3"></i></b>
        Новая категория
    </button>
', ['create']) ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'header' => 'Фото',
            'format' => 'raw',
            'value' => function($model) {
                return Html::img($model->picture, [
                    'alt' => 'category_photo',
                    'style' => [
                        'height' => '50px'
                    ]
                ]);
            }
        ],
        [
            'header' => 'Категория',
            'value' => 'name'
        ],
        [
            'header' => 'Описание',
            'format' => 'raw',
            'value' => 'description'
        ],
        [
            'header' => 'Мета заголовок',
            'value' => 'meta_title'
        ],
        [
            'header' => 'Мета описание',
            'value' => 'meta_description'
        ],
        [
            'header' => 'Статус',
            'format' => 'raw',
            'value' => function($model) {
                return $model->status == 1 ? '<span class="label label-success">Активная</span>' : '<span class="label label-danger">Скрыта</span>';
            }
        ],
        [
            'header' => 'Действия',
            'format' => 'raw',
            'value' => function($model) {
                return
                    Html::a('<span class="icon-pencil6"></span>', ['update', 'id' => $model->id], ['title' => 'Отредактировать']).' '.
                    Html::a('<span class="icon-lock2"></span>', ['change-status', 'id' => $model->id], ['title' => 'Изменить статус']).' '.
                    Html::a('<span class="icon-trash"></span>', ['delete', 'id' => $model->id],
                        [
                            'title' => 'Удалить',
                            'data' => [
                                'method' => 'post',
                                'confirm' => 'Вы уверены что хотите удалить категорию? Все товары в данной категории будут удалены. Вы можете скрыть категорию, чтобы не потерять товары.'
                            ]
                        ]);
            }
        ]
    ],
]); ?>


