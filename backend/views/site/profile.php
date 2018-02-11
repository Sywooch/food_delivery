<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Мой профиль';
?>


<?php $form = ActiveForm::begin(['id' => 'category-form',]); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title">Профиль</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend class="text-semibold"><i class="icon-user position-left"></i> Данные профиля</legend>

                        <?= $form->field($profile, 'name')->textInput(['class' => 'form-control', 'placeholder' => 'Ваше имя']) ?>

                        <?= $form->field($profile, 'surname')->textInput(['class' => 'form-control', 'placeholder' => 'Ваша фамилия']) ?>

                        <div class="media no-margin-top">
                            <div class="media-left">
                                <a href="#"><img src="<?= !empty($profile->avatar) ? $profile->avatar : '/backend/web/images/placeholder.jpg' ?>" style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="uploader">
                                    <?= $form->field($profile, 'user_avatar')->fileInput(['class' => 'file-styled'])->label(false) ?>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                </div>

                <div class="col-md-6">
                    <fieldset>
                        <legend class="text-semibold"><i class="icon-vcard position-left"></i> Данные аккаунта</legend>

                        <?= $form->field($model, 'username')->textInput(['class' => 'form-control', 'placeholder' => 'Логин']) ?>

                        <?= $form->field($model, 'email')->textInput(['class' => 'form-control', 'placeholder' => 'email@gmail.com']) ?>

                    </fieldset>
                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Сохранить <i class="icon-arrow-right14 position-right"></i></button>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>