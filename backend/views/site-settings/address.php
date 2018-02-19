<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Адреса и телефоны';

?>

<div class="row">
    <div class="col-md-6">
        <?= Html::a('
            <button type="button" class="btn bg-teal-400 btn-labeled legitRipple" style="margin-bottom: 3%">
                <b><i class="icon-plus3"></i></b>
                Новый адрес
            </button>
        ', ['address-create']) ?>


        <?= GridView::widget([
            'dataProvider' => $addressDataProvider,
            'layout'=>"{items}\n{pager}\n{summary}",
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'header' => '#',
                ],
                [
                    'header' => 'Адрес',
                    'value' => 'address'
                ],
                [
                    'header' => 'Дата создания',
                    'value' => 'created_at'
                ],
                [
                    'header' => 'Действия',
                    'format' => 'raw',
                    'value' => function($model) {
                        return
                            Html::a('<span class="icon-pencil6"></span>', ['address-update', 'id' => $model->id], ['title' => 'Отредактировать']).' '.
                            Html::a('<span class="icon-trash"></span>', ['address-delete', 'id' => $model->id],
                                [
                                    'title' => 'Удалить',
                                    'data' => [
                                        'method' => 'post',
                                        'confirm' => 'Вы уверены что хотите удалить адрес?'
                                    ]
                                ]);
                    }
                ]
            ],
        ]); ?>
    </div>

    <div class="col-md-6">
        <?= Html::a('
            <button type="button" class="btn bg-teal-400 btn-labeled legitRipple" style="margin-bottom: 3%">
                <b><i class="icon-plus3"></i></b>
                Новый телефон
            </button>
        ', ['phone-create']) ?>


        <?= GridView::widget([
            'dataProvider' => $phoneDataProvider,
            'layout'=>"{items}\n{pager}\n{summary}",
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'header' => '#',
                ],
                [
                    'header' => 'Номер телефона',
                    'value' => 'phone'
                ],
                [
                    'header' => 'Дата создания',
                    'value' => 'created_at'
                ],
                [
                    'header' => 'Действия',
                    'format' => 'raw',
                    'value' => function($model) {
                        return
                            Html::a('<span class="icon-pencil6"></span>', ['phone-update', 'id' => $model->id], ['title' => 'Отредактировать']).' '.
                            Html::a('<span class="icon-trash"></span>', ['phone-delete', 'id' => $model->id],
                                [
                                    'title' => 'Удалить',
                                    'data' => [
                                        'confirm' => 'Вы уверены что хотите удалить этот номер телефона?'
                                    ]
                                ]);
                    }
                ]
            ],
        ]); ?>
    </div>
</div>
