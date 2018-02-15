<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Платежная система';

?>

<div class="col-md-4">
    <?php $form = ActiveForm::begin(['id' => 'payment-system-form']); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Платежная система</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">

            <fieldset>
                <legend class="text-semibold"><i class="icon-credit-card2 position-left"></i> LiQPay</legend>

                <?= $form->field($model, 'payment_name')->textInput(['class' => 'form-control', 'placeholder' => 'Название']) ?>

                <?= $form->field($model, 'public_key')->textInput(['class' => 'form-control', 'placeholder' => 'Ключ']) ?>

                <?= $form->field($model, 'private_key')->textInput(['class' => 'form-control', 'placeholder' => 'Ключ']) ?>

                <div class="form-group">
                    <label class="display-block">Тестовый режим:</label>

                    <label class="radio-inline">
                        <input type="radio" name="PaymentSystem[sandbox]" value="1" class="styled" <?= $model->sandbox == 1 ? 'checked="checked"' : '' ?>>
                        Включить
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="PaymentSystem[sandbox]" value="0" class="styled" <?= $model->sandbox == 0 ? 'checked="checked"' : '' ?>>
                        Выключить
                    </label>
                </div>

            </fieldset>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
