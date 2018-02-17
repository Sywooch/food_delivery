<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Рекомендуемые блюда';
?>

<div class="col-md-4">
    <?php $form = ActiveForm::begin(['id' => 'site-settings-form',]); ?>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Рекомендуемое блюдо</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <fieldset>

                    <?= $form->field($model, 'product_id')->dropDownList(
                        $products,
                        [
                            'prompt' => 'Выберите продукт',
                            'class' => 'select'
                        ])
                    ?>

                    <div class="form-group">
                        <label class="display-block">Статус:</label>

                        <label class="radio-inline">
                            <input type="radio" name="RecommendProducts[status]" value="1" class="styled" checked>
                            Отображать
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="RecommendProducts[status]" value="0" class="styled">
                            Скрыть
                        </label>
                    </div>

                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Добавить <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>

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
                return Html::img($model->product->picture, [
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
            'value' => 'product.title'
        ],
        [
            'header' => 'Цена',
            'value' => function($model) {
                return $model->product->price.' грн.';
            }
        ],
        [
            'header' => 'Акционная цена',
            'value' => function($model) {
                return $model->product->discount_price.' грн.';
            }
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
                    Html::a('<span class="icon-lock2"></span>', ['change-status', 'id' => $model->id], ['title' => 'Изменить статус']).' '.
                    Html::a('<span class="icon-trash"></span>', ['delete', 'id' => $model->id],
                        [
                            'title' => 'Удалить',
                            'data' => [
                                'confirm' => 'Вы уверены что хотите удалить рекомендуемое блюдо?'
                            ]
                        ]);
            }
        ]
    ],
]); ?>