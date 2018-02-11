<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Вход';
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

<div class="panel panel-body login-form">
    <div class="text-center">
        <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
        <h5 class="content-group">Вход в ваш аккаут</h5>
    </div>


    <div class="form-group has-feedback has-feedback-left">
        <?= $form->field($model, 'username')
            ->textInput(['autofocus' => true, 'placeholder' => 'Логин'])
            ->label(false) ?>
        <div class="form-control-feedback">
            <i class="icon-user text-muted"></i>
        </div>
    </div>

    <div class="form-group has-feedback has-feedback-left">
        <?= $form->field($model, 'password')
            ->passwordInput(['placeholder' => 'Пароль'])
            ->label(false) ?>
        <div class="form-control-feedback">
            <i class="icon-lock2 text-muted"></i>
        </div>
    </div>

    <div class="form-group login-options">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'rememberMe')->checkbox(['label' => 'Запомнить', 'class' => 'styled']) ?>
            </div>

            <div class="col-sm-6 text-right">
                <a href="<?= Url::to(['/site/request-password-reset']) ?>">Забыли пароль?</a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn bg-blue btn-block">Войти <i class="icon-arrow-left13 position-right"></i></button>
    </div>

</div>

<?php ActiveForm::end(); ?>