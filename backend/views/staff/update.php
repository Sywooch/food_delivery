<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Редактирование пользователя';
?>

<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Информация пользователя <?= $profile->surname.' '.$profile->name ?></h5>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
            </ul>
        </div>
    </div>

    <div class="panel-body">
        <?php $form = ActiveForm::begin(['id' => 'update-user-form']); ?>
        <div class="row">
            <div class="col-md-6">
                <fieldset>

                    <legend class="text-semibold"><i class="icon-reading position-left"></i> Аккаунт</legend>

                    <?= $form->field($user, 'username')->textInput(['class' => 'form-control', 'placeholder' => 'Будет сгенерирован автоматически'])->label('Логин')  ?>

                    <div class="form-group">
                        <label class="display-block">Роль:</label>

                        <label class="radio-inline">
                            <input type="radio" class="styled" name="AuthAssignment[item_name]" value="Менеджер" <?= $auth_assignment->item_name == 'Менеджер' ? 'checked="checked"': '' ?>>
                            Менеджер
                        </label>

                        <label class="radio-inline">
                            <input type="radio" class="styled" name="AuthAssignment[item_name]" value="Администратор" <?= $auth_assignment->item_name == 'Администратор' ? 'checked="checked"': '' ?>>
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
                            <?= $form->field($profile, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Имя пользователя']) ?>
                        </div>

                        <div class="col-md-6">
                            <?= $form->field($profile, 'surname')->textInput(['class' => 'form-control', 'placeholder' => 'Фамилия пользователя']) ?>
                        </div>
                    </div>

                    <?= $form->field($user, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'someemail@mail.com']) ?>

                    <label class="text-semibold">Фото пользователя:</label>
                    <div class="media no-margin-top">
                        <div class="media-left">
                            <a href="#"><img src="<?= !empty($profile->avatar) ? $profile->avatar : '/backend/web/images/placeholder.jpg' ?>" style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                        </div>

                        <div class="media-body">
                            <?= $form->field($model, 'photo')->fileInput(['class' => 'file-styled'])->label(false) ?>
                        </div>
                    </div>

                </fieldset>
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
