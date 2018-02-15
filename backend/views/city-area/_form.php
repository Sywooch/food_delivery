<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\ckeditor\CKEditor;
?>

<div class="col-md-9">
    <?php $form = ActiveForm::begin(['id' => 'delivery-area-form']); ?>
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Район доставки</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">
                <fieldset>
                    <legend class="text-semibold">
                        <i class="icon-newspaper position-left"></i>
                        Общие данные
                        <a class="control-arrow" data-toggle="collapse" data-target="#demo1">
                            <i class="icon-circle-down2"></i>
                        </a>
                    </legend>

                    <div class="collapse in" id="demo1">

                        <?= $form->field($model, 'region')->textInput(['class' => 'form-control', 'placeholder' => 'Район']) ?>

                        <?= $form->field($model, 'delivery_price')->textInput(['class' => 'form-control', 'placeholder' => 'Стоимость']) ?>

                    </div>
                </fieldset>

                <div class="text-right">
                    <button type="submit" class="btn btn-primary"><?= $model->isNewRecord ? 'Добавить' : 'Сохранить' ?> <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>