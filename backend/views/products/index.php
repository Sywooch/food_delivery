<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Продукты';

?>

<div class="row">
    <div class="col-md-6">
        <?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ], 'method' => 'get', 'action' => ['index']]); ?>
            <div class="form-group has-feedback has-feedback-left" style="max-width: 300px;">
                <input class="form-control ui-autocomplete-input" name="ProductsSearch[search]" placeholder="Поиск" id="ac-basic" autocomplete="off" type="text">
                <div class="form-control-feedback">
                    <i class="icon-search4 text-size-base"></i>
                </div>
            </div>
        <?php ActiveForm::end() ?>
    </div>
    <div class="col-md-6">
        <?= Html::a('
            <button type="button" class="btn bg-teal-400 btn-labeled legitRipple">
                <b><i class="icon-plus3"></i></b>
                Новый продукт
            </button>
        ', ['create'], [
                'style' => [
                        'float' => 'right'
                ]
        ]) ?>
    </div>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'layout'=>"{items}\n{pager}\n{summary}",
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
                    'alt' => 'product_photo',
                    'style' => [
                        'height' => '58px',
                        'width' => '58px',
                        'border-radius' => '2px'
                    ]
                ]);
            }
        ],
        [
            'header' => 'Продукт',
            'value' => 'title'
        ],
        [
            'header' => 'Цена',
            'value' => function($model) {
                return $model->price.' грн.';
            }
        ],
        [
            'header' => 'Акционная цена',
            'value' => function($model) {
                return $model->discount_price.' грн.';
            }
        ],
        [
            'header' => 'Категория',
            'value' => 'category.name'
        ],
        [
            'header' => 'Статус',
            'format' => 'raw',
            'value' => function($model) {
                return $model->status == 1 ? '<span class="label label-success">Активный</span>' : '<span class="label label-danger">Скрытый</span>';
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
                                'confirm' => 'Вы уверены что хотите удалить продукт? Вы можете скрыть продукт.'
                            ]
                        ]);
            }
        ]
    ],
]); ?>