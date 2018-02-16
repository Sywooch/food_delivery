<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;
?>

<div class="col-md-4">
    <?php $form = ActiveForm::begin(['id' => 'address-form',]); ?>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Адрес </h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                <fieldset>

                    <?= $form->field($model, 'address')->textInput(['class' => 'form-control', 'placeholder' => 'Введите адрес'])->label(false) ?>

                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><?= $model->isNewRecord ? 'Добавить' : 'Сохранить' ?> <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
