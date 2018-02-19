<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Добавление нового пользователя';
?>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Регистрация нового пользователя</h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <?php $form = ActiveForm::begin(['id' => 'new-user-form']); ?>
            <div class="row">
                <div class="col-md-6">
                    <fieldset>

                        <legend class="text-semibold"><i class="icon-reading position-left"></i> Аккаунт</legend>

                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => 'Будет сгенерирован автоматически']) ?>

                        <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control', 'placeholder' => 'Будет сгенерирован автоматически']) ?>

                        <div class="form-group">
                            <label class="display-block">Роль:</label>

                            <label class="radio-inline">
                                <input type="radio" class="styled" name="RegisterStaff[role]" value="Менеджер" checked="checked">
                                Менеджер
                            </label>

                            <label class="radio-inline">
                                <input type="radio" class="styled" name="RegisterStaff[role]" value="Администратор">
                                Администратор
                            </label>
                        </div>

                    </fieldset>
                </div>

                <div class="col-md-6">
                    <fieldset>
                        <legend class="text-semibold"><i class="icon-magazine position-left"></i> Профиль</legend>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Имя пользователя']) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'surname')->textInput(['class' => 'form-control', 'placeholder' => 'Фамилия пользователя']) ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'someemail@mail.com']) ?>
                            </div>

                            <div class="col-md-6">
                                <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                                    'mask' => '+3 (999) 999 99 99',
                                    'clientOptions'=>[
                                        'clearIncomplete'=>true
                                    ]
                                ])->textInput() ?>
                            </div>
                        </div>

                        <label class="display-block">Фото пользователя:</label>
                        <?= $form->field($model, 'photo')->fileInput(['class' => 'file-styled'])->label(false) ?>

                    </fieldset>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Зарегистрировать <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
