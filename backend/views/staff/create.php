<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Добавление нового пользователя';
?>

<div class="col-md-4">
    <?php $form = ActiveForm::begin(['id' => 'new-user-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

    <?php ActiveForm::end(); ?>
</div>
