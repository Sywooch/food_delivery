<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Системма баллов';

?>

<div class="col-md-4">
    <?php $form = ActiveForm::begin(['id' => 'score-form']); ?>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Система баллов</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                    <fieldset>
                        <legend class="text-semibold"><i class="icon-store position-left"></i> Основная информация</legend>

                        <?= $form->field($model, 'score')->textInput(['class' => 'form-control', 'placeholder' => 'Количество']) ?>

                    </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
