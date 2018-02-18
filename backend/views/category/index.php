<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Категории';

?>

<?= Html::a('
    <button type="button" class="btn bg-teal-400 btn-labeled legitRipple">
        <b><i class="icon-plus3"></i></b>
        Новая категория
    </button>
', ['create']) ?>

<?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ], 'method' => 'get', 'action' => ['index']]); ?>
    <div class="form-group has-feedback has-feedback-left" style="max-width: 300px; float: right">
        <input class="form-control ui-autocomplete-input" name="CategorySearch[search]" placeholder="Поиск" id="ac-basic" autocomplete="off" type="text">
        <div class="form-control-feedback">
            <i class="icon-search4 text-size-base"></i>
        </div>
    </div>
<?php ActiveForm::end() ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'header' => '#',
        ],
        [
            'header' => 'Фото',
            'format' => 'raw',
            'value' => function($model) {
                return Html::img($model->picture, [
                    'alt' => 'category_photo',
                    'style' => [
                        'height' => '50px',
                        'width' => '80px',
                        'border-radius' => '2px'
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

