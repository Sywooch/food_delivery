<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Новый пароль';
?>

<?php $form = ActiveForm::begin([
        'id' => 'reset-password-form',
        'options' => [
             'class' => 'login-form'
        ]
]); ?>
    <div class="panel">
        <div class="panel-body">

            <h6 class="content-group text-center text-semibold no-margin-top">Введите ваш новый пароль</h6>

            <div class="form-group has-feedback">
                <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Пароль'])->label(false) ?>
                <div class="form-control-feedback">
                    <i class="icon-user-lock text-muted"></i>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
        </div>
    </div>
<?php ActiveForm::end(); ?>