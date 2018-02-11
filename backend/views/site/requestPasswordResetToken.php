<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Сброс пароля';
?>

<?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
            <h5 class="content-group">Сброс пароля <small class="display-block">Мы отправим вам письмо с дальнейшими инструкциями</small></h5>
        </div>

        <div class="form-group has-feedback">
            <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'Ваш email'])->label(false) ?>
            <div class="form-control-feedback">
                <i class="icon-mail5 text-muted"></i>
            </div>
        </div>

        <button type="submit" class="btn bg-blue btn-block">Сбросить пароль <i class="icon-arrow-right14 position-right"></i></button>
    </div>
<?php ActiveForm::end(); ?>